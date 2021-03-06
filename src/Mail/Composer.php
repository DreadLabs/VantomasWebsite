<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Mail;

use DreadLabs\VantomasWebsite\Mail\Message\ViewInterface;

/**
 * Composer
 *
 * This composer creates a message from the configuration (sender/receiver)
 * and a view to render the message finally from templates.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class Composer implements ComposerInterface
{

    /**
     * @var ConfigurationInterface
     */
    private $configuration;

    /**
     * @var MessageInterface
     */
    private $message;

    /**
     * @var ViewInterface
     */
    private $view;

    /**
     * @param ConfigurationInterface $configuration
     * @param MessageInterface $message
     * @param ViewInterface $view
     */
    public function __construct(
        ConfigurationInterface $configuration,
        MessageInterface $message,
        ViewInterface $view
    ) {
        $this->configuration = $configuration;
        $this->message = $message;
        $this->view = $view;
    }

    /**
     * @param ConveyableInterface $conveyable
     *
     * @return MessageInterface
     */
    public function compose(ConveyableInterface $conveyable)
    {
        $this->configuration->initializeFor($conveyable);

        $this->configuration->configureView($this->view);
        $this->configuration->configureMessage($this->message);

        $conveyable->setMailMessageViewData($this->view);

        $this->view->render($this->message);

        return $this->message;
    }
}
