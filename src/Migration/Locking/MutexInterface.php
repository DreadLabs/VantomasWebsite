<?php
namespace DreadLabs\VantomasWebsite\Migration\Locking;

use DreadLabs\VantomasWebsite\Migration\Exception\LockingException;

interface MutexInterface
{

    /**
     * Acquires a lock
     *
     * @param int $timeout
     *
     * @return bool
     *
     * @throws LockingException If the lock is not acquirable
     */
    public function acquireLock($timeout);

    /**
     * Releases a lock
     *
     * @return bool
     */
    public function releaseLock();
}
