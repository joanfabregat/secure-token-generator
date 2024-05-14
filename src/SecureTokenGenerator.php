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
     * @param bool $allowDigits       If true, the token will contain digits (0-9)
     * @param bool $allowSpecialChars If true, the token will contain special characters
     *                                (!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~)
     * @param bool $allowUppercase    If true, the token will contain uppercase letters (A-Z)
     * @param bool $allowLowercase    If true, the token will contain lowercase letters (a-z)
     * @return string
     * @throws RandomException If the random generator fails
     */
    public static function generate(
        int $length,
        bool $allowDigits = true,
        bool $allowSpecialChars = false,
        bool $allowUppercase = true,
        bool $allowLowercase = true
    ): string {
        $token = '';

        while (strlen($token) < $length) {
            // 1: uppercase, 2: lowercase, 3: uppercase, 4: lowercase, 5: digits, 6: special characters
            $charType = random_int(1, 6);

            // Skipping the character type if it's not allowed
            if (!$allowDigits && $charType == 5) {
                continue;
            }
            if (!$allowSpecialChars && $charType == 6) {
                continue;
            }
            if (!$allowUppercase && in_array($charType, [1, 3])) {
                continue;
            }
            if (!$allowLowercase && in_array($charType, [2, 4])) {
                continue;
            }

            $token .= match ($charType) {
                1, 3 => chr(random_int(65, 90)), // uppercase letters
                2, 4 => chr(random_int(97, 122)), // lowercase letters
                5 => chr(random_int(48, 57)), // digits
                6 => chr(random_int(33, 47)), // special characters
            };
        }

        return $token;
    }

    /**
     * Generates a random integer token.
     *
     * @param int $length The token length
     * @return int The generated integer
     * @throws RandomException If the random generator fails
     */
    public static function generateInt(int $length): int
    {
        return random_int(10 ** ($length - 1), 10 ** $length - 1);
    }
}