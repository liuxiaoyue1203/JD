<?php

namespace app\modules\controllers;

use yii\web\Controller;
use app\modues\models\Admin;

class PublicController extends Controller
{
    public function actionLogin()
    {
        $this->layout= false;
        $model = new Admin;
        return $this->render("login",['model'=>$model]);
    }
}
