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

use DreadLabs\VantomasWebsite\Mail\Carrier;
use DreadLabs\VantomasWebsite\Mail\Exception\FailedRecipientsException;

/**
 * CarrierTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class CarrierTest extends \PHPUnit_Framework_TestCase
{

    public function testFailedRecipientsExceptionIsCatchedAndForwardedToLogger()
    {
        $messageMock = $this->getMock(MessageDummy::class);
        $messageMock->expects($this->once())->method('send')->willThrowException(new FailedRecipientsException());

        $composerMock = $this->getMock(ComposerExceptionDummy::class);
        $composerMock->expects($this->once())->method('compose')->willReturn($messageMock);

        $loggerMock = $this->getMock(LoggerDummy::class);
        $loggerMock->expects($this->once())->method('alert');

        $sut = new Carrier($composerMock, $loggerMock);

        $conveyableMock = $this->getMock(ConveyableDummy::class);

        $sut->convey($conveyableMock);
    }
}
