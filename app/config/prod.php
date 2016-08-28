<?php 

$app['db.options'] = array(
    'driver'   => 'pdo_mysql',
    'charset'  => 'utf8',
    'host'     => '127.0.0.1',
    'port'     => '3306',
    'dbname'   => 'todolist',
    'user'     => 'todolist_admin',
    'password' => 'secret',
);
//Enable debugguing
$app['debug'] = true;
$app['monolog.level'] ="WARNING"; 