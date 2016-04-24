<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?php //= Html::csrfMetaTags() //?>

    <title><?= $this->title ?></title>
    
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

            <?= $content ?>  
    
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
