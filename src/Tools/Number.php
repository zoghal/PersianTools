<?php declare (strict_types = 1);

namespace Zoghal\PersianTools\Tools;

class Number
{

    public const NumberPersian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    public const NumberArabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
    public const NumberLatin = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    /**
     * check number is Persian
     *
     * @param  mixed $number
     * @return void
     */
    public static function isPersian($number): bool
    {
        return (bool)preg_match("/[\x{06F0}-\x{06F9}]/iu", $number);
    }

    /**
     * check number is Arabic
     *
     * @param  mixed $number
     * @return void
     */
    public static function isArabic($number): bool
    {
        return (bool)preg_match("/[\x{0660}-\x{0669}]/iu", $number);
    }

    /**
     * check number is Latin
     *
     * @param  mixed $number
     * @return void
     */
    public static function isLatin($number): bool
    {
        return (bool)preg_match("/[\x{0030}-\x{0039}]/iu", $number);
    }

    /**
     * convert all numbers To Persian numbers
     *
     * @param  mixed $number
     * @return void
     */
    public static function convertToPersian($number): string
    {
        if (self::isArabic($number)) {
            $number = str_replace(self::NumberArabic, self::NumberPersian, $number);
        }
        if (self::isLatin($number)) {
            $number = str_replace(self::NumberLatin, self::NumberPersian, $number);
        }
        return $number;
    }

    /**
     * convert all numbers To Arabic numbers
     *
     * @param  mixed $number
     * @return string
     */
    public static function convertToArabic($number): string
    {
        if (self::isPersian($number)) {
            $number = str_replace(self::NumberPersian, self::NumberArabic, $number);
        }
        if (self::isLatin($number)) {
            $number = str_replace(self::NumberLatin, self::NumberArabic, $number);
        }
        return $number;
    }

    /**
     * convertToLatin
     *
     * @param  mixed $number
     * @return string
     */
    public static function convertToLatin($number): string
    {
        if (self::isPersian($number)) {
            $number = str_replace(self::NumberPersian, self::NumberLatin, $number);
        }
        if (self::isArabic($number)) {
            $number = str_replace(self::NumberArabic, self::NumberLatin, $number);
        }
        return $number;
    }

    /**
     * convertToWord convert numbers to human-readable words format
     *
     * @param  mixed $number
     * @return void
     */
    public static function convertToWord($number, $locale = 'fa')
    {
        if (!is_numeric($number) && (self::isArabic($number) || self::isPersian($number))) {
            $number = (float)self::convertToLatin($number);
        }
        return \NumberFormatter::create($locale, \NumberFormatter::SPELLOUT  )->format($number);
    }
}
