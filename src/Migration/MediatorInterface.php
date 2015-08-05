<?php
namespace DreadLabs\VantomasWebsite\Migration;

use DreadLabs\VantomasWebsite\Migration\Exception\MigrationException;

interface MediatorInterface
{

    /**
     * Negotiates the migration process
     *
     * @return void
     *
     * @throws MigrationException If something went wrong with the involved
     *                            components
     */
    public function negotiate();
}
