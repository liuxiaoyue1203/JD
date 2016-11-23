<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/23
 * Time: 11:22
 */
namespace app\modules\controllers;

use yii\web\Controller;
use app\modules\models\Admin;
use Yii;

class ManageController extends Controller
{
    public function actionMailchangepass()
    {
        $this->layout=false;
        $time = Yii::$app->request->get('timestamp');
        $adminuser= Yii::$app->request->get('adminuser');
        $token= Yii::$app->request->get('token');
        $model= new Admin;
        $myToken=$model->createToken($adminuser,$time);
        if($token!=$myToken){
            $this->redirect(['public/login']);
            Yii::$app->end();
        }
        if(time()-$time>300){
            $this->redirect(['public/login']);
            Yii::$app->end();
        }

        if(Yii::$app->request->isPost){
            $post=Yii::$app->request->post();
            if($model->changePass($post)){
                Yii::$app->session->setFlash('info','密码修改成功');
            }
        }
        $model->adminuser=$adminuser;
        return $this->render('mailchangepass',['model'=>$model]);
    }
}