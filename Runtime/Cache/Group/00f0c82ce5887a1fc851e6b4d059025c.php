<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php echo hook('syncMeta');?>

<?php $oneplus_seo_meta = get_seo_meta($vars,$seo); ?>
<?php if($oneplus_seo_meta['title']): ?><title><?php echo ($oneplus_seo_meta['title']); ?></title>
    <?php else: ?>
    <title><?php echo modC('WEB_SITE_NAME',L('_OPEN_SNS_'),'Config');?></title><?php endif; ?>
<?php if($oneplus_seo_meta['keywords']): ?><meta name="keywords" content="<?php echo ($oneplus_seo_meta['keywords']); ?>"/><?php endif; ?>
<?php if($oneplus_seo_meta['description']): ?><meta name="description" content="<?php echo ($oneplus_seo_meta['description']); ?>"/><?php endif; ?>

<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" media="screen" />

<!-- zui -->
<link href="/opensns/Public/zui/css/zui.css" rel="stylesheet">

<link href="/opensns/Public/zui/css/zui-theme.css" rel="stylesheet">
<link href="/opensns/Public/static/os-icon/simple-line-icons.min.css" rel="stylesheet">
<link href="/opensns/Public/static/os-loading/loading.css" rel="stylesheet">
<link href="/opensns/Public/css/core.css" rel="stylesheet"/>
<link type="text/css" rel="stylesheet" href="/opensns/Public/js/ext/magnific/magnific-popup.css"/>
<!--<script src="/opensns/Public/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/opensns/Public/js/com/com.functions.js"></script>

<script type="text/javascript" src="/opensns/Public/js/core.js"></script>-->
<script src="/opensns/Public/js.php?f=js/jquery-2.0.3.min.js,js/com/com.functions.js,static/os-loading/loading.js,js/core.js,js/com/com.toast.class.js,js/com/com.ucard.js"></script>



<!--Style-->
<!--合并前的js-->
<?php $config = api('Config/lists'); C($config); $count_code=C('COUNT_CODE'); ?>
<script type="text/javascript">
    var ThinkPHP = window.Think = {
        "ROOT": "/opensns", //当前网站地址
        "APP": "/opensns/index.php?s=", //当前项目地址
        "PUBLIC": "/opensns/Public", //项目公共目录地址
        "DEEP": "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
        "MODEL": ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
        "VAR": ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"],
        'URL_MODEL': "<?php echo C('URL_MODEL');?>",
        'WEIBO_ID': "<?php echo C('SHARE_WEIBO_ID');?>"
    }
    var cookie_config={
        "prefix":"<?php echo C('COOKIE_PREFIX');?>",// cookie 名称前缀
        "path" :"<?php echo C('COOKIE_PATH');?>", // cookie 保存路径
        "domain":"<?php echo C('COOKIE_DOMAIN');?>" // cookie 有效域名
    }
    var Config={
        'GET_INFORMATION':<?php echo modC('GET_INFORMATION',1,'Config');?>,
        'GET_INFORMATION_INTERNAL':<?php echo modC('GET_INFORMATION_INTERNAL',10,'Config');?>*1000
    }
    var weibo_comment_order = "<?php echo modC('COMMENT_ORDER',0,'WEIBO');?>";
</script>

<script src="/opensns/Public/lang.php?module=<?php echo strtolower(MODULE_NAME);?>&lang=<?php echo LANG_SET;?>"></script>

<script src="/opensns/Public/expression.php"></script>

<!-- Bootstrap库 -->
<!--
<?php $js[]=urlencode('/static/bootstrap/js/bootstrap.min.js'); ?>

&lt;!&ndash; 其他库 &ndash;&gt;
<script src="/opensns/Public/static/qtip/jquery.qtip.js"></script>
<script type="text/javascript" src="/opensns/Public/Core/js/ext/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="/opensns/Public/static/jquery.iframe-transport.js"></script>
-->
<!--CNZZ广告管家，可自行更改-->
<!--<script type='text/javascript' src='http://js.adm.cnzz.net/js/abase.js'></script>-->
<!--CNZZ广告管家，可自行更改end-->
<!-- 自定义js -->
<!--<script src="/opensns/Public/js.php?get=<?php echo implode(',',$js);?>"></script>-->


