<?php
namespace DreadLabs\VantomasWebsite\Http\NetHttpAdapter;

use DreadLabs\VantomasWebsite\Http\ResponseInterface;

/**
 * Adapter to \Net_Http_Response
 */
class Response implements ResponseInterface
{

    /**
     * @var \Net_Http_Response
     */
    private $response;

    /**
     * @param int $status
     * @param array $headers
     * @param string $body
     */
    public function __construct($status, array $headers, $body = '')
    {
        $this->response = new \Net_Http_Response((int) $status, $headers, $body);
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->response->getStatus();
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->response->getBody();
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->response->getHeaders();
    }
}
