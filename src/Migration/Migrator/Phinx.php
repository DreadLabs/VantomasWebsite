<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Migration\Migrator;

use DreadLabs\VantomasWebsite\Migration\Exception\InvalidDirectionException;
use DreadLabs\VantomasWebsite\Migration\Exception\MigrationException;
use DreadLabs\VantomasWebsite\Migration\MigratorInterface;
use DreadLabs\VantomasWebsite\Migration\OutputInterface;
use Phinx\Config\ConfigInterface;
use Phinx\Migration\Manager;
use Phinx\Migration\MigrationInterface;

/**
 * Phinx
 *
 * Adapts the phinx migration manager
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class Phinx implements MigratorInterface
{

    /**
     * @var Manager
     */
    private $manager;

    /**
     * @var string
     */
    private $environment;

    /**
     * @var array
     */
    private $migratedVersions = array();

    /**
     * @var array
     */
    private $availableVersions = array();

    /**
     * @var int
     */
    private $currentVersion;

    /**
     * Constructor
     *
     * @param ConfigInterface $configuration
     * @param OutputInterface $output
     * @param string $environment
     */
    public function __construct(ConfigInterface $configuration, OutputInterface $output, $environment = 'default')
    {
        $this->manager = new Manager($configuration, $output);
        $this->environment = $environment;
    }

    /**
     * Flags if migrations need to be executed
     *
     * @return bool
     */
    public function needsToRun()
    {
        $this->initializeVersions();

        if (empty($this->migratedVersions) && empty($this->availableVersions)) {
            return false;
        }

        $needsToRun = $this->hasUnmigratedVersions();

        return $needsToRun;
    }

    /**
     * Initializes the migrated, available and current versions
     *
     * @return void
     */
    private function initializeVersions()
    {
        $env = $this->manager->getEnvironment($this->environment);

        $this->migratedVersions = $env->getVersions();
        $this->availableVersions = $this->manager->getMigrations();
        $this->currentVersion = $env->getCurrentVersion();
    }

    /**
     * Flags if unmigrated versions exists
     *
     * @return bool
     */
    private function hasUnmigratedVersions()
    {
        $needsToRun = false;

        foreach ($this->availableVersions as $migration) {
            $isTargetMigrated = in_array($migration->getVersion(), $this->migratedVersions);

            if ($isTargetMigrated) {
                continue;
            }

            $needsToRun = true;
            break;
        }

        return $needsToRun;
    }

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
    public function migrate()
    {
        $targetVersion = max(array_merge($this->migratedVersions, array_keys($this->availableVersions)));
        $direction = $targetVersion > $this->currentVersion ? MigrationInterface::UP : MigrationInterface::DOWN;

        if ($direction === MigrationInterface::DOWN) {
            throw new InvalidDirectionException();
        }

        try {
            $this->manager->migrate($this->environment);
        } catch (\Exception $exc) {
            throw new MigrationException($exc->getMessage());
        }

        return $targetVersion;
    }
}
