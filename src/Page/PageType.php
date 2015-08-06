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
 * PageType
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class PageType
{

    /**
     * @var int
     */
    private $value;

    public function __construct($pageType)
    {
        $this->value = (int) $pageType;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $pageType
     *
     * @return self
     */
    public static function fromString($pageType)
    {
        return new static($pageType);
    }
}
