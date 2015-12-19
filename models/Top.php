<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "top".
 *
 * @property string $id
 * @property string $views
 * @property string $title
 * @property string $img
 * @property string $about
 * @property string $date
 */
class Top extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'top';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'img', 'about', 'date'], 'required'],
            [['views', 'date'], 'integer'],
            [['about'], 'string'],
            [['title', 'img'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'views' => 'Views',
            'title' => 'Title',
            'img' => 'Img',
            'about' => 'About',
            'date' => 'Date',
        ];
    }
}
