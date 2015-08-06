<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Taxonomy;

/**
 * Tag
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class Tag
{

    /**
     * @var string
     */
    private $tag;

    /**
     * @param string $tag
     */
    public function __construct($tag)
    {
        $this->tag = (string) $tag;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->tag;
    }

    /**
     * @param string $tag
     *
     * @return self
     */
    public static function fromString($tag)
    {
        return new static((string) $tag);
    }

    /**
     * @param $tag
     *
     * @return self
     */
    public static function fromUrl($tag)
    {
        return new static(urldecode((string) $tag));
    }
}
