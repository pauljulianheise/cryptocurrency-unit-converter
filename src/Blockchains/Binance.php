<?php

namespace PaulJulianHeise\CryptoCurrency\Blockchains;

use PaulJulianHeise\CryptoCurrency\CurrencyConverter;

class Binance extends CurrencyConverter
{
    CONST WEI = 'wei';
    CONST KWEI = 'kwei';
    CONST MWEI = 'mwei';
    CONST GWEI = 'gwei';
    CONST SZABO = 'szabo';
    CONST FINNEY = 'finney';
    CONST BNB = 'bnb';
    CONST KBNB = 'kbnb';
    CONST MBNB = 'mbnb';
    CONST GBNB = 'gbnb';
    CONST TBNB = 'tbnb';
    
    CONST BIGGEST_UNIT = self::TBNB;
    CONST SMALLEST_UNIT = self::WEI;

    protected function getMap(): array {
        return [
            self::WEI => [
                self::WEI => '1',
                self::KWEI => '0.001',
                self::MWEI => '0.000001',
                self::GWEI => '0.000000001',
                self::SZABO => '0.000000000001',
                self::FINNEY => '0.000000000000001',
                self::BNB => '0.000000000000000001',
                self::KBNB => '0.000000000000000000001',
                self::MBNB => '0.000000000000000000000001',
                self::GBNB => '0.000000000000000000000000001',
                self::TBNB => '0.000000000000000000000000000001',
            ],
            self::KWEI => [
                self::WEI => '1000',
                self::KWEI => '1',
                self::MWEI => '0.001',
                self::GWEI => '0.000001',
                self::SZABO => '0.000000001',
                self::FINNEY => '0.000000000001',
                self::BNB => '0.000000000000001',
                self::KBNB => '0.000000000000000001',
                self::MBNB => '0.000000000000000000001',
                self::GBNB => '0.000000000000000000000001',
                self::TBNB => '0.000000000000000000000000001',
            ],
            self::MWEI => [
                self::WEI => '1000000',
                self::KWEI => '1000',
                self::MWEI => '1',
                self::GWEI => '0.001',
                self::SZABO => '0.000001',
                self::FINNEY => '0.000000001',
                self::BNB => '0.000000000001',
                self::KBNB => '0.000000000000001',
                self::MBNB => '0.000000000000000001',
                self::GBNB => '0.000000000000000000001',
                self::TBNB => '0.000000000000000000000001',
            ],
            self::GWEI => [
                self::WEI => '1000000000',
                self::KWEI => '1000000',
                self::MWEI => '1000',
                self::GWEI => '1',
                self::SZABO => '0.001',
                self::FINNEY => '0.000001',
                self::BNB => '0.000000001',
                self::KBNB => '0.000000000001',
                self::MBNB => '0.000000000000001',
                self::GBNB => '0.000000000000000001',
                self::TBNB => '0.000000000000000000001',
            ],
            self::SZABO => [
                self::WEI => '1000000000000',
                self::KWEI => '1000000000',
                self::MWEI => '1000000',
                self::GWEI => '1000',
                self::SZABO => '1',
                self::FINNEY => '0.001',
                self::BNB => '0.000001',
                self::KBNB => '0.000000001',
                self::MBNB => '0.000000000001',
                self::GBNB => '0.000000000000001',
                self::TBNB => '0.000000000000000001',
            ],
            self::FINNEY => [
                self::WEI => '1000000000000000',
                self::KWEI => '1000000000000',
                self::MWEI => '1000000000',
                self::GWEI => '1000000',
                self::SZABO => '1000',
                self::FINNEY => '1',
                self::BNB => '0.001',
                self::KBNB => '0.000001',
                self::MBNB => '0.000000001',
                self::GBNB => '0.000000000001',
                self::TBNB => '0.000000000000001',
            ],
            self::BNB => [
                self::WEI => '1000000000000000000',
                self::KWEI => '1000000000000000',
                self::MWEI => '1000000000000',
                self::GWEI => '1000000000',
                self::SZABO => '1000000',
                self::FINNEY => '1000',
                self::BNB => '1',
                self::KBNB => '0.001',
                self::MBNB => '0.000001',
                self::GBNB => '0.000000001',
                self::TBNB => '0.000000000001',
            ],
            self::KBNB => [
                self::WEI => '1000000000000000000000',
                self::KWEI => '1000000000000000000',
                self::MWEI => '1000000000000000',
                self::GWEI => '1000000000000',
                self::SZABO => '1000000000',
                self::FINNEY => '1000000',
                self::BNB => '1000',
                self::KBNB => '1',
                self::MBNB => '0.001',
                self::GBNB => '0.000001',
                self::TBNB => '0.000000001',
            ],
            self::MBNB => [
                self::WEI => '1000000000000000000000000',
                self::KWEI => '1000000000000000000000',
                self::MWEI => '1000000000000000000',
                self::GWEI => '1000000000000000',
                self::SZABO => '1000000000000',
                self::FINNEY => '1000000000',
                self::BNB => '1000000',
                self::KBNB => '1000',
                self::MBNB => '1',
                self::GBNB => '0.001',
                self::TBNB => '0.000001',
            ],
            self::GBNB => [
                self::WEI => '1000000000000000000000000000',
                self::KWEI => '1000000000000000000000000',
                self::MWEI => '1000000000000000000000',
                self::GWEI => '1000000000000000000',
                self::SZABO => '1000000000000000',
                self::FINNEY => '1000000000000',
                self::BNB => '1000000000',
                self::KBNB => '1000000',
                self::MBNB => '1000',
                self::GBNB => '1',
                self::TBNB => '0.001',
            ],
            self::TBNB => [
                self::WEI => '1000000000000000000000000000000',
                self::KWEI => '1000000000000000000000000000',
                self::MWEI => '1000000000000000000000000',
                self::GWEI => '1000000000000000000000',
                self::SZABO => '1000000000000000000',
                self::FINNEY => '1000000000000000',
                self::BNB => '1000000000000',
                self::KBNB => '1000000000',
                self::MBNB => '1000000',
                self::GBNB => '1000',
                self::TBNB => '1',
            ],
        ];
    }
    
    protected function getConstValueByName($name): string|false
    {
        $ref = new \ReflectionClass(__CLASS__);
        return $ref->getConstant(strtoupper($name));
    }
}