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
 * Carrier
 *
 * Uses the composer for mail creation and logging capabilites.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class Carrier implements CarrierInterface
{

    /**
     * @var ComposerInterface
     */
    private $composer;

    /**
     *
     * @var LoggerInterface
     */
    private $logger;

    /**
     *
     * @param ComposerInterface $composer
     * @param LoggerInterface $logger
     */
    public function __construct(
        ComposerInterface $composer,
        LoggerInterface $logger
    ) {
        $this->composer = $composer;
        $this->logger = $logger;
    }

    /**
     * @param ConveyableInterface $conveyable
     */
    public function convey(ConveyableInterface $conveyable)
    {
        try {
            $message = $this->composer->compose($conveyable);
            $message->send();
        } catch (FailedRecipientsException $e) {
            $this->logger->alert(
                'The mail could not been sent.',
                array(
                    'sender' => $e->getSenderList(),
                    'receiver' => $e->getReceiverList(),
                    'failedRecipients' => $e->getFailedRecipients(),
                )
            );
        }
    }
}