<script>
    //全局内容的定义
    var _ROOT_ = "/opensns";
    var MID = "<?php echo is_login();?>";
    var MODULE_NAME="<?php echo MODULE_NAME; ?>";
    var ACTION_NAME="<?php echo ACTION_NAME; ?>";
    var CONTROLLER_NAME ="<?php echo CONTROLLER_NAME; ?>";
    var initNum = "<?php echo modC('WEIBO_NUM',140,'WEIBO');?>";
    function adjust_navbar(){
        $('#sub_nav').css('top',$('#nav_bar').height());
        $('#main-container').css('padding-top',$('#nav_bar').height()+$('#sub_nav').height()+20)
    }
</script>

<audio id="music" src="" autoplay="autoplay"></audio>
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>
</head>
<body>
	<!-- 头部 -->
	<script src="/opensns/Public/js/com/com.talker.class.js"></script>
<?php if((is_login()) ): ?><div id="talker">

    </div><?php endif; ?>

<?php D('Common/Member')->need_login(); ?>
<!--[if lt IE 8]>
<div class="alert alert-danger" style="margin-bottom: 0"><?php echo L('_TIP_BROWSER_DEPRECATED_1_');?> <strong><?php echo L('_TIP_BROWSER_DEPRECATED_2_');?></strong>
    <?php echo L('_TIP_BROWSER_DEPRECATED_3_');?> <a target="_blank"
                                          href="http://browsehappy.com/"><?php echo L('_TIP_BROWSER_DEPRECATED_4_');?></a>
    <?php echo L('_TIP_BROWSER_DEPRECATED_5_');?>
</div>
<![endif]-->
<script src="/opensns/Public/js/canvas.js"></script>
<script>
    $(document).ready(function () {
        $('[data-role="show_hide"]').click(function () {
            $("#search_box").slideToggle("slow");
        });
        $('[data-role="close"]').click(function () {
            $("#search_box").slideToggle("slow");
        });
        });

