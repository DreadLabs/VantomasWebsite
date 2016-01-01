<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\CodeSnippet;

/**
 * AbstractBrush
 *
 * A simple brush type.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
abstract class AbstractBrush
{

    /**
     * Identifier.
     *
     * Maps one-to-one to an asset resource (file name).
     *
     * @var string
     */
    public $identifier;

    /**
     * An alias to the identifier.
     *
     * @var string
     */
    public $alias;
}
