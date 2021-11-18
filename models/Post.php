<?php

namespace mvc\models;

use mvc\models\common\Model;

class Post extends Model
{
   public function getPosts($filters = []): array
    {
        $select = $this->select();//объект класс селект, в который полезут таблицы/поля
        $select->setTableNames('posts');
        if (!empty($filters)) {
            //$select->setWhereCondition( 'id = 31');//пример задания простого строкового условия
            //$select->setWhereCondition( ['id'=>'31','author_id'=>'2']);//массив условий - будет собран через AND
            $select->setWhereCondition(['like', ['subject' => '%secon%']]);//LIKE будет собрано как subject LIKE %es%
        }
        $table = $select->execute();
        return $table;
    }
}