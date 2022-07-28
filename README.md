
# Cryptocurrency Unit Converter

A library for performing easy and fast conversion between various cryptocurrency units.
  _______________
**Installation:**  
requires PHP 8.0 and the bcmath extension

```bash  
composer require pauljulianheise/cryptocurrency-unit-converter  
```  
  _______________
**Supported Blockchains & Cryptocurrencies:**

- Ethereum (ETH)
- Binance Smart Chain (BNB)

_______________
**Usage:**

The convert function accepts an amount, the unit of the amount and the unit you want to convert to.
```  
public function convert(string $amount, string $from, string $to): string
```  
_______________
```  
use PaulJulianHeise\CryptoCurrency\Blockchains\Ethereum  
use PaulJulianHeise\CryptoCurrency\Blockchains\Binance;  
use PaulJulianHeise\CryptoCurrency\Blockchains\Solana;  

$converter = new Converter();

// CONSTANTS: WEI, KWEI, MWEI, GWEI, SZABO, FINNEY, ETHER, KETHER, METHER, GETHER, TETHER  
$convertedValue = $converter->ethereum()->convert("1", Ethereum::ETHER, Ethereum::WEI);  
  

// CONSTANTS: WEI, KWEI, MWEI, GWEI, SZABO, FINNEY, BNB, KBNB, MBNB, GBNB, TBNB  
$convertedValue = $converter->binance()->convert("1", Binance::BNB, Binance::WEI);  

// CONSTANTS: SOL, LAMPORT 
$convertedValue = $converter->solana()->convert("1", Solana::SOL, Solana::LAMPORT);  
  ```  
  _______________
The value to be converted should only contain a single "." as a delimiter and no comma:

```  
use PaulJulianHeise\CryptoCurrency\Ethereum  
use PaulJulianHeise\CryptoCurrency\Binance;  

$converter = new Converter(); 
// will throw an exception
$convertedValue = $converter->ethereum()->convert("1,4", Ethereum::ETHER, Ethereum::WEI);  
  ```  
  