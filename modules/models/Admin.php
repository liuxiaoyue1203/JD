<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/22
 * Time: 19:26
 */
namespace app\modules\models;
use yii\db\ActiveRecord;
use Yii;
class Admin extends ActiveRecord
{
    public $rememberMe=true;
    public static function tableName()
    {
        return "{{%admin}}";
    }

    public function rules()
    {
        return [
            ['adminuser','required','message'=>'管理员账号不能为空'],
            ['adminpass','required','message'=>'管理员密码不能为空'],
            ['rememberMe','boolean'],
            ['adminpass','validatePass'],
        ];
    }

    public function validatePass()
    {
        if(!$this->hasErrors()){
            $data=self::find()->where('adminuser = :user and adminpass = :pass',['user'=>$this->adminuser,'pass'=> md5($this->adminpass)])->one();
            if(is_null($data)){
                $this->addError('adminpass','用户名或密码错误');
            }
        }
    }

    public function login($data)
    {
        if($this->load($data) && $this->validate()){
            $lifetime=$this->rememberMe ? 24*3600 : 0;
            $session = Yii::$app->session;
            session_set_cookie_params($lifetime);
            $session['admin']=[
                'adminuser'=>$this->adminuser,
                'isLogin'=> 1,
            ];
            $this->updateAll(['logintime'=>time(),'loginip'=> ip2long(Yii::$app->request->userIP)],'adminuser = :user',[':user'=>$this->adminuser]);
            return (bool)$session['admin']['isLogin'];
        }
        return false;
    }
}