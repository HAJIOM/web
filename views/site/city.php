<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\models\Top;

?>
<div id="pop-text"><h1><?=Html::encode("{$city->title}")?></h1></div>

<div class="container-fluid row bg-info show-grid">
    <img class="img-thumbnail left" width="300" src="./image/city/<?=Html::encode("{$city->img}")?>" alt="">
                    <p><?=Html::encode("{$city->about}")?></p>
    </div>
<? //echo LinkPager::widget([    'pagination' => $pagination,]);?>