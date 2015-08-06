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
 * Interface to find all archive dates for a given page type.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface DateRepositoryInterface
{

    /**
     * Finds archive dates
     *
     * @param PageType $pageType
     *
     * @return Date[]
     */
    public function find(PageType $pageType);
}
