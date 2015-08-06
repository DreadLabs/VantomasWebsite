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
 * MessageInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface MessageInterface
{

    /**
     * @param array $sender
     *
     * @return void
     */
    public function setSender(array $sender);

    /**
     * @param $receiver
     *
     * @return void
     */
    public function setReceiver(array $receiver);

    /**
     * @param string $subject
     *
     * @return void
     */
    public function setSubject($subject);

    /**
     * @param string $htmlBody
     *
     * @return void
     */
    public function setHtmlBody($htmlBody);

    /**
     * @param string $plainBody
     *
     * @return void
     */
    public function setPlainBody($plainBody);

    /**
     * @return void
     *
     * @throws FailedRecipientsException
     */
    public function send();
}
