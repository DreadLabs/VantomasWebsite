<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Twitter;

use DreadLabs\VantomasWebsite\Twitter\CacheInterface;

class DummyCache implements CacheInterface
{

    /**
     * @param string $entryIdentifier
     * @return boolean
     */
    public function has($entryIdentifier)
    {
        // TODO: Implement has() method.
    }

    /**
     * @param string $entryIdentifier
     * @param mixed $data
     * @param array $tags
     * @param int $lifetime
     * @return void
     */
    public function set($entryIdentifier, $data, array $tags = array(), $lifetime = null)
    {
        // TODO: Implement set() method.
    }

    /**
     * @param string $entryIdentifier
     * @return mixed
     */
    public function get($entryIdentifier)
    {
        // TODO: Implement get() method.
    }
}
