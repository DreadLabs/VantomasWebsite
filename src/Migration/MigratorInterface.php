<?php
namespace DreadLabs\VantomasWebsite\Migration;

use DreadLabs\VantomasWebsite\Migration\Exception\InvalidDirectionException;
use DreadLabs\VantomasWebsite\Migration\Exception\MigrationException;

interface MigratorInterface
{

   /**
    * Flags if migrations need to be executed
    *
    * @return bool
    */
    public function needsToRun();

    /**
     * Executes migrations
     *
     * @return int Version of the latest migration executed
     *
     * @throws InvalidDirectionException If the current migration version is
     *                                   younger than the migration version
     *                                   to migrate to
     * @throws MigrationException If a migration cannot be executed due of
     *                            errors (syntax, ...)
     */
    public function migrate();
}
