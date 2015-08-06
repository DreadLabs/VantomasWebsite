<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Taxonomy;

/**
 * TagCloudInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface TagCloudInterface extends \Countable, \ArrayAccess, \IteratorAggregate
{

    /**
     * @param Tag $tag
     *
     * @return void
     */
    public function add(Tag $tag);

    /**
     * @param Tag $tag
     *
     * @return void
     */
    public function remove(Tag $tag);

    /**
     * @return array
     */
    public function toArray();
}
