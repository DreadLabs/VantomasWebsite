<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Mail;

use DreadLabs\VantomasWebsite\Mail\ConveyableInterface;
use DreadLabs\VantomasWebsite\Mail\Message\ViewInterface;

/**
 * ConveyableDummy
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class ConveyableDummy implements ConveyableInterface
{

    /**
     * {@inheritdoc}
     */
    public function setMailMessageViewData(ViewInterface $view)
    {
    }
}
