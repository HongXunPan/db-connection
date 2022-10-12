<?php

namespace HongXunPan\DB\Mysql\Pdo;

use HongXunPan\DB\DBConnectionContract;

/**
 * @method PdoConnection __construct(\PDO $connection, string $connectName = 'default')
 * @method \PDO getConnection()
 *
 * Created by PhpStorm At 2022/10/13 00:42.
 * Author: HongXunPan
 * Email: me@kangxuanpeng.com
 * @noinspection SpellCheckingInspection
 */
class PdoConnection extends DBConnectionContract
{
    protected function recordLog($name, $arguments)
    {
    }
}
