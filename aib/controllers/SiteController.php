<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Post;
use Yii;


class SiteController extends Controller
{
    
    public function actionIndex()
    { 
        return $this->render('index', [
            'title' => 'Dobro pozalovat. Snova',
            'boards' => Post::boards()
        ]);
    }
    
    public function actionBoard($board)
    { 
        return $this->render('board', [
            'title' => 'Dobro pozalovat. Snova',
            'board' => $board,
            'threads' => Post::board($board),
            'postsPerThread' => 2
        ]);
    }
    
    public function actionThread($board, $thread)
    { 
        return $this->render('thread', [
            'title' => 'Dobro pozalovat. Snova',
            'board' => $board,
            'thread' => $thread,
            'thread' => Post::thread($thread)
        ]);
    }
    
    public function actionAddPost()
    { 
        $thread = Yii::$app->request->get('op');
        $board = Yii::$app->request->get('board');
        $post = new Post();
        $post->op = $thread;
        $post->board = $board;
        $post->text = Yii::$app->request->get('text');
        $post->save();
        $this->redirect(['site/thread', 'thread' => $thread, 'board' => $board]);
        
    }
    
    public function actionAddThread()
    { 
        $board = Yii::$app->request->get('board');
        $post = new Post();
        $post->op = NULL;
        $post->board = $board;
        $post->text = Yii::$app->request->get('text');
        $post->save();
        $this->redirect(['site/board', 'board' => $board]);
        
    }
    
    public function actionError()
    {
        $exception = \Yii::$app->errorHandler->exception;
        $params['name'] = $exception->getName();
        $params['code'] = $exception->getCode();
        $params['message'] = $exception->getMessage();
        return $this->render('error', $params);
    }
}
