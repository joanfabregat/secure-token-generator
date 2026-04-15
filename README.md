# Secure token generator

[![CI](https://github.com/joanfabregat/secure-token-generator/actions/workflows/ci.yml/badge.svg)](https://github.com/joanfabregat/secure-token-generator/actions/workflows/ci.yml)
[![Latest Stable Version](https://poser.pugx.org/joanfabregat/secure-token-generator/v)](https://packagist.org/packages/joanfabregat/secure-token-generator)
[![Total Downloads](https://poser.pugx.org/joanfabregat/secure-token-generator/downloads)](https://packagist.org/packages/joanfabregat/secure-token-generator)
[![License](https://poser.pugx.org/joanfabregat/secure-token-generator/license)](https://packagist.org/packages/joanfabregat/secure-token-generator)

Generate cryptographically secure tokens in PHP 8.2+ using
PHP [`random_int()`](https://www.php.net/manual/en/function.random-int.php).

## Installation

```bash
composer require joanfabregat/secure-token-generator
```

## Usage

```php
use JoanFabregat\SecureTokenGenerator\SecureTokenGenerator;

// A simple alphanumeric token
$token = SecureTokenGenerator::generate(16);

// With all the options
$token = SecureTokenGenerator::generate(
    length: 32,
    allowDigits: true,        // 0-9
    allowSpecialChars: true,  // !"#$%&'()*+,-./ 
    allowUppercase: true,     // A-Z
    allowLowercase: true,     // a-z
);

// An integer token (e.g. 6-digit OTP)
$otp = SecureTokenGenerator::generateInt(6);
// $otp is an int between 100000 and 999999
```

## License

MIT — see [`LICENSE`](LICENSE).