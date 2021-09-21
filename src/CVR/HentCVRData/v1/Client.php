<?php

namespace ItkDev\Datafordeler\CVR\HentCVRData\v1;

use ItkDev\Datafordeler\AbstractClient;

/**
 * HentCVRData client
 *
 * @see https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-REST-HentCVRData
 */
class Client extends AbstractClient
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
     * https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentAndredeltagereMedCVREnhedsid
     */

    /**
     * https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentCVRPersonMedCVREnhedsid
     */

    /**
     * https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentEnhedMedCVREnhedsid
     */

    /**
     * https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentProduktionsenhedMedCVREnhedsid
     */

    /**
     * https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentProduktionsenhedMedPNummer
     */

    /**
     * https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentVirksomhedMedCVREnhedsid
     */


    /**
     * @param string|array $cvrOrParameters The CVR number or an array with parameters (cf. <a href="https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentVirksomhedMedCVRNummer">hentVirksomhedMedCVRNummer</a>)
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://confluence.datafordeler.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentVirksomhedMedCVRNummer
     */
    public function hentVirksomhedMedCVRNummer($cvrOrParameters): array
    {
        return $this->invoke(
            __FUNCTION__,
            !is_array($cvrOrParameters) ? ['pCVRNummer' => $cvrOrParameters] : $cvrOrParameters
        );
    }
}
