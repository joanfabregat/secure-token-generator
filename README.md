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

// A simple token
$token = SecureTokenGenerator::generate(16);
echo $token; // will echo a 16 characters long alphanumeric token

// With all the options
$token = SecureTokenGenerator::generate(
    length: 32, 
    allowDigits: true, // 1234567890
    allowSpecialChars: true, // !@#$%^&*()_+{}|:"<>?[];',./
    allowUppercase: true, // ABCDEFGHIJKLMNOPQRSTUVWXYZ
    allowLowercase: true, // abcdefghijklmnopqrstuvwxyz
);
echo $token; // will echo a 32 characters long alphanumeric token with special characters

// An integer token
$token = SecureTokenGenerator::generateInt(6);
echo is_int($token); // will echo true
echo $token; // will echo a 6 digits long integer token (ie. 123456)
```

## License

The library is published under the MIT license (see [`LICENSE`](LICENSE) file).