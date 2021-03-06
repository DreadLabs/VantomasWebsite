<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Form\Contact;

/**
 * Abstract Contact form validation contract
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
abstract class AbstractValidation
{

    /**
     * @return void
     */
    abstract protected function addPropertiesValidator();

    /**
     * @return void
     */
    abstract protected function addPersonValidator();

    /**
     * @return void
     */
    abstract protected function addMessageValidator();
}
