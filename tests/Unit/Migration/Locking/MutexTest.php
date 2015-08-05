<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Migration\Locking;

use DreadLabs\VantomasWebsite\Migration\Locking\Mutex;
use NinjaMutex\Lock\LockInterface;

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

    public function testItReturnsTrueIfTheLockIsLocked()
    {
        $this->lock->expects($this->once())->method('isLocked')->with('typo3-cms-migration')->willReturn(true);

        $mutex = new Mutex($this->lock);

        $this->assertTrue($mutex->isLocked());
    }

    public function testItReturnsFalseIfTheLockIsNotLocked()
    {
        $this->lock->expects($this->once())->method('isLocked')->with('typo3-cms-migration')->willReturn(false);

        $mutex = new Mutex($this->lock);

        $this->assertFalse($mutex->isLocked());
    }

    public function testItAcquiresLockingOnTheLock()
    {
        $this->lock->expects($this->once())->method('acquireLock')->with('typo3-cms-migration', 42);

        $mutex = new Mutex($this->lock);
        $mutex->acquireLock(42);
    }

    public function testItReleasesLockingOnTheLock()
    {
        $this->lock->expects($this->once())->method('acquireLock')->with('typo3-cms-migration', 23)->willReturn(true);
        $this->lock->expects($this->once())->method('releaseLock')->with('typo3-cms-migration')->willReturn(true);

        $mutex = new Mutex($this->lock);
        $mutex->acquireLock(23);
        $mutex->releaseLock();
    }
}
