<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = $title;
?>
<div class="container">
<div class="row">
<?php foreach($boards as $board) : ?>
    <a href="<?= Url::toRoute(['site/board', 'board' => $board]) ?>"><?= $board ?></a>
<?php endforeach; ?>
</div>

</div>