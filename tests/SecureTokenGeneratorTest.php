<?php

declare(strict_types=1);

namespace JoanFabregat\tests;

use JoanFabregat\SecureTokenGenerator\SecureTokenGenerator;
use PHPUnit\Framework\TestCase;
use Random\RandomException;

final class SecureTokenGeneratorTest extends TestCase
{
    /**
     * @throws RandomException
     */
    public function testGenerate(): void
    {
        $generator = new SecureTokenGenerator();

        $token = $generator->generate(32, false, false);
        self::assertEquals(32, strlen($token));
        self::assertMatchesRegularExpression('/^[a-zA-Z]+$/', $token);

        $token = $generator->generate(64, true, false);
        self::assertEquals(64, strlen($token));
        self::assertMatchesRegularExpression('/^[a-zA-Z0-9]+$/', $token);

        $token = $generator->generate(128, true, true);
        self::assertEquals(128, strlen($token));
        self::assertMatchesRegularExpression('/^[a-zA-Z0-9\W]+$/', $token);
    }
}