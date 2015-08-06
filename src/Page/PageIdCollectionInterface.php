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
 * PageIdCollectionInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface PageIdCollectionInterface extends \Countable, \ArrayAccess, \IteratorAggregate
{

    /**
     * @param PageId $pageId
     *
     * @return void
     */
    public function add(PageId $pageId);

    /**
     * @param PageId $pageId
     *
     * @return void
     */
    public function remove(PageId $pageId);

    /**
     * @return array
     */
    public function toArray();
}
