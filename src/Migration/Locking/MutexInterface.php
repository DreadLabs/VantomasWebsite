<?php
namespace DreadLabs\VantomasWebsite\Migration\Locking;

interface MutexInterface
{

    /**
     * Flags if the mutex is locked already
     *
     * @return bool
     */
    public function isLocked();

    /**
     * Acquires a lock
     *
     * @param int $timeout
     * @return void
     */
    public function acquireLock($timeout);

    /**
     * Releases a lock
     *
     * @return void
     */
    public function releaseLock();
}
