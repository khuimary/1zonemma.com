<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_account".
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $phonenumber
 * @property string $gender
 * @property string $auth_key
 * @property string $password_reset_token
 * @property string $password_hash
 * @property string $status
 * @property string $createdat
 * @property string $email
 * @property string $userimage
 *
 * @property Participants[] $participants
 * @property Posts[] $posts
 * @property Rating[] $ratings
 */
class UserAccount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_account';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'username', 'phonenumber', 'gender', 'auth_key', 'password_reset_token', 'password_hash', 'status', 'createdat', 'email', 'userimage'], 'required'],
            [['id'], 'integer'],
            [['gender'], 'string'],
            [['createdat'], 'safe'],
            [['name'], 'string', 'max' => 55],
            [['username', 'status', 'email'], 'string', 'max' => 50],
            [['phonenumber'], 'string', 'max' => 20],
            [['auth_key'], 'string', 'max' => 150],
            [['password_reset_token', 'userimage'], 'string', 'max' => 255],
            [['password_hash'], 'string', 'max' => 100],
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
            'name' => 'Name',
            'username' => 'Username',
            'phonenumber' => 'Phonenumber',
            'gender' => 'Gender',
            'auth_key' => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
            'password_hash' => 'Password Hash',
            'status' => 'Status',
            'createdat' => 'Createdat',
            'email' => 'Email',
            'userimage' => 'Userimage',
        ];
    }

    /**
     * Gets query for [[Participants]].
     *
     * @return \yii\db\ActiveQuery|ParticipantsQuery
     */
    public function getParticipants()
    {
        return $this->hasMany(Participants::className(), ['userid' => 'id']);
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery|PostsQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['userid' => 'id']);
    }

    /**
     * Gets query for [[Ratings]].
     *
     * @return \yii\db\ActiveQuery|RatingQuery
     */
    public function getRatings()
    {
        return $this->hasMany(Rating::className(), ['userid' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UserAccountQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserAccountQuery(get_called_class());
    }
}
