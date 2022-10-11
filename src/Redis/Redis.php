<?php

namespace HongXunPan\DB\Redis;

use HongXunPan\DB\DBContract;

class Redis extends DBContract
{
    /**
     * @param array $config
     * default:
     * 'host' => '127.0.0.1',
     * 'port' => 6379,
     * 'timeout' => 0.0,
     * 'reserved' => null,
     * 'retryInterval' => 0,
     * 'readTimeout' => 0.0
     * @param string $connectName default: default
     * @param array $options
     * @see $redis->setOption()
     * @author HongXunPan <me@kangxuanpeng.com>
     * @date 2022-10-05 16:18
     */
    public static function setConfig(array $config = [], $connectName = 'default', array $options = [])
    {
        $default = [
            'host' => '127.0.0.1',
            'port' => 6379,
            'timeout' => 0.0,
            'reserved' => null,
            'retryInterval' => 0,
            'readTimeout' => 0.0
        ];
        $config = array_merge($default, $config);
        $config['options'] = $options;
        parent::saveConfig($config, $connectName);
    }

    public static function connection($connectName = 'default')
    {
        return new RedisConnection(self::getConnection($connectName));
    }

    /**
     * @param \Redis $connection
     * @author HongXunPan <me@kangxuanpeng.com>
     * @date 2022-10-12 01:48
     */
    protected function ping($connection)
    {
        if ($connection->ping() === true) {
            return $connection;
        }
        return false;
    }

    protected function connect(array $config)
    {
        $redis = new \Redis();
        $redis->connect(
            $config['host'],
            $config['port'],
            $config['timeout'],
            $config['reserved'],
            $config['retryInterval'],
            $config['readTimeout']
        );
        $options = $config['options'];
        foreach ($options as $optionKey => $option) {
            $redis->setOption($optionKey, $option);
        }
        return $redis;
    }
}