</script>
<div class="container-fluid topp-box">
    <div class="col-xs-2 box">
        <div class="img-wrap">
            <?php $logo = get_cover(modC('LOGO',0,'Config'),'path'); $logo = $logo?$logo:'/opensns/Public/images/logo.png'; ?>
            <a class="navbar-brand logo" href="<?php echo U('Home/Index/index');?>"><img src="<?php echo ($logo); ?>"/></a>
        </div>
    </div>
    <div class="col-xs-7 box ">
        <div id="nav_bar" class="nav_bar">
            <div class=" sat-nav">
                <ul class="first-ul">
                    <?php $__NAV__ = D('Channel')->lists(true);$__NAV__ = list_to_tree($__NAV__, "id", "pid", "_"); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i; if(($nav['_']) != ""): ?><li class="dropdown show-hide-ul">
                                <a title="<?php echo ($nav["title"]); ?>" class="dropdown-toggle nav_item first-a" data-toggle="dropdown"
                                   href="#">
                                    <i class="os-icon-<?php echo ($nav["icon"]); ?> app-icon"></i>
                                    <?php echo ($nav["title"]); ?>
                                    <i class="icon-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu nav-menu">
                                    <?php if(is_array($nav["_"])): $i = 0; $__LIST__ = $nav["_"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subnav): $mod = ($i % 2 );++$i; if(($subnav["icon"] == 1) or ($subnav["icon"] == 2) or ($subnav["icon"] == 3) or ($subnav["icon"] == 4) or ($subnav["icon"] == 5) or ($subnav["icon"] == 6) or ($subnav["icon"] == 7) or ($subnav["icon"] == 8) or ($subnav["icon"] == 9) or ($subnav["icon"] == 10) or ($subnav["icon"] == 11) or ($subnav["icon"] == 12) or ($subnav["icon"] == 13) or ($subnav["icon"] == 14)): ?><li role="presentation">
                                                <a class="drop-a" role="menuitem" tabindex="-1" href="<?php echo (get_nav_url($subnav["url"])); ?>" target="<?php if(($subnav["target"]) == "1"): ?>_blank<?php else: ?>_self<?php endif; ?>">
                                                    <p>
                                                        <span><img  src="Application/Admin/Static/images/customedit/<?php echo ($subnav["icon"]); ?>.png"></span>
                                                        <span><?php echo ($subnav["title"]); ?></span>
                                                    </p>
                                                    <p><?php echo ($subnav["band_text"]); ?></p>
                                                </a>
                                            </li>
                                            <?php else: ?>
                                            <li role="presentation">
                                                <a class="drop-a" role="menuitem" tabindex="-1" href="<?php echo (get_nav_url($subnav["url"])); ?>" target="<?php if(($subnav["target"]) == "1"): ?>_blank<?php else: ?>_self<?php endif; ?>">
                                                    <p>
                                                        <i class="os-icon-<?php echo ($subnav["icon"]); ?>"></i>
                                                        <span><?php echo ($subnav["title"]); ?></span>
                                                    </p>
                                                    <p><?php echo ($subnav["band_text"]); ?></p>
                                                </a>
                                            </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </li>
                            <?php else: ?>
                            <li class="<?php if((get_nav_active($nav["url"])) == "1"): ?>active<?php else: endif; ?>">
                                <a class="first-a" title="<?php echo ($nav["title"]); ?>" href="<?php echo (get_nav_url($nav["url"])); ?>" target="<?php if(($nav["target"]) == "1"): ?>_blank<?php else: ?>_self<?php endif; ?>">
                                    <i class="os-icon-<?php echo ($nav["icon"]); ?> app-icon "></i>
                                    <span ><?php echo ($nav["title"]); ?></span>
                                    <span class="label label-badge rank-label" title="<?php echo ($nav["band_text"]); ?>" style="background: <?php echo ($nav["band_color"]); ?> !important;color:white !important;"><?php echo ($nav["band_text"]); ?></span>
                                </a>
                            </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xs-3 box c-b-right" style="text-align: right">
        <?php if(is_login()): ?><li class="dropdown li-hover self-info">
                <?php $uid = is_login(); $reg_time = D('member')->where(array('uid' => $uid))->getField('reg_time'); $reg_date = date('Y-m-d', $reg_time); $self = query_user(array('title', 'avatar128', 'nickname', 'uid', 'space_url', 'score', 'title', 'fans', 'following', 'weibocount', 'rank_link')); $map = getUserConfigMap('user_cover'); $map['role_id'] = 0; $model = D('Ucenter/UserConfig'); $cover = $model->findData($map); $self['cover_id'] = $cover['value']; $self['cover_path'] = getThumbImageById($cover['value'], 273, 80); ?>
                <a role="button" class="dropdown-toggle dropdown-toggle-avatar" data-toggle="dropdown">
                    <span><img src="<?php echo ($self["avatar32"]); ?>" class="avatar-img nav-img"></span>
                    <span><?php echo ($self["nickname"]); ?></span>
                </a>
                <ul class="dropdown-menu user-card" role="menu">
                    <div class="bg-wrap">
                        <?php if($self['cover_id']): ?><img class="cover uc_top_img_bg_weibo" src="<?php echo ($self['cover_path']); ?>">
                            <?php else: ?>
                            <img class="cover uc_top_img_bg_weibo" src="/opensns/Application/Core/Static/images/bg.jpg"><?php endif; ?>
                        <?php if(is_login() && $self['uid'] == is_login()): ?><div class="change_cover"><a data-type="ajax" data-url="<?php echo U('Ucenter/Public/changeCover');?>"
                                                         data-toggle="modal" data-title="<?php echo L('_UPLOAD_COVER_');?>" style="color: white;"><img
                                    class="img-responsive" src="/opensns/Application/Core/Static/images/fractional.png" style="width: 25px;"></a>
                            </div><?php endif; ?>
                    </div>

                    <div class="my-bg-info">
                        <div class="bg-avatar">
                            <a class="link-change-avatar" href="<?php echo U('Ucenter/Config/avatar');?>" title="更换头像">
                                <img src="<?php echo ($self["avatar128"]); ?>" class="avatar-img "/>
                            </a>
                        </div>
                    <span class="nickname">
                        <a ucard="<?php echo ($self["uid"]); ?>" href="<?php echo ($self["space_url"]); ?>" class="user_name"><?php echo (htmlspecialchars($self["nickname"])); ?></a>
                    </span>

                        <div class="bg-numb row ">
                            <a href="<?php echo U('Ucenter/index/applist',array('uid'=>$self['uid'],'type'=>'Weibo'));?>">
                                <div class="col-xs-4 num">
                                    <span>微博</span>
                                    <span><?php echo ($self["weibocount"]); ?></span>
                                </div>
                            </a>
                            <a href="<?php echo U('Ucenter/index/fans',array('uid'=>$self['uid']));?>" title="<?php echo L('_FANS_COUNT_');?>">
                                <div class="col-xs-4 num">
                                    <span><?php echo L('_FANS_');?></span>
                                    <span><?php echo ($self["fans"]); ?></span>
                                </div>
                            </a>
                            <a href="<?php echo U('Ucenter/index/following',array('uid'=>$self['uid']));?>" title="<?php echo L('_FOLLOW_COUNT_');?>">
                                <div class="col-xs-4 num" style="border: none">
                                    <span><?php echo L('_FOLLOW_');?></span>
                                    <span><?php echo ($self["following"]); ?></span>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="row grade-box">
                        <?php $title=D('Ucenter/Title')->getCurrentTitleInfo(is_login()); ?>
                        <script>
                            $(function () {
                                $('#upgrade').tooltip({
                                            html: true,
                                            title: '<?php echo L("_CURRENT_LEVEL_");?>：<?php echo ($self["title"]); ?> <br/><?php echo L("_NEXT_LEVEL_");?>：<?php echo ($title["next"]); ?><br/><?php echo L("_NOW_");?>：<?php echo ($self["score"]); ?><br/><?php echo L("_NEED_");?>：<?php echo ($title["upgrade_require"]); ?><br/><?php echo L("_LAST_");?>： <?php echo ($title["left"]); ?><br/><?php echo L("_PROGRESS_");?>：<?php echo ($title["percent"]); ?>% <br/> '
                                        }
                                );
                            })
                        </script>
                        <div class="col-xs-2 l-box"><span>等级</span></div>
                        <div class="col-xs-10 r-box">
                            <div id="upgrade" class="upgrade" data-toggle="tooltip" data-placement="bottom" title="">
                                <div class="grade-bottom" ></div>
                                <div class="grade-top" style="width:<?php echo ($title["percent"]); ?>%;"></div>
                            </div>
                        </div>
                        <p class="pull-right"><span><?php echo ($self["score"]); ?></span>/<span style="color: #ccc"><?php echo ($title["upgrade_require"]); ?></span></p>
                    </div>

                    <div class="link-wrap">
                        <div class="link-box row">
                            <a href="<?php echo ($self["space_url"]); ?>">
                                <div class="col-xs-6 l-p0">
                                    <i class="os-icon-user"></i>
                                    个人主页
                                </div>
                            </a>
                            <a href="<?php echo U('Ucenter/index/ranking');?>">
                                <div class="col-xs-6 r-p0">
                                    <i class="os-icon-bar-chart"></i>
                                    排行榜
                                </div>
                            </a>
                        </div>
                        <div class="link-box row" style="border: none;padding-top: 0">
                            <a href="<?php echo U('ucenter/Config/index');?>" title="<?php echo L('_EDIT_INFO_');?>">
                                <div class="col-xs-6 l-p0">
                                    <i class="os-icon-settings"></i>
                                    <?php echo L('_EDIT_INFO_');?>
                                </div>
                            </a>
                            <div class="col-xs-6 r-p0"  style="cursor: pointer" event-node="logout" >
                                <i class="os-icon-logout"></i>
                                <?php echo L('_LOGOUT_');?>
                            </div>
                        </div>
                    </div>
                </ul>
            </li>

            <li class="dropdown-toggle dropdown-toggle-avatar li-hover show-hide-ul">
                <a title="<?php echo L('_EDIT_INFO_');?>" href="#" data-toggle="dropdown" >
                    <i class="icon-cog"></i>
                </a>
                <ul class="dropdown-menu  drop-self nav-menu" role="menu">
                    <?php $user_nav=S('common_user_nav'); if($user_nav===false){ $user_nav=D('UserNav')->order('sort asc')->where('status=1')->select(); S('common_user_nav',$user_nav); } ?>

                    <?php if(is_array($user_nav)): $i = 0; $__LIST__ = $user_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a style="color:<?php echo ($vo["color"]); ?>"
                               target="<?php if(($vo["target"]) == "1"): ?>_blank<?php else: ?>_self<?php endif; ?>" href="<?php echo get_nav_url($vo['url']);?>">
                                <?php echo ($vo["title"]); ?>
                            <span class="label label-badge rank-label" title="<?php echo ($vo["band_text"]); ?>"
                                style="background: <?php echo ($vo["band_color"]); ?> !important;color:white !important;"><?php echo ($vo["band_text"]); ?></span></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    <?php $register_type=modC('REGISTER_TYPE','normal','Invite'); $register_type=explode(',',$register_type); if(in_array('invite',$register_type)){ ?>
                    <li>
                        <a href="<?php echo U('ucenter/Invite/invite');?>"><?php echo L('_INVITE_FRIENDS_');?></a>
                    </li>
                    <?php } ?>

                    <?php echo hook('personalMenus');?>
                    <?php if(check_auth('Admin/Index/index')): ?><li>
                            <a href="<?php echo U('Admin/Index/index');?>" target="_blank"><?php echo L('_MANAGE_BACKGROUND_');?></a>
                        </li><?php endif; ?>
                </ul>
            </li>

            <li class="li-hover">
                <a data-role="open-message-box" data-toggle="modal" data-target="#message-box">
                    <div class="message-num" data-role="now-message-num"  style="display: none;"></div>
                    <i class="os-icon-bell"></i>
                </a>
            </li>
            <li class="li-hover">
                <a href="javascript:" id="show_box" data-role="show_hide">
                    <i class="icon-search"></i>
                </a>
            </li>
            <?php else: ?>
            <?php $open_quick_login=modC('OPEN_QUICK_LOGIN', 0, 'USERCONFIG'); $register_type=modC('REGISTER_TYPE','normal','Invite'); $register_type=explode(',',$register_type); $only_open_register=0; if(in_array('invite',$register_type)&&!in_array('normal',$register_type)){ $only_open_register=1; } ?>
            <script>
                var OPEN_QUICK_LOGIN = "<?php echo ($open_quick_login); ?>";
                var ONLY_OPEN_REGISTER = "<?php echo ($only_open_register); ?>";
            </script>
                <a class="top-btn" data-login="do_login"><?php echo L('_LOGIN_');?></a>
                <a class="top-btn" data-role="do_register" data-url="<?php echo U('Ucenter/Member/register');?>"><?php echo L('_REGISTER_');?></a><?php endif; ?>
    </div>
    <div class="container-fluid search-box" id="search_box" style="display: none">
        <canvas width="1835" height="374"></canvas>
        <div class="text-wrap">
            <div class="container text-box" style="margin: 0 auto!important;">
                <h1>无处不在,搜你所想</h1>
                <form class="navbar-form " action="<?php echo U('Home/Index/search');?>" method="post"
                      role="search" id="search">
                    <div class="search">
                        <span class="pull-left"><input type="text" name="keywords" class="input" placeholder="全站搜索"></span>
                        <a data-role="search"><i class="icon icon-search pull-right"></i></a>
                    </div>

                    </span>
                </form>

            </div>
            <div class="close-box" data-role="close">X</div>
        </div>
    </div>
