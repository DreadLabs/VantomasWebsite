<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Fixture\Disqus;

use DreadLabs\VantomasWebsite\Disqus\Resource\AbstractResource;

/**
 * DummyConcreteResource
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class DummyConcreteResource extends AbstractResource
{

    /**
     * @var string
     */
    protected $foo = '';

    /**
     * @var string
     */
    protected $bar = '';

    /**
     * {@inheritdoc}
     */
    public function setFoo($foo)
    {
        $this->foo = $foo;
    }

    /**
     * {@inheritdoc}
     */
    public function setBar($bar) {
        $this->bar = $bar;
    }

    /**
     * {@inheritdoc}
     */
    public function getPath(array $parameters)
    {
        return parent::getPath($parameters);
    }
}
