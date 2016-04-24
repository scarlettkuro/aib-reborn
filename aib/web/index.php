<?php
// Добавлять в отчет все PHP ошибки (см. список изменений)
error_reporting(E_ALL);

if (!defined('YII_ENV') && isset($_SERVER['YII_ENV'])) {
    define('YII_ENV', $_SERVER['YII_ENV']);
}
defined('YII_ENV') or define('YII_ENV', 'dev');

if (YII_ENV == 'prod') {
    define('YII_DEBUG', false);
} else {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
}

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
