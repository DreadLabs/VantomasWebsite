<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Archive;

/**
 * Date range value object for the archive
 *
 * Provides creation of a date range from a month + year. This
 * resolves to the first day within the given month as the
 * start date and the last day within the given month as the
 * end date.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class DateRange
{

    /**
     *
     * @var \DateTime
     */
    private $startDate;

    /**
     *
     * @var \DateTime
     */
    private $endDate;

    /**
     * Constructs the archive search DateRange
     *
     * @param int $month
     * @param int $year
     */
    public function __construct($month, $year)
    {
        $this->startDate = new \DateTime();
        $this->startDate->setDate($year, $month, 1);
        $this->startDate->setTime(0, 0, 0);

        $interval = new \DateInterval('P1M');

        $this->endDate = clone $this->startDate;
        $this->endDate->add($interval);
    }

    /**
     * Returns the start date
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Returns the end date
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param int $month
     * @param int $year
     *
     * @return self
     */
    public static function fromMonthAndYear($month, $year)
    {
        return new static((int) $month, (int) $year);
    }
}
