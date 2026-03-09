<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Hausaufgabe $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="hausaufgabe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Titel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Beschr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Fachname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Erledigt')->textInput() ?>

    <?= $form->field($model, 'Faelligkeitsdatum')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
