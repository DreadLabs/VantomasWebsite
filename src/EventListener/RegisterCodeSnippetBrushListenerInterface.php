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

use DreadLabs\VantomasWebsite\CodeSnippet\AbstractBrush;

/**
 * RegisterSyntaxHighlighterBrushListenerInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface RegisterCodeSnippetBrushListenerInterface
{

    /**
     * Register the given brush alias / identifier pair for autoloading.
     *
     * @param AbstractBrush $brush
     *
     * @return void
     */
    public function handle(AbstractBrush $brush);
}
