<?php
/**
 * Common 公共控制器
 * 被其他控制器继承，在其他控制器的所有方法执行之前，init会先执行
 */
namespace app\modules\controllers;

use yii\web\Controller;
use Yii;

class CommonController extends Controller
{
    public function init()
    {
        if(Yii::$app->session['admin']['isLogin']!=1){
            return  $this->redirect(['/admin/public/login']);
        }
    }
}