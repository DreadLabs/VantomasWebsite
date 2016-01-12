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

/**
 * ReCaptchaResponse
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class ReCaptchaResponse implements DataInterface
{

    /**
     * The actual g-recaptcha-response value
     *
     * @var string
     */
    private $value;

    /**
     * Constructor
     *
     * @param string $response
     *
     * @return self
     */
    private function __construct($response)
    {
        $this->value = $response;
    }

    /**
     * Creates the ReCaptchaResponse data object
     *
     * @param string $string The value
     *
     * @return self
     *
     * @throws \InvalidArgumentException
     */
    public static function fromString($string)
    {
        if (is_null($string) || empty($string) || !is_string($string)) {
            throw new \InvalidArgumentException('The given ReCaptcha response data is invalid.', 1452283305);
        }

        $value = (string) $string;

        $value = filter_var(
            $value,
            FILTER_SANITIZE_STRING,
            FILTER_FLAG_STRIP_LOW
            | FILTER_FLAG_STRIP_HIGH
            | !FILTER_FLAG_ENCODE_LOW
            | !FILTER_FLAG_ENCODE_HIGH
            | FILTER_FLAG_NO_ENCODE_QUOTES
        );

        $value = trim($value);

        return new static($value);
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
