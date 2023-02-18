<?php

namespace ItkDev\Datafordeler\Service\CVR\V1;

use ItkDev\Datafordeler\Service;

/**
 * HentCVRData client
 *
 * @see https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-REST-HentCVRData
 */
class HentCVRData extends Service
{
    /**
     * {@inheritdoc}
     *
     * @see https://datafordeler.dk/dataoversigt/det-centrale-virksomhedsregister-cvr/hentcvrdata/.
     */
    protected function getApiBaseUrl(): string
    {
        return $this->testMode
            ? 'https://test03-s5-certservices.datafordeler.dk/CVR/HentCVRData/1/rest/'
            : 'https://s5-certservices.datafordeler.dk/CVR/HentCVRData/1/rest/';
    }

    /**
     * @param string|array $pIdOrParameters The id or an array with parameters (cf. <a href="https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentAndredeltagereMedCVREnhedsid">hentAndredeltagereMedCVREnhedsid</a>)
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentAndredeltagereMedCVREnhedsid
     */
    public function hentAndredeltagereMedCVREnhedsid($pIdOrParameters): array
    {
        return $this->invoke(
            __FUNCTION__,
            !is_array($pIdOrParameters) ? ['pId' => $pIdOrParameters] : $pIdOrParameters
        );
    }

    /**
     * @param string|array $pIdOrParameters The id or an array with parameters (cf. <a href="https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentCVRPersonMedCVREnhedsid">hentCVRPersonMedCVREnhedsid</a>)
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentCVRPersonMedCVREnhedsid
     */
    public function hentCVRPersonMedCVREnhedsid($pIdOrParameters): array
    {
        return $this->invoke(
            __FUNCTION__,
            !is_array($pIdOrParameters) ? ['pId' => $pIdOrParameters] : $pIdOrParameters
        );
    }

    /**
     * @param string|array $pIdOrParameters The id or an array with parameters (cf. <a href="https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentEnhedMedCVREnhedsid">hentEnhedMedCVREnhedsid</a>)
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentEnhedMedCVREnhedsid
     */
    public function hentEnhedMedCVREnhedsid($pIdOrParameters): array
    {
        return $this->invoke(
            __FUNCTION__,
            !is_array($pIdOrParameters) ? ['pId' => $pIdOrParameters] : $pIdOrParameters
        );
    }

    /**
     * @param string|array $pIdOrParameters The id or an array with parameters (cf. <a href="https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentProduktionsenhedMedCVREnhedsid">hentProduktionsenhedMedCVREnhedsid</a>)
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentProduktionsenhedMedCVREnhedsid
     */
    public function hentProduktionsenhedMedCVREnhedsid($pIdOrParameters): array
    {
        return $this->invoke(
            __FUNCTION__,
            !is_array($pIdOrParameters) ? ['pId' => $pIdOrParameters] : $pIdOrParameters
        );
    }

    /**
     * @param string|array $pPNummerOrParameters The P number or an array with parameters (cf. <a href="https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentProduktionsenhedMedPNummer">hentProduktionsenhedMedPNummer</a>)
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentProduktionsenhedMedPNummer
     */
    public function hentProduktionsenhedMedPNummer($pPNummerOrParameters): array
    {
        return $this->invoke(
            __FUNCTION__,
            !is_array($pPNummerOrParameters) ? ['pPNummer' => $pPNummerOrParameters] : $pPNummerOrParameters
        );
    }

    /**
     * @param string|array $pIdOrParameters The id or an array with parameters (cf. <a href="https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentVirksomhedMedCVRNummer">hentVirksomhedMedCVRNummer</a>)
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentVirksomhedMedCVREnhedsid
     */
    public function hentVirksomhedMedCVREnhedsid($pIdOrParameters): array
    {
        return $this->invoke(
            __FUNCTION__,
            !is_array($pIdOrParameters) ? ['pId' => $pIdOrParameters] : $pIdOrParameters
        );
    }

    /**
     * @param string|array $pCVRNummerOrParameters The CVR number or an array with parameters (cf. <a href="https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentVirksomhedMedCVRNummer">hentVirksomhedMedCVRNummer</a>)
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentVirksomhedMedCVRNummer
     */
    public function hentVirksomhedMedCVRNummer($pCVRNummerOrParameters): array
    {
        return $this->invoke(
            __FUNCTION__,
            !is_array($pCVRNummerOrParameters) ? ['pCVRNummer' => $pCVRNummerOrParameters] : $pCVRNummerOrParameters
        );
    }
}
