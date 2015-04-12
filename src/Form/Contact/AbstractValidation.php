<?php
namespace DreadLabs\VantomasWebsite\Form\Contact;

/**
 * Abstract Contact form validation contract
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
