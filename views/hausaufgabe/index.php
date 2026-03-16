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
                $heute = new \DateTime();
                $faellig = new \DateTime($model->Faelligkeitsdatum ?? '1970-01-01');
                $diff = (int)$heute->diff($faellig)->format("%r%a");

                if ($model->Erledigt) {
                    return ['style' => 'background-color:#2ecc71; color:white;'];
                } elseif ($diff < 0) {
                    return ['style' => 'background-color:#ffdddd;'];
                } elseif ($diff <= 7) {
                    return ['style' => 'background-color:#f1c40f; color:black;'];
                } elseif ($diff <= 14) {
                    return ['style' => 'background-color:#3498db; color:white;'];
                }

                return [];
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
                            'label' => 'Lehrer',  // neue Spalte
                            'value' => function ($model) {
                                return $model->lehrer ? $model->lehrer->Uname : 'Kein Lehrer';
                            }
                    ],

                    [
                            'attribute' => 'Erledigt',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Html::a(
                                        $model->Erledigt ? '✔ Erledigt' : 'Offen',
                                        ['hausaufgabe/toggle', 'ID' => $model->ID],
                                        ['style' => $model->Erledigt ? 'color:green;font-weight:bold' : 'color:red']
                                );
                            }
                    ],

                    [
                            'attribute' => 'Faelligkeitsdatum',
                            'format' => 'raw',
                            'value' => function ($model) {
                                $heute = new \DateTime();
                                $faellig = new \DateTime($model->Faelligkeitsdatum ?? '1970-01-01');
                                $diff = (int)$heute->diff($faellig)->format("%r%a");

                                if ($model->Erledigt) {
                                    return "<span style='color:#2ecc71;font-weight:bold;'>{$model->Faelligkeitsdatum}</span>";
                                } elseif ($diff < 0) {
                                    return "<span style='color:red;font-weight:bold;'>{$model->Faelligkeitsdatum}</span>";
                                } elseif ($diff <= 7) {
                                    return "<span style='color:#f1c40f;font-weight:bold;'>{$model->Faelligkeitsdatum}</span>";
                                } elseif ($diff <= 14) {
                                    return "<span style='color:#3498db;font-weight:bold;'>{$model->Faelligkeitsdatum}</span>";
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
