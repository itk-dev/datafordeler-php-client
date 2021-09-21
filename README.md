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
