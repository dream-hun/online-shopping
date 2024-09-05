<?php

namespace App\Helpers;

use Hashids\Hashids;

class Format
{
    /**
     * Format a US phone number.
     */
    public static function formatPhoneUs(string $phone): string
    {
        if (empty($phone)) {
            return '';
        }

        // Remove non-numeric characters
        $phone = preg_replace('/\D/', '', $phone);
        $length = strlen($phone);

        return match ($length) {
            7 => preg_replace('/([0-9]{3})([0-9]{4})/', '$1-$2', $phone),
            10 => preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '($1) $2-$3', $phone),
            11 => preg_replace('/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/', '$1($2) $3-$4', $phone),
            default => $phone,
        };
    }

    /**
     * Encrypt the ID using Hashids.
     */
    public static function encryptId(int $id): string
    {
        $hashids = new Hashids('', 32);

        return $hashids->encode($id);
    }

    /**
     * Decrypt the ID using Hashids.
     */
    public static function decryptId(string $id): ?int
    {
        $hashids = new Hashids('', 32);
        $decoded = $hashids->decode($id);

        return $decoded[0] ?? null; // Return the first decoded value or null if not found
    }
}
