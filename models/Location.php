<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $id
 * @property string $country
 * @property string $city
 * @property string $state
 * @property string $streetaddress
 * @property string $zip
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'country', 'city', 'state', 'streetaddress', 'zip'], 'required'],
            [['id'], 'integer'],
            [['country', 'zip'], 'string', 'max' => 255],
            [['city'], 'string', 'max' => 50],
            [['state', 'streetaddress'], 'string', 'max' => 100],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country' => 'Country',
            'city' => 'City',
            'state' => 'State',
            'streetaddress' => 'Streetaddress',
            'zip' => 'Zip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return LocationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LocationQuery(get_called_class());
    }
}
