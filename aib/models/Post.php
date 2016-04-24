<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\db\Query;

/**
 * Description of Post
 *
 * @author kuro
 */
class Post extends ActiveRecord {
    
    public static function tableName()
    {
        return 'posts';
    }
    
    public function children ($amount = NULL) {
        $children = [];
        $query = Post::find()->where(['op' => $this->id]);
        if (isset($amount)) {
            $query->orderBy(['created' => SORT_DESC])->limit($amount);
            $children = array_reverse($query->all());
        }
        else {
            $children = $query->all();
        }
        
        return $children;
    }
    
    public static function board ($board, $amount = NULL) {
        $query = Post::find()->where(['op' => NULL, 'board' => $board]);
        
        if (isset($amount)) {
            $query->limit($amount);
        }
        return $query->all();
    }
    
    public static function threads ($amount = NULL) {
        $query = Post::find()->where(['op' => NULL]);
        if (isset($amount)) {
            $query->limit($amount);
        }
        return $query->all();
    }
    
    public static function boards () {
        return array_map(function ($board) { 
            return $board['board'];
        }, 
            (new Query())
            ->select(['board'])
            ->from('posts')
            ->distinct()
            ->all()
        );

    }
    
    public static function thread ($id) {
        return Post::find()->where(['id' => $id])->one();
    }
}
