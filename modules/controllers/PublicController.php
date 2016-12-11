<?php
/**
 * Public 控制器
 * 后台登录、退出、修改密码
 * 不能继承CommonController，否则会发生重定向循环
 */
namespace app\modules\controllers;

use yii\web\Controller;
use app\modules\models\Admin;
use Yii;

class PublicController extends Controller
{
    public function actionLogin()
    {
        $this->layout= false;
        $model = new Admin;
        if(Yii::$app->request->isPost){
            $post=Yii::$app->request->post();
           if($model->login($post)){
               $this->redirect(['default/index']);
               Yii::$app->end();
           }
        }
        return $this->render("login",['model'=>$model]);
    }

    public function actionLogout()
    {
        Yii::$app->session->removeAll();
        if(!isset(Yii::$app->session['admin']['isLogin'])){
            $this->redirect(['public/login']);
            //正常情况应该不会执行到这里
            Yii::$app->end();
        }
        $this->goback();
    }

    //忘记密码跳转位置
    public function actionSeekpassword()
    {
        $this->layout = false;
        $model=new Admin;
        if(Yii::$app->request->isPost){
            $post=Yii::$app->request->post();
            if($model->seekPass($post)){
                Yii::$app->session->setFlash('info','电子邮件已经发送成功，请注意查收');
            }
        }
        return $this->render('seekpassword',['model'=>$model]);
    }
}
