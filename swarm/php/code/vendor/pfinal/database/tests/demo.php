<?php

include "./autoload.php";

$config = array(
    'dsn' => 'mysql:host=127.0.0.1;dbname=test',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
    'tablePrefix' => '',
);

$db = new \PFinal\Database\Builder($config);

$db->getConnection()->enableQueryLog();

$res = $db->table('{{%tests}} as  t')->orderBy(new \PFinal\Database\Expression('rand()'))->findAll();

//var_dump($res);
//$db->table('tests')->where('id=?', [44])->increment('aa', 1, ['bb' => 6]);
//
//$id = $db->table('tests')->insertGetId(['username' => 134, 'status' => '0']);
//
//$count = $db->table('tests')->lockForUpdate()->count('id');

//var_dump($count);

//$res = $db->table('tests')->field('status')->groupBy('status')->having('status>:status', ['status' => 1])->findAll();

//var_dump($res);

dump($db->getConnection()->getQueryLog());



