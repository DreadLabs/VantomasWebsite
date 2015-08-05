<?php
namespace DreadLabs\VantomasWebsite\Migration\Locking;

use NinjaMutex\Lock\LockInterface;

/**
 * Mutex
 *
 * Thin wrapper around the NinjaMutex\Mutex to allow usage
 * within frameworks without proper DIC.
 *
 * Basically, this swaps the constructor arguments to play
 * nicely with frameworks which doesn't allow scalar value
 * injection into services.
 */
class Mutex implements MutexInterface
{

    /**
     * @var \NinjaMutex\Mutex
     */
    private $mutex;

    /**
     * @param LockInterface $lock
     * @param string $name
     */
    public function __construct(LockInterface $lock, $name = 'typo3-cms-migration')
    {
        $this->mutex = new \NinjaMutex\Mutex($name, $lock);
    }

    /**
     * @return bool
     */
    public function isLocked()
    {
        return $this->mutex->isLocked();
    }

    /**
     * @param int $timeout Timeout in milliseconds
     * @return void
     */
    public function acquireLock($timeout)
    {
        $this->mutex->acquireLock($timeout);
    }

    /**
     * @return void
     */
    public function releaseLock()
    {
        $this->mutex->releaseLock();
    }
}
