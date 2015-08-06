<?php
namespace DreadLabs\VantomasWebsite\Migration\Mediator;

use DreadLabs\VantomasWebsite\Migration\Exception\InvalidDirectionException;
use DreadLabs\VantomasWebsite\Migration\Exception\MigrationException;
use DreadLabs\VantomasWebsite\Migration\Exception\LockingException;
use DreadLabs\VantomasWebsite\Migration\Locking\MutexInterface;
use DreadLabs\VantomasWebsite\Migration\LoggerInterface;
use DreadLabs\VantomasWebsite\Migration\MediatorInterface;
use DreadLabs\VantomasWebsite\Migration\MigratorInterface;

/**
 * PhinxLocking
 *
 * Mediates the phinx migrator and a mutex lock to allow an application to
 * switch to maintenance mode if something went wrong.
 */
class PhinxLocking implements MediatorInterface
{

    /**
     * @var MigratorInterface
     */
    private $migrator;

    /**
     * The mutex
     *
     * @var MutexInterface
     */
    private $mutex;

    /**
     * The logger
     *
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Constructor
     *
     * @param MigratorInterface $migrator The migrator
     * @param MutexInterface $mutex The Mutex
     * @param LoggerInterface $logger The logger
     */
    public function __construct(
        MigratorInterface $migrator,
        MutexInterface $mutex,
        LoggerInterface $logger
    ) {
        $this->migrator = $migrator;
        $this->mutex = $mutex;
        $this->logger = $logger;
    }

    /**
     * Negotiates the migration process
     *
     * @return void
     *
     * @throws MigrationException If something went wrong with the involved
     *                            components
     */
    public function negotiate()
    {
        try {
            $this->mutex->acquireLock(1000);
            $this->executeMigrations();
        } catch (LockingException $exc) {
            $this->logger->emergency($exc->getMessage());

            throw $exc;
        } catch (InvalidDirectionException $exc) {
            $this->logger->emergency('The version to migrate to is older than the current one.');

            throw $exc;
        } catch (MigrationException $exc) {
            $this->logger->emergency('Migration of version ' . $exc->getCode() . ' failed.', array($exc->getMessage()));

            throw $exc;
        } finally {
            $this->mutex->releaseLock();
        }
    }

    /**
     * Executes migrations
     *
     * @return void
     */
    private function executeMigrations()
    {
        if ($this->migrator->needsToRun()) {
            $latestVersion = $this->migrator->migrate();
            $this->logger->info('Migrate all migrations up to version ' . $latestVersion . '.');
        }
    }
}
