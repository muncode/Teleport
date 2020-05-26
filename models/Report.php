<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "report".
 *
 * @property int $id
 * @property string $date
 * @property int $user_id
 * @property int $summ
 * @property int $act
 */

class Report extends ActiveRecord
{
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'user_id', 'summ'], 'required'],
            [['date'], 'safe'],
            [['user_id', 'summ', 'act'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата время',
            'user_id' => 'ID пользователя',
            'summ' => 'Сумма',
            'act' => 'Действие',
            'phone' => 'Телефон',
            'name' => 'Имя',
        ];
    }
}