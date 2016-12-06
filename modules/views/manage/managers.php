
    

	<!-- main container -->
    <div class="content">
      
        <div class="container-fluid">
            <div id="pad-wrapper" class="users-list">
                <div class="row-fluid header">
                    <h3>管理员列表</h3>
                    <div class="span10 pull-right">
                        <input type="text" class="span5 search" placeholder="输入管理员名字..." />
                        
                        <!-- custom popup filter -->
                        <!-- styles are located in css/elements.css -->
                        <!-- script that enables this dropdown is located in js/theme.js -->
                        <div class="ui-dropdown">
                            <div class="head" data-toggle="tooltip" title="Click me!">
                                过滤
                                <i class="arrow-down"></i>
                            </div>  
                            <div class="dialog">
                                <div class="pointer">
                                    <div class="arrow"></div>
                                    <div class="arrow_border"></div>
                                </div>
                                <div class="body">
                                    <p class="title">
                                        输入过滤条件:
                                    </p>
                                    <div class="form">
                                        <select>
                                            <option />姓名
                                            <option />邮箱
                                            <option />订单号
                                            <option />Signed up
                                            <option />Last seen
                                        </select>
                                        <select>
                                            <option />等于
                                            <option />不等于
                                            <option />is greater than
                                            <option />starts with
                                            <option />contains
                                        </select>
                                        <input type="text" />
                                        <a class="btn-flat small">添加过滤</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="<?php echo yii\helpers\Url::to(['manage/reg']);?>" class="btn-flat success pull-right">
                            <span>&#43;</span>
                            添加管理员
                        </a>
                    </div>
                </div>

                <!-- Users table -->
                <div class="row-fluid table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="span2">
                                    管理员ID
                                </th>
                                <th class="span2">
                                    <span class="line"></span>管理员账号
                                </th>
                                <th class="span2">
                                    <span class="line"></span>管理员邮箱
                                </th>
                                <th class="span2">
                                    <span class="line"></span>最后登录时间
                                </th>
                                <th class="span2">
                                    <span class="line"></span>最后登录
                                </th>
                                <th class="span2">
                                    <span class="line"></span>添加时间
                                </th>
                                <th class="span2">
                                    <span class="line"></span>操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($managers as $manager): ?>
                        <!-- row -->
                        <tr class="first">
                            <td>
                                <?php echo $manager->adminid;?>
                            </td>
                            <td>
                                <?php echo $manager->adminuser;?>
                            </td>
                            <td>
                                <?php echo $manager->adminemail;?>
                            </td>
                            <td>
                                <?php echo date("Y-m-d H:i:s",$manager->logintime);?>
                            </td>
                            <td>
                                <?php echo long2ip($manager->loginip);?>
                            </td>
                            <td>
                                <?php echo date("Y-m-d H:i:s",$manager->createtime);?>
                            </td>
                            <td class="align-right">
                                <a href="#">删除</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <div class="pagination pull-right">
                    <?php echo yii\widgets\LinkPager::widget(['pagination'=>$pager,'prevPageLabel'=>'&#8249;','nextPageLabel'=>'&#8250;'])?>
                    <!--ul>
                        <li><a href="#">&#8249;</a></li>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&#8250;</a></li>
                    </ul-->
                </div>
                <!-- end users table -->
            </div>
        </div>
    </div>
    <!-- end main container -->


