<?php

namespace PaulJulianHeise\CryptoCurrency\Blockchains;

use PaulJulianHeise\CryptoCurrency\CurrencyConverter;

class Ethereum extends CurrencyConverter 
{
    CONST WEI = 'wei';
    CONST KWEI = 'kwei';
    CONST MWEI = 'mwei';
    CONST GWEI = 'gwei';
    CONST SZABO = 'szabo';
    CONST FINNEY = 'finney';
    CONST ETHER = 'ether';
    CONST KETHER = 'kether';
    CONST METHER = 'mether';
    CONST GETHER = 'gether';
    CONST TETHER = 'tether';
    
    CONST BIGGEST_UNIT = self::TETHER;
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
                self::ETHER => '0.000000000000000001',
                self::KETHER => '0.000000000000000000001',
                self::METHER => '0.000000000000000000000001',
                self::GETHER => '0.000000000000000000000000001',
                self::TETHER => '0.000000000000000000000000000001',
            ],
            self::KWEI => [
                self::WEI => '1000',
                self::KWEI => '1',
                self::MWEI => '0.001',
                self::GWEI => '0.000001',
                self::SZABO => '0.000000001',
                self::FINNEY => '0.000000000001',
                self::ETHER => '0.000000000000001',
                self::KETHER => '0.000000000000000001',
                self::METHER => '0.000000000000000000001',
                self::GETHER => '0.000000000000000000000001',
                self::TETHER => '0.000000000000000000000000001',
            ],
            self::MWEI => [
                self::WEI => '1000000',
                self::KWEI => '1000',
                self::MWEI => '1',
                self::GWEI => '0.001',
                self::SZABO => '0.000001',
                self::FINNEY => '0.000000001',
                self::ETHER => '0.000000000001',
                self::KETHER => '0.000000000000001',
                self::METHER => '0.000000000000000001',
                self::GETHER => '0.000000000000000000001',
                self::TETHER => '0.000000000000000000000001',
            ],
            self::GWEI => [
                self::WEI => '1000000000',
                self::KWEI => '1000000',
                self::MWEI => '1000',
                self::GWEI => '1',
                self::SZABO => '0.001',
                self::FINNEY => '0.000001',
                self::ETHER => '0.000000001',
                self::KETHER => '0.000000000001',
                self::METHER => '0.000000000000001',
                self::GETHER => '0.000000000000000001',
                self::TETHER => '0.000000000000000000001',
            ],
            self::SZABO => [
                self::WEI => '1000000000000',
                self::KWEI => '1000000000',
                self::MWEI => '1000000',
                self::GWEI => '1000',
                self::SZABO => '1',
                self::FINNEY => '0.001',
                self::ETHER => '0.000001',
                self::KETHER => '0.000000001',
                self::METHER => '0.000000000001',
                self::GETHER => '0.000000000000001',
                self::TETHER => '0.000000000000000001',
            ],
            self::FINNEY => [
                self::WEI => '1000000000000000',
                self::KWEI => '1000000000000',
                self::MWEI => '1000000000',
                self::GWEI => '1000000',
                self::SZABO => '1000',
                self::FINNEY => '1',
                self::ETHER => '0.001',
                self::KETHER => '0.000001',
                self::METHER => '0.000000001',
                self::GETHER => '0.000000000001',
                self::TETHER => '0.000000000000001',
            ],
            self::ETHER => [
                self::WEI => '1000000000000000000',
                self::KWEI => '1000000000000000',
                self::MWEI => '1000000000000',
                self::GWEI => '1000000000',
                self::SZABO => '1000000',
                self::FINNEY => '1000',
                self::ETHER => '1',
                self::KETHER => '0.001',
                self::METHER => '0.000001',
                self::GETHER => '0.000000001',
                self::TETHER => '0.000000000001',
            ],
            self::KETHER => [
                self::WEI => '1000000000000000000000',
                self::KWEI => '1000000000000000000',
                self::MWEI => '1000000000000000',
                self::GWEI => '1000000000000',
                self::SZABO => '1000000000',
                self::FINNEY => '1000000',
                self::ETHER => '1000',
                self::KETHER => '1',
                self::METHER => '0.001',
                self::GETHER => '0.000001',
                self::TETHER => '0.000000001',
            ],
            self::METHER => [
                self::WEI => '1000000000000000000000000',
                self::KWEI => '1000000000000000000000',
                self::MWEI => '1000000000000000000',
                self::GWEI => '1000000000000000',
                self::SZABO => '1000000000000',
                self::FINNEY => '1000000000',
                self::ETHER => '1000000',
                self::KETHER => '1000',
                self::METHER => '1',
                self::GETHER => '0.001',
                self::TETHER => '0.000001',
            ],
            self::GETHER => [
                self::WEI => '1000000000000000000000000000',
                self::KWEI => '1000000000000000000000000',
                self::MWEI => '1000000000000000000000',
                self::GWEI => '1000000000000000000',
                self::SZABO => '1000000000000000',
                self::FINNEY => '1000000000000',
                self::ETHER => '1000000000',
                self::KETHER => '1000000',
                self::METHER => '1000',
                self::GETHER => '1',
                self::TETHER => '0.001',
            ],
            self::TETHER => [
                self::WEI => '1000000000000000000000000000000',
                self::KWEI => '1000000000000000000000000000',
                self::MWEI => '1000000000000000000000000',
                self::GWEI => '1000000000000000000000',
                self::SZABO => '1000000000000000000',
                self::FINNEY => '1000000000000000',
                self::ETHER => '1000000000000',
                self::KETHER => '1000000000',
                self::METHER => '1000000',
                self::GETHER => '1000',
                self::TETHER => '1',
            ],
        ];
    }
    
    protected function getConstValueByName($name): string|false
    {
        $ref = new \ReflectionClass(__CLASS__);
        return $ref->getConstant(strtoupper($name));
    }
}