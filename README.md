# Table generation for TCPDF library

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rpungello/tcpdf-table.svg?style=flat-square)](https://packagist.org/packages/rpungello/tcpdf-table)
[![Tests](https://github.com/rpungello/tcpdf-table/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/rpungello/tcpdf-table/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/rpungello/tcpdf-table.svg?style=flat-square)](https://packagist.org/packages/rpungello/tcpdf-table)

Extends TCPDF to include support for dynamic tables

## Installation

You can install the package via composer:

```bash
composer require rpungello/tcpdf-table
```

## Usage

```php
$skeleton = new Rpungello\TcpdfTable();
echo $skeleton->echoPhrase('Hello, Rpungello!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Rob Pungello](https://github.com/rpungello)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
