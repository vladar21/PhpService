<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
    /**
     * The directory that holds the Migrations
     * and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to
     * use if no other is specified.
     */
    public string $defaultGroup = 'default';

    /**
     * The default database connection.
     */
    public array $default = [
        'DSN'      => ' postgres://ezfyiejucncezp:c65d8c4acce60609b48afed78b2e9257636d9395a1c8bd08a8089a44d99197ef@ec2-54-195-120-0.eu-west-1.compute.amazonaws.com:5432/df48n3jmhiipp0',
//        'hostname' => 'localhost',
//        'username' => 'root',
//        'password' => 'root',
//        'database' => 'phpservicedb',
//        'DBDriver' => 'MySQLi',
//        'DBPrefix' => '',
//        'pConnect' => false,
//        'DBDebug'  => true,
//        'charset'  => 'utf8mb4',
//        'DBCollat' => 'utf8mb4_0900_ai_ci',
//        'swapPre'  => '',
//        'encrypt'  => false,
//        'compress' => false,
//        'strictOn' => false,
//        'failover' => [],
//        'port'     => 3306,
    ];

    /**
     * This database connection is used when
     * running PHPUnit database tests.
     */
    public array $tests = [
        'DSN'         => '',
        'hostname'    => '127.0.0.1',
        'username'    => '',
        'password'    => '',
        'database'    => ':memory:',
        'DBDriver'    => 'SQLite3',
        'DBPrefix'    => 'db_',  // Needed to ensure we're working correctly with prefixes live. DO NOT REMOVE FOR CI DEVS
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'utf8',
        'DBCollat'    => 'utf8_general_ci',
        'swapPre'     => '',
        'encrypt'     => false,
        'compress'    => false,
        'strictOn'    => false,
        'failover'    => [],
        'port'        => 3306,
        'foreignKeys' => true,
        'busyTimeout' => 1000,
    ];

    public function __construct()
    {
        // В конструкторе устанавливаем значения переменных класса
//        $this->default['DSN'] = getenv('DATABASE_URL') ? 'pgsql:host=ec2-54-195-120-0.eu-west-1.compute.amazonaws.com;port=5432;dbname=df48n3jmhiipp0;sslmode=require' : 'localhost';
//        $this->default['hostname'] = getenv('DATABASE_URL') ? 'ec2-54-195-120-0.eu-west-1.compute.amazonaws.com' : 'localhost';
//        $this->default['username'] = getenv('DATABASE_URL') ? 'ezfyiejucncezp': 'root';
//        $this->default['password'] = getenv('DATABASE_URL') ? 'c65d8c4acce60609b48afed78b2e9257636d9395a1c8bd08a8089a44d99197ef' : 'root';
//        $this->default['database'] = getenv('DATABASE_URL') ? 'df48n3jmhiipp0' : 'phpservicedb';
//        $this->default['DBDriver'] = getenv('DATABASE_URL') ? 'Postgre' : 'MySQLi';
        parent::__construct();

        // Ensure that we always set the database group to 'tests' if
        // we are currently running an automated test suite, so that
        // we don't overwrite live data on accident.
        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }

}
