<?php

declare(strict_types=1);

namespace Zoghal\PersianTools\Tools;

class Number
{

    public const NumberPersian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    public const NumberArabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
    public const NumberLatin = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    /**
     * Checks if the given value contains only Persian numbers.
     *
     * @param  mixed $number
     * @return void
     */
    public static function isPersian($number): bool
    {
        return (bool)preg_match("/^[\x{06F0}-\x{06F9}]+$/iu", (string)$number);
    }

    /**
     *  Checks if the given value has Persian numbers
     *
     * @param  mixed $number
     * @return bool
     */
    public static function hasPersian($number): bool
    {
        return (bool)preg_match("/[\x{06F0}-\x{06F9}]+/iu", (string)$number);
    }


    /**
     * Checks if the given value contains only Arabic Indic numbers.
     *
     * @param  mixed $number
     * @return bool
     */
    public static function isIndicArabic($number): bool
    {
        return (bool)preg_match("/^[\x{0660}-\x{0669}]+$/iu", (string)$number);
    }


    /**
     * Checks if the given value has Arabic Indic numbers
     *
     * @param  mixed $number
     * @return bool
     */
    public static function hasIndicArabic($number): bool
    {
        return (bool)preg_match("/[\x{0660}-\x{0669}]+/iu", (string)$number);
    }

    /**
     * Checks if the given value contains only Perso-Arabic{Persian,Arabic Indic,...} numbers.
     *
     * @param  mixed $number
     * @return void
     */
    public static function isArabic($number): bool
    {
        return (bool)preg_match("/^[\x{0660}-\x{0669}\x{06F0}-\x{06F9}]+$/iu", (string)$number);
    }

    /**
     * Checks if the given value has Perso-Arabic{Persian,Arabic Indic,...} numbers.
     *
     * @param  mixed $number
     * @return bool
     */
    public static function hasArabic($number): bool
    {
        return (bool)preg_match("/[\x{0660}-\x{0669}\x{06F0}-\x{06F9}]+/iu", (string)$number);
    }

    /**
     * Checks if the given value contains only latin numbers.
     *
     * @param  mixed $number
     * @return void
     */
    public static function isLatin($number): bool
    {
        return (bool)preg_match("/^[0-9]+$/iu", (string)$number);
    }

    /**
     * Checks if the given value has latin numbers.
     *
     * @param  mixed $number
     * @return bool
     */
    public static function hasLatin($number): bool
    {
        return (bool)preg_match("/[0-9]+/iu", (string)$number);
    }


    /**
     * Converts all the numbers in the given value to Persian numbers.
     *
     * @param  mixed $number
     * @return void
     */
    public static function toPersianNumerals($number): string
    {
        $number = str_replace(self::NumberArabic, self::NumberPersian, (string)$number);
        $number = str_replace(self::NumberLatin, self::NumberPersian, (string)$number);
        return $number;
    }

    /**
     * Converts all the numbers in the given value to arabic numbers.
     *
     * @param  mixed $number
     * @return string
     */
    public static function toArabicNumerals($number): string
    {
        $number = str_replace(self::NumberPersian, self::NumberArabic, (string)$number);
        $number = str_replace(self::NumberLatin, self::NumberArabic, (string)$number);
        return $number;
    }

    /**
     * Converts all the numbers in the given value to latin numbers.
     *
     * @param  mixed $number
     * @return string
     */
    public static function toLatinNumerals($number): string
    {
        $number = str_replace(self::NumberPersian, self::NumberLatin, (string)$number);
        $number = str_replace(self::NumberArabic, self::NumberLatin, (string)$number);
        return $number;
    }

    /**
     * convertToWord convert numbers to human-readable words format
     *
     * @param  mixed $number
     * @param  mixed $locale fa|ar|en
     * @return void
     */
    public static function toWord($number, $locale = 'fa')
    {
        if (self::hasArabic($number)) {
          
            $number = (int)self::toLatinNumerals($number);
        }
        return \NumberFormatter::create($locale, \NumberFormatter::SPELLOUT)->format($number);
    }

    /**
     * localeFormatter
     *
     * @param  mixed $number
     * @param  mixed $locale fa|ar|en
     * @return void
     */
    public static function format($number, $locale = 'fa', $decimals = null, $decimalPoint = null, $thousandsSep = null)
    {
        if (!is_numeric($number) && (self::isArabic($number) || self::isPersian($number))) {
            $number = (float)self::convertToLatin($number);
        }

        $fmt = \NumberFormatter::create($locale, \NumberFormatter::DECIMAL);

        if ($decimalPoint !== null) {
            $fmt->setSymbol(\NumberFormatter::DECIMAL_SEPARATOR_SYMBOL, $decimalPoint);
        }

        if ($thousandsSep !== null) {
            $fmt->setSymbol(\NumberFormatter::GROUPING_SEPARATOR_SYMBOL, $thousandsSep);
        }

        if ($decimals !== null) {
            $fmt->setAttribute(\NumberFormatter::MAX_FRACTION_DIGITS, $decimals);
        }

        return $fmt->format($number);
    }
}
