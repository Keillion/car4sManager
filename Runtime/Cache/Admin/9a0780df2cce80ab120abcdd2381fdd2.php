<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|<?php echo L('_SNS_BACKSTAGE_MANAGE_');?></title>
    <link href="/opensns/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">


    <!--OC 自定义样式-->
    <link rel="stylesheet" href="/opensns/Application/Admin/Static/css/oc.css" media="all">
    <!--OC 自定义样式 end-->
    <link rel="stylesheet" href="/opensns/Public/static/os-icon/simple-line-icons.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="/opensns/Application/Admin/Static/css/oc/admin.css" media="all">
    <!--adminlte-->
    <link rel="stylesheet" href="/opensns/Application/Admin/Static/adminlte/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/opensns/Application/Admin/Static/adminlte/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/opensns/Application/Admin/Static/adminlte/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/opensns/Application/Admin/Static/adminlte/plugins/iCheck/flat/blue.css">
    <link href="/opensns/Application/Admin/Static/bootstrap/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/opensns/Application/Admin/Static/bootstrap/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="/opensns/Application/Admin/Static/bootstrap/css/components.min.css" rel="stylesheet" id="style_components" type="text/css">

    <link rel="stylesheet" href="/opensns/Application/Admin/Static/css/adminlte.css" media="all">
    <link rel="stylesheet" href="/opensns/Application/Admin/Static/css/namecard.css" media="all">
    <!--adminlte end-->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="/opensns/Application/Admin/Static/bootstrap/plugins/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css"/>
    <link href="/opensns/Application/Admin/Static/adminlte/plugins/jQueryUI/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME LAYOUT STYLES -->

    <!--[if lt IE 9]>
    <script type="text/javascript" src="/opensns/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/opensns/Public/js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/opensns/Application/Admin/Static/js/jquery.mousewheel.js"></script>
    <!--<![endif]-->
    
    <script type="text/javascript">
        var ThinkPHP = window.Think = {
            "ROOT": "/opensns", //当前网站地址
            "APP": "/opensns/index.php?s=", //当前项目地址
            "PUBLIC": "/opensns/Public", //项目公共目录地址
            "DEEP": "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINF<?php echo L("_O_SEGMENTATION_");?>
            "MODEL": ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR": ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"],
            'URL_MODEL': "<?php echo C('URL_MODEL');?>"
        }
        var _ROOT_ = "/opensns";
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo U('Index/index');?>" class="logo">
            <img style="height: 38px;margin-top: -6px" src="/opensns/Application/Admin/Static/images/logo.png" alt="logo" class="logo-default">
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="collapse navbar-collapse navbar-collapse-example">
                <ul class="nav navbar-nav top-menu">
                    <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i; if(($menu["hide"]) != "1"): ?><li data-id="<?php echo ($menu["id"]); ?>" class="mega-menu-dropdown <?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>">
                                <a href="<?php echo (u($menu["url"])); ?>" class="dropdown-toggle " data-hover="dropdown"
                                   data-close-others="true">
                                    <?php if(($menu["icon"]) != ""): ?><i class="icon-<?php echo ($menu["icon"]); ?>"></i>&nbsp;<?php endif; ?>
                                    <?php echo ($menu["title"]); ?>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu" style="min-width: 700px;">
                                    <li>
                                        <!-- Content container to add padding -->
                                        <div class="mega-menu-content">
                                            <div class="row">
                                                <?php $k=0; ?>
                                                <?php if(is_array($menu["children"])): $i = 0; $__LIST__ = $menu["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$children): $mod = ($i % 2 );++$i; $k++; if(($k%4)==1){ $style="clear:left"; }else{ $style=""; } ?>
                                                    <div class="col-md-3" style="<?php echo ($style); ?>">
                                                        <ul class="mega-menu-submenu">
                                                            <li><h3><?php echo ($key); ?></h3></li>
                                                            <?php if(is_array($children)): $i = 0; $__LIST__ = $children;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><li>
                                                                    <a href="<?php echo (u($child["url"])); ?>"><?php echo ($child["title"]); ?></a>
                                                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </ul>
                                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="javascript:;" onclick="clear_cache()"><i class="icon-trash"></i> <?php echo L('_CACHE_CLEAR_');?></a>
                    </li>
                    <li><a target="_blank" href="<?php echo U('Home/Index/index');?>"><i class="icon-copy"></i>
                        <?php echo L('_FORESTAGE_OPEN_');?></a></li>
                    <li class="dropdown" style="margin-right: 15px;">
                        <?php $avatar = query_user(array('avatar128')); ?>
                        <a style="padding: 13px 15px 12px" href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img  src="<?php echo ($avatar["avatar32"]); ?>" class="avatar-img  small-img">
                            <?php echo session('user_auth.username');?>
                        </a>
                        <ul class="dropdown-menu name-card" role="menu">
                            <div class="head-box">
                                <img src="<?php echo ($avatar["avatar128"]); ?>" class="avatar-img">
                                <p> <?php echo session('user_auth.username');?>
                                    <small>注册于2016年7月</small>
                                </p>
                            </div>
                            <div class="btn-box">
                                <a href="<?php echo U('User/updatePassword');?>" class="btn">修改密码/昵称</a>
                                <a href="<?php echo U('Public/logout');?>" class="btn pull-right"><?php echo L('_EXIT_');?></a>
                            </div>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <!--<li style="  margin-right: 15px;">
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>-->
                    <script>
                        function clear_cache() {
                            $.get('/opensns/cc.php');
                            toast.success("<?php echo L('_CACHE_CLEAR_SUCCESS_'); echo L('_PERIOD_');?>");
                        }
                    </script>
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">模块</li>

                <?php if(is_array($__MODULE_MENU__)): $i = 0; $__LIST__ = $__MODULE_MENU__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v['is_setup'] AND $v['admin_entry']): if(!empty($v["children"])): ?><li class="treeview">
                                <a href="<?php echo U($v['admin_entry']);?>" title="<?php echo (text($v["alias"])); ?>">
                                    <i class="fa fa-<?php echo ($v['icon']); ?>"></i>
                                    <span><?php echo ($v["alias"]); ?></span>
                                </a>
                                <ul class="treeview-menu">
                                    <?php if(is_array($v["children"])): $i = 0; $__LIST__ = $v["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$children): $mod = ($i % 2 );++$i;?><li class="heading">
                                            <h4 class="uppercase"><i class="fa fa-chevron-circle-down"></i> <?php echo ($key); ?></h4>
                                        </li>
                                        <?php if(is_array($children)): $i = 0; $__LIST__ = $children;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><li><a href="<?php echo (u($child["url"])); ?>"><i class="fa fa-circle-o"></i>
                                                <?php echo ($child["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </li>
                            <?php else: ?>
                            <li>
                                <a href="<?php echo U($v['admin_entry']);?>" title="<?php echo (text($v["alias"])); ?>">
                                    <i class="fa fa-<?php echo ($v['icon']); ?>"></i>
                                    <span><?php echo ($v["alias"]); ?></span>
                                </a>
                            </li><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 900px;">
        <ul class="sub_menu">

            <?php if(!empty($__MENU__["child"])): ?><li class="treeview">

                    <ul class="treeview-menu">
                        <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$children): $mod = ($i % 2 );++$i; if(!empty($children)): ?><li class="heading">
                                    <h4 class="uppercase"><i class="fa fa-chevron-circle-down"></i> <?php echo ($key); ?></h4>
                                </li>
                                <?php if(is_array($children)): $i = 0; $__LIST__ = $children;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><li><a href="<?php echo (u($child["url"])); ?>"><i class="fa fa-circle-o"></i>
                                        <?php echo ($child["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li><?php endif; ?>
        </ul>
        <div style="padding:10px;padding-left:0;padding-bottom:10px;left: 335px;position:absolute;right: 0;bottom: 0;top: 50px;overflow: auto">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                
            </section>

            <!-- Main content -->
            <section class="content">
                <div id="main-content">
                    <?php if(($update) == "1"): ?><div id="top-alert" class="alert alert-success alert-dismissable"
                             style="position: absolute;left: 50%;margin-left: -150px;width: 300px;box-shadow: rgba(95, 95, 95, 0.4) 3px 3px 3px;z-index:999">
                            <i class="icon-ok-sign" style="font-size: 28px"></i> &nbsp;&nbsp;
                            <?php echo L('_VERSION_UPDATE_',array('href'=> '<a class="alert-link" href="'.U('Cloud/update').'">' ));?></a>
                            <button class="close fixed" style="margin-top: 4px;">&times;</button>
                        </div><?php endif; ?>

                    <div id="main" style="overflow-y:auto;overflow-x:hidden;">
                        
                            <!-- nav -->
                            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                                    <span><?php echo L('_YOUR_POSITION_'); echo L('_COLON_');?></span>
                                    <?php $i = '1'; ?>
                                    <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                                            <?php else: ?>
                                            <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                                        <?php $i = $i+1; endforeach; endif; ?>
                                </div><?php endif; ?>
                            <!-- nav -->
                        

                        <div class="admin-main-container">
                            
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo U('Admin/Index/index');?>">首页  </a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>顶部导航</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <a class="btn btn-danger" data-role="addTo"><i class="icon-plus"></i> 添加到常用操作</a>
<?php $controller = CONTROLLER_NAME; $current = M('Menu')->where("url like '%$controller/" . ACTION_NAME . "' AND pid > 0")->field('id')->find(); ?>
<input type="hidden" id="current" value="<?php echo ($current); ?>">

<script>
    $('[data-role="addTo"]').click(function () {
        var id = "<?php echo ($current['id']); ?>";
        var url = "<?php echo U('Admin/Index/addTo');?>";
        $.post(url, {id: id}, function (msg) {
            if (msg.status) {
                console.log(msg);
                toast.success(msg.info);
                /*setTimeout(function () {
                 window.location.reload();
                 }, 500);*/
            } else {
                toast.error(msg.info);
            }
        }, 'json')
    });
</script>

        </div>
    </div>

    <div class="main-title">
        <h2><?php echo L("_NAVIGATION_MANAGEMENT_");?></h2>
    </div>


    <div class="with-padding">
        <form action="<?php echo U();?>" method="post" class="form-horizontal" >
            <ul class="channel-ul">
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li class="clearfix pLi">
    <input name="nav[1][sort][]" class="sort" style="display: none">

    <div class="pull-left nav_list">

        <select name="nav[1][type][]" class="form-control nav-type" style="width: 110px;">
            <option value="module"
            <?php if($nav['module_name']): ?>selected<?php endif; ?>
            ><?php echo L("_SYSTEM_MODULE_");?></option>
            <option value="custom"
            <?php if(!$nav['module_name']): ?>selected<?php endif; ?>
            ><?php echo L("_CUSTOM_");?></option>
        </select>

        <select name="nav[1][modul][]" class="form-control module"
                style="width: 110px;<?php if(!$nav['module_name']){ ?>display:none<?php } ?>">
            <?php foreach($module as $k=>$v){ ?>
            <option value="<?php echo ($v["entry"]); ?>" data-icon="<?php echo ($v["icon"]); ?>"
            <?php if(strtolower($nav['url']) == strtolower($v['entry'])): ?>selected<?php endif; ?>
            ><?php echo ($v["alias"]); ?></option>
            <?php }unset($k,$v) ?>
        </select>

        <input name="nav[1][title][]" placeholder=<?php echo L("_PLEASE_ENTER_THE_TITLE_WITH_DOUBLE_");?>
               class="form-control title" style="width: 110px;" value="<?php echo ($nav["title"]); ?>">

        <input name="nav[1][url][]" placeholder=<?php echo L("_PLEASE_ENTER_A_LINK_WITH_DOUBLE_");?> class="form-control url"
               style="width: 300px;<?php if($nav['module_name']){ ?>display:none<?php } ?>" value=" <?php echo ($nav["url"]); ?>">

    </div>
    <div class='pull-left' title=<?php echo L("__WITH_DOUBLE_");?>>
        <?php $icon = $nav['icon']; if(empty($nav['icon'])){ $icon = ''; } ?>
        <select name="nav[1][icon][]" title=<?php echo L("__WITH_DOUBLE_");?> class="select-os-icon" data-value="<?php echo ((isset($icon) && ($icon !== ""))?($icon):'-'); ?>"></select>
    </div>
    <div class='pull-left color-chose' title=<?php echo L("_SELECT_THE_ICON_BACKGROUND_COLOR_WITH_DOUBLE_");?>>
        <input name="nav[1][color][]" class='simple_color_callback' value="<?php echo ((isset($nav['color']) && ($nav['color'] !== ""))?($nav['color']):'#000000'); ?>"/>
    </div>
    <div class='pull-left new-blank '>
        <input name="nav[1][target][]" class="target_input" value="<?php echo ($nav['target']); ?>">
        <label title=<?php echo L("_THE_NEW_WINDOW_OPENS_WITH_DOUBLE_");?>><input class="target"
            <?php if($nav['target'] == 1): ?>checked<?php endif; ?>
            type="checkbox" value="1"><?php echo L("_NEW_WINDOW_OPENS_");?></label>
    </div>


    <div class='pull-left i-list'>

        <a href="javascript:" title=<?php echo L("_ADD_A_NAVIGATION_WITH_DOUBLE_");?> class="add-one"><i class="icon icon-plus"></i></a>
        <a href="javascript:"  title=<?php echo L("_REMOVE_THIS_NAVIGATION_WITH_DOUBLE_");?> class="remove-li"><i class="icon icon-remove"></i></a>
        <a href="javascript:" title=<?php echo L("_ADD_CHILD_NAVIGATION_WITH_DOUBLE_");?> class="add-child"><i class="icon icon-sitemap"></i></a>
        <a href="javascript:" title=<?php echo L("_MOBILE_NAVIGATION_SORT_WITH_DOUBLE_");?>><i class="icon icon-move sort-handle-1"></i></a>
        <a href="<?php echo U('Admin/Channel/customEdit',array('pid'=>$nav['pid'],'id'=>$nav['id']));?>">编辑</a>
    </div>


    <div class='pull-left band-text'>
        <input name="nav[1][band_text][]" class="form-control" placeholder=<?php echo L("_SIGN_POINTS_WITH_DOUBLE_");?>
               style="width: 110px;" value="<?php echo ($nav['band_text']); ?>">
    </div>

    <div class='pull-left color-chose' title=<?php echo L("_SELECT_THE_FLAG_COLOR_WITH_DOUBLE_");?>>
        <input name="nav[1][band_color][]" class='simple_color_callback'
               value="<?php echo ((isset($nav['band_color']) && ($nav['band_color'] !== ""))?($nav['band_color']):'#000000'); ?>"/>
    </div>
    <input type="hidden" name="nav[1][image][]" value="<?php echo ($nav['image']); ?>">
    <input type="hidden" name="nav[1][remark][]" value="<?php echo ($nav['remark']); ?>">

    <?php if($nav['child']){ ?>
    <div class="clearfix"></div>
    <ul class="ul-2" style="display: block;">
        <?php if(is_array($nav['child'])): $i = 0; $__LIST__ = $nav['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><li class="clearfix" >
    <input name="nav[2][pid][]" class="pid" style="display: none">
    <input name="nav[2][sort][]" class="sort" style="display: none" >
    <div class="pull-left nav_list">
        <select name="nav[2][type][]" class="form-control nav-type" style="width: 110px;">
            <option value="module" <?php if($child['module_name']): ?>selected<?php endif; ?>><?php echo L("_SYSTEM_MODULE_");?></option>
            <option value="custom" <?php if(!$child['module_name']): ?>selected<?php endif; ?>><?php echo L("_CUSTOM_");?></option>
        </select>

        <select name="nav[2][module][]" class="form-control module" style="width: 110px;<?php if(!$child['module_name']){ ?>display:none<?php } ?>">
            <?php foreach($module as $k=>$v){ ?>
            <option value="<?php echo ($v["entry"]); ?>" data-icon="<?php echo ($v["icon"]); ?>" <?php if(strtolower($child['url']) == strtolower($v['entry'])): ?>selected<?php endif; ?>><?php echo ($v["alias"]); ?></option>
            <?php }unset($k,$v) ?>
        </select>

        <input name="nav[2][title][]" placeholder=<?php echo L("_PLEASE_ENTER_THE_TITLE_WITH_DOUBLE_");?> class="form-control title" style="width: 110px;" value="<?php echo ($child["title"]); ?>">

        <input name="nav[2][url][]" placeholder=<?php echo L("_PLEASE_ENTER_A_LINK_WITH_DOUBLE_");?>  class="form-control url" style="width: 300px;<?php if($child['module_name']){ ?>display:none<?php } ?>" value=" <?php echo ($child["url"]); ?>">

    </div>
    <div class='pull-left' title=<?php echo L("_SELECT_ICON_WITH_DOUBLE_");?>>
        <select name="nav[2][icon][]" title=<?php echo L("_SELECT_ICON_WITH_DOUBLE_");?> class="select-os-icon" data-value="<?php echo ((isset($child['icon']) && ($child['icon'] !== ""))?($child['icon']):''); ?>"></select>
    </div>

    <div class='pull-left color-chose' title=<?php echo L("_SELECT_THE_ICON_BACKGROUND_COLOR_WITH_DOUBLE_");?>>
        <input name="nav[2][color][]" class='simple_color_callback'  value="<?php echo ((isset($child['color']) && ($child['color'] !== ""))?($child['color']):'#000000'); ?>"/>
    </div>
    <div class='pull-left new-blank ' >
        <input name="nav[2][target][]" class="target_input" value="<?php echo ($child['target']); ?>">
        <label title=<?php echo L("_THE_NEW_WINDOW_OPENS_WITH_DOUBLE_");?> > <input class="target" <?php if($child['target'] == 1): ?>checked<?php endif; ?>  type="checkbox" value="1"><?php echo L("_NEW_WINDOW_OPENS_");?></label>
    </div>


    <div class='pull-left i-list'>

        <a href="javascript:" title=<?php echo L("_ADD_NAVIGATION_WITH_DOUBLE_");?> class="add-two"><i class="icon icon-plus"></i></a>
        <a href="javascript:"   title=<?php echo L("_REMOVE_THIS_NAVIGATION_WITH_DOUBLE_");?> class="remove-li"><i class="icon icon-remove"></i></a>
        <a href="javascript:"  title=<?php echo L("_MOBILE_NAVIGATION_SORT_WITH_DOUBLE_");?>><i class="icon icon-move sort-handle-2"></i></a>
        <a href="<?php echo U('Admin/Channel/customEdit',array('pid'=>$child['pid'],'id'=>$child['id']));?>">编辑</a>
    </div>


    <div class='pull-left band-text'>
        <input name="nav[2][band_text][]" class="form-control" placeholder=<?php echo L("_SIGN_POINTS_WITH_DOUBLE_");?>  style="width: 110px;" value="<?php echo ($child['band_text']); ?>">
    </div>

    <div class='pull-left color-chose' title=<?php echo L("_SELECT_THE_FLAG_COLOR_WITH_DOUBLE_");?>>
        <input name="nav[2][band_color][]" class='simple_color_callback' value="<?php echo ((isset($child['band_color']) && ($child['band_color'] !== ""))?($child['band_color']):'#000000'); ?>"/>
    </div>
    <input type="hidden" name="nav[2][image][]" value="<?php echo ($child['image']); ?>">
    <input type="hidden" name="nav[2][remark][]" value="<?php echo ($child['remark']); ?>">
</li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>

    <?php } ?>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>

            <div class="form-item with-padding">
                <button class="btn submit-btn ajax-post no-refresh" id="submit" type="submit" target-form="form-horizontal"><?php echo L("_SURE_WITH_SPACE_");?></button>
                <button class="btn btn-return" onclick="javascript:history.back(-1);return false;"><?php echo L("_RETURN_WITH_SPACE_");?></button>
            </div>
        </form>
    </div>



<div id="one-nav" class="hide">
    <li class="clearfix pLi" >
        <input name="nav[1][sort][]" class="sort" style="display: none" >
        <div class="pull-left nav_list">
            <select name="nav[1][type][]" class="form-control nav-type" style="width: 110px;">
                <option value="module" ><?php echo L("_SYSTEM_MODULE_");?></option>
                <option value="custom" ><?php echo L("_CUSTOM_");?></option>
            </select>

            <select name="nav[1][module][]" class="form-control module" style="width: 110px;">
                <?php foreach($module as $k=>$v){ ?>
                <option value="<?php echo ($v["entry"]); ?>"  data-icon="<?php echo ($v["icon"]); ?>" ><?php echo ($v["alias"]); ?></option>
                <?php }unset($k,$v) ?>
            </select>

            <input name="nav[1][title][]" placeholder=<?php echo L("_PLEASE_ENTER_THE_TITLE_WITH_DOUBLE_");?> class="form-control title" style="width: 110px;" value="<?php echo ($module["0"]["alias"]); ?>">

                <input name="nav[1][url][]" placeholder=<?php echo L("_PLEASE_ENTER_A_LINK_WITH_DOUBLE_");?>  class="form-control url" style="width: 300px;display:none" value="<?php echo ($module["0"]["entry"]); ?>">

            </div>

        <div class='pull-left' title=<?php echo L("_SELECT_ICON_WITH_DOUBLE_");?>>
            <select name="nav[1][icon][]" title=<?php echo L("_SELECT_ICON_WITH_DOUBLE_");?> class="select-os-icon" data-value="<?php echo ($module["0"]["icon"]); ?>"></select>
        </div>

            <div class='pull-left color-chose' title=<?php echo L("_SELECT_THE_ICON_BACKGROUND_COLOR_WITH_DOUBLE_");?>>
                <input  name="nav[1][color][]" class='simple_color_callback' value="#000000"/>
            </div>
            <div class='pull-left new-blank ' >
                <input name="nav[1][target][]" class="target_input" value="0">
                <label title=<?php echo L("_THE_NEW_WINDOW_OPENS_WITH_DOUBLE_");?>> <input class="target" type="checkbox" value="1"><?php echo L("_NEW_WINDOW_OPENS_");?></label>
            </div>


            <div class='pull-left i-list'>

                <a href="javascript:" title=<?php echo L("_ADD_A_NAVIGATION_WITH_DOUBLE_");?>  class="add-one"><i class="icon icon-plus"></i></a>
                <a href="javascript:" title=<?php echo L("_REMOVE_THIS_NAVIGATION_WITH_DOUBLE_");?> class="remove-li"><i class="icon icon-remove"></i></a>
                <a href="javascript:" title=<?php echo L("_ADD_CHILD_NAVIGATION_WITH_DOUBLE_");?> class="add-child"><i class="icon icon-sitemap"></i></a>
                <a href="javascript:" title=<?php echo L("_MOBILE_NAVIGATION_SORT_WITH_DOUBLE_");?>><i class="icon icon-move sort-handle-1"></i></a>
                <a href="<?php echo U('Admin/Channel/customEdit',array('pid'=>$child['pid'],'id'=>$child['id']));?>">编辑</a>
            </div>


            <div class='pull-left band-text'>
                <input name="nav[1][band_text][]" class="form-control" placeholder=<?php echo L("_SIGN_POINTS_WITH_DOUBLE_");?>  style="width: 110px;" value="">
            </div>

            <div class='pull-left color-chose' title=<?php echo L("_SELECT_THE_FLAG_COLOR_WITH_DOUBLE_");?>>
                <input name="nav[1][band_color][]" class='simple_color_callback' value="#000000"/>
            </div>
            <input type="hidden" name="nav[1][image][]" value="0">
            <input type="hidden" name="nav[1][remark][]" value="0">
        </li>

    </div>

    <div id="two-nav" class="hide">

        <li class="clearfix" >
            <input name="nav[2][pid][]" class="pid" style="display: none">
            <input name="nav[2][sort][]" class="sort" style="display: none" >
            <div class="pull-left nav_list">

                <select name="nav[2][type][]" class="form-control nav-type" style="width: 110px;">
                    <option value="module" ><?php echo L("_SYSTEM_MODULE_");?></option>
                    <option value="custom" ><?php echo L("_CUSTOM_");?></option>
                </select>

                <select name="nav[2][module][]" class="form-control module" style="width: 110px;">
                    <?php foreach($module as $k=>$v){ ?>
                    <option value="<?php echo ($v["entry"]); ?>" data-icon="<?php echo ($v["icon"]); ?>" ><?php echo ($v["alias"]); ?></option>
                    <?php }unset($k,$v) ?>
                </select>

                <input name="nav[2][title][]" placeholder=<?php echo L("_PLEASE_ENTER_THE_TITLE_WITH_DOUBLE_");?> class="form-control title" style="width: 110px;" value="<?php echo ($module["0"]["alias"]); ?>">

                <input name="nav[2][url][]" placeholder=<?php echo L("_PLEASE_ENTER_A_LINK_WITH_DOUBLE_");?>  class="form-control url" style="width: 300px;display:none" value="<?php echo ($module["0"]["entry"]); ?>">

            </div>
            <div class='pull-left' title=<?php echo L("_SELECT_ICON_WITH_DOUBLE_");?>>
                <select name="nav[2][icon][]" title=<?php echo L("_SELECT_ICON_WITH_DOUBLE_");?> class="select-os-icon" data-value="<?php echo ($module["0"]["icon"]); ?>"></select>
            </div>
            <div class='pull-left color-chose' title=<?php echo L("_SELECT_THE_ICON_BACKGROUND_COLOR_WITH_DOUBLE_");?>>
                <input name="nav[2][color][]" class='simple_color_callback' value="#000000"/>
            </div>
            <div class='pull-left new-blank ' >
                <input name="nav[2][target][]" class="target_input" value="0">
                <label title=<?php echo L("_THE_NEW_WINDOW_OPENS_WITH_DOUBLE_");?>> <input class="target"  type="checkbox" value="1"><?php echo L("_NEW_WINDOW_OPENS_");?></label>
            </div>


            <div class='pull-left i-list'>

                <a href="javascript:" title=<?php echo L("_ADD_NAVIGATION_WITH_DOUBLE_");?>  class="add-two"><i class="icon icon-plus"></i></a>
                <a href="javascript:"  title=<?php echo L("_REMOVE_THIS_NAVIGATION_WITH_DOUBLE_");?> class="remove-li"><i class="icon icon-remove"></i></a>

                <a href="javascript:" title=<?php echo L("_MOBILE_NAVIGATION_SORT_WITH_DOUBLE_");?>><i class="icon icon-move sort-handle-2"></i></a>
                <a href="<?php echo U('Admin/Channel/customEdit',array('pid'=>$child['pid'],'id'=>$child['id']));?>">编辑</a>
            </div>


            <div class='pull-left band-text'>
                <input name="nav[2][band_text][]" class="form-control" placeholder=<?php echo L("_SIGN_POINTS_WITH_DOUBLE_");?>  style="width: 110px;" value="">
            </div>

            <div class='pull-left color-chose' title=<?php echo L("_SELECT_THE_FLAG_COLOR_WITH_DOUBLE_");?>>
                <input name="nav[2][band_color][]" class='simple_color_callback' value="#000000"/>
            </div>
            <input type="hidden" name="nav[2][image][]" value="0">
            <input type="hidden" name="nav[2][remark][]" value="0">
        </li>

    </div>




                        </div>

                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        
    </footer>
    <!-- Control Sidebar -->
    <!--<aside class="control-sidebar control-sidebar-dark" style="position: fixed;height: auto;">
        &lt;!&ndash; Create the tabs &ndash;&gt;
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab" aire-expend="true"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-stats-tab" data-toggle="tab"><i class="fa fa-gear"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        &lt;!&ndash; Tab panes &ndash;&gt;
        <div class="tab-content">
            &lt;!&ndash; Home tab content &ndash;&gt;
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                &lt;!&ndash; /.control-sidebar-menu &ndash;&gt;

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                &lt;!&ndash; /.control-sidebar-menu &ndash;&gt;

            </div>
            &lt;!&ndash; /.tab-pane &ndash;&gt;
            &lt;!&ndash; Stats tab content &ndash;&gt;
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            &lt;!&ndash; /.tab-pane &ndash;&gt;
            &lt;!&ndash; Settings tab content &ndash;&gt;
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    &lt;!&ndash; /.form-group &ndash;&gt;

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    &lt;!&ndash; /.form-group &ndash;&gt;

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    &lt;!&ndash; /.form-group &ndash;&gt;

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    &lt;!&ndash; /.form-group &ndash;&gt;

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    &lt;!&ndash; /.form-group &ndash;&gt;

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    &lt;!&ndash; /.form-group &ndash;&gt;
                </form>
            </div>
            &lt;!&ndash; /.tab-pane &ndash;&gt;
        </div>
    </aside>-->
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<?php if($report){ ?>
<div class="report_feedback" title="<?php echo L('_REPORT_EXPERIENCE_PLEASE_FILL_');?>" data-toggle="modal" data-target="#myModal">
    <div class="report_icon"></div>
    <span class="label label-badge label-danger report_point">1</span>
</div>
<div class="modal fade in" id="myModal" aria-hidden="false" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="report_form" action="<?php echo U('admin/admin/submitReport');?>" method="post">


                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                            class="sr-only"><?php echo L('_CLOSE_');?></span></button>
                    <h4 class="modal-title"><?php echo L('_REPORT_EXPERIENCE_');?></h4>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <!-- 帖子分类 -->
                        <div class="col-sm-12">
                            <div><?php echo L('_THANKS_HOPE_');?></div>

                            <label class="item-label"><?php echo L('_MOOD_MY_');?></label>

                            <div>
                                <select name="q1" class="report-select" style="width:400px;">
                                    <option value="0"><?php echo L('_ELECT_PLEASE_');?></option>
                                    <option><?php echo L('_HAPPY_');?></option>
                                    <option><?php echo L('_AGONY_');?></option>
                                    <option><?php echo L('_LOVE_');?></option>
                                    <option><?php echo L('_EXPECT_');?></option>
                                </select>
                            </div>

                            <label class="item-label"><?php echo L('_LOVE_MY_OPTION_');?></label>

                            <div>
                                <select name="q2" class="report-select" style="width:400px;">
                                    <option value="0"><?php echo L('_ELECT_PLEASE_');?></option>
                                    <?php if(is_array($this_update)): $i = 0; $__LIST__ = $this_update;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i;?><option value="<?php echo (htmlspecialchars($option)); ?>"><?php echo (htmlspecialchars($option)); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>

                            <label class="item-label"><?php echo L('_HATE_MY_OPTION_');?>
                            </label>

                            <div>
                                <select name="q3" class="report-select" style="width:400px;">
                                    <option value="0"><?php echo L('_ELECT_PLEASE_');?></option>
                                    <?php if(is_array($this_update)): $i = 0; $__LIST__ = $this_update;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i;?><option value="<?php echo (htmlspecialchars($option)); ?>"><?php echo (htmlspecialchars($option)); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>


                            <label class="item-label"><?php echo L('_EXPECTATION__MY_OPTION_');?>
                            </label>

                            <div>
                                <select name="q4" class="report-select" style="width:400px;">
                                    <option value="0"><?php echo L('_ELECT_PLEASE_');?></option>
                                    <?php if(is_array($future_update)): $i = 0; $__LIST__ = $future_update;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i;?><option value="<?php echo (htmlspecialchars($option)); ?>"><?php echo (htmlspecialchars($option)); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php if(strval($report['url'])!=''){ ?>
                    <a class="pull-left" href="<?php echo ($report['url']); ?>" target="_blank"><?php echo L('_UPDATE_LOOK_');?></a>
                    <?php } ?>
                    <button type="submit" class="btn ajax-post" target-form="report_form"><?php echo L('_CONFIRM_');?></button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php } ?>

<!--adminlte-->
    <!-- FastClick -->
<script src="/opensns/Application/Admin/Static/adminlte/plugins/fastclick/fastclick.js"></script>
<script src="/opensns/Application/Admin/Static/adminlte/bootstrap/js/bootstrap.min.js"></script>
<script src="/opensns/Application/Admin/Static/bootstrap/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/opensns/Application/Admin/Static/adminlte/dist/js/app.min.js"></script>
<link rel="stylesheet" href="/opensns/Application/Admin/Static/bootstrap/plugins/bootstrap-toastr/toastr.min.css">
<script src="/opensns/Application/Admin/Static/bootstrap/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
<script src="/opensns/Application/Admin/Static/adminlte/plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
<!--adminlte end-->
<script type="text/javascript" src="/opensns/Application/Admin/Static/js/com/com.toast.class.js"></script>

<script type="text/javascript">
    (function () {
        var ThinkPHP = window.Think = {
            "ROOT": "/opensns", //当前网站地址
            "APP": "/opensns/index.php?s=", //当前项目地址
            "PUBLIC": "/opensns/Public", //项目公共目录地址
            "DEEP": "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL": ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR": ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"],
            'URL_MODEL': "<?php echo C('URL_MODEL');?>"
        }
    })();
</script>
<script type="text/javascript" src="/opensns/Public/static/think.js"></script>
<script type="text/javascript" src="/opensns/Application/Admin/Static/js/common.js"></script>


<script type="text/javascript">
    +function () {
        var $window = $(window), $subnav = $("#subnav"), url;
        $window.resize(function () {
            $("#main").css("min-height", $window.height() - 130);
        }).resize();

        // 导航栏超出窗口高度后的模拟滚动条
        var sHeight = $(".sidebar").height();
        var subHeight = $(".subnav").height();
        var diff = subHeight - sHeight; //250
        var sub = $(".subnav");
        if (diff > 0) {
            $(window).mousewheel(function (event, delta) {
                if (delta > 0) {
                    if (parseInt(sub.css('marginTop')) > -10) {
                        sub.css('marginTop', '0px');
                    } else {
                        sub.css('marginTop', '+=' + 10);
                    }
                } else {
                    if (parseInt(sub.css('marginTop')) < '-' + (diff - 10)) {
                        sub.css('marginTop', '-' + (diff - 10));
                    } else {
                        sub.css('marginTop', '-=' + 10);
                    }
                }
            });
        }
    }();
    highlight_subnav("<?php echo U('Admin'.'/'.CONTROLLER_NAME.'/'.ACTION_NAME,$_GET);?>")
</script>

    <script src="/opensns/Application/Admin/Static/js/jquery.simple-color.js"></script>
    <script src="/opensns/Application/Admin/Static/bootstrap/plugins/zui.js"></script>
    <script src="/opensns/Application/Admin/Static/js/channel.js"></script>
    <link href="/opensns/Public/static/os-icon/select-os-icon.css" rel="stylesheet">
    <script src="/opensns/Public/static/os-icon/select-os-icon.js"></script>
    <script>
        $(function(){
           $('.select-os-icon').select_os_icon();
        });
    </script>



</body>
</html>