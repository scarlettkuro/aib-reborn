<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = $title;
?>
<div class="container">
    
<form action = "<?= Url::toRoute(['site/add-thread']) ?>" method = "GET" >
  <div class="form-group">
    <label >You wanna discuss:</label>
    <textarea class="form-control" rows="3" name="text"></textarea>
     <input type="hidden" name="board" value="<?= $board ?>">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
    
<?php foreach($threads as $thread) : ?>
    
<div class="panel panel-default panel-danger">
  <div class="panel-heading">
      
    <a href="<?= Url::toRoute(['site/thread', 'board' => $board, 'thread' => $thread->id]) ?>"> <strong><?= $thread->id ?></strong> <?= $thread->created ?></a>
     </div>
  <div class="panel-body">
    <?= $thread->text ?>
  </div>
<?php foreach($thread->children($postsPerThread) as $post) : ?>
    
<div class="panel panel-default">
  <div class="panel-heading"><b><?= $post->id ?></b> <?= $post->created ?> reply to <?=$post->op?></div>
  <div class="panel-body">
    <?= $post->text ?>
  </div>
</div>
<?php endforeach; ?>
</div>
<?php endforeach; ?>


</div>