<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Sitemap;

use DreadLabs\VantomasWebsite\Page\IdentifierCollection;

/**
 * ConfigurationInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ConfigurationInterface
{

    /**
     * @return IdentifierCollection
     */
    public function getParentPageIdentifiers();

    /**
     * @return IdentifierCollection
     */
    public function getExcludePageIdentifiers();
}
