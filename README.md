# db-connection DB 连接器封装包

including :

- redis
- mysqli
- pdo

## install

`composer require hongxunpan/db`

## usage

### redis (\HongXunPan\DB\Redis\Redis)

#### set config

```php
$config = ['host' => '192.168.0.1'];
\HongXunPan\DB\Redis\Redis::setConfig($config, 'default');//array $config = [], $connectName = 'default', array $options = []
```

default setting

```php 
$default = [
    'host' => '127.0.0.1',
    'port' => 6379,
    'timeout' => 0.0,
    'reserved' => null,
    'retryInterval' => 0,
    'readTimeout' => 0.0
];
```

#### using

```php
$res = \HongXunPan\DB\Redis\Redis::connection()->set('test', 'test');
$res = \HongXunPan\DB\Redis\Redis::connection('xxx')->getConnection()->set('test', 'test1');
$res = \HongXunPan\DB\Redis\Redis::connection('aaa')->incr('testIncr');
/** \Redis $res */
var_dump($res);
```

### mysqli

#### set config

```php
$config = [
    'host' => '192.168.65.2',
    'port' => 3306,
    'username' => 'default',
    'password' => 'secret',
    'database' => '',
];

\HongXunPan\DB\Mysql\Mysqli\Mysqli::setConfig($config, 'default');
```

#### using

```php
/** @var PDO $res */
$res = \HongXunPan\DB\Mysql\Mysqli\Mysqli::connection('default')->getConnection();
$res = \HongXunPan\DB\Mysql\Mysqli\Mysqli::getConnection();
var_dump($res);
```

### pdo

#### set config

```php
$config = [
    'host' => '192.168.65.2',
    'port' => 3306,
    'username' => 'default',
    'password' => 'secret',
];

\HongXunPan\DB\Mysql\Pdo\Pdo::setConfig($config, 'default');
```

#### using

```php
$res = \HongXunPan\DB\Mysql\Pdo\Pdo::connection('default')->getConnection();
$res = \HongXunPan\DB\Mysql\Pdo\Pdo::getConnection('default')
```

## update log

`1.0.0` 2022-10-13 version1, include redis & mysqli & pdo