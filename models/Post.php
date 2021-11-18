<?php

namespace mvc\models;

use mvc\models\common\Model;

class Post extends Model
{
    public function getPosts($filters = []): array
    {
        $select = $this->select();//объект класс селект, в который полезут таблицы/поля
        $select->setTableNames('posts');
        if (!empty($filters)) {// фильтрация данных

            $ar = [];
            //форматирую массив так, ка того требует WHERE
            foreach ($filters as $k => $v) {
                if ($v === '') continue;
                $ar = ['like', [$k => $v]];
                continue;
            }
            //$select->setWhereCondition( 'id = 31');//пример задания простого строкового условия
            //$select->setWhereCondition( ['id'=>'31','author_id'=>'2']);//массив условий - будет собран через AND
            //$select->setWhereCondition(['like', ['subject' => '%secon%']]);//LIKE будет собрано как subject LIKE %es%
            $select->setWhereCondition($ar);//фильтрация
        }

        $table = $select->execute();
        return $table;
    }
}