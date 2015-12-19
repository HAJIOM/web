<?php
namespace app\models;

use yii\base\Model;

class AddCity extends Model
{
    public $title;
    public $img;
    public $about;
    
    public function rules()
    {
        return [
          [['title','about'], 'required', 'message'=>'Вы не ввели данные'],
            [['img'], 'file','extensions' => 'png, jpg'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id'=>'ID',
            'title'=>'Название города',
            'img'=>'Фото',
            'about'=>'Описание',
        ];
    }
}
?>