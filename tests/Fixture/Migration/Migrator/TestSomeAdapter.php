<?php
namespace DreadLabs\VantomasWebsite\Tests\Fixture\Migration\Migrator;

use Phinx\Db\Adapter\AdapterInterface;
use Phinx\Db\Table;
use Phinx\Db\Table\Column;
use Phinx\Db\Table\ForeignKey;
use Phinx\Db\Table\Index;
use Phinx\Migration\MigrationInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestSomeAdapter implements AdapterInterface
{

    /**
     * @var array
     */
    private $options = array();

    /**
     * @var OutputInterface
     */
    private $output;

    /**
     * Get all migrated version numbers.
     *
     * @return array
     */
    public function getVersions()
    {
        return array(
            23,
        );
    }

    /**
     * Set adapter configuration options.
     *
     * @param  array $options
     * @return AdapterInterface
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * Get all adapter options.
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Check if an option has been set.
     *
     * @param  string $name
     * @return boolean
     */
    public function hasOption($name)
    {
        return isset($this->options[$name]);
    }

    /**
     * Get a single adapter option, or null if the option does not exist.
     *
     * @param  string $name
     * @return mixed
     */
    public function getOption($name)
    {
        return $this->options[$name];
    }

    /**
     * Sets the console output.
     *
     * @param OutputInterface $output Output
     * @return AdapterInterface
     */
    public function setOutput(OutputInterface $output)
    {
        $this->output = $output;
    }

    /**
     * Gets the console output.
     *
     * @return OutputInterface
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * Records a migration being run.
     *
     * @param MigrationInterface $migration Migration
     * @param string $direction Direction
     * @param int $startTime Start Time
     * @param int $endTime End Time
     * @return AdapterInterface
     */
    public function migrated(MigrationInterface $migration, $direction, $startTime, $endTime)
    {

        return $this;
    }

    /**
     * Does the schema table exist?
     *
     * @deprecated use hasTable instead.
     * @return boolean
     */
    public function hasSchemaTable()
    {
        return true;
    }

    /**
     * Creates the schema table.
     *
     * @return void
     */
    public function createSchemaTable()
    {
        // TODO: Implement createSchemaTable() method.
    }

    /**
     * Returns the adapter type.
     *
     * @return string
     */
    public function getAdapterType()
    {
        return $this->getOption('adapter');
    }

    /**
     * Initializes the database connection.
     *
     * @throws \RuntimeException When the requested database driver is not installed.
     * @return void
     */
    public function connect()
    {
        // TODO: Implement connect() method.
    }

    /**
     * Closes the database connection.
     *
     * @return void
     */
    public function disconnect()
    {
        // TODO: Implement disconnect() method.
    }

    /**
     * Does the adapter support transactions?
     *
     * @return boolean
     */
    public function hasTransactions()
    {
        return false;
    }

    /**
     * Begin a transaction.
     *
     * @return void
     */
    public function beginTransaction()
    {
        // TODO: Implement beginTransaction() method.
    }

    /**
     * Commit a transaction.
     *
     * @return void
     */
    public function commitTransaction()
    {
        // TODO: Implement commitTransaction() method.
    }

    /**
     * Rollback a transaction.
     *
     * @return void
     */
    public function rollbackTransaction()
    {
        // TODO: Implement rollbackTransaction() method.
    }

    /**
     * Executes a SQL statement and returns the number of affected rows.
     *
     * @param string $sql SQL
     * @return int
     */
    public function execute($sql)
    {
        // TODO: Implement execute() method.
    }

    /**
     * Executes a SQL statement and returns the result as an array.
     *
     * @param string $sql SQL
     * @return array
     */
    public function query($sql)
    {
        // TODO: Implement query() method.
    }

    /**
     * Executes a query and returns only one row as an array.
     *
     * @param string $sql SQL
     * @return array
     */
    public function fetchRow($sql)
    {
        // TODO: Implement fetchRow() method.
    }

    /**
     * Executes a query and returns an array of rows.
     *
     * @param string $sql SQL
     * @return array
     */
    public function fetchAll($sql)
    {
        // TODO: Implement fetchAll() method.
    }

    /**
     * Quotes a table name for use in a query.
     *
     * @param string $tableName Table Name
     * @return string
     */
    public function quoteTableName($tableName)
    {
        // TODO: Implement quoteTableName() method.
    }

    /**
     * Quotes a column name for use in a query.
     *
     * @param string $columnName Table Name
     * @return string
     */
    public function quoteColumnName($columnName)
    {
        // TODO: Implement quoteColumnName() method.
    }

    /**
     * Checks to see if a table exists.
     *
     * @param string $tableName Table Name
     * @return boolean
     */
    public function hasTable($tableName)
    {
        return true;
    }

    /**
     * Creates the specified database table.
     *
     * @param Table $table Table
     * @return void
     */
    public function createTable(Table $table)
    {
        // TODO: Implement createTable() method.
    }

    /**
     * Renames the specified database table.
     *
     * @param string $tableName Table Name
     * @param string $newName New Name
     * @return void
     */
    public function renameTable($tableName, $newName)
    {
        // TODO: Implement renameTable() method.
    }

    /**
     * Drops the specified database table.
     *
     * @param string $tableName Table Name
     * @return void
     */
    public function dropTable($tableName)
    {
        // TODO: Implement dropTable() method.
    }

    /**
     * Returns table columns
     *
     * @param string $tableName Table Name
     * @return Column[]
     */
    public function getColumns($tableName)
    {
        // TODO: Implement getColumns() method.
    }

    /**
     * Checks to see if a column exists.
     *
     * @param string $tableName Table Name
     * @param string $columnName Column Name
     * @return boolean
     */
    public function hasColumn($tableName, $columnName)
    {
        return true;
    }

    /**
     * Adds the specified column to a database table.
     *
     * @param Table $table Table
     * @param Column $column Column
     * @return void
     */
    public function addColumn(Table $table, Column $column)
    {
        // TODO: Implement addColumn() method.
    }

    /**
     * Renames the specified column.
     *
     * @param string $tableName Table Name
     * @param string $columnName Column Name
     * @param string $newColumnName New Column Name
     * @return void
     */
    public function renameColumn($tableName, $columnName, $newColumnName)
    {
        // TODO: Implement renameColumn() method.
    }

    /**
     * Change a table column type.
     *
     * @param string $tableName Table Name
     * @param string $columnName Column Name
     * @param Column $newColumn New Column
     * @return Table
     */
    public function changeColumn($tableName, $columnName, Column $newColumn)
    {
        // TODO: Implement changeColumn() method.
    }

    /**
     * Drops the specified column.
     *
     * @param string $tableName Table Name
     * @param string $columnName Column Name
     * @return void
     */
    public function dropColumn($tableName, $columnName)
    {
        // TODO: Implement dropColumn() method.
    }

    /**
     * Checks to see if an index exists.
     *
     * @param string $tableName Table Name
     * @param mixed $columns Column(s)
     * @return boolean
     */
    public function hasIndex($tableName, $columns)
    {
        return true;
    }

    /**
     * Adds the specified index to a database table.
     *
     * @param Table $table Table
     * @param Index $index Index
     * @return void
     */
    public function addIndex(Table $table, Index $index)
    {
        // TODO: Implement addIndex() method.
    }

    /**
     * Drops the specified index from a database table.
     *
     * @param string $tableName
     * @param mixed $columns Column(s)
     * @return void
     */
    public function dropIndex($tableName, $columns)
    {
        // TODO: Implement dropIndex() method.
    }

    /**
     * Drops the index specified by name from a database table.
     *
     * @param string $tableName
     * @param string $indexName
     * @return void
     */
    public function dropIndexByName($tableName, $indexName)
    {
        // TODO: Implement dropIndexByName() method.
    }

    /**
     * Checks to see if a foreign key exists.
     *
     * @param string $tableName
     * @param string[] $columns Column(s)
     * @param string $constraint Constraint name
     * @return boolean
     */
    public function hasForeignKey($tableName, $columns, $constraint = null)
    {
        return true;
    }

    /**
     * Adds the specified foreign key to a database table.
     *
     * @param Table $table
     * @param ForeignKey $foreignKey
     * @return void
     */
    public function addForeignKey(Table $table, ForeignKey $foreignKey)
    {
        // TODO: Implement addForeignKey() method.
    }

    /**
     * Drops the specified foreign key from a database table.
     *
     * @param string $tableName
     * @param string[] $columns Column(s)
     * @param string $constraint Constraint name
     * @return void
     */
    public function dropForeignKey($tableName, $columns, $constraint = null)
    {
        // TODO: Implement dropForeignKey() method.
    }

    /**
     * Returns an array of the supported Phinx column types.
     *
     * @return array
     */
    public function getColumnTypes()
    {
        return array();
    }

    /**
     * Checks that the given column is of a supported type.
     *
     * @param  Column $column
     * @return boolean
     */
    public function isValidColumnType(Column $column)
    {
        return true;
    }

    /**
     * Converts the Phinx logical type to the adapter's SQL type.
     *
     * @param string $type
     * @param integer $limit
     * @return string
     */
    public function getSqlType($type, $limit = null)
    {
        return 'test';
    }

    /**
     * Creates a new database.
     *
     * @param string $name Database Name
     * @param array $options Options
     * @return void
     */
    public function createDatabase($name, $options = array())
    {
        // TODO: Implement createDatabase() method.
    }

    /**
     * Checks to see if a database exists.
     *
     * @param string $name Database Name
     * @return boolean
     */
    public function hasDatabase($name)
    {
        return true;
    }

    /**
     * Drops the specified database.
     *
     * @param string $name Database Name
     * @return void
     */
    public function dropDatabase($name)
    {
        // TODO: Implement dropDatabase() method.
    }

    /**
     * Inserts data into the table
     *
     * @param Table $table where to insert data
     * @param array $columns column names
     * @param $data
     */
    public function insert(Table $table, $columns, $data)
    {
        // TODO: Implement insert() method.
    }
}
