<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Form;

use DreadLabs\VantomasWebsite\Form\Contact;
use DreadLabs\VantomasWebsite\Form\Contact\Message;
use DreadLabs\VantomasWebsite\Form\Contact\Person;
use DreadLabs\VantomasWebsite\Tests\Unit\Mail\Message\ViewDummy;

/**
 * ContactTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class ContactTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Person
     */
    protected $personMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Message
     */
    protected $messageMock;

    public function setUp()
    {
        $this->personMock = $this->getMock(Person::class);
        $this->messageMock = $this->getMock(Message::class);
    }

    public function testMailMessageViewDataSetsDesiredVariablesInView()
    {

        $sut = new Contact();
        $sut->setPerson($this->personMock);
        $sut->setMessage($this->messageMock);

        $viewMock = $this->getMock(ViewDummy::class);

        $fixture = array(
            'person' => $this->personMock,
            'message' => $this->messageMock,
        );

        $viewMock->expects($this->once())->method('setVariables')->with($this->equalTo($fixture));

        $sut->setMailMessageViewData($viewMock);
    }

    public function testContactReturnsSamePerson()
    {
        $sut = new Contact();
        $sut->setPerson($this->personMock);

        $this->assertSame($this->personMock, $sut->getPerson());
    }

    public function testContactReturnsSameMessage()
    {
        $sut = new Contact();
        $sut->setMessage($this->messageMock);

        $this->assertSame($this->messageMock, $sut->getMessage());
    }

    public function testContactReturnsSameCreationDate()
    {
        $creationDate = new \DateTime();

        $sut = new Contact();
        $sut->setCreationDate($creationDate);

        $this->assertSame($creationDate, $sut->getCreationDate());

    }
}
