<?php

namespace PaulJulianHeise\CryptoCurrency;

abstract class CurrencyConverter
{
    CONST BIGGEST_UNIT = 'BIGGEST_UNIT';
    CONST SMALLEST_UNIT = 'SMALLEST_UNIT';

    /**
     * @param string $amount
     * @param string $from
     * @param string $to
     * @return string
     */
    public function convert(string $amount, string $from, string $to): string
    {
        $fromUnit = $this->getConstValueByName($from);
        $toUnit = $this->getConstValueByName($to);

        if (!$fromUnit || !$toUnit) {
            throw new \UnexpectedValueException(sprintf("The unit you want to convert (%s) doesn't exist.", !$fromUnit ? $from : $to));
        }

        if($fromUnit === $toUnit) {
            return $amount;
        }

        $fromUnitMap = $this->getMap()[$fromUnit];
        $toUnitMap = $this->getMap()[$toUnit];
        $map = $this->getMap();
        
        $fromScale = $map[$this->getConstValueByName(self::BIGGEST_UNIT)][$fromUnit];
        $toScale = $map[$this->getConstValueByName(self::BIGGEST_UNIT)][$toUnit];

        if ($this->toBiggerUnit($fromScale, $toScale)) {
            $amount = $this->formatAmount($amount, '.');
            return bcdiv($amount, $toUnitMap[$fromUnit], $this->getScaleForDivision($amount, $fromScale, $toScale));
        } else {
            $amount = $this->formatAmount($amount, '.00');
            return bcmul($amount, $fromUnitMap[$toUnit], $this->getScaleForMultiple($amount, $fromScale, $toScale));
        }
    }

    /**
     * @param string $amount
     * @param string $from
     * @param string $to
     * @return int
     */
    private function getScaleForDivision(string $amount, string $from, string $to): int
    {
        return max((strlen($amount) - strpos($amount, '.') - 1) + (substr_count($from, 0) - substr_count($to, 0)), 0);
    }

    /**
     * @param string $amount
     * @param string $from
     * @param string $to
     * @return int
     */
    private function getScaleForMultiple(string $amount, string $from, string $to): int
    {
        return max((strlen($amount) - strpos($amount, '.') - 1) - (substr_count($to, 0) - substr_count($from, 0)), 0);
    }

    /**
     * @param $from
     * @param $to
     * @return bool
     */
    private function toBiggerUnit($from, $to): bool
    {
        return strlen($from) > strlen($to);
    }

    /**
     * @param string $amount
     * @param string $end
     * @return string
     */
    private function formatAmount(string $amount, string $end = ''): string {

        if(!strpos($amount, '.')) {
            $amount .= $end;
        }

        if(strpos($amount, ',')) {
            throw new \UnexpectedValueException("The amount should not contain a comma.");
        }

        return $amount;
    }
}