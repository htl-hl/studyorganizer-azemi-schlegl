<?php

use app\models\Hausaufgabe;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\HausaufgabeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Hausaufgabes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hausaufgabe-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Hausaufgabe', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,

            'rowOptions' => function ($model) {
                if (!$model->Erledigt && $model->Faelligkeitsdatum < date('Y-m-d')) {
                    return ['style' => 'background-color:#ffdddd'];
                }
            },

            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],


                    [
                            'label' => 'Erstellt von',
                            'value' => function ($model) {
                                return $model->user ? $model->user->Uname : 'Unknown';
                            }
                    ],

                    'ID',
                    'Titel',
                    'Beschr',


                    'Fachname',
                    'Erledigt',

                    [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'ID' => $model->ID]);
                            }
                    ],
            ],
    ]); ?>

</div>
