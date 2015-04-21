<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit;

use DreadLabs\VantomasWebsite\Mail;
use DreadLabs\VantomasWebsite\Mail\Exception\FailedRecipientsException;
use DreadLabs\VantomasWebsite\Tests\Unit\Mail\ComposerExceptionDummy;
use DreadLabs\VantomasWebsite\Tests\Unit\Mail\ConveyableDummy;
use DreadLabs\VantomasWebsite\Tests\Unit\Mail\LoggerDummy;
use DreadLabs\VantomasWebsite\Tests\Unit\Mail\MessageDummy;

class MailTest extends \PHPUnit_Framework_TestCase
{

    public function testFailedRecipientsExceptionIsCatchedAndForwardedToLogger()
    {
        /*
        $this->setExpectedException(
            FailedRecipientsException::class,
            'One or more recipients were not accepted for delivery.',
            1425333667
        );
        */

        $messageMock = $this->getMock(MessageDummy::class);
        $messageMock->expects($this->once())->method('send')->willThrowException(new FailedRecipientsException());

        $composerMock = $this->getMock(ComposerExceptionDummy::class);
        $composerMock->expects($this->once())->method('compose')->willReturn($messageMock);

        $loggerMock = $this->getMock(LoggerDummy::class);
        $loggerMock->expects($this->once())->method('alert');

        $sut = new Mail($composerMock, $loggerMock);

        $conveyableMock = $this->getMock(ConveyableDummy::class);

        $sut->convey($conveyableMock);
    }
}