<?php

namespace PaulJulianHeise\CryptoCurrency\Blockchains;

use PaulJulianHeise\CryptoCurrency\CurrencyConverter;

class Cardano extends CurrencyConverter
{
    CONST ADA = 'ada';
    CONST LOVELACE = 'lovelace';

    CONST BIGGEST_UNIT = self::ADA;
    CONST SMALLEST_UNIT = self::LOVELACE;

    protected function getMap(): array {
        return [
            self::ADA => [
                self::ADA => '1',
                self::LOVELACE => '1000000',
            ],
            self::LOVELACE => [
                self::ADA => '0.000001',
                self::LOVELACE => '1',
            ]
        ];
    }

    protected function getConstValueByName($name): string|false
    {
        $ref = new \ReflectionClass(__CLASS__);
        return $ref->getConstant(strtoupper($name));
    }
}