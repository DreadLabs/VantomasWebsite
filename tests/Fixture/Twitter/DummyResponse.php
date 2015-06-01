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

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return 200;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        // TODO: Implement getHeaders() method.
    }
}
