<?php

namespace ItkDev\Datafordeler\CVR\HentCVRData\v1;

use ItkDev\Datafordeler\AbstractClient;

class Client extends AbstractClient
{
    /**
     * {@inheritdoc}
     */
    protected function getApiBaseUrl(): string
    {
        return $this->testMode
            ? 'https://test03-s5-certservices.datafordeler.dk/CVR/HentCVRData/1/rest/'
            : 'https://s5-certservices.datafordeler.dk/CVR/HentCVRData/1/rest/';
    }

    /**
     * Hent virksomhed med CVR nummer.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function hentVirksomhedMedCVRNummer(string $cvrNummer): array
    {
        return $this->invoke(__FUNCTION__, [
            'pCVRNummer' => $cvrNummer,
        ]);
    }
}
