<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Migration\Mediator;

use DreadLabs\VantomasWebsite\Migration\Exception\InvalidDirectionException;
use DreadLabs\VantomasWebsite\Migration\Exception\LockingException;
use DreadLabs\VantomasWebsite\Migration\Exception\MigrationException;
use DreadLabs\VantomasWebsite\Migration\Locking\MutexInterface;
use DreadLabs\VantomasWebsite\Migration\LoggerInterface;
use DreadLabs\VantomasWebsite\Migration\Mediator\PhinxLocking;
use DreadLabs\VantomasWebsite\Migration\MigratorInterface;

class PhinxLockingTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var MigratorInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $migrator;

    /**
     * @var MutexInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $mutex;

    /**
     * @var LoggerInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $logger;

    public function setUp()
    {
        $this->migrator = $this->getMock(MigratorInterface::class);
        $this->mutex = $this->getMock(MutexInterface::class);
        $this->logger = $this->getMock(LoggerInterface::class);
    }

    public function testItLogsEmergencyIfMutexIsLocked()
    {
        $this->setExpectedException(LockingException::class);

        $this->mutex->expects($this->once())->method('acquireLock')->willThrowException(new LockingException());
        $this->mutex->expects($this->once())->method('releaseLock')->willReturn(true);

        $this->logger->expects($this->once())->method('emergency');

        $mediator = new PhinxLocking($this->migrator, $this->mutex, $this->logger);
        $mediator->negotiate();
    }

    public function testItLogsEmergencyIfInvalidMigrationDirectionIsDetermined()
    {
        $this->setExpectedException(InvalidDirectionException::class);

        $this->migrator->expects($this->once())->method('needsToRun')->willReturn(true);
        $this->migrator->expects($this->once())->method('migrate')->willThrowException(new InvalidDirectionException());

        $this->mutex->expects($this->once())->method('acquireLock')->willReturn(true);
        $this->mutex->expects($this->once())->method('releaseLock')->willReturn(true);

        $this->logger->expects($this->once())->method('emergency');

        $mediator = new PhinxLocking($this->migrator, $this->mutex, $this->logger);
        $mediator->negotiate();
    }

    public function testItLogsEmergencyIfAMigrationExceptionOccurs()
    {
        $this->setExpectedException(MigrationException::class);

        $this->migrator->expects($this->once())->method('needsToRun')->willReturn(true);
        $this->migrator->expects($this->once())->method('migrate')->willThrowException(new MigrationException());

        $this->mutex->expects($this->once())->method('acquireLock')->willReturn(true);
        $this->mutex->expects($this->once())->method('releaseLock')->willReturn(true);

        $this->logger->expects($this->once())->method('emergency');

        $mediator = new PhinxLocking($this->migrator, $this->mutex, $this->logger);
        $mediator->negotiate();
    }

    public function testItLogsInfoIfAllMigrationsWereSuccessfullyExecuted()
    {
        $this->migrator->expects($this->once())->method('needsToRun')->willReturn(true);
        $this->migrator->expects($this->once())->method('migrate')->willReturn(42);

        $this->mutex->expects($this->once())->method('acquireLock')->willReturn(true);
        $this->mutex->expects($this->once())->method('releaseLock')->willReturn(true);

        $this->logger->expects($this->once())->method('info')->with($this->stringContains('42'));

        $mediator = new PhinxLocking($this->migrator, $this->mutex, $this->logger);
        $mediator->negotiate();
    }
}
