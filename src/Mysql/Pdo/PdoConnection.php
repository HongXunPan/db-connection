<?php

namespace HongXunPan\DB\Mysql\Pdo;

use HongXunPan\DB\DBConnectionContract;
use PDO;

class PdoConnection extends DBConnectionContract
{
    /**
     * @param $connection
     * @param string $connectName
     * @return DBConnectionContract|PdoConnection
     * @noinspection PhpReturnDocTypeMismatchInspection
     */
    public function __construct($connection, $connectName = 'default')
    {
        return parent::__construct($connection, $connectName);
    }

    /**
     * @return PDO
     * @deprecated
     * @author HongXunPan <me@kangxuanpeng.com>
     * @date 2022-10-11 17:05
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
