<?php

include __DIR__ . '/../vendor/autoload.php';

$config = array(
    'dsn' => 'mysql:host=mysql;dbname=demo',
    'username' => 'demo',
    'password' => 'def456',
    'charset' => 'utf8mb4',
    'tablePrefix' => '',
);

$db = new \PFinal\Database\Builder($config);

$version = $db->getConnection()->queryScalar('SELECT @@VERSION');

echo 'MySQL Connect Success. Version: ' . $version . '<br>';

$user = $db->table('user')->findOne();
var_dump($user);
