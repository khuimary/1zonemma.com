<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venues".
 *
 * @property int $id
 * @property int $locationid
 * @property string $name
 * @property string $phoneno
 * @property string $howtogetthere
 * @property string $facebookpageurl
 * @property string $website
 * @property string $whentoarrive
 * @property string $createdat
 * @property string $amenities
 * @property string $description
 * @property string $alias
 *
 * @property Rating[] $ratings
 */
class Venues extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venues';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'locationid', 'name', 'phoneno', 'howtogetthere', 'facebookpageurl', 'website', 'whentoarrive', 'createdat', 'amenities', 'description', 'alias'], 'required'],
            [['id', 'locationid'], 'integer'],
            [['createdat'], 'safe'],
            [['description'], 'string'],
            [['name', 'howtogetthere', 'website', 'whentoarrive', 'alias'], 'string', 'max' => 100],
            [['phoneno'], 'string', 'max' => 20],
            [['facebookpageurl'], 'string', 'max' => 255],
            [['amenities'], 'string', 'max' => 50],
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
            'locationid' => 'Locationid',
            'name' => 'Name',
            'phoneno' => 'Phoneno',
            'howtogetthere' => 'Howtogetthere',
            'facebookpageurl' => 'Facebookpageurl',
            'website' => 'Website',
            'whentoarrive' => 'Whentoarrive',
            'createdat' => 'Createdat',
            'amenities' => 'Amenities',
            'description' => 'Description',
            'alias' => 'Alias',
        ];
    }

    /**
     * Gets query for [[Ratings]].
     *
     * @return \yii\db\ActiveQuery|RatingQuery
     */
    public function getRatings()
    {
        return $this->hasMany(Rating::className(), ['venueid' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return VenuesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VenuesQuery(get_called_class());
    }
}
