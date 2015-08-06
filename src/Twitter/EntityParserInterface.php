<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Twitter;

/**
 * EntityParserInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface EntityParserInterface
{

    /**
     * @param \stdClass $entities
     *
     * @return void
     */
    public function setEntities(\stdClass $entities);

    /**
     * @param string $tweet
     *
     * @return string
     */
    public function parseUrls($tweet);

    /**
     * @param string $tweet
     *
     * @return string
     */
    public function parseHashTags($tweet);
}
