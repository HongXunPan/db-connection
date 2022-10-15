<?php

namespace HongXunPan\DB;

use Exception;

abstract class DBContract implements DBInterface
{
    protected static $instance;

    protected $connectConfig;
    protected $connection;

    protected $connectionClass;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    /**
     * @return DBContract
     * @author HongXunPan <me@kangxuanpeng.com>
     * @date 2022-10-11 15:30
     */
    protected static function getInstance()
    {
        $class = get_called_class();
        if (!isset(static::$instance[$class])) {
            static::$instance[$class] = new $class();
        }
        return static::$instance[$class];
    }

    protected static function saveConfig($config, $connectName)
    {
        $instance = self::getInstance();
        $instance->connectConfig[$connectName] = $config;
    }

    abstract protected function ping($connection);

    abstract protected function connect(array $config);

    final protected static function getConnection($connectName = 'default')
    {
        $instance = self::getInstance();
        if (isset($instance->connection[$connectName])) {
            $connection = $instance->ping($instance->connection[$connectName]);
            if ($connection !== false) {
                return $connection;
            }
        }

        if (!isset($instance->connectConfig[$connectName])) {
            if ($connectName == 'default') {
                $instance::setConfig();
            } else {
                throw new DBException("connection '$connectName' config not set");
            }
        }
        $config = $instance->connectConfig[$connectName];
        try {
            $connection = $instance->connect($config);
        } catch (Exception $e) {
            $type = get_class($e);
            throw new DBException("connection '$connectName' connect fail, reason: {$e->getMessage()}, type: $type");
        }
        $instance->connection[$connectName] = $connection;
        return $connection;
    }

    public static function connection($connectName = 'default')
    {
        $connectionClass = self::getInstance()->connectionClass;
        if (!is_subclass_of($connectionClass, DBConnectionContract::class)) {
            throw new DBException('connection class error, must be extends DBConnectionContract');
        }
        return new $connectionClass(self::getConnection($connectName), $connectName);
    }
}
