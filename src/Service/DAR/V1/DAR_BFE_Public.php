<?php

namespace ItkDev\Datafordeler\Service\DAR\V1;

use ItkDev\Datafordeler\Service;

/**
 * @see https://confluence.sdfe.dk/pages/viewpage.action?pageId=16056323#REST(DAR)-REST-DAR_BFE_Public
 *
 * Uses magic to invoke these service methods.
 *
 * @method adresse(array $parameters): array
 * @method Husnummer(array $parameters): array
 * @method husnummerTilAdresse(array $parameters): array
 * @method husnummerTilJordstykke(array $parameters): array
 * @method Navngivenvej(array $parameters): array
 * @method NavngivenvejKommunedel(array $parameters): array
 * @method Postnummer(array $parameters): array
 * @method Supplerendebynavn(array $parameters): array
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
