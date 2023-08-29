<?php

declare(strict_types=1);

namespace Zoghal\PersianTools\Tools;

class NationalCode
{

    /**
     * validate Checks if the given ID number is valid according to the Iranian national ID number format.
     *
     * @param  mixed $value
     * @return bool
     */
    public static function validate(string $value): bool
    {
        if (preg_match('/^\d{8,10}$/', $value) == false) return false;
        if (preg_match('/^[0]{10}|[1]{10}|[2]{10}|[3]{10}|[4]{10}|[5]{10}|[6]{10}|[7]{10}|[8]{10}|[9]{10}$/', $value)) return false;

        $value = str_pad($value, 10, '0', STR_PAD_LEFT);

        $sub = 0;
        for ($i = 0; $i <= 8; $i++) {
            $sub = $sub + (intval($value[$i]) * (10 - $i));
        }

        $control = ($sub % 11) < 2 ? $sub % 11 : 11 - ($sub % 11);

        return $value[9] == $control ? true : false;
    }
}
