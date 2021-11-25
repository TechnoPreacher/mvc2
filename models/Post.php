<?php

namespace mvc\models;


use mvc\models\common\Model;

class Post extends Model
{
    public function getPosts($filters = []): array//отбор записей с возможностью отбора записей через WHERE
    {
        $select = $this->select();//объект класс селект, в который полезут таблицы/поля - определяется в общей модели
        $select->setTableNames('posts');//таблица
        if (!empty($filters)) {// фильтрация данных
            $ar = [];
            //форматирую массив так, как того требует WHERE
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
    

    public function setPost($postToDB): void//запись в базу
    {
        $insert = $this->insert();//собственоо класс
        $insert->setTableName('posts');//таблица
        $insert->setValues($postToDB); //данные
        $insert->execute();
    }

    public function updatePost($postToDB): void
    {
        $update = $this->update();//собственоо класс
        $update->setTableName('posts');//таблица
        $update->setValues($postToDB); //данные
        $update->execute();
    }

    public function deletePost($postToDB): void
    {
        $delete = $this->delete();//собственоо класс
        $delete->setTableName('posts');//таблица
        $delete->setValues($postToDB); //данные
        $delete->execute();
    }


}