<?php

namespace ItkDev\Datafordeler;

use GuzzleHttp\Client;

abstract class AbstractClient
{
    /**
     * @var string
     */
    protected $pemPath;

    /**
     * @var bool
     */
    protected $testMode;

    /**
     * @var Client
     */
    protected $client;

    /**
     * Constructor.
     *
     * @param false|bool $testMode
     */
    public function __construct(string $pemPath, bool $testMode = true)
    {
        $this->pemPath = $pemPath;
        $this->testMode = $testMode;
    }

    /**
     * Get API base url.
     */
    abstract protected function getApiBaseUrl(): string;

    /**
     * Invoke API method.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function invoke(string $method, array $parameters): array
    {
        if (null === $this->client) {
            $this->client = new Client([
                'cert' => $this->pemPath,
            ]);
        }
        $response = $this->client->get($this->getApiBaseUrl() . $method, ['query' => $parameters]);

        return json_decode((string) $response->getBody(), true);
    }
}
