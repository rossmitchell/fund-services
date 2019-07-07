Fund Services
=============

A set of simple interfaces to be used when exchanging information about funds and their prices.

__This is very much an Alpha build and significant changes are expected as it is developed__

Installation
------------

```
composer require rossmitchell/fund-services
```

Rational
--------

I'm building a system to track investment holdings and I've not got a good, open, free-ish, source of fund prices
for use in it. Therefore I'm going to have to try different options, and probably fall back to screen scraping to
get the data that I need.

To make this easier I'm going to use interfaces for the providers and what they have to return, which should allow
me to switch these out with minimum hassle.

Usage
-----

Each provider should implement the [FundPriceProvider](./src/Interfaces/FundPriceProvider.php) interface. It currently
has three methods that need to be implements

### isFundSupported

Not all providers are going to support all funds, so I need a simple way to check this ahead of time. 

Accepts a [Fund](./src/Interfaces/Fund.php) object and should return a boolean after checking if it can provide pricing
information for it

### getPriceForFund

This should return the [EndOfDayPrices](./src/Interfaces/EndOfDayPrices.php) for the Fund provided to it. These should
be for the current day.

It throws a [PricesNotAvailableException](./src/Exceptions/PricesNotAvailableException.php) if there are no prices 
available at the moment for the Fund

It throws a [ServiceDownException](./src/Exceptions/ServiceDownException.php) if it is not able to get the prices from 
the provider

It throws a [FundNotFoundException](./src/Exceptions/FundNotFoundException.php) if it does not support the Fund

### getHistoricPricesForFund

This returns an array of [EndOfDayPrices](./src/Interfaces/EndOfDayPrices.php) for the Fund, with each item representing
the Prices for one day in the range given. If there are not prices for one of the days, but there are for others then 
the array should contain those days. If there are no prices for the range then an empty array should be returned 

It accepts a Fund and two DateTimeImmutable objects, one for the start day and one for the end day. The range should 
include both dates. If both dates are the same then the array should contain a single item for that date.   

It throws a [ServiceDownException](./src/Exceptions/ServiceDownException.php) if it is not able to get the prices from 
the provider

It throws a [FundNotFoundException](./src/Exceptions/FundNotFoundException.php) if it does not support the Fund

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[GPL3](https://choosealicense.com/licenses/gpl-3.0/)
