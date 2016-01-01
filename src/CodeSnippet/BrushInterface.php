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
 * BrushInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface BrushInterface
{

    /**
     * Instantiates the brush by identifier or alias.
     *
     * @param string $identifierOrAlias
     *
     * @return BrushInterface
     */
    public static function fromIdentifierOrAlias($identifierOrAlias);
}
