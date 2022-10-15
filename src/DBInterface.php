<?php

namespace HongXunPan\DB;

interface DBInterface
{
    public static function setConfig(array $config = [], $connectName = 'default', array $options = []);

    public static function connection($connectName = 'default');
}
