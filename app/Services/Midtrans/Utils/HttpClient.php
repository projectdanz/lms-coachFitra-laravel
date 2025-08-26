<?php

namespace App\Services\Midtrans\Utils;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Services\Midtrans\Exceptions\MidtransException;

class HttpClient
{
    protected $serverKey;
    protected $clientKey;
    protected $timeout;

    public function __construct()
    {
        $this->serverKey = config('midtrans.server_key');
        $this->clientKey = config('midtrans.client_key');
        $this->timeout = config('midtrans.timeout.request', 60);
    }

    /**
     * Make a POST request to Midtrans API
     *
     * @param string $baseUrl
     * @param string $endpoint
     * @param array $payload
     * @param string $authType
     * @return array
     * @throws MidtransException
     */
    public function post(string $baseUrl, string $endpoint, array $payload, string $authType = 'server'): array
    {
        $url = $baseUrl . $endpoint;

        try {
            $response = Http::withHeaders($this->getHeaders($authType))
                ->timeout($this->timeout)
                ->post($url, $payload);

            $this->logRequest('POST', $url, $payload, $response->json());

            if (!$response->successful()) {
                throw new MidtransException(
                    'HTTP request failed: ' . $response->body(),
                    $response->status()
                );
            }

            return $response->json();
        } catch (\Exception $e) {
            $this->logError('POST', $url, $payload, $e->getMessage());

            if ($e instanceof MidtransException) {
                throw $e;
            }

            throw new MidtransException('Request failed: ' . $e->getMessage());
        }
    }

    /**
     * Make a GET request to Midtrans API
     *
     * @param string $baseUrl
     * @param string $endpoint
     * @param array $params
     * @param string $authType
     * @return array
     * @throws MidtransException
     */
    public function get(string $baseUrl, string $endpoint, array $params = [], string $authType = 'server'): array
    {
        $url = $baseUrl . $endpoint;

        try {
            $response = Http::withHeaders($this->getHeaders($authType))
                ->timeout($this->timeout)
                ->get($url, $params);

            $this->logRequest('GET', $url, $params, $response->json());

            if (!$response->successful()) {
                throw new MidtransException(
                    'HTTP request failed: ' . $response->body(),
                    $response->status()
                );
            }

            return $response->json();
        } catch (\Exception $e) {
            $this->logError('GET', $url, $params, $e->getMessage());

            if ($e instanceof MidtransException) {
                throw $e;
            }

            throw new MidtransException('Request failed: ' . $e->getMessage());
        }
    }

    /**
     * Make a PATCH request to Midtrans API
     *
     * @param string $baseUrl
     * @param string $endpoint
     * @param array $payload
     * @param string $authType
     * @return array
     * @throws MidtransException
     */
    public function patch(string $baseUrl, string $endpoint, array $payload, string $authType = 'server'): array
    {
        $url = $baseUrl . $endpoint;

        try {
            $response = Http::withHeaders($this->getHeaders($authType))
                ->timeout($this->timeout)
                ->patch($url, $payload);

            $this->logRequest('PATCH', $url, $payload, $response->json());

            if (!$response->successful()) {
                throw new MidtransException(
                    'HTTP request failed: ' . $response->body(),
                    $response->status()
                );
            }

            return $response->json();
        } catch (\Exception $e) {
            $this->logError('PATCH', $url, $payload, $e->getMessage());

            if ($e instanceof MidtransException) {
                throw $e;
            }

            throw new MidtransException('Request failed: ' . $e->getMessage());
        }
    }

    /**
     * Make a DELETE request to Midtrans API
     *
     * @param string $baseUrl
     * @param string $endpoint
     * @param string $authType
     * @return array
     * @throws MidtransException
     */
    public function delete(string $baseUrl, string $endpoint, string $authType = 'server'): array
    {
        $url = $baseUrl . $endpoint;

        try {
            $response = Http::withHeaders($this->getHeaders($authType))
                ->timeout($this->timeout)
                ->delete($url);

            $this->logRequest('DELETE', $url, [], $response->json());

            if (!$response->successful()) {
                throw new MidtransException(
                    'HTTP request failed: ' . $response->body(),
                    $response->status()
                );
            }

            return $response->json();
        } catch (\Exception $e) {
            $this->logError('DELETE', $url, [], $e->getMessage());

            if ($e instanceof MidtransException) {
                throw $e;
            }

            throw new MidtransException('Request failed: ' . $e->getMessage());
        }
    }

    /**
     * Get authentication headers
     *
     * @param string $authType
     * @return array
     */
    protected function getHeaders(string $authType = 'server'): array
    {
        $key = $authType === 'client' ? $this->clientKey : $this->serverKey;
        $authString = base64_encode($key . ':');

        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . $authString,
            'User-Agent' => 'Laravel-Midtrans/1.0',
        ];
    }

    /**
     * Log API request if logging is enabled
     *
     * @param string $method
     * @param string $url
     * @param array $data
     * @param array $response
     * @return void
     */
    protected function logRequest(string $method, string $url, array $data, array $response): void
    {
        if (!config('midtrans.logging.enabled')) {
            return;
        }

        $logData = [
            'method' => $method,
            'url' => $url,
            'request_data' => $data,
            'response' => $response,
            'timestamp' => now()->toISOString(),
        ];

        Log::channel(config('midtrans.logging.channel'))
            ->info('Midtrans API Request', $logData);
    }

    /**
     * Log API error if logging is enabled
     *
     * @param string $method
     * @param string $url
     * @param array $data
     * @param string $error
     * @return void
     */
    protected function logError(string $method, string $url, array $data, string $error): void
    {
        if (!config('midtrans.logging.enabled')) {
            return;
        }

        $logData = [
            'method' => $method,
            'url' => $url,
            'request_data' => $data,
            'error' => $error,
            'timestamp' => now()->toISOString(),
        ];

        Log::channel(config('midtrans.logging.channel'))
            ->error('Midtrans API Error', $logData);
    }
}
