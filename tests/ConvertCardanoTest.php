<?php

namespace PaulJulianHeise\CryptoCurrency\Test;

use PaulJulianHeise\CryptoCurrency\Blockchains\Cardano;
use PaulJulianHeise\CryptoCurrency\Converter;
use PHPUnit\Framework\TestCase;

class ConvertCardanoTest extends TestCase
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
        $this->converter->cardano()->convert($amount, Cardano::ADA, Cardano::LOVELACE);
    }

    public function testInvalidFromUnit()
    {
        $this->expectException(\UnexpectedValueException::class);
        $amount = '1.5';
        $this->converter->cardano()->convert($amount, 'adaa', Cardano::ADA);
    }


    public function testInvalidToUnit()
    {
        $this->expectException(\UnexpectedValueException::class);
        $amount = '1.5';
        $this->converter->cardano()->convert($amount, Cardano::ADA, 'lamporta');
    }

    public function testConvertToSmaller()
    {
        foreach ($this->getExpectedResultsToSmaller() as $unit => $result) {
            $amount = '59';
            $value = $this->converter->cardano()->convert($amount, $unit, Cardano::LOVELACE);
            $this->assertEquals($value, $result);
        }
    }

    public function testConvertToBigger()
    {
        foreach ($this->getExpectedResultsToBigger() as $unit => $result) {
            $amount = '23';
            $value = $this->converter->cardano()->convert($amount, $unit, Cardano::ADA);
            $this->assertEquals($value, $result);
        }
    }

    public function testConvertToSmallerWithComma()
    {
        foreach ($this->getExpectedResultsToSmallerWithComma() as $unit => $result) {
            $amount = '1.533';
            $value = $this->converter->cardano()->convert($amount, $unit, Cardano::LOVELACE);
            $this->assertEquals($value, $result);
        }
    }

    public function testConvertToBiggerWithComma()
    {
        foreach ($this->getExpectedResultsToBiggerWithComma() as $unit => $result) {
            $amount = '23.65632';
            $value = $this->converter->cardano()->convert($amount, $unit, Cardano::ADA);
            $this->assertEquals($value, $result);
        }
    }


    private function getExpectedResultsToBigger(): array
    {
        return [
            'ada'        => '23',
            'lovelace'       => '0.000023',
        ];
    }

    private function getExpectedResultsToSmaller(): array
    {
        return [
            'ada'        => '59000000',
            'lovelace'       => '59',
        ];
    }

    private function getExpectedResultsToBiggerWithComma(): array
    {
        return [
            'ada'        => '23.65632',
            'lovelace'       => '0.00002365632',
        ];
    }

    private function getExpectedResultsToSmallerWithComma(): array
    {
        return [
            'ada'        => '1533000',
            'lovelace'       => '1.533',
        ];
    }
}