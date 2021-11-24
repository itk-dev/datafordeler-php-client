# Datafordeler PHP client

## Installation

```sh
composer require itk-dev/datafordeler-php-client
```

## Usage

```php
use ItkDev\Datafordeler\Client;
use ItkDev\Datafordeler\Service\CVR\HentCVRData\V1 as HentCVRDataV1;
use ItkDev\Datafordeler\Service\BBR\BBRPublic\V1 as BBRPublicV1;

$certPath = «path to pem certificate»;
$client = Client::createFromCertPath($certPath);
$service = new HentCVRDataV1($client);

// Get data from just a CVR.
$data = $hentCVRData->hentVirksomhedMedCVRNummer(12345678);
…
// Get data using more parameters.
$data = $hentCVRData->hentVirksomhedMedCVRNummer([
  'pCVRNummer' => 12345678,
  'pInkluderBeskaeftigelse' => true,
  'pInkluderProduktionsenhedsnumre' => false,
]);

$username = '…';
$password = '…'
$client = Client::createFromUsernameAndPassword($username, $password);
$service = new BBRPublicV1($client);
$service->bbrsag([]);
```

### Helper script

For testing you can run `vendor/bin/datafordeler` to perform a data lookup, e.g.

with certificate (in [PEM format](https://en.wikipedia.org/wiki/Privacy-Enhanced_Mail)):

```sh
vendor/bin/datafordeler «pem path» 'ItkDev\Datafordeler\Service\CVR\V1\HentCVRData' hentVirksomhedMedCVRNummer 55133018
```

or with username and password:

```sh
vendor/bin/datafordeler «username» «password» 'ItkDev\Datafordeler\Service\BBR\V1\BBRPublic' enhed '{"AdresseIdentificerer": "bb64a029-ba99-404a-85fd-cad0ecf203b7"}'
```

An address identifier can be fetched via
<https://api.dataforsyningen.dk/datavask/adresser>, e.g.
<https://api.dataforsyningen.dk/datavask/adresser?betegnelse=Hack%20Kampmanns%20Plads%202%208000%20Aarhus%20C>:

```sh
curl --silent 'https://api.dataforsyningen.dk/datavask/adresser?betegnelse=Hack%20Kampmanns%20Plads%202%208000%20Aarhus%20C' | jq --raw-output '.resultater[0].adresse.id'
```

## Development

### Coding standards

```sh
composer check-coding-standards
yarn check-coding-standards
```

### API documentation

[Read the documentation](docs/api/index.html).

Run

```sh
docker run --rm -v $(pwd):/data phpdoc/phpdoc:3 --config=phpdoc.dist.xml
```

to update the API documentation.
