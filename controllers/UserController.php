<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\User;

class UserController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->role !== 'admin') {
            throw new \yii\web\ForbiddenHttpException('Du hast keinen Zugriff.');
        }

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => \app\models\User::find(),
            'pagination' => ['pageSize' => 20],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDelete($ID)
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->role !== 'admin') {
            throw new \yii\web\ForbiddenHttpException('Kein Zugriff.');
        }

        $model = User::findOne($ID);
        if ($model) {
            $model->delete();
        }

        return $this->redirect(['index']);
    }
}