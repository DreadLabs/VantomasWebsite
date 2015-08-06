<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Mail\Message;

use DreadLabs\VantomasWebsite\Mail\MessageInterface;

/**
 * ViewInterface
 *
 * Gives a mail message view capabilites to be generated from
 * templates.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ViewInterface
{

    /**
     * @param $template
     *
     * @return void
     */
    public function setTemplate($template);

    /**
     * @param array $variables
     *
     * @return void
     */
    public function setVariables(array $variables);

    /**
     * @param MessageInterface $message
     *
     * @return void
     */
    public function render(MessageInterface $message);
}
