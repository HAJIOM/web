<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Top;
use app\models\City;

class TopController extends Controller
{
    public function actionIndex()
    {
        $query = Top::find();
        
        
        $top = $query->orderBy('views')
            ->limit(6)
            ->all();
        
        return $this->render('index',[
            'top' => $top,
        ]);
    }
    public function actionCities()
    {
        $query = Top::find();
        $pagination = new Pagination([
            'defaultPageSize'=> 5,
            'totalCount' =>$query->count(),
        ]);
        
        
        $top = $query->orderBy('views DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        
        return $this->render('cities',[
            'top' => $top,
            'pagination'=>$pagination,
        ]);
    }
    public function actionAdd(){
        
        
        
        return $this->render('add',[
            
        ]);
    }
    
}

?>