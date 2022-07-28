<?php

namespace PaulJulianHeise\CryptoCurrency;

use PaulJulianHeise\CryptoCurrency\Blockchains\Binance;
use PaulJulianHeise\CryptoCurrency\Blockchains\Cardano;
use PaulJulianHeise\CryptoCurrency\Blockchains\Ethereum;
use PaulJulianHeise\CryptoCurrency\Blockchains\Polygon;
use PaulJulianHeise\CryptoCurrency\Blockchains\Solana;
use PaulJulianHeise\CryptoCurrency\Blockchains\Tron;

class Converter
{
    private static Ethereum|null $ethereum = null;
    private static Binance|null $binance = null;
    private static Solana|null $solana = null;
    private static Polygon|null $polygon = null;
    private static Cardano|null $cardano = null;
    private static Tron|null $tron = null;

    /**
     * @return Ethereum
     */
    public function ethereum(): Ethereum
    {
        self::$ethereum = self::$ethereum ?: new Ethereum();
        return self::$ethereum;
    }

    /**
     * @return Binance
     */
    public function binance(): Binance
    {
        self::$binance = self::$binance ?: new Binance();
        return self::$binance;
    }

    /**
     * @return Solana
     */
    public function solana(): Solana
    {
        self::$solana = self::$solana ?: new Solana();
        return self::$solana;
    }

    /**
     * @return Polygon
     */
    public function polygon(): Polygon
    {
        self::$polygon = self::$polygon ?: new Polygon();
        return self::$polygon;
    }

    /**
     * @return Cardano
     */
    public function cardano(): Cardano
    {
        self::$cardano = self::$cardano ?: new Cardano();
        return self::$cardano;
    }

    /**
     * @return Tron
     */
    public function tron(): Tron
    {
        self::$tron = self::$tron ?: new Tron();
        return self::$tron;
    }
}