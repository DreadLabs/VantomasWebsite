<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\ThreatDefense;

/**
 * DataInterface
 *
 * Represents incoming data which needs to be investigated
 * or checked against the threat control.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface DataInterface
{

    /**
     * @return mixed
     */
    public function getValue();
}
