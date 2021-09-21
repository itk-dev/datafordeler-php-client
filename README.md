# Datafordeler PHP client

## Installation

```sh
composer require itk-dev/datafordeler-php-client
```

## Usage

```php
$pemPath = «path to pem certificate»;
$client = new \ItkDev\Datafordeler\CVR\HentCVRData\v1\Client($pemPath);
$data = $client->hentVirksomhedMedCVRNummer(12345678);
…
```
