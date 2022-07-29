<?php

namespace PaulJulianHeise\CryptoCurrency\Test;

use PaulJulianHeise\CryptoCurrency\Blockchains\Polygon;
use PaulJulianHeise\CryptoCurrency\Converter;
use PHPUnit\Framework\TestCase;

class ConvertPolygonTest extends TestCase
{
    /**
     * @var Converter
     */
    private Converter $converter;

    protected function setUp(): void
    {
        parent::setUp();
        $this->converter = new Converter();
    }

    public function testInvalidAmount()
    {
        $this->expectException(\UnexpectedValueException::class);
        $amount = '1,5';
        $this->converter->polygon()->convert($amount, Polygon::WEI, Polygon::MATIC);
    }

    public function testInvalidFromUnit()
    {
        $this->expectException(\UnexpectedValueException::class);
        $amount = '1.5';
        $this->converter->polygon()->convert($amount, 'Weei', Polygon::MATIC);
    }

    public function testInvalidToUnit()
    {
        $this->expectException(\UnexpectedValueException::class);
        $amount = '1.5';
        $this->converter->polygon()->convert($amount, Polygon::MATIC, 'tmatiic');
    }

    public function testConvertToSmaller()
    {
        foreach ($this->getExpectedResultsToSmaller() as $unit => $result) {
            $amount = '59';
            $value = $this->converter->polygon()->convert($amount, $unit, Polygon::WEI);
            $this->assertEquals($value, $result);
        }
    }

    public function testConvertToBigger()
    {
        foreach ($this->getExpectedResultsToBigger() as $unit => $result) {
            $amount = '23';
            $value = $this->converter->polygon()->convert($amount, $unit, Polygon::TMATIC);
            $this->assertEquals($value, $result);
        }
    }

    public function testConvertToSmallerWithComma()
    {
        foreach ($this->getExpectedResultsToSmallerWithComma() as $unit => $result) {
            $amount = '1.533';
            $value = $this->converter->polygon()->convert($amount, $unit, Polygon::WEI);
            $this->assertEquals($value, $result);
        }
    }

    public function testConvertToBiggerWithComma()
    {
        foreach ($this->getExpectedResultsToBiggerWithComma() as $unit => $result) {
            $amount = '23.65632';
            $value = $this->converter->polygon()->convert($amount, $unit, Polygon::TMATIC);
            $this->assertEquals($value, $result);
        }
    }


    private function getExpectedResultsToBigger(): array
    {
        return [
            'wei' => '0.000000000000000000000000000023',
            'kwei' => '0.000000000000000000000000023',
            'mwei' => '0.000000000000000000000023',
            'gwei' => '0.000000000000000000023',
            'szabo' => '0.000000000000000023',
            'finney' => '0.000000000000023',
            'matic' => '0.000000000023',
            'kmatic' => '0.000000023',
            'mmatic' => '0.000023',
            'gmatic' => '0.023',
            'tmatic' => '23'
        ];
    }

    private function getExpectedResultsToSmaller(): array
    {
        return [
            'wei' => '59',
            'kwei' => '59000',
            'mwei' => '59000000',
            'gwei' => '59000000000',
            'szabo' => '59000000000000',
            'finney' => '59000000000000000',
            'matic' => '59000000000000000000',
            'kmatic' => '59000000000000000000000',
            'mmatic' => '59000000000000000000000000',
            'gmatic' => '59000000000000000000000000000',
            'tmatic' => '59000000000000000000000000000000'
        ];
    }

    private function getExpectedResultsToBiggerWithComma(): array
    {
        return [
            'wei' => '0.00000000000000000000000000002365632',
            'kwei' => '0.00000000000000000000000002365632',
            'mwei' => '0.00000000000000000000002365632',
            'gwei' => '0.00000000000000000002365632',
            'szabo' => '0.00000000000000002365632',
            'finney' => '0.00000000000002365632',
            'matic' => '0.00000000002365632',
            'kmatic' => '0.00000002365632',
            'mmatic' => '0.00002365632',
            'gmatic' => '0.02365632',
            'tmatic' => '23.65632'
        ];
    }

    private function getExpectedResultsToSmallerWithComma(): array
    {
        return [
            'wei' => '1.533',
            'kwei' => '1533',
            'mwei' => '1533000',
            'gwei' => '1533000000',
            'szabo' => '1533000000000',
            'finney' => '1533000000000000',
            'matic' => '1533000000000000000',
            'kmatic' => '1533000000000000000000',
            'mmatic' => '1533000000000000000000000',
            'gmatic' => '1533000000000000000000000000',
            'tmatic' => '1533000000000000000000000000000'
        ];
    }
}