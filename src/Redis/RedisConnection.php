<?php

namespace HongXunPan\DB\Redis;

use HongXunPan\DB\DBConnectionContract;

class RedisConnection extends DBConnectionContract
{
    /**
     * @param $connection
     * @param string $connectName
     * @return DBConnectionContract|RedisConnection
     * @noinspection PhpReturnDocTypeMismatchInspection
     */
    public function __construct($connection, $connectName = 'default')
    {
        return parent::__construct($connection, $connectName);
    }

    /**
     * @return \Redis
     * @deprecated
     * @author HongXunPan <me@kangxuanpeng.com>
     * @date 2022-10-12 01:55
     * @noinspection PhpDeprecationInspection
     */
    public function getConnection()
    {
        return parent::getConnection();
    }

    protected function recordLog($name, $arguments)
    {
    }
}
