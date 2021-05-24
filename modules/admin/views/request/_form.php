<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Request */
/* @var $form yii\widgets\ActiveForm */

$script = <<< JS
$(document).ready(function() {
   const status = document.getElementById('request-status');
   status.addEventListener("change", function(){
    if (document.getElementById("request-status").value == 'Отклонена') {
        document.getElementById("request-why_not").removeAttribute('readonly');
   }else{
    document.getElementById("request-why_not").readOnly = true;
   }}, false); 
});
JS;
$this->registerJs($script);
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(\app\modules\admin\models\Request::ListStatus())?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(\app\modules\admin\models\Category::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'imageFile1')->fileInput()->label('Фото до')  ?>

    <?= $form->field($model, 'imageFile2')->fileInput()->label('Фото после') ?>

    <?= $form->field($model, 'why_not')->textarea(['rows' => 6,'readonly'=> true]);?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
