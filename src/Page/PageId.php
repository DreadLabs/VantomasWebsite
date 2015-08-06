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
 * PageId
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class PageId
{

    /**
     * @var int
     */
    private $value;

    public function __construct($pageId)
    {
        $this->value = (int) $pageId;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $idString
     *
     * @return self
     */
    public static function fromString($idString)
    {
        return new static((int) $idString);
    }
}
