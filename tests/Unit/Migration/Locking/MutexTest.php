<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Migration\Locking;

use DreadLabs\VantomasWebsite\Migration\Exception\LockingException;
use DreadLabs\VantomasWebsite\Migration\Locking\Mutex;
use NinjaMutex\Lock\LockInterface;

/**
 * MutexTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class MutexTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var LockInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $lock;

    public function setUp()
    {
        $this->lock = $this->getMock(LockInterface::class);
    }

    public function testItThrowsALockingExceptionIfLockCantBeAcquired()
    {
        $this->setExpectedException(LockingException::class);

        $this->lock->expects($this->once())->method('acquireLock')->with('typo3-cms-migration', 42)->willReturn(false);
        $this->lock->expects($this->never())->method('releaseLock');

        $mutex = new Mutex($this->lock);
        $mutex->acquireLock(42);
    }

    public function testItAcquiresLockingOnTheLock()
    {
        $this->lock->expects($this->once())->method('acquireLock')->with('typo3-cms-migration', 42)->willReturn(true);
        $this->lock->expects($this->once())->method('releaseLock')->willReturn(true);

        $mutex = new Mutex($this->lock);
        $this->assertTrue($mutex->acquireLock(42));
    }

    public function testItReleasesLockingOnTheLock()
    {
        $this->lock->expects($this->once())->method('acquireLock')->with('typo3-cms-migration', 23)->willReturn(true);
        $this->lock->expects($this->once())->method('releaseLock')->with('typo3-cms-migration')->willReturn(true);

        $mutex = new Mutex($this->lock);
        $this->assertTrue($mutex->acquireLock(23));
        $this->assertTrue($mutex->releaseLock());
    }
}
