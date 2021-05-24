<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';

$script = <<< JS
$(document).ready(function() {
    setInterval(function(){ $("#refreshButton").click();  }, 5000);
});
JS;
$this->registerJs($script);
?>
<div class="site-index">


    <?php \yii\widgets\Pjax::begin(); ?>
        <?= Html::a("Обновить", ['site/index'], ['class' => 'hidden', 'id'=> "refreshButton"]) ?>
        <h1>Количество рещенных заявок: <?= $count?></h1>
    <?php \yii\widgets\Pjax::end(); ?>

    <? if(!Yii::$app->user->isGuest) : ?>
    <p>
        <?= \yii\helpers\Html::a('Создать запрос', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <? endif; ?>

    <? foreach ($request as $item) : ?>
        <?= $item->name ?>
        <?= $item->created_at ?>
        <?= $item->category->name ?>
        <?= \yii\helpers\Html::img($item->before_img, ["width" => 100]) ?>
    <? endforeach; ?>
</div>  
