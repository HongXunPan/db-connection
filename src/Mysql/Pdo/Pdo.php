<?php

namespace HongXunPan\DB\Mysql\Pdo;

use Exception;
use HongXunPan\DB\DBContract;

/**
 * @method static PdoConnection connection(string $connectName = 'default')
 * @method static \PDO getConnection(string $connectName = 'default')
 *
 * Created by PhpStorm At 2022/10/13 00:45.
 * Author: HongXunPan
 * Email: me@kangxuanpeng.com
 * @noinspection SpellCheckingInspection
 */
class Pdo extends DBContract
{
    protected $connectionClass = PdoConnection::class;

    public static function setConfig(array $config = [], $connectName = 'default', array $options = [])
    {
        $default = [
            'host' => '127.0.0.1',
            'port' => 3306,
            'username' => '',
            'password' => '',
        ];
        $dbConfig = array_merge($default, $config);
        $dsn = 'mysql:host=' . $dbConfig['host'] . ';port:' . $dbConfig['port'];
        $config = [
            'dsn' => $dsn,
            'username' => $dbConfig['username'],
            'password' => $dbConfig['password'],
            'options' => $options,
        ];

        parent::saveConfig($config, $connectName);
    }

    /**
     * @param \PDO $connection
     * @return \PDO|false
     * @author HongXunPan <me@kangxuanpeng.com>
     * @date 2022-10-11 16:14
     */
    protected function ping($connection)
    {
        try {
            if ($connection->getAttribute(\PDO::ATTR_SERVER_INFO)) {
                return $connection;
            }
        } catch (Exception $e) {
        }
        return false;
    }

    protected function connect(array $config)
    {
        return new \PDO($config['dsn'], $config['username'], $config['password'], $config['options']);
    }
}
