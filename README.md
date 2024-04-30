# Secure token generator

[![Latest Stable Version](https://poser.pugx.org/joanfabregat/secure-token-generator/v)](//packagist.org/packages/joanfabregat/secure-token-generator)
[![Total Downloads](https://poser.pugx.org/joanfabregat/secure-token-generator/downloads)](//packagist.org/packages/joanfabregat/secure-token-generator)
[![Latest Unstable Version](https://poser.pugx.org/joanfabregat/secure-token-generator/v/unstable)](//packagist.org/packages/joanfabregat/secure-token-generator)
[![License](https://poser.pugx.org/joanfabregat/secure-token-generator/license)](//packagist.org/packages/joanfabregat/secure-token-generator)


Generate cryptographically secure alphanumeric tokens in PHP 8.2+ using
PHP [`random_int()`](https://www.php.net/manual/en/function.random-int.php) function.

## Installation

The package is [available on Packagist](https://packagist.org/packages/joanfabregat/secure-token-generator). The
recommended way to install the library is through [Composer](http://getcomposer.org):

```bash
composer require joanfabregat/secure-token-generator
```

## Usage

```php
use JoanFabregat\SecureTokenGenerator\SecureTokenGenerator;

$token = SecureTokenGenerator::generate(32);
echo $token; // will echo a 32 characters long alphanumeric token

$token = SecureTokenGenerator::generate(16, allowSpecialChars: true);
echo $token; // will echo a 16 characters long alphanumeric token with special characters

```

## License

The library is published under the MIT license (see [`LICENSE`](LICENSE) file).