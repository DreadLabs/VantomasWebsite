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
 * FactoryInterface
 *
 * @author Thomas Juhnke <typo3@van-tomas.de>
 */
interface FactoryInterface
{

    /**
     * @param array $data
     *
     * @return Page
     */
    public function createFromAssociativeArray(array $data);
}
