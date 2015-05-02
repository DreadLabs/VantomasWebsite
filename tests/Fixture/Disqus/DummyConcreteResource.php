<?php
namespace DreadLabs\VantomasWebsite\Tests\Fixture\Disqus;

use DreadLabs\VantomasWebsite\Disqus\Resource\AbstractResource;

class DummyConcreteResource extends AbstractResource
{

    protected $foo = '';

    protected $bar = '';

    public function setFoo($foo)
    {
        $this->foo = $foo;
    }

    public function setBar($bar) {
        $this->bar = $bar;
    }

    public function getPath(array $parameters)
    {
        return parent::getPath($parameters);
    }
}