</div>


<!--换肤插件钩子-->
<?php echo hook('setSkin');?>
<!--换肤插件钩子 end-->
<div id="tool" class="tool ">
    <?php echo hook('tool');?>
    <?php if(check_auth('Core/Admin/View')): ?><!--  <a href="javascript:;" class="admin-view"></a>--><?php endif; ?>
    <a  id="go-top" href="javascript:;" class="go-top "></a>

</div>
<?php if(is_login()&&(get_login_role_audit()==2||get_login_role_audit()==0)){ ?>
<div id="top-role-tip" class="alert alert-danger">
    <?php echo L('_TIP_ROLE_NOT_AUDITED1_');?> <strong><?php echo L('_TIP_ROLE_NOT_AUDITED2_');?></strong><?php echo L('_TIP_ROLE_NOT_AUDITED3_');?>
    <a target="_blank" href="<?php echo U('ucenter/config/role');?>"><?php echo L('_TIP_ROLE_NOT_AUDITED4_');?></a>
</div>
<script>
    $(function () {
        $('#top-role-tip').css('margin-top', $('#nav_bar').height() + 15);
        $('#top-role-tip').css('margin-bottom', -$('#nav_bar').height()+15);
    });
</script>
<?php } ?>



<script>
    $(function() {
        $('[data-role="search"]').click(function() {
            $("#search").submit();
        })
    })
