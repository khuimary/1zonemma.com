<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rating".
 *
 * @property int $id
 * @property int $userid
 * @property int $venueid
 * @property string $rating
 * @property string $reveiws
 *
 * @property UserAccount $user
 * @property Venues $venue
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'venueid', 'rating', 'reveiws'], 'required'],
            [['id', 'userid', 'venueid'], 'integer'],
            [['rating'], 'string', 'max' => 100],
            [['reveiws'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => UserAccount::className(), 'targetAttribute' => ['userid' => 'id']],
            [['venueid'], 'exist', 'skipOnError' => true, 'targetClass' => Venues::className(), 'targetAttribute' => ['venueid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'venueid' => 'Venueid',
            'rating' => 'Rating',
            'reveiws' => 'Reveiws',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserAccountQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserAccount::className(), ['id' => 'userid']);
    }

    /**
     * Gets query for [[Venue]].
     *
     * @return \yii\db\ActiveQuery|VenuesQuery
     */
    public function getVenue()
    {
        return $this->hasOne(Venues::className(), ['id' => 'venueid']);
    }

    /**
     * {@inheritdoc}
     * @return RatingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RatingQuery(get_called_class());
    }
}
