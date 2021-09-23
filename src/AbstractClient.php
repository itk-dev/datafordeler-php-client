<?php

namespace ItkDev\Datafordeler;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use ItkDev\Datafordeler\Exception\Exception;

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
     * @param string $pemPath The path to a PEM certificate.
     * @param bool $testMode
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
     * @throws Exception
     */
    protected function invoke(string $method, array $parameters): array
    {
        if (null === $this->client) {
            $this->client = new Client([
                'cert' => $this->pemPath,
            ]);
        }
        try {
            $response = $this->client->get($this->getApiBaseUrl() . $method, ['query' => $parameters]);
        } catch (\Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }
        return json_decode((string) $response->getBody(), true);
    }
}
