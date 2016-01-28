<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\RssFeed;

use DreadLabs\VantomasWebsite\Page\TypeCollection;

/**
 * ConfigurationInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ConfigurationInterface
{

    /**
     * @return TypeCollection
     */
    public function getPageTypes();

    /**
     * @return string
     */
    public function getOrderBy();

    /**
     * @return string
     */
    public function getOrderDirection();
}
