<?php

namespace CSGOPaka\Adapters;

use CSGOPaka\Exceptions\InvalidApiKeyException;
use CSGOPaka\Exceptions\ValidationException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Guzzle
{
    private Client $client;

    private int $errorCode;
    private string $error;

    public function __construct(string $apiKey)
    {
        $this->client = new Client([
            'http_errors' => false,
            'base_uri' => 'http://api.skinsmoney.test/v1/', #https://api.csgopaka.com/v1/
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $apiKey,
            ],
        ]);
    }

    /**
     * @throws ValidationException
     * @throws InvalidApiKeyException
     */
    public function request(string $uri, array $data = [], string $method = 'GET'): ResponseInterface|false
    {
        try {
            $request = $this->client->request($method, $uri, $data);

            if ($request->getStatusCode() == 422) {
                $payload = json_decode($request->getBody());
                throw new ValidationException($payload->data);
            }

            if($request->getStatusCode() == 401) {
                throw new InvalidApiKeyException();
            }

            return $request;
        } catch (GuzzleException $exception) {
            $this->error = $exception->getMessage();
            $this->errorCode = $exception->getCode();

            return false;
        }
    }

    public function errorCode(): int
    {
        return $this->errorCode;
    }

    public function error(): string
    {
        return $this->error;
    }
}