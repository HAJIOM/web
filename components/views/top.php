<?php
use app\components\TopWidget;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Top;
?>
<div id="pop-text"><h1>Популярные города</h1></div>
<div class="block">
    <?php foreach ($top as $city):?>
    <div class="city-block">
        <img src="./image/city/<?=Html::encode("{$city->img}")?>" alt="">
        <div class="foot-city">
                    <h2><?=Html::encode("{$city->title}")?></h2>
                    <p><?=Html::encode("{$city->about}")?></p>
                    <a href="<?=Yii::$app->urlManager->createUrl(['site/city', 'city'=>$city->id])?>">»</a>                    
                </div>
    </div>
    <?php endforeach; ?>
</div>