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

use DreadLabs\VantomasWebsite\Mail\Exception\FailedRecipientsException;

/**
 * CarrierInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface CarrierInterface
{

    /**
     * @param ConveyableInterface $conveyable
     *
     * @return void
     *
     * @throws FailedRecipientsException
     */
    public function convey(ConveyableInterface $conveyable);
}
