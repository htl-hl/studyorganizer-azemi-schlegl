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

            'ID',
            'Titel',
                'Beschr',
                [
                        'attribute' => 'Fachname',
                        'format' => 'raw',
                        'value' => function ($model) {

                            $farben = [
                                    'INSY' => '#3498db',
                                    'ITSI' => '#9b59b6',
                                    'BS' => '#e67e22',
                                    'SYT' => '#2ecc71',
                                    'SYTU' => '#1abc9c',
                                    'Deutsch' => '#e74c3c',
                                    'Englisch' => '#f1c40f'
                            ];

                            $color = $farben[$model->Fachname] ?? '#888';

                            return "<span style='color:white;background:$color;padding:4px 8px;border-radius:6px;'>$model->Fachname</span>";
                        }
                ],
                    [
                            'attribute' => 'Erledigt',
                            'format' => 'raw',
                            'value' => function ($model) {

                                if ($model->Erledigt) {
                                    return Html::a(
                                            '✔ Erledigt',
                                            ['hausaufgabe/toggle', 'ID' => $model->ID],
                                            ['style' => 'color:green;font-weight:bold']
                                    );
                                } else {
                                    return Html::a(
                                            'Offen',
                                            ['hausaufgabe/toggle', 'ID' => $model->ID],
                                            ['style' => 'color:red']
                                    );
                                }

                            }
                    ],
                    [
                            'attribute' => 'Faelligkeitsdatum',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if (!$model->Erledigt && $model->Faelligkeitsdatum < date('Y-m-d')) {
                                    return "<span style='color:red;font-weight:bold;'>$model->Faelligkeitsdatum</span>";
                                }
                                return $model->Faelligkeitsdatum;
                            }
                    ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Hausaufgabe $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
