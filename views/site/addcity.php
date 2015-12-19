<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<div class="container-fluid row bg-info show-grid">
<?php $f = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>
    <?=$f->field($form, 'title');?>
    <?=$f->field($form, 'img')->fileInput();?>
    <?=$f->field($form, 'about')->textArea(['rows'=>20]);?>
    <?=Html::submitButton('Отправить', ['class' => 'btn btn-primary'])?>
</div>
<?php ActiveForm::end();?>