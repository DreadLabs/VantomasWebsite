<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Mail\Exception;

/**
 * FailedRecipientsException
 *
 * Allows wrapping unsuccessful mail delivery into a more pecific
 * exception and access to a list of sends, receivers and failed recipients.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class FailedRecipientsException extends \Exception
{

    /**
     * @var array
     */
    private $senderList = array();

    /**
     * @var array
     */
    private $receiverList = array();

    /**
     * @var array
     */
    private $failedRecipients = array();

    /**
     * @param string $message
     * @param int $code
     * @param \Exception $previous
     */
    public function __construct($message = '', $code = 0, \Exception $previous = null)
    {
        parent::__construct('One or more recipients were not accepted for delivery.', 1425333667);
    }

    /**
     * @param array $senderList
     */
    public function setSenderList(array $senderList)
    {
        $this->senderList = $senderList;
    }

    /**
     * @return array
     */
    public function getSenderList()
    {
        return $this->senderList;
    }

    /**
     * @param array $receiverList
     */
    public function setReceiverList(array $receiverList)
    {
        $this->receiverList = $receiverList;
    }

    /**
     * @return array
     */
    public function getReceiverList()
    {
        return $this->receiverList;
    }

    /**
     * @param array $failedRecipients
     */
    public function setFailedRecipients(array $failedRecipients)
    {
        $this->failedRecipients = $failedRecipients;
    }

    /**
     * @return array
     */
    public function getFailedRecipients()
    {
        return $this->failedRecipients;
    }
}
