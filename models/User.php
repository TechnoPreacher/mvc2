<?php

namespace mvc\models;


use mvc\models\common\Model;

class User extends Model
{
    public function getUsers($filters = []): array//отбор записей с возможностью отбора записей через WHERE
    {
        $select = $this->select();//объект класс селект, в который полезут таблицы/поля - определяется в общей модели
        $select->setTableNames('users');//таблица
        if (!empty($filters)) {// фильтрация данных
            $ar = [];
            //форматирую массив так, как того требует WHERE
            foreach ($filters as $k => $v) {
                if ($v === '') continue;
                $ar = ['like', [$k => $v]];
                continue;
            }
            $select->setWhereCondition($ar);//фильтрация
        }
        $table = $select->execute();
        return $table;
    }


    public function setUser($postToDB): void//запись в базу
    {
        $insert = $this->insert();//собственоо класс
        $insert->setTableName('users');//таблица
        $insert->setValues($postToDB); //данные
        $insert->execute();
    }

    public function updateUser($postToDB): void
    {
        $update = $this->update();//собственоо класс
        $update->setTableName('users');//таблица
        $update->setValues($postToDB); //данные
        $update->execute();
    }

    public function deleteUser($postToDB): void
    {
        $delete = $this->delete();//собственоо класс
        $delete->setTableName('users');//таблица
        $delete->setValues($postToDB); //данные
        $delete->execute();
    }


}