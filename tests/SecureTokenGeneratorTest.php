<?php

declare(strict_types=1);

namespace JoanFabregat\SecureTokenGenerator\Tests;

use JoanFabregat\SecureTokenGenerator\SecureTokenGenerator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class SecureTokenGeneratorTest extends TestCase
{
    public function testGenerateLength(): void
    {
        foreach ([1, 16, 64, 256] as $length) {
            self::assertSame($length, strlen(SecureTokenGenerator::generate($length)));
        }
    }

    public function testGenerateLettersOnly(): void
    {
        $token = SecureTokenGenerator::generate(100, allowDigits: false, allowSpecialChars: false);
        self::assertMatchesRegularExpression('/^[a-zA-Z]+$/', $token);
    }

    public function testGenerateUppercaseOnly(): void
    {
        $token = SecureTokenGenerator::generate(100, allowDigits: false, allowLowercase: false);
        self::assertMatchesRegularExpression('/^[A-Z]+$/', $token);
    }

    public function testGenerateLowercaseOnly(): void
    {
        $token = SecureTokenGenerator::generate(100, allowDigits: false, allowUppercase: false);
        self::assertMatchesRegularExpression('/^[a-z]+$/', $token);
    }

    public function testGenerateDigitsOnly(): void
    {
        $token = SecureTokenGenerator::generate(100, allowDigits: true, allowUppercase: false, allowLowercase: false);
        self::assertMatchesRegularExpression('/^[0-9]+$/', $token);
    }

    public function testGenerateSpecialCharsOnly(): void
    {
        $token = SecureTokenGenerator::generate(
            200,
            allowDigits: false,
            allowUppercase: false,
            allowLowercase: false,
            allowSpecialChars: true
        );
        self::assertSame(200, strlen($token));
        self::assertMatchesRegularExpression('/^[^a-zA-Z0-9]+$/', $token);
    }

    public function testGenerateUniqueness(): void
    {
        $tokens = [];
        for ($i = 0; $i < 100; $i++) {
            $tokens[] = SecureTokenGenerator::generate(32);
        }
        self::assertCount(100, array_unique($tokens));
    }

    #[DataProvider('intLengthProvider')]
    public function testGenerateInt(int $length): void
    {
        $value = SecureTokenGenerator::generateInt($length);
        self::assertIsInt($value);
        self::assertGreaterThanOrEqual(10 ** ($length - 1), $value);
        self::assertLessThan(10 ** $length, $value);
    }

    /**
     * @return iterable<string, array{int}>
     */
    public static function intLengthProvider(): iterable
    {
        yield '1 digit' => [1];
        yield '4 digits' => [4];
        yield '6 digits (OTP)' => [6];
        yield '10 digits' => [10];
    }
}