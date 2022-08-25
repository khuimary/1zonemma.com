<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classes".
 *
 * @property int $id
 * @property int $locationid
 * @property int $teachersid
 * @property string $starttime
 * @property string $endtime
 * @property string $about
 * @property string $alias
 *
 * @property Teachers $teachers
 */
class Classes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'locationid', 'teachersid', 'starttime', 'endtime', 'about', 'alias'], 'required'],
            [['id', 'locationid', 'teachersid'], 'integer'],
            [['starttime', 'endtime'], 'safe'],
            [['about'], 'string'],
            [['alias'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['teachersid'], 'exist', 'skipOnError' => true, 'targetClass' => Teachers::className(), 'targetAttribute' => ['teachersid' => 'id']],
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
            'teachersid' => 'Teachersid',
            'starttime' => 'Starttime',
            'endtime' => 'Endtime',
            'about' => 'About',
            'alias' => 'Alias',
        ];
    }

    /**
     * Gets query for [[Teachers]].
     *
     * @return \yii\db\ActiveQuery|TeachersQuery
     */
    public function getTeachers()
    {
        return $this->hasOne(Teachers::className(), ['id' => 'teachersid']);
    }

    /**
     * {@inheritdoc}
     * @return ClassesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClassesQuery(get_called_class());
    }
}
