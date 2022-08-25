<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teachers".
 *
 * @property int $id
 * @property int $locationid
 * @property string $name
 * @property string $image
 * @property string $bio
 *
 * @property Classes[] $classes
 */
class Teachers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teachers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'locationid', 'name', 'image', 'bio'], 'required'],
            [['id', 'locationid'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['image', 'bio'], 'string', 'max' => 255],
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
            'image' => 'Image',
            'bio' => 'Bio',
        ];
    }

    /**
     * Gets query for [[Classes]].
     *
     * @return \yii\db\ActiveQuery|ClassesQuery
     */
    public function getClasses()
    {
        return $this->hasMany(Classes::className(), ['teachersid' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TeachersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TeachersQuery(get_called_class());
    }
}
