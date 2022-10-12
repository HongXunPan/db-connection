<?php

namespace HongXunPan\DB\Redis;

use HongXunPan\DB\DBConnectionContract;

/**
 * @method RedisConnection __construct(\Redis $connection, string $connectName = 'default')
 * @method \Redis getConnection()
 *
 * Created by PhpStorm At 2022/10/13 00:30.
 * Author: HongXunPan
 * Email: me@kangxuanpeng.com
 */
class RedisConnection extends DBConnectionContract
{
    protected function recordLog($name, $arguments)
    {
    }
}
