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
    public function getName() {
        return $this->users->name;
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
            'date' => 'Date',
            'user_id' => 'User ID',
            'summ' => 'Summ',
            'act' => 'Act',
            'name' => 'name',
        ];
    }
}