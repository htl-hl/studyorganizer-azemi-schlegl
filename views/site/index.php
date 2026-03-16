<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Secret Easter Egg!';
?>
<div class="site-easter-egg" style="text-align:center; padding:50px;">
    <h1>🎉 Überraschung! 🎉</h1>
    <p>Du hast das geheime Easter Egg gefunden 😎</p>

    <?= Html::img('@web/images/WIN_20240619_12_38_38_Pro.jpg', ['alt' => 'Fun Cat', 'style' => 'max-width:400px; border-radius:20px;']) ?>

    <p>Vielleicht klickst du ja nochmal irgendwo… 😉</p>
</div>