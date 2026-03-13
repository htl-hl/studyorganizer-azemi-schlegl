<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    <h1>Registrieren</h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'Uname')->textInput() ?>

<?= $form->field($model, 'Password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Registrieren', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>