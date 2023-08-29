<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Zoghal\PersianTools\Tools\NationalCode;

final class NationalCodeTest extends TestCase
{
    protected function _setUp(): void
    {
    }

    /**
     * testIsPersian
     *
     * @return void
     */
    public function testNationalCodeValid(): void
    {
        $resualt = NationalCode::validate('3873505509');
        $this->assertTrue($resualt);

        $resualt = NationalCode::validate('3874757188');
        $this->assertTrue($resualt);

        $resualt = NationalCode::validate('920981968');
        $this->assertTrue($resualt);

        $resualt = NationalCode::validate('0421539135');
        $this->assertTrue($resualt);

        $resualt = NationalCode::validate('2890073191');
        $this->assertTrue($resualt);

        $resualt = NationalCode::validate('2122451157');
        $this->assertTrue($resualt);

        $resualt = NationalCode::validate('0910039331');
        $this->assertTrue($resualt);

        $resualt = NationalCode::validate('5199295756');
        $this->assertTrue($resualt);

        $resualt = NationalCode::validate('0410260746');
        $this->assertTrue($resualt);

        $resualt = NationalCode::validate('4849954251');
        $this->assertTrue($resualt);

        $resualt = NationalCode::validate('2031436317');
        $this->assertTrue($resualt);

        $resualt = NationalCode::validate('0919918001');
        $this->assertTrue($resualt);

        $resualt = NationalCode::validate('4999265486');
        $this->assertTrue($resualt);

        $resualt = NationalCode::validate('0068061609');
        $this->assertTrue($resualt);
    }
}
