<?php
/**
 * Default 控制器
 * 后台首页，系统默认登陆的位置：r=admin/default/index
 */
namespace app\modules\controllers;

use app\modules\controllers\CommonController;

class DefaultController extends CommonController
{
    public function actionIndex()
    {
        $this->layout="layout1";
        return $this->render("index"); 
    }
}
