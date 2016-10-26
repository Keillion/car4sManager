<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>安装</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- zui -->
    <link href="/opensns/Public/zui/css/zui.css" rel="stylesheet">
    <script src="/opensns/Public/static/jquery-1.10.2.min.js"></script>
</head>

<body style="background:  rgb(230, 234, 234)">
<div class="container" style="background: white;margin-top: 50px;margin-bottom: 50px;width:800px">
    <div class="with-padding row">
        <ul class="nav nav-secondary">
            
    <li class="active"><a href="javascript:;">安装协议</a></li>
    <li class="active"><a href="javascript:;">环境检测</a></li>
    <li class="active"><a href="javascript:;">创建数据库</a></li>
    <li><a href="javascript:;">
        <?php if(($_SESSION['opensns']['update']) == "1"): ?>升级
            <?php else: ?>
            安装<?php endif; ?>
    </a></li>
    <li><a href="javascript:;">完成</a></li>

        </ul>
        <div>

        </div>
        <div class="article">
            
    <?php
 defined('SAE_MYSQL_HOST_M') or define('SAE_MYSQL_HOST_M', '127.0.0.1'); defined('SAE_MYSQL_HOST_M') or define('SAE_MYSQL_PORT', '3306'); ?>
    <h1>创建数据库</h1>

    <form action="/opensns/install.php?s=/install/step2.html" method="post" target="_self">
        <div class="create-database">
            <h2>数据库连接信息</h2>
            <table class="table-hover table">
                <tr>
                    <td>
                        <select class="form-control" name="db[]">
                            <option>mysqli</option>
                            <option>mysql</option>
                        </select>
                    </td>
                    <td>
                        数据库连接类型，服务器支持的情况下建议使用mysqli
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="form-control" type="text" name="db[]"
                               value="<?php if(defined("SAE_MYSQL_HOST_M")): echo (SAE_MYSQL_HOST_M); else: ?>127.0.0.1<?php endif; ?>">
                    </td>
                    <td>
                        <span>数据库服务器，数据库服务器IP，一般为127.0.0.1，使用localhost可能导致网站速度变慢</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="form-control" type="text" name="db[]"
                               value="<?php if(defined("SAE_MYSQL_DB")): echo (SAE_MYSQL_DB); endif; ?>">
                    </td>
                    <td>
                        <span>数据库名</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="form-control" type="text" name="db[]"
                               value="<?php if(defined("SAE_MYSQL_USER")): echo (SAE_MYSQL_USER); endif; ?>">
                    </td>
                    <td>
                        <span>数据库用户名</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="form-control" type="password" name="db[]"
                               value="<?php if(defined("SAE_MYSQL_PASS")): echo (SAE_MYSQL_PASS); endif; ?>">
                    </td>
                    <td>
                        <span>数据库密码</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="form-control" type="text" name="db[]"
                               value="<?php if(defined("SAE_MYSQL_PORT")): echo (SAE_MYSQL_PORT); else: ?>3306<?php endif; ?>">
                    </td>
                    <td>
                        <span>数据库端口，数据库服务连接端口，一般为3306</span>
                    </td>

                </tr>
                <tr>
                    <td>
                        <input class="form-control" type="text" name="db[]" value="ocenter_">
                    </td>
                    <td>
                        <span>数据表前缀，同一个数据库运行多个系统时请修改为不同的前缀</span>
                    </td>
                </tr>

            </table>

        </div>

        <div class="create-database">
            <h2>创始人帐号信息</h2>
            <table class="table-hover table">
                <tr>
                    <td>
                        <input class="form-control" type="text" name="admin[]" value="admin">
                    </td>
                    <td>
                        <span>用户名( <span  class="text-danger">英文+数字，严禁中文与特殊字符</span> )</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="form-control" type="password" name="admin[]" value="">
                    </td>
                    <td>
                        <span>密码</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="form-control" type="password" name="admin[]" value="">
                    </td>
                    <td>
                        <span>确认密码</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="form-control" type="text" name="admin[]" value="admin@admin.com">
                    </td>
                    <td>
                        <span>邮箱，请填写正确的邮箱便于收取提醒邮件</span>
                    </td>
                </tr>

            </table>
            <div></div>
        </div>
    </form>


            <div>
                
    <button id="submit" type="button" class="btn btn-primary btn-large  btn-block"
                               onclick="$('form').submit();return false;">下一步
</button>
    <a class="btn btn-large btn-block btn-default" style="background: white;" href="<?php echo U('Install/step1');?>">上一步</a>



            </div>
        </div>
    </div>
    <style>
        body{
            font-family: Arial, "Microsoft Yahei",'新宋体';
        }
    </style>

</div>

</body>
</html>