<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;

class RegisterController extends Controller
{
    public function actionIndex()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {

            $model->Password = password_hash($model->Password, PASSWORD_DEFAULT);
            $model->role = 'user';

            if ($model->save()) {
                return $this->redirect(['site/login']);
            }
        }

        return $this->render('index', [
            'model' => $model
        ]);
    }
}