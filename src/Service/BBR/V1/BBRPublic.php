<?php

namespace ItkDev\Datafordeler\Service\BBR\V1;

use ItkDev\Datafordeler\Service;

/**
 * @see https://confluence.sdfe.dk/pages/viewpage.action?pageId=16056582#REST(BBR)-REST-BBRPublic
 *
 * Uses magic to invoke the service methods.
 *
 * @method bbrsag(array $parameters): array
 * @method bygning(array $parameters): array
 * @method ejendomsrelation(array $parameters): array
 * @method enhed(array $parameters): array
 * @method grund(array $parameters): array
 * @method tekniskanlaeg(array $parameters): array
 */
class BBRPublic extends Service
{
    /**
     * {@inheritdoc}
     */
    protected function getApiBaseUrl(): string
    {
        return 'https://services.datafordeler.dk/BBR/BBRPublic/1/rest/';
    }

    /**
     * {@inheritdoc}
     */
    public function __call(string $name, array $arguments)
    {
        return $this->invoke(
            $name,
            (array) reset($arguments),
        );
    }
}
