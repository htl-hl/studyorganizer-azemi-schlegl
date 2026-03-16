<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Registrieren';
?>

<div class="d-flex justify-content-center align-items-center vh-100" style="background:#121212;">
    <div class="card p-4 shadow" style="width:400px;background:#1e1e1e;color:white;border-radius:10px;">

        <h3 class="text-center mb-4">Account erstellen</h3>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'Uname')->textInput(['placeholder'=>'Username']) ?>

        <?= $form->field($model, 'Password')->passwordInput(['placeholder'=>'Password']) ?>

        <div class="form-group mt-3">
            <?= Html::submitButton('Registrieren', ['class'=>'btn btn-success w-100']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>