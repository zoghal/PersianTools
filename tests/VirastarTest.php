<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Zoghal\PersianTools\Tools\Virastar;

final class VirastarTest extends TestCase
{
    public function testGreetsWithName(): void
    {
        $greeter = new Virastar();

        $greeting = $greeter::cleanNonPersianCharacters('Alice');

        $this->assertSame('Hello, Alice!', $greeting);
    }
}