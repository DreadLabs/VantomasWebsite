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
 * PageIdCollectionFactoryInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface PageIdCollectionFactoryInterface
{

    /**
     * @param array $ids
     *
     * @return PageIdCollectionInterface
     */
    public function createFromArray(array $ids);
}
