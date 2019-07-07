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
use Money\Money;

/**
 * This is used to represent the final prices of a fund on a given day.
 */
interface EndOfDayPrices
{

    /**
     * The fund that the prices are for
     *
     * @return Fund
     */
    public function getFund(): Fund;

    /**
     * The date the prices are for
     *
     * @return DateTimeImmutable
     */
    public function getDate(): DateTimeImmutable;

    /**
     * The opening price for the fund on the day
     *
     * @return Money
     */
    public function getOpen(): Money;

    /**
     * The closing price for the fund on the day
     *
     * @return Money
     */
    public function getClose(): Money;

    /**
     * The highest price the fund reached on the day
     *
     * @return Money
     */
    public function getHigh(): Money;

    /**
     * The lowest price the fund reach on the day
     *
     * @return Money
     */
    public function getLow(): Money;
}
