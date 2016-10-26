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
            
    <li class="active"><a href="javascript:;"><?php echo L('_INSTALL_PROTOCOL_');?></a></li>
    <li class="active"><a href="javascript:;">环境检测</a></li>
    <li><a href="javascript:;">创建数据库</a></li>
    <li><a href="javascript:;">安装</a></li>
    <li><a href="javascript:;">完成</a></li>

        </ul>
        <div>

        </div>
        <div class="article">
            
    <h1>环境检测</h1>
    <table class="table">
        <caption><h2>运行环境检查</h2></caption>
        <thead>
            <tr>
                <th>项目</th>
                <th>所需配置</th>
                <th>当前配置</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($env)): $i = 0; $__LIST__ = $env;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($item[0]); ?></td>
                    <td><?php echo ($item[1]); ?></td>
                    <td><i class="ico-<?php echo ($item[4]); ?>">&nbsp;</i><?php echo ($item[3]); ?></td>       
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
	<?php if(isset($dirfile)): ?><table class="table">
        <caption><h2>目录、文件权限检查</h2></caption>
        <thead>
            <tr>
                <th>目录/文件</th>
                <th>所需状态</th>
                <th>当前状态</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($dirfile)): $i = 0; $__LIST__ = $dirfile;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($item[3]); ?></td>
                    <td><i class="icon-ok">&nbsp;</i>可写</td>
                    <td><i class="icon-<?php echo ($item[2]); ?>">&nbsp;</i><?php echo ($item[1]); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table><?php endif; ?>
    <table class="table">
        <caption><h2>函数依赖性检查</h2></caption>
        <thead>
            <tr>
                <th>函数名称</th>
                <th>检查结果</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($func)): $i = 0; $__LIST__ = $func;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($item[0]); ?>()</td>
                    <td><i class="icon-<?php echo ($item[2]); ?>">&nbsp;</i><?php echo ($item[1]); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>


            <div>
                
    <a class="btn btn-block btn-primary btn-large" href="<?php echo U('Install/step2');?>">下一步</a>
    <a class="btn btn-default btn-block btn-large" style="background: white;" href="<?php echo U('Index/index');?>">上一步</a>


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