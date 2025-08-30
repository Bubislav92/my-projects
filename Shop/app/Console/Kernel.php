<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Definiše schedule za komande.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Pokreće komandu za automatsko otkazivanje porudžbina svakih 30 minuta
        $schedule->command('orders:cancel-expired')->everyMinute();
    }

    /**
     * Registruje Artisan komande.
     */
    protected function commands(): void
    {
        // Registruje sve komande u app/Console/Commands/
        $this->load(__DIR__.'/Commands');

        // Opcionalno učitava rute konzolnih komandi iz routes/console.php
        require base_path('routes/console.php');
    }
}
