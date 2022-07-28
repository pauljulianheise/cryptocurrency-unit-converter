<?php

namespace PaulJulianHeise\CryptoCurrency\Blockchains;

use PaulJulianHeise\CryptoCurrency\CurrencyConverter;

class Polygon extends CurrencyConverter
{
    CONST WEI = 'wei';
    CONST KWEI = 'kwei';
    CONST MWEI = 'mwei';
    CONST GWEI = 'gwei';
    CONST SZABO = 'szabo';
    CONST FINNEY = 'finney';
    CONST MATIC = 'matic';
    CONST KMATIC = 'kmatic';
    CONST MMATIC = 'mmatic';
    CONST GMATIC = 'gtmatic';
    CONST TMATIC = 'tmatic';
    
    CONST BIGGEST_UNIT = self::TMATIC;
    CONST SMALLEST_UNIT = self::WEI;

    public function getMap(): array {
        return [
            self::WEI => [
                self::WEI => '1',
                self::KWEI => '0.001',
                self::MWEI => '0.000001',
                self::GWEI => '0.000000001',
                self::SZABO => '0.000000000001',
                self::FINNEY => '0.000000000000001',
                self::MATIC => '0.000000000000000001',
                self::KMATIC => '0.000000000000000000001',
                self::MMATIC => '0.000000000000000000000001',
                self::GMATIC => '0.000000000000000000000000001',
                self::TMATIC => '0.000000000000000000000000000001',
            ],
            self::KWEI => [
                self::WEI => '1000',
                self::KWEI => '1',
                self::MWEI => '0.001',
                self::GWEI => '0.000001',
                self::SZABO => '0.000000001',
                self::FINNEY => '0.000000000001',
                self::MATIC => '0.000000000000001',
                self::KMATIC => '0.000000000000000001',
                self::MMATIC => '0.000000000000000000001',
                self::GMATIC => '0.000000000000000000000001',
                self::TMATIC => '0.000000000000000000000000001',
            ],
            self::MWEI => [
                self::WEI => '1000000',
                self::KWEI => '1000',
                self::MWEI => '1',
                self::GWEI => '0.001',
                self::SZABO => '0.000001',
                self::FINNEY => '0.000000001',
                self::MATIC => '0.000000000001',
                self::KMATIC => '0.000000000000001',
                self::MMATIC => '0.000000000000000001',
                self::GMATIC => '0.000000000000000000001',
                self::TMATIC => '0.000000000000000000000001',
            ],
            self::GWEI => [
                self::WEI => '1000000000',
                self::KWEI => '1000000',
                self::MWEI => '1000',
                self::GWEI => '1',
                self::SZABO => '0.001',
                self::FINNEY => '0.000001',
                self::MATIC => '0.000000001',
                self::KMATIC => '0.000000000001',
                self::MMATIC => '0.000000000000001',
                self::GMATIC => '0.000000000000000001',
                self::TMATIC => '0.000000000000000000001',
            ],
            self::SZABO => [
                self::WEI => '1000000000000',
                self::KWEI => '1000000000',
                self::MWEI => '1000000',
                self::GWEI => '1000',
                self::SZABO => '1',
                self::FINNEY => '0.001',
                self::MATIC => '0.000001',
                self::KMATIC => '0.000000001',
                self::MMATIC => '0.000000000001',
                self::GMATIC => '0.000000000000001',
                self::TMATIC => '0.000000000000000001',
            ],
            self::FINNEY => [
                self::WEI => '1000000000000000',
                self::KWEI => '1000000000000',
                self::MWEI => '1000000000',
                self::GWEI => '1000000',
                self::SZABO => '1000',
                self::FINNEY => '1',
                self::MATIC => '0.001',
                self::KMATIC => '0.000001',
                self::MMATIC => '0.000000001',
                self::GMATIC => '0.000000000001',
                self::TMATIC => '0.000000000000001',
            ],
            self::MATIC => [
                self::WEI => '1000000000000000000',
                self::KWEI => '1000000000000000',
                self::MWEI => '1000000000000',
                self::GWEI => '1000000000',
                self::SZABO => '1000000',
                self::FINNEY => '1000',
                self::MATIC => '1',
                self::KMATIC => '0.001',
                self::MMATIC => '0.000001',
                self::GMATIC => '0.000000001',
                self::TMATIC => '0.000000000001',
            ],
            self::KMATIC => [
                self::WEI => '1000000000000000000000',
                self::KWEI => '1000000000000000000',
                self::MWEI => '1000000000000000',
                self::GWEI => '1000000000000',
                self::SZABO => '1000000000',
                self::FINNEY => '1000000',
                self::MATIC => '1000',
                self::KMATIC => '1',
                self::MMATIC => '0.001',
                self::GMATIC => '0.000001',
                self::TMATIC => '0.000000001',
            ],
            self::MMATIC => [
                self::WEI => '1000000000000000000000000',
                self::KWEI => '1000000000000000000000',
                self::MWEI => '1000000000000000000',
                self::GWEI => '1000000000000000',
                self::SZABO => '1000000000000',
                self::FINNEY => '1000000000',
                self::MATIC => '1000000',
                self::KMATIC => '1000',
                self::MMATIC => '1',
                self::GMATIC => '0.001',
                self::TMATIC => '0.000001',
            ],
            self::GMATIC => [
                self::WEI => '1000000000000000000000000000',
                self::KWEI => '1000000000000000000000000',
                self::MWEI => '1000000000000000000000',
                self::GWEI => '1000000000000000000',
                self::SZABO => '1000000000000000',
                self::FINNEY => '1000000000000',
                self::MATIC => '1000000000',
                self::KMATIC => '1000000',
                self::MMATIC => '1000',
                self::GMATIC => '1',
                self::TMATIC => '0.001',
            ],
            self::TMATIC => [
                self::WEI => '1000000000000000000000000000000',
                self::KWEI => '1000000000000000000000000000',
                self::MWEI => '1000000000000000000000000',
                self::GWEI => '1000000000000000000000',
                self::SZABO => '1000000000000000000',
                self::FINNEY => '1000000000000000',
                self::MATIC => '1000000000000',
                self::KMATIC => '1000000000',
                self::MMATIC => '1000000',
                self::GMATIC => '1000',
                self::TMATIC => '1',
            ],
        ];
    }
    
    protected function getConstValueByName($name): string|false
    {
        $ref = new \ReflectionClass(__CLASS__);
        return $ref->getConstant(strtoupper($name));
    }
}