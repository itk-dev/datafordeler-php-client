<?php

namespace ItkDev\Datafordeler\Service\BBR\BBRPublic;

use ItkDev\Datafordeler\Service;

/**
 * @see https://confluence.sdfe.dk/pages/viewpage.action?pageId=16056582#REST(BBR)-REST-BBRPublic
 */
class V1 extends Service
{
    protected function getApiBaseUrl(): string
    {
        return 'https://services.datafordeler.dk/BBR/BBRPublic/1/rest/';
    }

    /**
     * @param array $parameters An array with parameters
     * (cf. https://confluence.sdfe.dk/pages/viewpage.action?pageId=16056582#REST(BBR)-Metode-bbrsag).
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://confluence.sdfe.dk/pages/viewpage.action?pageId=16056582#REST(BBR)-Metode-bbrsag
     */
    public function bbrsag(array $parameters): array
    {
        return $this->invoke(
            __FUNCTION__,
            $parameters,
        );
    }
}
