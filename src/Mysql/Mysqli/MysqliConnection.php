<?php

namespace HongXunPan\DB\Mysql\Mysqli;

use HongXunPan\DB\DBConnectionContract;

/**
 * @method MysqliConnection __construct(string $connection, string $connectName = 'default')
 * @method mysqli getConnection()
 *
 * Created by PhpStorm At 2022/10/12 15:21.
 * Author: HongXunPan
 * Email: me@kangxuanpeng.com
 */
class MysqliConnection extends DBConnectionContract
{
    protected function recordLog($name, $arguments)
    {
    }
}
