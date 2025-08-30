<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCancelledMail;
use Illuminate\Support\Facades\Log;

class CancelExpiredOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:cancel-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically cancels orders that are pending payment and have expired (older than 72h)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting expired order cancellation process...');

        $expiredOrders = Order::where('status', 'pending')
            ->where('payment_status', 'pending')
            ->where('expires_at', '<', now())
            ->get();

        if ($expiredOrders->isEmpty()) {
            $this->info('No expired orders found.');
            return Command::SUCCESS;
        }

        foreach ($expiredOrders as $order) {
            $order->update([
                'status' => 'cancelled',
                'payment_status' => 'cancelled',
            ]);

            Log::info("Order #{$order->id} automatically cancelled due to expired payment.");

            // Pošalji mejl korisniku
            if (!empty($order->email)) {
                try {
                    Mail::to($order->email)->queue(new OrderCancelledMail($order));
                    $this->info("Cancellation email queued for order #{$order->id} to {$order->email}");
                    Log::info("Queued OrderCancelledMail for order #{$order->id} to {$order->email}");
                } catch (\Exception $e) {
                    Log::error("Failed to send cancellation email for order #{$order->id}: " . $e->getMessage());
                    $this->error("Failed to queue email for order #{$order->id}");
                }
            }
        }

        $this->info('Expired order cancellation process completed.');
        return Command::SUCCESS;
    }
}
