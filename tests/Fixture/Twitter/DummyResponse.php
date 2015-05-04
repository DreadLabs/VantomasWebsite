<?php
namespace DreadLabs\VantomasWebsite\Tests\Fixture\Twitter;

use DreadLabs\VantomasWebsite\Http\ResponseInterface;

class DummyResponse implements ResponseInterface
{

    /**
     * @return string
     */
    public function getBody()
    {
        return file_get_contents(__DIR__ . '/DummyToken.json');
    }
}
