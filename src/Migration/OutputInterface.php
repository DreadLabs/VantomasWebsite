<?php
namespace DreadLabs\VantomasWebsite\Migration;

/**
 * OutputInterface
 *
 * Wrapper around the Symfony OutputInterface in order to play nicely with
 * frameworks with limited support for injecting dependencies on a class level.
 */
interface OutputInterface extends \Symfony\Component\Console\Output\OutputInterface
{
}
