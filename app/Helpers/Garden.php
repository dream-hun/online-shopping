<?php

namespace App\Helpers;

use Hashids\Hashids;

class Garden
{
    /**
     * Format a phone number to US format.
     */
    public static function formatPhoneUs(?string $phone): string
    {
        if (! isset($phone)) {
            return '';
        }

        $phone = preg_replace('/[^0-9]/', '', $phone);
        $length = strlen($phone);

        switch ($length) {
            case 7:
                return preg_replace('/([0-9]{3})([0-9]{4})/', '$1-$2', $phone);
            case 10:
                return preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '($1) $2-$3', $phone);
            case 11:
                return preg_replace('/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/', '$1($2) $3-$4', $phone);
            default:
                return $phone;
        }
    }

    /**
     * Encrypt an ID.
     */
    public static function encryptId(int $id): string
    {
        $hashids = new Hashids('', 32);

        return $hashids->encode($id);
    }

    /**
     * Decrypt an ID.
     */
    public static function decryptId(string $id): int
    {
        $hashids = new Hashids('', 32);

        return $hashids->decode($id)[0];
    }
}
