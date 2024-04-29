<?php

declare(strict_types=1);

namespace JoanFabregat\SecureTokenGenerator;

use Random\RandomException;

/**
 * Secure token generator.
 *
 * @author  Joan Fabrégat <joan@codeinc.co>
 * @package JoanFabregat\SecureTokenGenerator
 */
final class SecureTokenGenerator
{
    /**
     * Generates a random token.
     *
     * @param int $length             The token length
     * @param bool $allowDigits       If true, the token will contain digits
     * @param bool $allowSpecialChars If true, the token will contain special characters
     * @return string
     * @throws RandomException
     */
    public static function generate(int $length, bool $allowDigits = true, bool $allowSpecialChars = false): string
    {
        $key = '';

        while (strlen($key) < $length) {
            $charType = random_int(1, 6);

            // Skipping the character type if it's not allowed
            if (!$allowDigits && $charType == 5) {
                continue;
            }
            if (!$allowSpecialChars && $charType == 6) {
                continue;
            }

            $key .= match ($charType) {
                1, 3 => chr(random_int(65, 90)), // uppercase letters
                2, 4 => chr(random_int(97, 122)), // lowercase letters
                5 => chr(random_int(48, 57)), // digits
                6 => chr(random_int(33, 47)), // special characters
            };
        }

        return $key;
    }
}