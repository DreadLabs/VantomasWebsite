<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\TeaserImage;

/**
 * Offset configuration for Layers
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class Offset
{

    /**
     * @var int
     */
    private $xAxis;

    /**
     * @var int
     */
    private $yAxis;

    /**
     * @param int $xAxis
     * @param int $yAxis
     */
    public function __construct($xAxis, $yAxis)
    {
        $this->xAxis = (int) $xAxis;
        $this->yAxis = (int) $yAxis;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return implode(',', array($this->xAxis, $this->yAxis));
    }

    /**
     * @param string $axes
     *
     * @return self
     */
    public static function fromString($axes)
    {
        list($xAxis, $yAxis) = explode(',', $axes);

        return new static($xAxis, $yAxis);
    }
}
