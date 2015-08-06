<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Page;

/**
 * PageTypeCollectionInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface PageTypeCollectionInterface extends \Countable, \ArrayAccess, \IteratorAggregate
{

    /**
     * @param PageType $pageType
     *
     * @return void
     */
    public function add(PageType $pageType);

    /**
     * @param PageType $pageType
     *
     * @return void
     */
    public function remove(PageType $pageType);

    /**
     * @return array
     */
    public function toArray();
}
