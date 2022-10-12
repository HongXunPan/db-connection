<?php

namespace HongXunPan\DB\Mysql\Mysqli;

use HongXunPan\DB\DBContract;

/**
 * @method static MysqliConnection connection($connectName = 'default') 获取连接实例
 *
 * Created by PhpStorm At 2022/10/12 15:19.
 * Author: HongXunPan
 * Email: me@kangxuanpeng.com
 */
class Mysqli extends DBContract
{
    protected $connectionClass = MysqliConnection::class;

    public static function setConfig(array $config = [], $connectName = 'default', array $options = [])
    {
        $default = [
            'host' => '127.0.0.1',
            'port' => 3306,
            'username' => '',
            'password' => '',
            'database' => ''
        ];
        $connectConfig = array_merge($default, $config);
        $connectConfig['options'] = $options;
        parent::saveConfig($connectConfig, $connectName);
    }

    /**
     * @param \mysqli $connection
     * @author HongXunPan <me@kangxuanpeng.com>
     * @date 2022-10-12 14:58
     */
    protected function ping($connection)
    {
        if (mysqli_ping($connection)) {
            return $connection;
        }
        return false;
    }

    protected function connect(array $config)
    {
        $connection = new \mysqli(
            $config['host'],
            $config['username'],
            $config['password'],
            $config['database'],
            $config['port']
        );
        $error = mysqli_connect_error();
        if ($error) {
            throw new MysqliException('mysql connect fail:' . $error);
        }
        return $connection;
    }
}