</script>
	<!-- /头部 -->
	
	<!-- 主体 -->
	<div class="main-wrapper">
    
    <?php echo W('Group/SubMenu/render',array($sub_menu,$current,L('_MODULE_'),''));?>

    <!--顶部导航之后的钩子，调用公告等-->
<?php echo hook('afterTop');?>
<!--顶部导航之后的钩子，调用公告等 end-->
    <div id="main-container" class="container">
        <div class="row">
            

    <link type="text/css" rel="stylesheet" href="/opensns/Application/Group/Static/css/group.css"/>
    <script type="text/javascript" src="/opensns/Application/Group/Static/js/common.js"></script>
    <div class="col-xs-8">
        <div class="common-block group_info">
            <header>
                <div class="pull-right">

                </div>
                <i class="icon-list-ul icon-border-circle"></i>&nbsp; <?php echo L('_MY_TOPIC_');?> &nbsp;
                <small><?php echo ($posts["count"]); ?> <?php echo L('_PIECE_');?></small>

            </header>
            <div class="common-block-body">

                <section class="items">
                    <?php if(is_array($posts["data"])): $i = 0; $__LIST__ = $posts["data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="clearfix item">
    <div class="col-xs-2">
        <div class="text-center alert ">
            <strong><?php echo ($vo["support_count"]); ?></strong><br/> <?php echo L('_LIKE_');?>
        </div>
    </div>
    <div class="col-xs-10">
        <div class="item-heading">
            <!-- <div class="pull-right"><a href="###"><i class="icon-pencil"></i> 编辑</a> &nbsp;<a
                     href="#"><i
                     class="icon-remove"></i> 删除</a></div>-->
            <h4 class="text-more" style="width: 100%">
                <a target="_blank" href="<?php echo U('index/group?id='.$vo['group_id']);?>" class="label label-success"><?php echo ($vo["group"]["title"]); ?></a>&nbsp;
                <a target="_blank" href="<?php echo U('group/index/detail',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a>
            </h4>
        </div>
        <div class="item-content">
            <?php if(($vo["cover"]) != ""): ?><div class="media pull-right">
                    <a target="_blank" href="<?php echo U('group/index/detail',array('id'=>$vo['id']));?>">
                        <div class="img-thumbnail-wrap"
                             style="width:80px;height:80px;line-height:80px">
                            <img class="" src="<?php echo ($vo["cover"]); ?>">
                        </div>
                    </a>
                </div><?php endif; ?>

            <div class="text">
                <a target="_blank" href="<?php echo U('group/index/detail',array('id'=>$vo['id']));?>"><?php echo ($vo["summary"]); ?>...</a>
            </div>
        </div>
        <div class="item-footer">
            <!-- <span class="label">tag1</span>-->
            &nbsp;
            <a target="_blank" href="<?php echo U('group/index/detail',array('id'=>$vo['id']));?>" class="text-muted"><i
                    class="icon-comments"></i> <?php echo ($vo["reply_count"]); ?></a>&nbsp;
            <span class="text-muted"><?php echo (friendlydate($vo["create_time"])); ?></span>
        </div>
    </div>

</div><?php endforeach; endif; else: echo "" ;endif; ?>
                </section>
                <footer>
                    <?php echo ($posts["html"]); ?>
                </footer>
            </div>

        </div>

    </div>
    <div class="col-xs-4">
        <div class="common-block">
            <header>
                <?php echo L('_MY_GROUP_');?>
                <a href="<?php echo U('mygroup');?>" class="pull-right"><?php echo L('_ALL_');?></a>
            </header>
            <section>
                <ul class="group-list">
                    <?php if(is_array($groups)): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="clearfix">
                            <div class="col-xs-4">
                                <div class="img-thumbnail-wrap" style="width:80px;height:80px;line-height:80px">
                                    <a href="<?php echo U('group/index/group',array('id'=>$vo['id']));?>" target="_blank"><img
                                            class="" src="<?php echo (getthumbimagebyid($vo["logo"],80,80)); ?>"
                                            style="width: 80px;height: 80px"/></a>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <h4>
                                    <a href="<?php echo U('group/index/group',array('id'=>$vo['id']));?>" target="_blank"><?php echo ($vo["title"]); ?></a>
                                </h4>

                                <p>
                                    <?php echo ($vo["member_count"]); ?> <?php echo L('_GE_'); echo ((isset($vo["member_alias"]) && ($vo["member_alias"] !== ""))?($vo["member_alias"]):L('_MEMBER_')); ?>&nbsp;&nbsp;
                                </p>
                            </div>

                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </section>
        </div>
    </div>

        </div>
    </div>
</div>
	<!-- /主体 -->

	<!-- 底部 -->
	<!--<div style="display: none" class="footer-bar ">
    <div class="container" style="position: relative">
            <div class="col-xs-3 fot-box text-center">
                <p class="p1 logo_1">

                </p>
                <p class="p2">
                    文档中心
                </p>
                <p class="p3">
                    完善的建站教程、二次开发手册及官方特制视频教程，让您使用OpenSNS更简便
                </p>
                <a href="http://os.opensns.cn/book" target="_blank">
                <p class="p4">前往文档中心<i class="icon icon-double-angle-right"></i></p></a>
            </div>
            <div class="col-xs-3 fot-box text-center">
                <p class="p1 logo_2">

                </p>
                <p class="p2">
                    服务支持
                </p>
                <p class="p3">
                    站长圈：319678540<br/>
                    更多问题，商业客户请提交工单，独立技术服务团队，快速响应您的请求
                </p>
                <a href="https://jxxt.kf5.com/hc/" target="_blank">
                <p class="p4">提交工单<i class="icon icon-double-angle-right"></i></p></a>
            </div>
            <div class="col-xs-3 fot-box text-center">
                <p class="p1 logo_3">

                </p>
                <p class="p2">
                    专属客户经理
                </p>
                <p class="p3">
                    免费咨询，IM实时沟通，专人一对一贴心服务为您提供合适的解决方案，让您更轻松
                </p>
                <p class="p4">点击获取<i class="icon icon-double-angle-right"></i></p>
            </div>
            <div class="col-xs-3 fot-box text-center">
                <p class="p1 logo_4">

                </p>
                <p class="p2">
                    购买下载
                </p>
                <p class="p3">
                    一次购买，终生授权，商业客户定制优先排期，绝无任何隐形销售，让您更安心
                </p>
                <a href="http://www.opensns.cn/" target="_blank">
                <p class="p4">前往产品站<i class="icon icon-double-angle-right"></i></p></a>
            </div>
        <div class="btn-box text-center">
            <a href="javascript:" class="add-more icon-angle-down" data-role="close_more"></a>
        </div>
    </div>
</div>-->

<div class="next-box">
    <div class="container">
        <!--<div class="row text-center" style="height: 22px">
            <a href="javascript:" id="add_more" class="add-more icon-angle-up" data-role="add_more"></a>
        </div>-->
        <div class="row">
            <div class="col-xs-4 about-us">
                <p class="p-head">关于我们</p>
                <?php echo modC('ABOUT_US',L('_NOT_SET_NOW_'),'Config');?>
            </div>
            <div class="col-xs-4 text-center">
                <p style="margin-top: 5px">
                    <img src="/opensns/Public/images/code.png" alt="">
                </p>
            </div>
            <div class="col-xs-2 friend">
                <p class="p-head">友情链接</p>
                <?php echo W('Common/SuperLinks/superLinks');?>
            </div>
            <div class="col-xs-2 comp">
                <p class="p-head">公司</p>
                <a href="#" target="_blank">
                    <p><i class="icon icon-user"></i>加入我们</p>
                </a>
                <p><i class="icon icon-phone-sign"></i>xxx-xxxx-xxx</p>
                <p><i class="icon icon-envelope-alt"></i>？@？.？</p>
            </div>
        </div>
        <div class="row last-box text-center">
            <p>
                <span><?php echo modC('ICP',L('_NOT_SET_NOW_'),'Config');?></span>
                <span><?php echo modC('COPY_RIGHT',L('_NOT_SET_NOW_'),'Config');?></span>
            </p>
            <?php echo ($count_code); ?>
        </div>
    </div>
</div>

<!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->


<!-- 为了让html5shiv生效，请将所有的CSS都添加到此处 -->
<link type="text/css" rel="stylesheet" href="/opensns/Public/static/qtip/jquery.qtip.css"/>


<!--<script type="text/javascript" src="/opensns/Public/js/com/com.notify.class.js"></script>-->

<!-- 其他库-->
<!--<script src="/opensns/Public/static/qtip/jquery.qtip.js"></script>
<script type="text/javascript" src="/opensns/Public/js/ext/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="/opensns/Public/static/jquery.iframe-transport.js"></script>

<script type="text/javascript" src="/opensns/Public/js/ext/magnific/jquery.magnific-popup.min.js"></script>-->

<!--<script type="text/javascript" src="/opensns/Public/js/ext/placeholder/placeholder.js"></script>
<script type="text/javascript" src="/opensns/Public/js/ext/atwho/atwho.js"></script>
<script type="text/javascript" src="/opensns/Public/zui/js/zui.js"></script>-->
<link type="text/css" rel="stylesheet" href="/opensns/Public/js/ext/atwho/atwho.css"/>

<script src="/opensns/Public/js.php?t=js&f=js/com/com.notify.class.js,static/qtip/jquery.qtip.js,js/ext/slimscroll/jquery.slimscroll.min.js,js/ext/magnific/jquery.magnific-popup.min.js,js/ext/placeholder/placeholder.js,js/ext/atwho/atwho.js,zui/js/zui.js&v=<?php echo ($site["sys_version"]); ?>.js"></script>
<script type="text/javascript" src="/opensns/Public/static/jquery.iframe-transport.js"></script>

<script src="/opensns/Public/js/ext/lazyload/lazyload.js"></script>



<!-- 用于加载js代码 -->
<script>
    $(document).ready(function () {
        $('[data-role="add_more"]').click(function () {
            $(".footer-bar").fadeToggle();
            $("#add_more").hide();
        });
        $('[data-role="close_more"]').click(function () {
            $(".footer-bar").fadeToggle();
            $("#add_more").show("slow");
        });
    });
</script>
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<!-- 调用全站公告部件-->
<?php echo W('Common/Announce/render');?>

<!-- 调用消息部件-->
<?php echo W('Common/Message/render');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
    <?php echo ($count_code); ?>
    
</div>
<script src="https://dn-bts.qbox.me/sdk/bugtags-1.0.3.js"></script>
<script>
    // VERSION_NAME 替换为项目的版本，VERSION_CODE 替换为项目的子版本
    new Bugtags('d6023daa6c7467634636c87b3f16213e','8.12','VERSION_CODE');
</script>

	<!-- /底部 -->
</body>
</html>