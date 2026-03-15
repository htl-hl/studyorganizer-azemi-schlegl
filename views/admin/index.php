<?php

use yii\helpers\Html;

$this->title = 'Admin Panel';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Willkommen im Admin Bereich.</p>

    <ul>
        <li>
            <a href="/index.php?r=user/index">User verwalten</a>
        </li>

        <li>
            <a href="/index.php?r=faecher/index">Fächer verwalten</a>
        </li>

        <li>
            <a href="/index.php?r=hausaufgabe/index">Hausaufgaben Übersicht</a>
        </li>
    </ul>

</div>