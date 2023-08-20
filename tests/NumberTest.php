<?php declare (strict_types = 1);
use PHPUnit\Framework\TestCase;
use Zoghal\PersianTools\Tools\Number;

final class NumberTest extends TestCase
{
    protected function _setUp(): void
    {
    }

    public function testIsPersian(): void
    {
        $resualt = Number::isPersian('۱۲۳۴۲۱');
        $this->assertTrue($resualt);

        $resualt = Number::isPersian('365');
        $this->assertFalse($resualt);

        $resualt = Number::isPersian('٩٨٧٦٥٤٣٢١٠');
        $this->assertFalse($resualt);
    }


    public function testIsLatin(): void
    {
        $resualt = Number::isLatin('۱۲۳۴۲۱');
        $this->assertFalse($resualt);

        $resualt = Number::isLatin('365');
        $this->assertTrue($resualt);

        $resualt = Number::isLatin('٩٨٧٦٥٤٣٢١٠');
        $this->assertFalse($resualt);
    }


    public function testIsArabic(): void
    {
        $resualt = Number::isArabic('۱۲۳۴۲۱');
        $this->assertFalse($resualt);

        $resualt = Number::isArabic('365');
        $this->assertFalse($resualt);

        $resualt = Number::isArabic('٩٨٧٦٥٤٣٢١٠');
        $this->assertTrue($resualt);
    }
}
