<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Form;

use DreadLabs\VantomasWebsite\Form\Contact;
use DreadLabs\VantomasWebsite\Form\Contact\Message;
use DreadLabs\VantomasWebsite\Form\Contact\Person;
use DreadLabs\VantomasWebsite\Tests\Unit\Mail\Message\ViewDummy;

class ContactTest extends \PHPUnit_Framework_TestCase
{

    public function testMailMessageViewDataSetsDesiredVariablesInView()
    {
        $personMock = $this->getMock(Person::class);
        $messageMock = $this->getMock(Message::class);

        $sut = new Contact();
        $sut->setPerson($personMock);
        $sut->setMessage($messageMock);

        $viewMock = $this->getMock(ViewDummy::class);

        $fixture = array(
            'person' => $personMock,
            'message' => $messageMock,
        );

        $viewMock->expects($this->once())->method('setVariables')->with($this->equalTo($fixture));

        $sut->setMailMessageViewData($viewMock);
    }

}