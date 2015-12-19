<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\models\City;
use yii\helpers\StringHelper;
?>
<div id="pop-text"><h1>Популярные города</h1></div>

    <?php foreach ($top as $city):?>
<div class="container-fluid row bg-info show-grid">
    <a href="<?=Yii::$app->urlManager->createUrl(['site/city', 'city'=>$city->id])?>"><img class="img-thumbnail left" width="100" src="./image/city/<?=Html::encode("{$city->img}")?>" alt=""></a>
                    <a href="<?=Yii::$app->urlManager->createUrl(['site/city', 'city'=>$city->id])?>"><h1><?=Html::encode("{$city->title}")?></h1></a>
                    <p><?=StringHelper::truncate(Html::encode("{$city->about}"),400,'...');?></p>
                    <p class="right"><b>Просмотров: <?=$city->views?></b></p>
    </div>
    <?php endforeach; 
echo LinkPager::widget([
    'pagination' => $pagination,
]);?>

