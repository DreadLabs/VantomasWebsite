<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Mail;

use DreadLabs\VantomasWebsite\Mail\Message\ViewInterface;

/**
 * ConveyableInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ConveyableInterface
{

    /**
     * @param ViewInterface $view
     *
     * @return void
     */
    public function setMailMessageViewData(ViewInterface $view);
}
