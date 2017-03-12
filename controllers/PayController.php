<?php

namespace app\controllers;
use app\controllers\CommonController;
use app\models\Pay;
use Yii;

class PayController extends CommonController
{
    public $enableCsrfValidation = false;
    public function actionNotify()
    {
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if (Pay::notify($post)) {
                echo "success";
                exit;
            }
            echo "fail";
            exit;
        }
    }

    // 支付成功后，支付宝跳转回商户的位置
    public function actionReturn()
    {
        $this->layout = 'layout1';
        $status = Yii::$app->request->get('trade_status');
        if ($status == 'TRADE_SUCCESS') {
            $s = 'ok';
        } else {
            $s = 'no';
        }
        return $this->render("status", ['status' => $s]);
    }
}





