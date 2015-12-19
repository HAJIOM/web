<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Top;

class TopWidget extends Widget
{
    
    public function run()
    {
        $query = Top::find();
        
        $top = $query->orderBy('views DESC')
            ->limit(6)
            ->all();
        
        return $this->render('top',[
            'top' => $top,
        ]);
    }
    
    
}

?>