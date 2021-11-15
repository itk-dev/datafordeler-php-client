<?php

namespace ItkDev\Datafordeler;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

class Client
{
    private ?string $username  = null;
    private ?string $password = null;
    private ?string $certPath = null;

    private function __construct()
    {
    }

    public static function createFromUsernameAndPassword(string $username, string $password): self
    {
        return (new static())
            ->setUsername($username)
            ->setPassword($password);
    }

    public static function createFromCertPath(string $certPath): self
    {
        return (new static())
            ->setCertPath($certPath);
    }

    public function handleRequest(RequestInterface $request): RequestInterface
    {
        if ($this->getUsername() && $this->getPassword()) {
            $parameters['username'] = $this->getUsername();
            $parameters['password'] = $this->getPassword();

            $uri = $request->getUri();
            $uri .= false === strpos($uri, '?') ? '?' : '&';
            $uri .= http_build_query($parameters);

            return new Request(
                $request->getMethod(),
                $uri,
                $request->getHeaders(),
                $request->getBody(),
                $request->getProtocolVersion()
            );
        }

        return $request;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    protected function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    protected function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCertPath(): ?string
    {
        return $this->certPath;
    }

    protected function setCertPath(string $certPath): self
    {
        $this->certPath = $certPath;
        return $this;
    }
}
