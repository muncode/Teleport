<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $telephone
 * @property string $name
 * @property int $balance
 * @property int $status
 */

class Users extends \yii\db\ActiveRecord
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
            [['telephone', 'name', 'balance'], 'required'],
            [['balance', 'status'], 'integer'],
            [['telephone', 'name'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'telephone' => 'Телефон',
            'name' => 'ФИО',
            'balance' => 'Баланс',
            'status' => 'Статус',
        ];
    }
}
