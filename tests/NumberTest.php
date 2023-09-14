<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Zoghal\PersianTools\Tools\Number;

final class NumberTest extends TestCase
{


    protected function _setUp(): void
    {
    }

    /**
     * testIsPersian
     *
     * @return void
     */
    public function testIsPersian(): void
    {
        $resualt = Number::isPersian(1029384756);
        $this->assertFalse($resualt);

        $resualt = Number::isPersian('1029384756');
        $this->assertFalse($resualt);

        $resualt = Number::isPersian('۱۰۲۹۳۸۴۷۵۶');
        $this->assertTrue($resualt);

        $resualt = Number::isPersian('٩٨٧٦٥٤٣٢١٠');
        $this->assertFalse($resualt);

        $resualt = Number::isPersian('٣٢١123۳۲۱');
        $this->assertFalse($resualt);

        $resualt = Number::isPersian('٣a٢١123ب۳۲۱');
        $this->assertFalse($resualt);
    }


    public function testHasPersian(): void
    {
        $resualt = Number::hasPersian('1029384756');
        $this->assertFalse($resualt);

        $resualt = Number::hasPersian('۱۰۲۹۳۸۴۷۵۶');
        $this->assertTrue($resualt);

        $resualt = Number::hasPersian('٩٨٧٦٥٤٣٢١٠');
        $this->assertFalse($resualt);

        $resualt = Number::hasPersian('٣٢١123۳۲۱');
        $this->assertTrue($resualt);

        $resualt = Number::hasPersian('٣a٢١123ب۳۲۱');
        $this->assertTrue($resualt);
    }

    /**
     * testIsLatin
     *
     * @return void
     */
    public function testIsLatin(): void
    {
        $resualt = Number::isLatin('1029384756');
        $this->assertTrue($resualt);

        $resualt = Number::isLatin('۱۰۲۹۳۸۴۷۵۶');
        $this->assertFalse($resualt);

        $resualt = Number::isLatin('٩٨٧٦٥٤٣٢١٠');
        $this->assertFalse($resualt);

        $resualt = Number::isLatin('٣٢١123۳۲۱');
        $this->assertFalse($resualt);

        $resualt = Number::isLatin('٣a٢١123ب۳۲۱');
        $this->assertFalse($resualt);
    }

    public function testHasLatin(): void
    {
        $resualt = Number::hasLatin('1029384756');
        $this->assertTrue($resualt);

        $resualt = Number::hasLatin('۱۰۲۹۳۸۴۷۵۶');
        $this->assertFalse($resualt);

        $resualt = Number::hasLatin('٩٨٧٦٥٤٣٢١٠');
        $this->assertFalse($resualt);

        $resualt = Number::hasLatin('٣٢١123۳۲۱');
        $this->assertTrue($resualt);

        $resualt = Number::hasLatin('٣a٢١123ب۳۲۱');
        $this->assertTrue($resualt);
    }


    /**
     * testIsArabic
     *
     * @return void
     */
    public function testIsArabic(): void
    {
        $resualt = Number::isArabic('1029384756');
        $this->assertFalse($resualt);

        $resualt = Number::isArabic('۱۰۲۹۳۸۴۷۵۶');
        $this->assertTrue($resualt);

        $resualt = Number::isArabic('٩٨٧٦٥٤٣٢١٠');
        $this->assertTrue($resualt);

        $resualt = Number::isArabic('٣٢١123۳۲۱');
        $this->assertFalse($resualt);

        $resualt = Number::isArabic('٣a٢١123ب۳۲۱');
        $this->assertFalse($resualt);

        $resualt = Number::isArabic('٦٥٤۴۵۶');
        $this->assertTrue($resualt);
    }


    public function testHasArabic(): void
    {
        $resualt = Number::hasArabic('1029384756');
        $this->assertFalse($resualt);

        $resualt = Number::hasArabic('۱۰۲۹۳۸۴۷۵۶');
        $this->assertTrue($resualt);

        $resualt = Number::hasArabic('٩٨٧٦٥٤٣٢١٠');
        $this->assertTrue($resualt);

        $resualt = Number::hasArabic('٣٢١123۳۲۱');
        $this->assertTrue($resualt);

        $resualt = Number::hasArabic('٣a٢١123ب۳۲۱');
        $this->assertTrue($resualt);

        $resualt = Number::hasArabic('٦٥٤۴۵۶');
        $this->assertTrue($resualt);
    }

    /**
     * testConvertToPersian
     *
     * @return void
     */
    public function testToPersianNumberals(): void
    {
        $resualt = Number::toPersianNumerals(123);
        $this->assertSame('۱۲۳', $resualt);

        $resualt = Number::toPersianNumerals('this number ٠١٢٣٤٥٦٧٨٩');
        $this->assertSame('this number ۰۱۲۳۴۵۶۷۸۹', $resualt);

        $resualt = Number::toPersianNumerals('0123456789 این عدد');
        $this->assertSame('۰۱۲۳۴۵۶۷۸۹ این عدد', $resualt);

        $resualt = Number::toPersianNumerals('٠١٢٣٤٥٦٧٨٩ | 9876543210');
        $this->assertSame('۰۱۲۳۴۵۶۷۸۹ | ۹۸۷۶۵۴۳۲۱۰', $resualt);
    }

