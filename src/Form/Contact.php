<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Form;

use DreadLabs\VantomasWebsite\Form\Contact\Message;
use DreadLabs\VantomasWebsite\Form\Contact\Person;
use DreadLabs\VantomasWebsite\Mail\ConveyableInterface;
use DreadLabs\VantomasWebsite\Mail\Message\ViewInterface;

/**
 * Contact form value object
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class Contact implements ConveyableInterface
{

    /**
     * @var \DreadLabs\VantomasWebsite\Form\Contact\Person
     */
    protected $person;

    /**
     * @var \DreadLabs\VantomasWebsite\Form\Contact\Message
     */
    protected $message;

    /**
     * @var \DateTime
     */
    protected $creationDate;

    public function __construct()
    {
        $this->creationDate = new \DateTime();
    }

    /**
     * @param Person $person
     *
     * @return void
     */
    public function setPerson(Person $person)
    {
        $this->person = $person;
    }

    /**
     * @return Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param Message $message
     *
     * @return void
     */
    public function setMessage(Message $message)
    {
        $this->message = $message;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Returns the creation date
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Sets the creation date
     *
     * @param \DateTime $creationDate
     *
     * @return void
     */
    public function setCreationDate(\DateTime $creationDate = null)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @param ViewInterface $view
     *
     * @return void
     */
    public function setMailMessageViewData(ViewInterface $view)
    {
        $view->setVariables(array(
            'person' => $this->person,
            'message' => $this->message,
        ));
    }
}
