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
 * ControlInterface
 *
 * What is a control?
 *
 * "Controls are defensive technologies or modules that are used to detect,
 * deter, or deny attacks."
 *
 * @see https://www.owasp.org/index.php/Category:Control
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ControlInterface
{

    /**
     *
     * Returns true if the used Control impl detected a threat
     *
     * @param DataInterface $data The incoming data to investigate
     *
     * @return bool
     */
    public function isThreat(DataInterface $data);
}
