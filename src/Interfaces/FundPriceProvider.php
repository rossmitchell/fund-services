<?php declare(strict_types=1);
//<editor-fold desc="License Block">
/**
 * Copyright (C) 2019  Ross Mitchell
 *
 * This file is part of rossmitchell/fund-services.
 *
 * rossmitchell/fund-services is free software: you can redistribute
 * it and/or modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
//</editor-fold>

namespace RossMitchell\FundServices\Interfaces;

use DateTimeImmutable;
use RossMitchell\FundServices\Exceptions\FundNotFoundException;
use RossMitchell\FundServices\Exceptions\PricesNotAvailableException;
use RossMitchell\FundServices\Exceptions\ServiceDownException;

/**
 * I've not got a good, open, free-ish, source of fund prices for use in this project. Therefore I'm going to have to
 * try different options, and probably fall back to screen scraping to get the data that I need.
 *
 * To make this easier I'm going to use interfaces for the providers and what they have to return, which should allow
 * me to switch these out with minimum hassle.
 *
 * This represents actual provider and is what I expect to change in the project. However, everything that this uses
 * and returns is an Interface so they can be changed at will
 */
interface FundPriceProvider
{
    /**
     * Checks if the provider can return information about a fund
     *
     * @param Fund $fund
     * @return bool
     */
    public function isFundSupported(Fund $fund): bool;

    /**
     * Get the price of a fund for the current day.
     *
     * If there are any problems connecting to the service then the method MUST throw a ServiceDownException
     *
     * If prices are not available for the fund until some time in the future then a PricesNotAvailableException MUST
     * be thrown
     *
     * If the fund cannot be identified, the a FundNotFoundException MUST be throw
     *
     * @param Fund $fund
     *
     * @return EndOfDayPrices
     * @throws FundNotFoundException
     * @throws PricesNotAvailableException
     * @throws ServiceDownException
     */
    public function getPriceForFund(Fund $fund): EndOfDayPrices;

    /**
     * Returns an array of FundPrices between the start and end date
     *
     * If there are any problems connecting to the service then the method MUST throw a ServiceDownException
     *
     * If the fund cannot be identified, the a FundNotFoundException MUST be throw
     *
     * @param Fund $fund
     * @param DateTimeImmutable $startDate
     * @param DateTimeImmutable $endDate
     *
     * @return EndOfDayPrices[]
     * @throws FundNotFoundException
     * @throws ServiceDownException
     */
    public function getHistoricPricesForFund(
        Fund $fund,
        DateTimeImmutable $startDate,
        DateTimeImmutable $endDate
    ): array;
}
