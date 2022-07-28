<?php

namespace PaulJulianHeise\CryptoCurrency\Blockchains;

use PaulJulianHeise\CryptoCurrency\CurrencyConverter;

class Solana extends CurrencyConverter
{
    CONST SOL = 'sol';
    CONST LAMPORT = 'lamport';

    CONST BIGGEST_UNIT = self::SOL;
    CONST SMALLEST_UNIT = self::LAMPORT;

    public function getMap(): array {
        return [
            self::SOL => [
                self::SOL => '1',
                self::LAMPORT => '1000000000',
            ],
            self::LAMPORT => [
                self::SOL => '0.000000001',
                self::LAMPORT => '1',
            ]
        ];
    }

    protected function getConstValueByName($name): string|false
    {
        $ref = new \ReflectionClass(__CLASS__);
        return $ref->getConstant(strtoupper($name));
    }
}