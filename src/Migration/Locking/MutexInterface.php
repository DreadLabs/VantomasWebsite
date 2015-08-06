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

/**
 * MutexInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
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
