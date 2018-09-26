

实例化对象

```php
$config = array(
    'dsn' => 'mysql:host=localhost;dbname=test',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'tablePrefix' => '',
);

$db = new \PFinal\Database\Builder($config);
```

新增数据

```php
$user = ['name' => 'jack', 'email' => 'jack@gmail.com'];
$bool = $db->table('user')->insert($user);
$userId = $db->table('user')->insertGetId($user);
```

更新数据

```php
//UPDATE `user` SET `name` = 'mary' WHERE `id` = 1
$rowCount = $db->table('user')->where('id=?', 1)->update(['name' => 'mary']);

//跟据主键更新，自动检测主键字段
$rowCount = $db->table('user')->wherePk(1)->update(['name' => 'mary']); 

//字段自增(例如增加积分的场景)
//UPDATE `user` SET `age` = `age` + 1, `updated_at` = '1504147628' WHERE id = 1
$db->table('user')->where('id=?', 1)->increment('age', 1, ['updated_at' => time()]);
```

删除数据

```php
$rowCount = $db->table('user')->where('id=?', 1)->delete();
```

查询数据

```php
//查询user表所有数据
$users = $db->table('user')->findAll();

//跳过4条，返回2条
$users = $db->table('user')->limit('4, 2')->findAll();

//排序
$users = $db->table('user')->where('status=?', 1)->limit('4, 2')->orderBy('id desc')->findAll();

//MySQL随机排序
$users = $db->table('user')->orderBy(new \PFinal\Database\Expression('rand()'))->findAll();

//返回单条数据
$user = $db->table('user')->where('id=?', 1)->findOne();

//查询主键为1的单条数据
$user = $db->table('user')->findByPk(1);

//统计查询
$count = $db->table('user')->count();

$maxUserId = $db->table('user')->max('id');

$minUserId= $db->table('user')->min('id');

$avgAge = $db->table('user')->avg('age');

$sumScore = $db->table('user')->sum('score');

// 返回数据的方法，必须在最后面调用，且一次链式调用中只能用一个，例如：findAll findOne findByPk count max min avg sum 等方法。
// where 方法支持多次调用，默认用and连接。
// where、whereIn、wherePk、limit、orderBy、field、join、groupBy having 这几个方法调用先后顺序无关。

```

查询条件

```php
//SELECT * FROM `user` WHERE `name`='jack' AND `status`='1'
$users = $db->table('user')->where('name=? and status=?', ['jack', '1'])->findAll();
$users = $db->table('user')->where('name=:name and status=:status', ['name' => 'jack', 'status' => '1'])->findAll();
$users = $db->table('user')->where(['name' => 'jack', 'status' => 1])->findAll();
$users = $db->table('user')->where(['name' => 'jack'])->where(['status' => 1])->findAll();
//以上4种写法，是一样的效果

//SELECT * FROM `user` WHERE `name` like '%j%'
$users = $db->table('user')->where('name like ?', '%j%')->findAll();

//SELECT * FROM `user` WHERE `id` IN (1, 2, 3)
$users = $db->table('user')->whereIn('id', [1, 2, 3])->findAll();

//SELECT * FROM `user` WHERE `name`='jack' OR `name`='mary'
$users = $db->table('user')->where('name=? or name =? ', ['jack', 'mary'])->findAll();
$users = $db->table('user')->where('name=?', 'jack')->where('name=?', 'mary', false)->findAll();

```

Group By

```php
$res = $db->table('tests')
    ->field('status')
    ->groupBy('status')
    ->having('status>:status', ['status' => 1])
    ->findAll();
```

Join

```php
$res = $db->table('user as u')
    ->join('info as i','u.id=i.user_id')
    ->field('u.*, i.address')
    ->orderBy('u.id')
    ->where('u.id>?', 10)
    ->findAll();
```

事务

```php
$db->getConnection()->beginTransaction();    //开启事务
$db->getConnection()->commit();              //提交事务
$db->getConnection()->rollBack();            //回滚事务
```

数据分页

```php
$dataProvider = $db->table('tests')->paginate();
var_dump($dataProvider->getData());
echo $dataProvider->createLinks();
```

处理大量的数据

```php
//cursor
foreach (DB::table('user')->where('status=1')->cursor() as $user) {
    // ...
}

//chunk
DB::select('user')->where('status=1')->orderBy('id')->chunk(100, function ($users) {
   foreach ($users as $user) {
     // ...
   }
});

//chunkById
DB::select('user')->where('status=1')->chunkById(100, function ($users) {
   foreach ($users as $user) {
     // ...
   }
});

```

调试SQL

```php
$sql = $db->table('user')->where(['name'=>'Jack'])->toSql();
var_dump($sql);

$db->getConnection()->enableQueryLog();
$user = $db->table('user')->findOne();
$sqls = $db->getConnection()->getQueryLog();
var_dump($sqls);

```