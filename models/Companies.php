<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property int $id
 * @property string $name
 * @property string $inn
 * @property string $name_boss
 * @property string $address
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'inn', 'name_boss', 'address'], 'required'],
            [['address'], 'string'],
            [['name', 'inn', 'name_boss'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['inn'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'inn' => 'Inn',
            'name_boss' => 'Name Boss',
            'address' => 'Address',
        ];
    }
}
