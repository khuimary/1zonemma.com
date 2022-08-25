<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "participarts".
 *
 * @property int $id
 * @property int $userid
 * @property string $country
 * @property string $academy
 * @property string $username
 * @property string $cityofresidence
 * @property string $dateofbirth
 * @property string $email
 * @property string $fullsizephoto
 * @property string $gender
 * @property string $givenname
 * @property string $handreach
 * @property string $handsize
 * @property string $height
 * @property string $weight
 * @property string $instagramlink
 * @property string $losses
 * @property string $mmarecord
 * @property string $totalfights
 * @property string $videolinks
 * @property string $wins
 *
 * @property UserAccount $user
 */
class Participarts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'participarts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'country', 'academy', 'username', 'cityofresidence', 'dateofbirth', 'email', 'fullsizephoto', 'gender', 'givenname', 'handreach', 'handsize', 'height', 'weight', 'instagramlink', 'losses', 'mmarecord', 'totalfights', 'videolinks', 'wins'], 'required'],
            [['id', 'userid'], 'integer'],
            [['gender'], 'string'],
            [['country', 'username', 'cityofresidence', 'givenname', 'height', 'weight', 'losses', 'totalfights', 'wins'], 'string', 'max' => 50],
            [['academy', 'instagramlink', 'mmarecord', 'videolinks'], 'string', 'max' => 255],
            [['dateofbirth'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 100],
            [['fullsizephoto'], 'string', 'max' => 200],
            [['handreach', 'handsize'], 'string', 'max' => 10],
            [['id'], 'unique'],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => UserAccount::className(), 'targetAttribute' => ['userid' => 'id']],
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
            'country' => 'Country',
            'academy' => 'Academy',
            'username' => 'Username',
            'cityofresidence' => 'Cityofresidence',
            'dateofbirth' => 'Dateofbirth',
            'email' => 'Email',
            'fullsizephoto' => 'Fullsizephoto',
            'gender' => 'Gender',
            'givenname' => 'Givenname',
            'handreach' => 'Handreach',
            'handsize' => 'Handsize',
            'height' => 'Height',
            'weight' => 'Weight',
            'instagramlink' => 'Instagramlink',
            'losses' => 'Losses',
            'mmarecord' => 'Mmarecord',
            'totalfights' => 'Totalfights',
            'videolinks' => 'Videolinks',
            'wins' => 'Wins',
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
     * {@inheritdoc}
     * @return ParticipartsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ParticipartsQuery(get_called_class());
    }
}
