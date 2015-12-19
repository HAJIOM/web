<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<div id="pop-text"><h1>Популярные города</h1></div>
<div class="block">
    <?php foreach ($top as $city):?>
    <div class="city-block">
        <img src="./image/<?=Html::encode("{$city->img}")?>" alt="">
        <div class="foot-city">
                    <h2><?=Html::encode("{$city->title}")?></h2>
                    <p><?=Html::encode("{$city->about}")?></p>
                    <a href="#">»</a>                    
                </div>
    </div>
    <?php endforeach; ?>
</div>