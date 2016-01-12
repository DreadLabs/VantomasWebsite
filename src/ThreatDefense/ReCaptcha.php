<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\ThreatDefense;

use DreadLabs\VantomasWebsite\Http\ClientInterface;

/**
 * ReCaptcha
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class ReCaptcha implements ControlInterface
{

    /**
     * The Google ReCaptcha API endpoint
     *
     * @const string
     */
    const API_ENDPOINT = 'https://www.google.com/recaptcha/api/siteverify';

    /**
     * The ReCaptcha server integration secret
     *
     * @var string
     */
    private $secret;

    /**
     * A HTTP Client
     *
     * @var ClientInterface
     */
    private $client;

    /**
     * Constructor
     *
     * @param string $secret The ReCaptcha server integration secret
     * @param ClientInterface $client A HTTP Client
     */
    public function __construct($secret, ClientInterface $client)
    {
        $this->secret = (string) $secret;
        $this->client = $client;
    }

    /**
     * Flags if the used Control impl detected a threat
     *
     * @param DataInterface $data The incoming data to investigate
     *
     * @return bool
     */
    public function isThreat(DataInterface $data)
    {
        $response = $this->client->post(
            self::API_ENDPOINT,
            [
                'secret' => $this->secret,
                'response' => $data->getValue(),
            ]
        );

        if (!$response->isSuccess()) {
            return true;
        }

        $validation = json_decode($response->getBody());

        if (is_null($validation) || !$validation->success) {
            return true;
        }

        return false;
    }
}
