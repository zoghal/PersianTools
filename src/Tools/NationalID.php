<?php

declare(strict_types=1);

namespace Zoghal\PersianTools\Tools;

use Zoghal\PersianTools\Tools\Number;

class NationalID
{



    /**
     * validate Checks if the given ID number is valid according to the Iranian national ID number format.
     *
     * @param  mixed $value
     * @return bool
     */
    public static function validate(string $value): mixed
    {
        $value = self::standardize($value);
        if (!self::checkValidPattern($value)) {
            return false;
        }


        $sub = 0;
        for ($i = 0; $i <= 8; $i++) {
            $sub = $sub + (intval($value[$i]) * (10 - $i));
        }

        $control = ($sub % 11) < 2 ? $sub % 11 : 11 - ($sub % 11);

        return $value[9] == $control ? true : false;
    }


    /**
     * NationalID::standardize(): 
     * It validates and normalize the input value based on the Iranian national ID number algorithm generation.
     * 
     * @param  mixed $value
     * @param  mixed $invalidate
     * @return string
     */
    public static function standardize(string $value, $returnInvalid = false): string
    {
        $origin = $value;
        $value = Number::cleanupNonNumerals($value);
        $value = Number::toLatinNumerals($value);
        $value = preg_replace("/^[0]+/iu", '', $value);

        if (strlen($value) < 10) {
            $value = str_pad($value, 10, "0", STR_PAD_LEFT);
        }

        if ($returnInvalid && !self::checkValidPattern($value)) {
            return $origin;
        }

        return $value;
    }


    /**
     * Check if the given value matches any of the invalid patterns.
     *
     * @param string $value The value to be checked.
     * @return bool Returns true if the value does not match any of the invalid patterns, false otherwise.
     */
    public static function checkValidPattern(string $value): bool
    {
        $invalidPatterns = [
            '/^000/',
            '/([0]{6,10}+)|[1]{6,10}|[2]{6,10}|[3]{6,10}|[4]{6,10}|[5]{6,10}|[6]{6,10}|[7]{6,10}|[8]{6,10}|[9]{6,10}/',
        ];

        foreach ($invalidPatterns as $pattern) {
            if (preg_match($pattern, $value) === 1) {
                return false;
            }
        }
        return true;
    }
}
