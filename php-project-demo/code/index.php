<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

switch ($_SERVER['PATH_INFO']) {
    case '/phpinfo':
        phpinfo();
        break;
    case '/':
        date_default_timezone_set('PRC');
        echo '<h1>Hello PHP!</h1><a href="/phpinfo">phpinfo</a><br><br>';
        echo $_SERVER['SERVER_ADDR'] . '<br>';
        echo date("Y-m-d H:i:s") . '<br>';
        break;
    default:
        echo '<h1>404 Not Found</h1>';
        header("HTTP/1.0 404 Not Found");
        break;
}

?>

</body>
</html>