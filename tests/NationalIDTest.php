<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Zoghal\PersianTools\Tools\NationalID;

final class NationalIDTest extends TestCase
{
    protected function _setUp(): void
    {
    }


    /**
     * testNationalIDValid
     *
     * @return void
     */
    public function testNationalIDValid(): void
    {
        $resualt = NationalID::validate('3873505509');
        $this->assertTrue($resualt);

        $resualt = NationalID::validate('3874757188');
        $this->assertTrue($resualt);

        $resualt = NationalID::validate('920981968');
        $this->assertTrue($resualt);

        $resualt = NationalID::validate('0421539135');
        $this->assertTrue($resualt);

        $resualt = NationalID::validate('2890073191');
        $this->assertTrue($resualt);

        $resualt = NationalID::validate('2122451157');
        $this->assertTrue($resualt);

        $resualt = NationalID::validate('0910039331');
        $this->assertTrue($resualt);

        $resualt = NationalID::validate('5199295756');
        $this->assertTrue($resualt);

        $resualt = NationalID::validate('0410260746');
        $this->assertTrue($resualt);

        $resualt = NationalID::validate('4849954251');
        $this->assertTrue($resualt);

        $resualt = NationalID::validate('2031436317');
        $this->assertTrue($resualt);

        $resualt = NationalID::validate('0919918001');
        $this->assertTrue($resualt);

        $resualt = NationalID::validate('4999265486');
        $this->assertTrue($resualt);

        $resualt = NationalID::validate('0068061609');
        $this->assertTrue($resualt);

        $resualt = NationalID::validate('1453333381');
        $this->assertTrue($resualt);
    }


    /**
     * testNationalIDStandardize
     *
     * @return void
     */
    public function testNationalIDStandardize(): void
    {
        $resualt = NationalID::standardize('00680۲۳۴dfgdf61609');
        $this->assertSame('68023461609', $resualt);

        $resualt = NationalID::standardize('449960۲۳');
        $this->assertSame('0044996023', $resualt);

        $resualt = NationalID::standardize('asdasd');
        $this->assertSame('0000000000', $resualt);

        $resualt = NationalID::standardize('asdasd', true);
        $this->assertSame('asdasd', $resualt);

        $resualt = NationalID::standardize('asd4');
        $this->assertSame('0000000004', $resualt);

        $resualt = NationalID::standardize('asd4', true);
        $this->assertSame('asd4', $resualt);
    }


    /**
     * testCheckPattern
     *
     * @return void
     */
    public function testCheckPattern(): void
    {
        $resualt = NationalID::checkValidPattern('0000000000');
        $this->assertFalse($resualt);

        $resualt = NationalID::checkValidPattern('1111111111');
        $this->assertFalse($resualt);

        $resualt = NationalID::checkValidPattern('0114907140');
        $this->assertTrue($resualt);

        $resualt = NationalID::checkValidPattern('1453333381');
        $this->assertTrue($resualt);

        $resualt = NationalID::checkValidPattern('2222222221');
        $this->assertFalse($resualt);

        $resualt = NationalID::checkValidPattern('0004907140');
        $this->assertFalse($resualt);

        $resualt = NationalID::checkValidPattern('3339999444');
        $this->assertTrue($resualt);
    }
}
