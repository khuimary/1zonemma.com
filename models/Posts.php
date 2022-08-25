<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property int $userid
 * @property string $title
 * @property string $rext
 * @property string $imagefile
 *
 * @property UserAccount $user
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'title', 'rext', 'imagefile'], 'required'],
            [['id', 'userid'], 'integer'],
            [['rext'], 'string'],
            [['title'], 'string', 'max' => 100],
            [['imagefile'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'rext' => 'Rext',
            'imagefile' => 'Imagefile',
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
     * @return PostsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PostsQuery(get_called_class());
    }
}
