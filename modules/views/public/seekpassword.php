<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
?>
<!DOCTYPE html>
<html class="login-bg">
<head>
	<title>京东商城 - 找回密码</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <!-- bootstrap -->
    <link href="assets/admin/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/admin/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="assets/admin/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="assets/admin/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="assets/admin/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="assets/admin/css/icons.css" />

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="assets/admin/css/lib/font-awesome.css" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="assets/admin/css/compiled/signin.css" type="text/css" media="screen" />

    <!-- open sans font 字体导致加载慢-->
    <!--link href='http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' /-->

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>


    <div class="row-fluid login-wrapper">
        <a class="brand" href="index.html"></a>
        <?php $form=ActiveForm::begin([
            'fieldConfig'=>[
                'template'=>'{error}{input}',
            ]
        ]); ?>
        <div class="span4 box">
            <div class="content-wrap">
                <h6>京东商城 - 找回密码</h6>
                <?php if(Yii::$app->session->hasFlash("info")){
                    echo Yii::$app->session->getFlash('info');
                }?>
                <?php echo $form->field($model,'adminuser')->textInput(["class"=>"span12","placeholder"=>"管理员账号"]);?>
                <?php echo $form->field($model,'adminemail')->textInput(["class"=>"span12","placeholder"=>"管理员邮箱"]);?>
                <!--input class="span12" type="text" placeholder="管理员账号" />
                <input class="span12" type="password" placeholder="管理员密码" /-->
                <a href="<?php echo yii\helpers\Url::to(['public/login']); ?>" class="forgot">返回登录</a>

                <!--div class="remember">
                    <input id="remember-me" type="checkbox" />
                    <label for="remember-me">记住我</label>
                </div-->
                <?php echo Html::submitButton('找回密码',['class'=>'btn-glow primary login']);?>
                <!--a class="btn-glow primary login" href="index.html">登录</a-->
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        <!--div class="span4 no-account">
            <p>没有账户?</p>
            <a href="signup.html">注册</a>
        </div-->
    </div>

	<!-- scripts -->
    <script src="assets/admin/js/jquery-latest.js"></script>
    <script src="assets/admin/js/bootstrap.min.js"></script>
    <script src="assets/admin/js/theme.js"></script>

    <!-- pre load bg imgs -->
    <script type="text/javascript">
        $(function () {
            // bg switcher
            var $btns = $(".bg-switch .bg");
            $btns.click(function (e) {
                e.preventDefault();
                $btns.removeClass("active");
                $(this).addClass("active");
                var bg = $(this).data("img");

                $("html").css("background-image", "url('img/bgs/" + bg + "')");
            });

        });
    </script>

</body>
</html>