    /**
     * testConvertToArabic
     *
     * @return void
     */
    public function testToArabicNumerals(): void
    {

        $resualt = Number::toArabicNumerals(1264);
        $this->assertSame('١٢٦٤', $resualt);

        $resualt = Number::toArabicNumerals('٠١٢٣٤٥٦٧٨٩');
        $this->assertSame('٠١٢٣٤٥٦٧٨٩', $resualt);

        $resualt = Number::toArabicNumerals('0123456789');
        $this->assertSame('٠١٢٣٤٥٦٧٨٩', $resualt);

        $resualt = Number::toArabicNumerals('۰۱۲۳۴۵۶۷۸۹ | 9876543210');
        $this->assertSame('٠١٢٣٤٥٦٧٨٩ | ٩٨٧٦٥٤٣٢١٠', $resualt);
    }

    /**
     * testConvertToLatin
     *
     * @return void
     */
    public function testToLatinNumerals(): void
    {
        $resualt = Number::toLatinNumerals('٠١٢٣٤٥٦٧٨٩');
        $this->assertSame('0123456789', $resualt);

        $resualt = Number::toLatinNumerals('۰۱۲۳۴۵۶۷۸۹');
        $this->assertSame('0123456789', $resualt);

        $resualt = Number::toLatinNumerals('٠١٢٣٤٥٦٧٨٩ | ۹۸۷۶۵۴۳۲۱۰');
        $this->assertSame('0123456789 | 9876543210', $resualt);
    }

    /**
     * testConvertToWord
     *
     * @return void
     */
    public function testToWord(): void
    {
        $resualt = Number::toWord('١٢٣٤٥٦٧', 'fa_IR');
        $this->assertSame('یک میلیون و دویست و سی و چهار هزار و پانصد و شصت و هفت', $resualt);

        $resualt = Number::toWord('-١٢٣٤٥٦٧', 'fa_IR');
        $this->assertSame('منفی یک میلیون و دویست و سی و چهار هزار و پانصد و شصت و هفت', $resualt);

        $resualt = Number::toWord('۱۲۳۴۵۶۷', 'ar');
        $this->assertSame('مليون و مائتان و أربعة و ثلاثون ألف و خمسة مائة و سبعة و ستون', $resualt);

        $resualt = Number::toWord('-۱۲۳۴۵۶۷', 'ar');
        $this->assertSame('ناقص مليون و مائتان و أربعة و ثلاثون ألف و خمسة مائة و سبعة و ستون', $resualt);

        $resualt = Number::toWord(1234567, 'en');
        $this->assertSame('one million two hundred thirty-four thousand five hundred sixty-seven', $resualt);

        $resualt = Number::toWord(-1234567, 'en');
        $this->assertSame('minus one million two hundred thirty-four thousand five hundred sixty-seven', $resualt);
    }

    /**
     * testFormatByLocale
     *
     * @return void
     */
    public function testFormatByLocale(): void
    {
        $resualt = Number::format(-1234567.217, 'fa');
        $this->assertSame('‎−۱٬۲۳۴٬۵۶۷٫۲۱۷', $resualt);

        $resualt = Number::format(-1234567.217, 'ar');
        $this->assertSame('؜-١٬٢٣٤٬٥٦٧٫٢١٧', $resualt);

        $resualt = Number::format(-1234567.217, 'en');
        $this->assertSame('-1,234,567.217', $resualt);
    }

    /**
     * testFormatByCustomParameters
     *
     * @return void
     */
    public function testFormatByCustomParameters(): void
    {
        $resualt = Number::format(-1234567.217, 'fa', 2, ' \ ', ' * ');
        $this->assertSame('‎−۱ * ۲۳۴ * ۵۶۷ \ ۲۲', $resualt);

        $resualt = Number::format(-1234567.217, 'ar', 2, ' | ', ' > ');
        $this->assertSame('؜-١ > ٢٣٤ > ٥٦٧ | ٢٢', $resualt);

        $resualt = Number::format(-1234567.217, 'en', 2, ' ^ ', ' <> ');
        $this->assertSame('-1 <> 234 <> 567 ^ 22', $resualt);
    }



    public function testIsNumberals(): void
    {
        $resualt = Number::isNumerals(123);
        $this->assertTrue($resualt);

        $resualt = Number::isNumerals('1۱23');
        $this->assertTrue($resualt);

        $resualt = Number::isNumerals('1۱2ش3');
        $this->assertFalse($resualt);
    }
}
