<?php declare(strict_types=1);
//<editor-fold desc="License Block">
/**
 * Copyright (C) 2019  Ross Mitchell
 *
 * This file is part of Ross Mitchell/fund-services.
 *
 * Ross Mitchell/fund-services is free software: you can redistribute
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

namespace RossMitchell\FundServices\SimpleObjects\Prices;

use DateTimeImmutable;
use Money\Money;
use RossMitchell\FundServices\Interfaces\EndOfDayPrices;
use RossMitchell\FundServices\Interfaces\Fund;

class SimplePrice implements EndOfDayPrices
{
    /**
     * @var Fund
     */
    private $fund;
    /**
     * @var DateTimeImmutable
     */
    private $date;
    /**
     * @var Money
     */
    private $open;
    /**
     * @var Money
     */
    private $close;
    /**
     * @var Money
     */
    private $high;
    /**
     * @var Money
     */
    private $low;

    public function __construct(Fund $fund, DateTimeImmutable $date, Money $open, Money $close, Money $high, Money $low)
    {

        $this->fund = $fund;
        $this->date = $date;
        $this->open = $open;
        $this->close = $close;
        $this->high = $high;
        $this->low = $low;
    }

    /**
     * @inheritDoc
     */
    public function getFund(): Fund
    {
        return $this->fund;
    }

    /**
     * @inheritDoc
     */
    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @inheritDoc
     */
    public function getOpen(): Money
    {
        return $this->open;
    }

    /**
     * @inheritDoc
     */
    public function getClose(): Money
    {
        return $this->close;
    }

    /**
     * @inheritDoc
     */
    public function getHigh(): Money
    {
        return $this->high;
    }

    /**
     * @inheritDoc
     */
    public function getLow(): Money
    {
        return $this->low;
    }
}
