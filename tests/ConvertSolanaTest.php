<?php

namespace PaulJulianHeise\CryptoCurrency\Test;

use PaulJulianHeise\CryptoCurrency\Blockchains\Solana;
use PaulJulianHeise\CryptoCurrency\Converter;
use PHPUnit\Framework\TestCase;

class ConvertSolanaTest extends TestCase
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

    public function testInvalidAmount()
    {
        $this->expectException(\UnexpectedValueException::class);
        $amount = '1,5';
        $this->converter->solana()->convert($amount, Solana::SOL, Solana::LAMPORT);
    }

    public function testInvalidFromUnit()
    {
        $this->expectException(\UnexpectedValueException::class);
        $amount = '1.5';
        $this->converter->ethereum()->convert($amount, 'sola', Solana::SOL);
    }


    public function testInvalidToUnit()
    {
        $this->expectException(\UnexpectedValueException::class);
        $amount = '1.5';
        $this->converter->ethereum()->convert($amount, Solana::SOL, 'lamporta');
    }

    public function testConvertToSmaller()
    {
        foreach ($this->getExpectedResultsToSmaller() as $unit => $result) {
            $amount = '59';
            $value = $this->converter->solana()->convert($amount, $unit, Solana::LAMPORT);
            $this->assertEquals($value, $result);
        }
    }

    public function testConvertToBigger()
    {
        foreach ($this->getExpectedResultsToBigger() as $unit => $result) {
            $amount = '23';
            $value = $this->converter->solana()->convert($amount, $unit, Solana::SOL);
            $this->assertEquals($value, $result);
        }
    }

    public function testConvertToSmallerWithComma()
    {
        foreach ($this->getExpectedResultsToSmallerWithComma() as $unit => $result) {
            $amount = '1.533';
            $value = $this->converter->solana()->convert($amount, $unit, Solana::LAMPORT);
            $this->assertEquals($value, $result);
        }
    }

    public function testConvertToBiggerWithComma()
    {
        foreach ($this->getExpectedResultsToBiggerWithComma() as $unit => $result) {
            $amount = '23.65632';
            $value = $this->converter->solana()->convert($amount, $unit, Solana::SOL);
            $this->assertEquals($value, $result);
        }
    }


    private function getExpectedResultsToBigger(): array
    {
        return [
            'sol'        => '23',
            'lamport'       => '0.000000023',
        ];
    }

    private function getExpectedResultsToSmaller(): array
    {
        return [
            'sol'        => '59000000000',
            'lamport'       => '59',
        ];
    }

    private function getExpectedResultsToBiggerWithComma(): array
    {
        return [
            'sol'        => '23.65632',
            'lamport'       => '0.00000002365632',
        ];
    }

    private function getExpectedResultsToSmallerWithComma(): array
    {
        return [
            'sol'        => '1533000000',
            'lamport'       => '1.533',
        ];
    }
}