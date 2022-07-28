<?php

namespace PaulJulianHeise\CryptoCurrency\Test;

use PaulJulianHeise\CryptoCurrency\Blockchains\Ethereum;
use PaulJulianHeise\CryptoCurrency\Converter;
use PHPUnit\Framework\TestCase;

class ConvertEthereumTest extends TestCase
{
    /**
     * @var Converter
     */
    private $converter;

    protected function setUp(): void
    {
        parent::setUp();
        $this->converter = new Converter();
    }

    public function testInvalidUnit()
    {
        $this->expectException(\UnexpectedValueException::class);
        $amount = '1,5';
        $this->converter->ethereum()->convert($amount, Ethereum::WEI, Ethereum::ETHER);
    }

    public function testConvertToSmaller()
    {
        foreach ($this->getExpectedResultsToSmaller() as $unit => $result) {
            $amount = '59';
            $value = $this->converter->ethereum()->convert($amount, $unit, Ethereum::WEI);
            $this->assertEquals($value, $result);
        }
    }

    public function testConvertToBigger()
    {
        foreach ($this->getExpectedResultsToBigger() as $unit => $result) {
            $amount = '23';
            $value = $this->converter->ethereum()->convert($amount, $unit, Ethereum::TETHER);
            $this->assertEquals($value, $result);
        }
    }

    public function testConvertToSmallerWithComma()
    {
        foreach ($this->getExpectedResultsToSmallerWithComma() as $unit => $result) {
            $amount = '1.533';
            $value = $this->converter->ethereum()->convert($amount, $unit, Ethereum::WEI);
            $this->assertEquals($value, $result);
        }
    }

    public function testConvertToBiggerWithComma()
    {
        foreach ($this->getExpectedResultsToBiggerWithComma() as $unit => $result) {
            $amount = '23.65632';
            $value = $this->converter->ethereum()->convert($amount, $unit, Ethereum::TETHER);
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
            'ether' => '0.000000000023',
            'kether' => '0.000000023',
            'mether' => '0.000023',
            'gether' => '0.023',
            'tether' => '23'
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
            'ether' => '59000000000000000000',
            'kether' => '59000000000000000000000',
            'mether' => '59000000000000000000000000',
            'gether' => '59000000000000000000000000000',
            'tether' => '59000000000000000000000000000000'
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
            'ether' => '0.00000000002365632',
            'kether' => '0.00000002365632',
            'mether' => '0.00002365632',
            'gether' => '0.02365632',
            'tether' => '23.65632'
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
            'ether' => '1533000000000000000',
            'kether' => '1533000000000000000000',
            'mether' => '1533000000000000000000000',
            'gether' => '1533000000000000000000000000',
            'tether' => '1533000000000000000000000000000'
        ];
    }
}