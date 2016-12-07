<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
?>
    <!-- main container -->
    <div class="content">
        
        <div class="container-fluid">
            <div id="pad-wrapper" class="new-user">
                <div class="row-fluid header">
                    <h3>修改密码</h3>
                </div>

                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar">
                        <div class="container">
                            <?php
                                $form=ActiveForm::begin([
                                'options'=>['class'=>'new_user_form inline-input'],
                                'fieldConfig'=>[
                                    'template'=>'<div class="span12 field-box">{label}{input}</div><b color="blue">{error}</b>'
                                ]
                            ]);?>

                            <?php echo $form->field($model,'adminuser')->textInput(['class'=>'span9','disabled'=>true]);?>
                            <?php echo $form->field($model,'adminpass')->passwordInput(['class'=>'span9']);?>
                            <?php echo $form->field($model,'repass')->passwordInput(['class'=>'span9']);?>
                            <div class="span11 field-box actionsrepass">
                            <?php
                                if(Yii::$app->session->hasFlash('info')){
                                    echo Yii::$app->session->getFlash('info');
                                }
                            ?>
                            </div>
                            
                            <div class="span11 field-box actions">
                                <?php echo Html::submitButton('修改',['class'=>'btn-glow primary'])?>
                                <!--input type="button" class="btn-glow primary" value="创建" /-->
                                <span>或者</span>
                                <?php echo Html::submitButton('取消',['class'=>'reset']); ?>
                                <!--input type="reset" value="取消" class="reset" /-->
                            </div>
                            <!--form class="new_user_form inline-input" />
                                <div class="span12 field-box">
                                    <label>Name:</label>
                                    <input class="span9" type="text" />
                                </div>
                                <div class="span12 field-box">
                                    <label>State:</label>
                                    <div class="ui-select span5">
                                        <select>
                                            <option value="AK" />Alaska
                                            <option value="HI" />Hawaii
                                            <option value="CA" />California
                                            <option value="NV" />Nevada
                                            <option value="OR" />Oregon
                                            <option value="WA" />Washington
                                            <option value="AZ" />Arizona
                                        </select>
                                    </div>
                                </div>
                                <div class="span12 field-box">
                                    <label>Company:</label>
                                    <input class="span9" type="text" />
                                </div>
                                <div class="span12 field-box">
                                    <label>Email:</label>
                                    <input class="span9" type="text" />
                                </div>
                                <div class="span12 field-box">
                                    <label>Phone:</label>
                                    <input class="span9" type="text" />
                                </div>
                                <div class="span12 field-box">
                                    <label>Website:</label>
                                    <input class="span9" type="text" />
                                </div>
                                <div class="span12 field-box">
                                    <label>Address:</label>
                                    <div class="address-fields">
                                        <input class="span12" type="text" placeholder="Street address" />
                                        <input class="span12 small" type="text" placeholder="City" />
                                        <input class="span12 small" type="text" placeholder="State" />
                                        <input class="span12 small last" type="text" placeholder="Postal Code" />
                                    </div>
                                </div>
                                <div class="span12 field-box textarea">
                                    <label>Notes:</label>
                                    <textarea class="span9"></textarea>
                                    <span class="charactersleft">90 characters remaining. Field limited to 100 characters</span>
                                </div>
                                <div class="span11 field-box actions">
                                    <input type="button" class="btn-glow primary" value="Create user" />
                                    <span>OR</span>
                                    <input type="reset" value="Cancel" class="reset" />
                                </div>
                            </form-->
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>

                    <!-- side right column -->
                    <div class="span3 form-sidebar pull-right">
                        <!--div class="btn-group toggle-inputs hidden-tablet">
                            <button class="glow left active" data-input="inline">INLINE INPUTS</button>
                            <button class="glow right" data-input="normal">NORMAL INPUTS</button>
                        </div-->
                        <div class="alert alert-info hidden-tablet">
                            <i class="icon-lightbulb pull-left"></i>
                            请在左侧填写管理员相关信息，包括管理员账号、电子邮箱以及密码。
                        </div>                        
                        <h6>重要提示：</h6>
                        <p>管理员可以管理后台功能模块</p>
                        <p>请谨慎修改</p>
                        <!--ul>
                            <li><a href="#">Upload a vCard file</a></li>
                            <li><a href="#">Import from a CSV file</a></li>
                            <li><a href="#">Import from an Excel file</a></li>
                        </ul-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->

