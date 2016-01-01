<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\EventListener;

/**
 * AbstractAddPageAssetListener
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
abstract class AbstractAddPageAssetListener
{

    /**
     * Flags if the listener is responsible for adding page assets.
     *
     * This method guards the event handler so it only adds page
     * assets if responsibility is determined by the custom logic
     * of the handler in this method.
     *
     * @return bool
     */
    abstract protected function isResponsible();
}
