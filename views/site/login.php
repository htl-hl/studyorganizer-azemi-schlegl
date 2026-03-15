<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>
<div class="site-login vh-100 d-flex justify-content-center align-items-center" style="background-color: #f9fafb;">

    <div class="card shadow-lg p-4" style="width: 400px; background-color: #909090; color: white; border-radius: 12px;">
        <h2 class="text-center mb-4">Login</h2>

        <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => ''],
                'fieldConfig' => [
                        'template' => "{label}\n{input}\n{error}",
                        'labelOptions' => ['class' => 'form-label text-white'],
                        'inputOptions' => ['class' => 'form-control form-control-lg rounded-3 text-dark', 'style' => 'background-color: #eaeaea;'],
                        'errorOptions' => ['class' => 'text-danger d-block mt-1'],
                ],
        ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Username']) ?>
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password']) ?>
        <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"form-check mb-3\">{input} {label}</div>\n{error}",
                'labelOptions' => ['class' => 'form-check-label text-white'],
        ]) ?>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-lg w-100']) ?>
        </div>

        <hr class="my-3" style="border-color: #444;">
        <div class="text-center">
            <?= Html::a('Registrieren', ['site/register'], ['class' => 'btn btn-outline-light btn-sm']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>