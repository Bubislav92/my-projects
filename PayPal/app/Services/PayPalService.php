<?php

namespace App\Services;

use Srmklive\PayPal\Services\PayPal as PayPalClient;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\RefundApprovedMail;
use Illuminate\Support\Facades\Log;

class PayPalService
{
    protected string $mode;
    protected string $baseUrl;
    protected string $accessToken;

    public function __construct()
    {
        $this->mode = config('paypal.mode', 'sandbox');
        $this->baseUrl = $this->mode === 'live'
            ? 'https://api-m.paypal.com'
            : 'https://api-m.sandbox.paypal.com';
    }

    protected function authenticate(): bool
    {
        $cfg = config("paypal.{$this->mode}");

        $response = Http::withBasicAuth($cfg['client_id'], $cfg['client_secret'])
            ->asForm()
            ->post("{$this->baseUrl}/v1/oauth2/token", ['grant_type' => 'client_credentials']);

        if ($response->successful()) {
            $this->accessToken = $response->json('access_token');
            Log::debug("PayPal token uspešno dobijen.");
            return true;
        }

        Log::error('PayPal auth failed: ' . $response->body());
        return false;
    }

    /**
     * Full refund of a capture.
     *
     * @param string $captureId
     * @return array|null  PayPal JSON response or null on failure
     */
    public function refundCapture(string $captureId): ?array
    {
        if (! $this->authenticate()) {
            Log::error('Autentifikacija sa PayPal-om nije uspela.');
            return null;
        }

        $url = "{$this->baseUrl}/v2/payments/captures/{$captureId}/refund";
        $headers = ['Content-Type' => 'application/json'];
        $payload = []; // Empty body for full refund

        Log::debug("Slanje refund zahteva ka PayPalu", [
            'url' => $url,
            'headers' => $headers,
            'payload' => $payload,
        ]);

        $response = Http::withToken($this->accessToken)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->withBody('{}', 'application/json')
            ->post($url);

        if ($response->successful()) {
            Log::debug("Uspešan odgovor PayPal refund", $response->json());
            Log::info("Refund uspešan za captureId={$captureId}");
            return $response->json();
        }

        Log::error("Refund neuspešan za captureId={$captureId}", [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        return null;
    }
}