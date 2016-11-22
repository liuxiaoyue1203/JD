<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/22
 * Time: 19:26
 */
namespace app\modules\models;
use yii\db\ActiveRecord;

class Admin extends ActiveRecord
{
    public $rememberMe=true;
    public static function tableName()
    {
        return "{{%admin}}";
    }
}