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

use DreadLabs\VantomasWebsite\Page\PageType;

/**
 * Interface for building a archive search criteria
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface SearchInterface
{

    /**
     * @param DateRange $dateRange
     *
     * @return void
     */
    public function setDateRange(DateRange $dateRange);

    /**
     * @param PageType $pageType
     *
     * @return void
     */
    public function setPageType(PageType $pageType);

    /**
     * @return array
     */
    public function getCriteria();

    /**
     * List of arguments for a result list title generation.
     *
     * The result list title may contain placeholders for the
     * date range month / year values, parsed by sprintf() or
     * similar.
     *
     * @return array
     */
    public function getResultListTitleArguments();
}
