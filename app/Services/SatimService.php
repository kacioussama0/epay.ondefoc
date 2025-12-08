<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SatimService
{
    protected string $baseUrl;
    protected string $username;
    protected string $password;
    protected string $terminalId;
    protected string $returnUrl;

    public function __construct()
    {
        $this->baseUrl    = config('satim.base_url');
        $this->username   = config('satim.username');
        $this->password   = config('satim.password');
        $this->terminalId = config('satim.terminal_id');
        $this->returnUrl  = config('satim.return_url');
    }

    /**
     * Register payment (GET version)
     */
    public function registerPayment(
        string $orderNumber,
        float $amount,
        string $description = '',
        string $lang = 'AR',
        array $additionalParams = []
    ): array {

        $payload = [
            'userName'    => $this->username,
            'password'    => $this->password,
            'orderNumber' => $orderNumber,
            'amount'      => intval($amount * 100),
            'currency'    => '012',
            'language'    => $lang,
            'returnUrl'   => $this->returnUrl,
            'failUrl'     => $this->returnUrl,
            'description' => $description,
            'jsonParams'  => json_encode([
                'terminal' => $this->terminalId,
                ...$additionalParams
            ], JSON_UNESCAPED_UNICODE),
        ];

        return $this->get('/payment/rest/register.do', $payload);
    }

    /**
     * Confirm order (GET version)
     */
    public function confirmOrder(string $satimOrderId): array
    {
        $payload = [
            'userName' => $this->username,
            'password' => $this->password,
            'orderId'  => $satimOrderId,
        ];

        return $this->get('/payment/rest/confirmOrder.do', $payload);
    }

    /**
     * Generic GET wrapper
     */
    protected function get(string $endpoint, array $data): array
    {
        try {
            $response = Http::timeout(20)
                ->get($this->baseUrl . $endpoint, $data);

            $json = $response->json();

            Log::info("SATIM GET", [
                'endpoint' => $endpoint,
                'payload'  => $data,
                'response' => $json
            ]);

            return $json ?? [];

        } catch (\Throwable $e) {

            Log::error("SATIM ERROR GET: " . $e->getMessage());

            return [
                'error'   => true,
                'message' => $e->getMessage()
            ];
        }
    }
}
