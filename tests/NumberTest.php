<?php declare (strict_types = 1);
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
        $resualt = Number::isPersian('۱۲۳۴۲۱');
        $this->assertTrue($resualt);

        $resualt = Number::isPersian('365');
        $this->assertFalse($resualt);

        $resualt = Number::isPersian('٩٨٧٦٥٤٣٢١٠');
        $this->assertFalse($resualt);
    }

    /**
     * testIsLatin
     *
     * @return void
     */
    public function testIsLatin(): void
    {
        $resualt = Number::isLatin('۱۲۳۴۲۱');
        $this->assertFalse($resualt);

        $resualt = Number::isLatin('365');
        $this->assertTrue($resualt);

        $resualt = Number::isLatin('٩٨٧٦٥٤٣٢١٠');
        $this->assertFalse($resualt);
    }

    /**
     * testIsArabic
     *
     * @return void
     */
    public function testIsArabic(): void
    {
        $resualt = Number::isArabic('۱۲۳۴۲۱');
        $this->assertFalse($resualt);

        $resualt = Number::isArabic('365');
        $this->assertFalse($resualt);

        $resualt = Number::isArabic('٩٨٧٦٥٤٣٢١٠');
        $this->assertTrue($resualt);
    }

    /**
     * testConvertToPersian
     *
     * @return void
     */
    public function testConvertToPersian(): void
    {
        $resualt = Number::convertToPersian('٠١٢٣٤٥٦٧٨٩');
        $this->assertSame('۰۱۲۳۴۵۶۷۸۹', $resualt);

        $resualt = Number::convertToPersian('0123456789');
        $this->assertSame('۰۱۲۳۴۵۶۷۸۹', $resualt);

        $resualt = Number::convertToPersian('٠١٢٣٤٥٦٧٨٩ | 9876543210');
        $this->assertSame('۰۱۲۳۴۵۶۷۸۹ | ۹۸۷۶۵۴۳۲۱۰', $resualt);
    }

    
    /**
     * testConvertToArabic
     *
     * @return void
     */
    public function testConvertToArabic(): void
    {
        $resualt = Number::convertToArabic('٠١٢٣٤٥٦٧٨٩');
        $this->assertSame('٠١٢٣٤٥٦٧٨٩', $resualt);

        $resualt = Number::convertToArabic('0123456789');
        $this->assertSame('٠١٢٣٤٥٦٧٨٩', $resualt);

        $resualt = Number::convertToArabic('۰۱۲۳۴۵۶۷۸۹ | 9876543210');
        $this->assertSame('٠١٢٣٤٥٦٧٨٩ | ٩٨٧٦٥٤٣٢١٠', $resualt);
    }

    
    /**
     * testConvertToLatin
     *
     * @return void
     */
    public function testConvertToLatin(): void
    {
        $resualt = Number::convertToLatin('٠١٢٣٤٥٦٧٨٩');
        $this->assertSame('0123456789', $resualt);

        $resualt = Number::convertToLatin('۰۱۲۳۴۵۶۷۸۹');
        $this->assertSame('0123456789', $resualt);

        $resualt = Number::convertToLatin('٠١٢٣٤٥٦٧٨٩ | ۹۸۷۶۵۴۳۲۱۰');
        $this->assertSame('0123456789 | 9876543210', $resualt);
    }

    public function testConvertToWord(): void{
        $resualt = Number::convertToWord('١٢٣٤٥٦٧','fa_IR');
        $this->assertSame('یک میلیون و دویست و سی و چهار هزار و پانصد و شصت و هفت', $resualt);

        $resualt = Number::convertToWord('-١٢٣٤٥٦٧','fa_IR');
        $this->assertSame('منفی یک میلیون و دویست و سی و چهار هزار و پانصد و شصت و هفت', $resualt);

        $resualt = Number::convertToWord('۱۲۳۴۵۶۷','ar');
        $this->assertSame('مليون و مائتان و أربعة و ثلاثون ألف و خمسة مائة و سبعة و ستون', $resualt);

        $resualt = Number::convertToWord('-۱۲۳۴۵۶۷','ar');
        $this->assertSame('ناقص مليون و مائتان و أربعة و ثلاثون ألف و خمسة مائة و سبعة و ستون', $resualt);

        $resualt = Number::convertToWord(1234567,'en');
        $this->assertSame('one million two hundred thirty-four thousand five hundred sixty-seven', $resualt);

        $resualt = Number::convertToWord(-1234567,'en');
        $this->assertSame('minus one million two hundred thirty-four thousand five hundred sixty-seven', $resualt);
    }

}
