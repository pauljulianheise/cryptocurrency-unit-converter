<?php

namespace PaulJulianHeise\CryptoCurrency\Blockchains;

use PaulJulianHeise\CryptoCurrency\CurrencyConverter;

class Tron extends CurrencyConverter
{
    CONST TRX = 'trx';
    CONST SUN = 'sun';

    CONST BIGGEST_UNIT = self::TRX;
    CONST SMALLEST_UNIT = self::SUN;

    public function getMap(): array {
        return [
            self::TRX => [
                self::TRX => '1',
                self::SUN => '1000000',
            ],
            self::SUN => [
                self::TRX => '0.000001',
                self::SUN => '1',
            ]
        ];
    }

    protected function getConstValueByName($name): string|false
    {
        $ref = new \ReflectionClass(__CLASS__);
        return $ref->getConstant(strtoupper($name));
    }
}