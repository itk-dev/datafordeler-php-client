<?php

namespace ItkDev\Datafordeler;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface as HttpClientInterface;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use ItkDev\Datafordeler\Exception\Exception;
use Psr\Http\Message\RequestInterface;

abstract class Service
{
    protected bool $testMode = false;

    /**
     * Get API base url.
     */
    abstract protected function getApiBaseUrl(): string;

    private ?HttpClient $httpClient = null;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function setTestMode(bool $testMode = true): self
    {
        $this->testMode = $testMode;

        return $this;
    }

    /**
     * Invoke API method.
     *
     * @throws Exception
     */
    protected function invoke(string $method, array $parameters)
    {
        $httpClient = $this->getHttpClient();
        try {
            $response = $httpClient->get($method, ['query' => $parameters]);
        } catch (\Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }
        return json_decode((string) $response->getBody(), true);
    }

    protected function getHttpClient(): HttpClientInterface
    {
        if (null === $this->httpClient) {
            $handler = HandlerStack::create();
            $handler->push(Middleware::mapRequest(function (RequestInterface $request) {
                return $this->client->handleRequest($request);
            }));
            $options = [
                'base_uri' => $this->getApiBaseUrl(),
                'headers' => [
                    'accept' => 'application/json',
                ],
                'handler' => $handler,
            ];
            if ($this->client->getCertPath()) {
                $options['cert'] = $this->client->getCertPath();
            }

            $this->httpClient = new HttpClient($options);
        }

        return $this->httpClient;
    }
}
