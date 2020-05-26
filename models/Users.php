<?php

namespace app\models;

use yii\db\ActiveRecord as ActiveRecordAlias;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $phone
 * @property string $name
 * @property int $balance
 * @property int $status
 */

class Users extends ActiveRecordAlias
{

    public function getReport()
    {
        return $this->hasMany(Report::className(), ['user_id' => 'id']);
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'balance'], 'required'],
            [['balance', 'status', 'phone'], 'integer'],
            [['name'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Телефон',
            'name' => 'ФИО',
            'balance' => 'Баланс',
            'status' => 'Статус',
        ];
    }
}
