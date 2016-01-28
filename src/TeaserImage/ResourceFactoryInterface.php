<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\TeaserImage;

use DreadLabs\VantomasWebsite\Page\PageId;

/**
 * ResourceFactoryInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ResourceFactoryInterface
{

    /**
     * @param PageId $pageId
     *
     * @return Resource
     */
    public function createFromPageId(PageId $pageId);
}
