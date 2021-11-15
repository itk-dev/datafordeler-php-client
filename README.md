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
vendor/bin/datafordeler «pem path» 'ItkDev\Datafordeler\Service\CVR\HentCVRData\V1' hentVirksomhedMedCVRNummer 55133018
```

or with username and password:

```sh
vendor/bin/datafordeler «username» «password» 'ItkDev\Datafordeler\Service\BBR\BBRPublic\V1' bbrsag '{}'
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
