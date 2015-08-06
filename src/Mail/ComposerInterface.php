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

/**
 * ComposerInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ComposerInterface
{

    /**
     * @param ConveyableInterface $conveyable
     *
     * @return MessageInterface
     */
    public function compose(ConveyableInterface $conveyable);
}
