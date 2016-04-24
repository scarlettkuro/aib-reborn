<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = $title;
?>
<div class="container">
    
<div class="panel panel-default panel-danger">
  <div class="panel-heading">
      
   <strong><?= $thread->id ?></strong> <?= $thread->created ?>
     </div>
  <div class="panel-body">
    <?= $thread->text ?>
  </div>
</div>
<?php foreach($thread->children() as $post) : ?>
    
<div class="panel panel-default">
  <div class="panel-heading"><b><?= $post->id ?></b> <?= $post->created ?> reply to <?=$post->op?></div>
  <div class="panel-body">
    <?= $post->text ?>
  </div>
</div>
<?php endforeach; ?>
    
<form action = "<?= Url::toRoute(['site/add-post']) ?>" method = "GET" >
  <div class="form-group">
    <label >You say:</label>
    <textarea class="form-control" rows="3" name="text"></textarea>
     <input type="hidden" name="op" value="<?= $thread->id ?>">
     <input type="hidden" name="board" value="<?= $thread->board ?>">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

</div>