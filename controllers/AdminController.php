<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class AdminController extends Controller
{
    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        if (Yii::$app->user->identity->role !== 'admin') {
            throw new ForbiddenHttpException('Du bist kein Admin.');
        }

        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        return $this->render('Hausaufagbes');
    }
}