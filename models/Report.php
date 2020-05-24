<?php

namespace app\models;

use yii\db\ActiveRecord;

class Report extends ActiveRecord
{
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}

class Users extends ActiveRecord
{
    public function getReport()
    {
        return $this->hasMany(Report::className(), ['user_id' => 'id']);
    }
}