<?php

namespace PaulJulianHeise\CryptoCurrency\Test;

use PaulJulianHeise\CryptoCurrency\Blockchains\Tron;
use PaulJulianHeise\CryptoCurrency\Converter;
use PHPUnit\Framework\TestCase;

class ConvertTronTest extends TestCase
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
        $this->converter->tron()->convert($amount, Tron::TRX, Tron::SUN);
    }

    public function testInvalidFromUnit()
    {
        $this->expectException(\UnexpectedValueException::class);
        $amount = '1.5';
        $this->converter->tron()->convert($amount, 'troon', Tron::TRX);
    }


    public function testInvalidToUnit()
    {
        $this->expectException(\UnexpectedValueException::class);
        $amount = '1.5';
        $this->converter->tron()->convert($amount, Tron::TRX, 'suun');
    }

    public function testConvertToSmaller()
    {
        foreach ($this->getExpectedResultsToSmaller() as $unit => $result) {
            $amount = '59';
            $value = $this->converter->tron()->convert($amount, $unit, Tron::SUN);
            $this->assertEquals($value, $result);
        }
    }

    public function testConvertToBigger()
    {
        foreach ($this->getExpectedResultsToBigger() as $unit => $result) {
            $amount = '23';
            $value = $this->converter->tron()->convert($amount, $unit, Tron::TRX);
            $this->assertEquals($value, $result);
        }
    }

    public function testConvertToSmallerWithComma()
    {
        foreach ($this->getExpectedResultsToSmallerWithComma() as $unit => $result) {
            $amount = '1.533';
            $value = $this->converter->tron()->convert($amount, $unit, Tron::SUN);
            $this->assertEquals($value, $result);
        }
    }

    public function testConvertToBiggerWithComma()
    {
        foreach ($this->getExpectedResultsToBiggerWithComma() as $unit => $result) {
            $amount = '23.65632';
            $value = $this->converter->tron()->convert($amount, $unit, Tron::TRX);
            $this->assertEquals($value, $result);
        }
    }


    private function getExpectedResultsToBigger(): array
    {
        return [
            'trx'        => '23',
            'sun'       => '0.000023',
        ];
    }

    private function getExpectedResultsToSmaller(): array
    {
        return [
            'trx'        => '59000000',
            'sun'       => '59',
        ];
    }

    private function getExpectedResultsToBiggerWithComma(): array
    {
        return [
            'trx'        => '23.65632',
            'sun'       => '0.00002365632',
        ];
    }

    private function getExpectedResultsToSmallerWithComma(): array
    {
        return [
            'trx'        => '1533000',
            'sun'       => '1.533',
        ];
    }
}