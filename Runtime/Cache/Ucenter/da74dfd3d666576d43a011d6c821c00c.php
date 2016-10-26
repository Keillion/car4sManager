<?php if (!defined('THINK_PATH')) exit();?><link href="/opensns/Application/Ucenter/Static/css/new-login.css" type="text/css" rel="stylesheet">
<div class="main-box modal-dialog">
    <div class="top-banner modal-header">
        <p style="margin-top: 15px">
            <?php $logo = get_cover(modC('LOGO',0,'Config'),'path'); $logo = $logo?$logo:'/opensns/Public/images/logo.png'; ?>
            <a class="navbar-brand logo" href="<?php echo U('Home/Index/index');?>" style="float: none"><img src="<?php echo ($logo); ?>"/></a>
        </p>
        <p>简单而强大的开源社群系统，安全值得信赖</p>
    </div>
    <div class="login-wrap modal-body">
        <div data-role="login_info"></div>
        <div class="lg_left">
            <div class="lg_lf_top">
                <h2><?php echo L('_WELCOME_TO_');?> <?php if(($login_type) == "login"): ?><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/opensns" title="L('_ENTER_INDEX_')"><?php echo modC('WEB_SITE_NAME',L('_OPEN_SNS_'),'Config');?></a><?php else: echo modC('WEB_SITE_NAME',L('_OPEN_SNS_'),'Config'); endif; ?> ！</h2>
            </div>
            <div class="clearfix"></div>
            <form action="/opensns/index.php?s=/ucenter/member/login.html" method="post" class="lg_lf_form ">

                <div class="form-group new-form">
                    <label for="inputEmail" class=".sr-only col-xs-12" style="display: none"></label> <span class="new-icon user-icon"></span>

                    <input type="text" id="inputEmail" class="form-control new-input" placeholder="<?php echo L('_INPUT_PLEASE_'); echo ($ph); ?>" ajaxurl="/member/checkUserNameUnique.html" errormsg="<?php echo L('_MI_USERNAME_ERROR_');?>" nullmsg="<?php echo L('_MI_USERNAME_');?>" datatype="*4-32" value="" name="username" autocomplete="off">
                    <div class="clearfix"></div>
                </div>

                <div class="form-group new-form">
                    <label for="inputPassword" class=".sr-only col-xs-12" style="display: none"></label> <span class="new-icon password-icon" style="background-position: -10px -153px"></span>

                    <div id="password_block" class="input-group pull-right" style="width: 94%;">
                        <input type="password" id="inputPassword" class="form-control new-input" placeholder="<?php echo L('_NEW_PW_INPUT_');?>" errormsg="<?php echo L('_PW_ERROR_');?>" nullmsg="<?php echo L('_PW_INPUT_ERROR_');?>" datatype="*6-30" name="password">
                        <div class="input-group-addon show-password add-show"> <a style="width: 100%;height: 100%" href="javascript:void(0);"><i onclick="change_show(this)" class="icon-eye-open"></i></a>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <?php if(check_verify_open('login')): ?><div class="form-group new-form">
                        <label for="verifyCode" class=".sr-only col-xs-12" style="display: none"></label>

                        <span class="new-icon code-icon"></span>
                        <input type="text" id="verifyCode" class="form-control new-input" placeholder="<?php echo L('_VERIFY_CODE_');?>"
                               errormsg="<?php echo L('_MI_CODE_NULL_');?>" nullmsg="<?php echo L('_MI_CODE_NULL_');?>" datatype="*5-5" name="verify">

                        <div class="new-code lg_lf_fm_verify">
                            <img class="verifyimg reloadverify  " alt="<?php echo L('_MI_ALT_');?>" src="<?php echo U('verify');?>">
                        </div>
                        <div class="col-xs-11 Validform_checktip text-warning lg_lf_fm_tip col-sm-offset-1"></div>
                        <div class="clearfix"></div>
                    </div><?php endif; ?>
                <div class="clearfix form-group" style="margin-top: -15px">
                    <div class="col-xs-6" style="padding-left: 0">
                        <label style="color: #848484;font-weight: normal">
                            <input type="checkbox" checked="checked" name="remember" value="1" style="cursor:pointer;">
                            <?php echo L('_REMEMBER_LOGIN_');?>
                        </label>
                    </div>
                    <?php if(check_reg_type('email')||check_reg_type('mobile')){ ?>
                    <div class="col-xs-6 text-right" style="padding-right: 0">
                        <div class=""><a class="" href="<?php echo U('Member/mi');?>"
                                         style="color: #848484;font-size: 12px;"><?php echo L('_FORGET_PW_'); echo L('_QUESTION_');?></a>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <input name="from" type="hidden" value="<?php echo $_SERVER['HTTP_REFERER'] ?>">
                <?php session('login_http_referer',$_SERVER['HTTP_REFERER']); ?>

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary green-btn"><?php echo L('_LOGIN_SPACE_');?></button>
                </div>
            </form>
            <div class="lg_center"></div>

            <div class="cut-off">
                <div class="chose-other">
                    或使用以下方式登录
                </div>
            </div>
            <div class="other-login">
                <?php echo hook('syncLogin');?>
            </div>
            <?php $register_type=modC('REGISTER_TYPE','normal','Invite'); $register_type=explode(',',$register_type); $only_open_register=0; if(in_array('invite',$register_type)&&!in_array('normal',$register_type)){ $only_open_register=1; } ?>
            <script>
                var ONLY_OPEN_REGISTER = "<?php echo ($only_open_register); ?>";
            </script>
            <a data-url="<?php echo U('Ucenter/Member/register');?>" data-role="do_register">
                <div class="to-register">
                    <span> 还没有账号？</span>立即注册<i class="icon icon-circle-arrow-right"></i>
                </div>
            </a>
        </div>



        <div class="clearfix"></div>

    </div>
</div>





<script type="text/javascript">
    var quickLogin = "<?php echo ($login_type); ?>";
    $(document)
            .ajaxStart(function () {
                $("button:submit").addClass("log-in").attr("disabled", true);
            })
            .ajaxStop(function () {
                $("button:submit").removeClass("log-in").attr("disabled", false);
            });

    function change_show(obj) {
        if ($(obj).hasClass('icon-eye-open')) {
            var value = $('#inputPassword').val().trim();
            var html = '<input type="text" value="' + value + '" id="inputPassword" class="form-control new-input" placeholder="'+"<?php echo L('_NEW_PW_INPUT_');?>"+'" errormsg="'+"<?php echo L('_PW_ERROR_');?>"+'" nullmsg="'+"<?php echo L('_PW_INPUT_ERROR_');?>"+'" datatype="*6-30" name="password">' +
                    '<div class="input-group-addon show-password add-show"><a style="width: 100%;height: 100%" href="javascript:void(0);"><i onclick="change_show(this)" class="icon-eye-close"></a></div>';
            $('#password_block').html(html);
        } else {
            var value = $('#inputPassword').val().trim();
            var html = '<input type="password" value="' + value + '" id="inputPassword" class="form-control new-input" placeholder="'+"<?php echo L('_NEW_PW_INPUT_');?>"+'" errormsg="'+"<?php echo L('_PW_ERROR_');?>"+'" nullmsg="'+"<?php echo L('_PW_INPUT_ERROR_');?>"+'" datatype="*6-30" name="password">' +
                    '<div class="input-group-addon show-password add-show"><a style="width: 100%;height: 100%" href="javascript:void(0);"><i onclick="change_show(this)" class="icon-eye-open"></a></div>';
            $('#password_block').html(html);
        }
    }

    $(function () {
        $("form").submit(function () {
            toast.showLoading();
            var self = $(this);
            $.post(self.attr("action"), self.serialize(), success, "json");
            return false;
            function success(data) {
                if (data.status) {
                    if (data.url==undefined&&quickLogin == "quickLogin") {
                        toast.success("<?php echo L('_WELCOME_RETURN_'); echo L('_PERIOD_');?>"+data.info, "<?php echo L('_TIP_GENTLE_');?>");
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500);
                    } else {
                        toast.success("<?php echo L('_WELCOME_RETURN_REDIRECTING_');?>"+data.info, "<?php echo L('_TIP_GENTLE_');?>");
                        setTimeout(function () {
                            window.location.href = data.url;
                        }, 1500);
                    }
                } else {
                    toast.error(data.info, "<?php echo L('_TIP_GENTLE_');?>");
                    //self.find(".Validform_checktip").text(data.info);
                    //刷新验证码
                    $(".reloadverify").click();
                }
                toast.hideLoading();
            }
        });
        var verifyimg = $(".verifyimg").attr("src");
        $(".reloadverify").click(function () {
            if (verifyimg.indexOf('?') > 0) {
                $(".verifyimg").attr("src", verifyimg + '&random=' + Math.random());
            } else {
                $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/, '') + '?' + Math.random());
            }
        });
    });
</script>