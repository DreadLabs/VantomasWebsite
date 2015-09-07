<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Migration\Migrator;

use DreadLabs\VantomasWebsite\Migration\Exception\InvalidDirectionException;
use DreadLabs\VantomasWebsite\Migration\Exception\MigrationException;
use DreadLabs\VantomasWebsite\Migration\Migrator\Phinx;
use DreadLabs\VantomasWebsite\Migration\OutputInterface;
use DreadLabs\VantomasWebsite\Tests\Fixture\Migration\Migrator\TestAllAdapter;
use DreadLabs\VantomasWebsite\Tests\Fixture\Migration\Migrator\TestInvalidDirectionAdapter;
use DreadLabs\VantomasWebsite\Tests\Fixture\Migration\Migrator\TestNoneAdapter;
use DreadLabs\VantomasWebsite\Tests\Fixture\Migration\Migrator\TestSomeAdapter;
use Phinx\Config\Config;
use Phinx\Config\ConfigInterface;
use Phinx\Db\Adapter\AdapterFactory;

/**
 * PhinxTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class PhinxTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var OutputInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $output;

    public function setUp()
    {
        $this->output = $this->getMock(OutputInterface::class);
    }

    public function testItDoesNotNeedToRunIfMigratedVersionsAndAvailableVersionsAreEmpty()
    {
        $this->registerTestAdapter(TestNoneAdapter::class);

        $config = $this->getConfiguration('phinx_none.yml');

        $migrator = new Phinx($config, $this->output);

        $this->assertFalse($migrator->needsToRun());
    }

    /**
     * Registers a test adapter
     *
     * @param string $className
     *
     * @return void
     */
    private function registerTestAdapter($className)
    {
        AdapterFactory::instance()->registerAdapter(
            'test',
            $className
        );
    }

    /**
     * Loads and returns a phinx configuration
     *
     * @param string $fileName
     *
     * @return ConfigInterface
     */
    private function getConfiguration($fileName)
    {
        return Config::fromYaml(
            __DIR__ . '/../../../Fixture/Migration/Migrator/' . $fileName
        );
    }

    public function testItDoesNotNeedToRunIfAllMigrationsAreExecuted()
    {
        $this->registerTestAdapter(TestAllAdapter::class);

        $config = $this->getConfiguration('phinx_all.yml');

        $migrator = new Phinx($config, $this->output);

        $this->assertFalse($migrator->needsToRun());
    }

    public function testItNeedsToRunIfThereAreSomeUnmigratedMigrations()
    {
        $this->registerTestAdapter(TestSomeAdapter::class);

        $config = $this->getConfiguration('phinx_some.yml');

        $migrator = new Phinx($config, $this->output);

        $this->assertTrue($migrator->needsToRun());
    }

    public function testItThrowsAnInvalidDirectionExceptionOnOlderUnmigratedVersions()
    {
        $this->setExpectedException(InvalidDirectionException::class);

        $this->registerTestAdapter(TestInvalidDirectionAdapter::class);

        $config = $this->getConfiguration('phinx_all.yml');

        $migrator = new Phinx($config, $this->output);
        $migrator->needsToRun();
        $migrator->migrate();
    }

    public function testItTransformsAdapterExceptionsIntoMigrationException()
    {
        $this->setExpectedException(MigrationException::class, 'Life, the universe and everything.');

        $this->registerTestAdapter(TestSomeAdapter::class);

        $config = $this->getConfiguration('phinx_some_erroneous.yml');

        $migrator = new Phinx($config, $this->output);
        $migrator->needsToRun();
        $migrator->migrate();
    }

    public function testItReturnsTheLatestVersionToMigrateTo()
    {
        $this->registerTestAdapter(TestSomeAdapter::class);

        $config = $this->getConfiguration('phinx_some.yml');

        $migrator = new Phinx($config, $this->output);
        $migrator->needsToRun();

        $this->assertSame(42, $migrator->migrate());
    }
}
