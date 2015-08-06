<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Migration\Locking;

use DreadLabs\VantomasWebsite\Migration\Exception\LockingException;
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
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
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
     * @param int $timeout Timeout in milliseconds
     *
     * @return bool
     *
     * @throws LockingException If the lock is not acquirable
     */
    public function acquireLock($timeout)
    {
        $isAcquired = $this->mutex->acquireLock($timeout);

        if (!$isAcquired) {
            throw new LockingException('Lock cannot be acquired.', 1438871269);
        }

        return $isAcquired;
    }

    /**
     * @return bool
     */
    public function releaseLock()
    {
        return $this->mutex->releaseLock();
    }
}
