<?php

namespace ItkDev\Datafordeler\Service\DAR\V1;

use ItkDev\Datafordeler\Service;

/**
 * @see https://confluence.sdfe.dk/pages/viewpage.action?pageId=16056323#REST(DAR)-REST-DAR_BFE_Public
 *
 * Uses magic to invoke these service methods.
 *
 */
class DAR_BFE_Public extends Service
{
    /**
     * {@inheritdoc}
     */
    protected function getApiBaseUrl(): string
    {
        return 'https://services.datafordeler.dk/DAR/DAR_BFE_Public/1/rest/';
    }

    /**
     * @see https://confluence.sdfe.dk/pages/viewpage.action?pageId=16056323#REST(DAR)-Metode-husnummerTilBygningBfe
     */
    public function husnummerTilBygningBfe(string $husnummerId): array
    {
        return $this->invoke(
            __FUNCTION__,
            [
                'husnummerId' => $husnummerId,
            ]
        );
    }

    /**
      * @see https://confluence.sdfe.dk/pages/viewpage.action?pageId=16056323#REST(DAR)-Metode-adresseTilEnhedBfe
      */
    public function adresseTilEnhedBfe(string $adresseId): array
    {
        return $this->invoke(
            __FUNCTION__,
            [
                'adresseId' => $adresseId,
                'format' => 'json',
            ]
        );
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
