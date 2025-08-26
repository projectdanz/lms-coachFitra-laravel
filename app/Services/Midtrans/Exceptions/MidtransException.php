<?php

namespace App\Services\Midtrans\Exceptions;

use Exception;

class MidtransException extends Exception
{
    protected $statusCode;
    protected $response;
    protected $context;

    public function __construct(
        string $message = '',
        int $statusCode = 0,
        ?array $response = null,
        ?array $context = null,
        ?Exception $previous = null
    ) {
        parent::__construct($message, $statusCode, $previous);

        $this->statusCode = $statusCode;
        $this->response = $response;
        $this->context = $context;
    }

    /**
     * Get the HTTP status code
     *
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Get the API response
     *
     * @return array|null
     */
    public function getResponse(): ?array
    {
        return $this->response;
    }

    /**
     * Get additional context
     *
     * @return array|null
     */
    public function getContext(): ?array
    {
        return $this->context;
    }

    /**
     * Check if this is a client error (4xx)
     *
     * @return bool
     */
    public function isClientError(): bool
    {
        return $this->statusCode >= 400 && $this->statusCode < 500;
    }

    /**
     * Check if this is a server error (5xx)
     *
     * @return bool
     */
    public function isServerError(): bool
    {
        return $this->statusCode >= 500;
    }

    /**
     * Check if this is a validation error
     *
     * @return bool
     */
    public function isValidationError(): bool
    {
        return $this->statusCode === 400;
    }

    /**
     * Check if this is an authentication error
     *
     * @return bool
     */
    public function isAuthenticationError(): bool
    {
        return $this->statusCode === 401;
    }

    /**
     * Check if this is an authorization error
     *
     * @return bool
     */
    public function isAuthorizationError(): bool
    {
        return $this->statusCode === 403;
    }

    /**
     * Check if this is a not found error
     *
     * @return bool
     */
    public function isNotFoundError(): bool
    {
        return $this->statusCode === 404;
    }

    /**
     * Get error details from response
     *
     * @return array
     */
    public function getErrorDetails(): array
    {
        $details = [
            'message' => $this->getMessage(),
            'status_code' => $this->statusCode,
            'timestamp' => now()->toISOString(),
        ];

        if ($this->response) {
            $details['response'] = $this->response;
        }

        if ($this->context) {
            $details['context'] = $this->context;
        }

        return $details;
    }

    /**
     * Convert exception to array for API responses
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'error' => true,
            'message' => $this->getMessage(),
            'status_code' => $this->statusCode,
            'details' => $this->getErrorDetails(),
        ];
    }

    /**
     * Convert exception to JSON
     *
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_PRETTY_PRINT);
    }
}
