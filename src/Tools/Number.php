<?php declare (strict_types = 1);

namespace Zoghal\PersianTools\Tools;

class Number
{

    public const NumberPersian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    public const NumberArabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];
    public const NumberEngilish = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    /**
     * isPersian
     *
     * @param  mixed $number
     * @return void
     */
    public static function isPersian($number)
    {
        return (bool)preg_match("/^[\x{06F0}-\x{06F9}]/iu", $number);
    }

    /**
     * isArabic
     *
     * @param  mixed $number
     * @return void
     */
    public static function isArabic($number)
    {
        return (bool)preg_match("/^[\x{0660}-\x{0669}]/iu", $number);
    }

    /**
     * isLatin
     *
     * @param  mixed $number
     * @return void
     */
    public static function isLatin($number)
    {
        return (bool)preg_match("/^[\x{0030}-\x{0039}]/iu", $number);
    }
}
