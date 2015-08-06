<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Media;

/**
 * A simple storage interface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface StorageInterface
{

    /**
     * Returns the public path of a media file
     *
     * "Public path" means: "From document root"
     *
     * @param Identifier $identifier
     *
     * @return string
     */
    public function getPublicPath(Identifier $identifier);
}
