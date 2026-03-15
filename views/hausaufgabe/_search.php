<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\HausaufgabeSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="hausaufgabe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Titel') ?>

    <?= $form->field($model, 'Beschr') ?>

    <?= $form->field($model, 'Fachname') ?>

    <?= $form->field($model, 'Erledigt') ?>

    <?php // echo $form->field($model, 'Faelligkeitsdatum') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
