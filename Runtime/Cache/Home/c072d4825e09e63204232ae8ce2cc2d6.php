<?php if (!defined('THINK_PATH')) exit();?><div class="block-bar">
    <div class="container">
        <div class="block-body row">
            <div class="common-block" style="margin:0 10px;">
                <div style="margin:0 -10px;">
                    <div class="col-xs-9">
                        <div>
                            <h2>
                                <?php echo modC('FORUM_POST_SHOW_TITLE', L('_POST_HOT_'), 'Forum');?>
                            </h2>

                            <div>
                                <?php if(is_array($forum_post_list)): $i = 0; $__LIST__ = $forum_post_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $user = query_user(array('avatar128','avatar64','nickname','uid','space_url'),$vo['uid']); ?>
                                    <div class="clearfix">
                                        <div class="col-xs-2 text-center">
                                            <p>
                                                <a href="<?php echo ($user["space_url"]); ?>">
                                                    <img src="<?php echo ($user["avatar64"]); ?>" ucard="<?php echo ($user["uid"]); ?>" class="avatar-img"/>
                                                </a>
                                            </p>
                                        </div>
                                        <div class="col-xs-10">
                                            <p>
                                                <a class="forum_forum_name" href="<?php echo U('Forum/Index/forum',array('id'=>$vo['forum_id']));?>">[<?php echo (text($vo["forum"]["title"])); ?>]</a>
                                                <a class="forum-list-title-link" title="<?php echo (text($vo["title"])); ?>"
                                                   href="<?php echo U('Forum/Index/detail',array('id'=>$vo['id']));?>"><?php echo (mb_substr(htmlspecialchars($vo["title"]),0,30,'utf-8')); ?>
                                                </a>
                                                <?php if(($document["is_top"]) == "2"): ?><span class="label label-badge label-danger"><?php echo L('_ALL_SITE_');?></span>
                                                    <?php else: ?>
                                                    <?php if(($document["is_top"]) == "1"): ?><span class="label label-badge label-info"><?php echo L('');?></span><?php endif; endif; ?>
                                            </p>

                                            <p class="pull-right text-muted">
                                                <span><?php echo L('_READ_');?>（<?php echo ($vo["view_count"]); ?>）</span>
                                                <span style="width: 1em; display: inline-block;">&nbsp;</span>
                                                <span><?php echo L('_REPLY_');?>（<?php echo ($vo["reply_count"]); ?>）</span>
                                            </p>

                                            <p class="text-muted author">
                                                <a href="<?php echo ($user["space_url"]); ?>" ucard="<?php echo ($user["uid"]); ?>"><?php echo (op_t($user["nickname"])); ?></a>
                                                <?php echo L('_PUBLISH_'); echo L('_COLON_'); echo (friendlydate($vo["create_time"])); ?> |
                                                <?php echo L('_LAST_REPLY_TIME_'); echo L('_COLON_'); echo (friendlydate($vo["last_reply_time"])); ?>
                                            </p>
                                        </div>
                                    </div>

                                    <?php if($i != count($forum_post_list)): ?><hr class="forum-list-hr"/>
                                        <?php else: ?>
                                        <div class="forum-list-no-hr"></div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div>
                            <h2><?php echo modC('FORUM_SHOW_TITLE', L(''), 'Forum');?></h2>

                            <div class="clearfix position-forums">
                                <?php if(is_array($forum_show)): $i = 0; $__LIST__ = $forum_show;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="clearfix">
                                        <div class="col-xs-4 ">
                                            <a href="<?php echo U('Forum/Index/forum',array('id'=>$vo['id']));?>"><img
                                                    src="<?php echo (getthumbimagebyid($vo["logo"],128,128)); ?>"> </a>
                                        </div>
                                        <div class="col-xs-4 text-ellipsis">
                                            <a class="title" href="<?php echo U('Forum/Index/forum',array('id'=>$vo['id']));?>">
                                                <?php echo (text($vo["title"])); ?>
                                            </a>

                                            <div class="text-muted">
                                                <?php echo L('_POST_'); echo L('_COLON_'); echo ($vo["post_count"]); ?>
                                            </div>

                                        </div>
                                        <div class="col-xs-4">
                                            <?php if(($vo["hasFollowed"]) == "1"): ?><a class="follow-simple" data-role="followingSimple"
                                                   onclick="forum.following_simple(this)"
                                                   data-id="<?php echo ($vo["id"]); ?>"><span><?php echo L('_MINUS_');?> <?php echo L('_FOLLOWED_');?></span> </a>
                                                <?php else: ?>
                                                <a class="follow-simple" onclick="forum.following_simple(this)" data-role="followingSimple"
                                                   data-id="<?php echo ($vo["id"]); ?>"><span><?php echo L('_PLUS_');?> <?php echo L('_FOLLOWERS_');?></span> </a><?php endif; ?>
                                        </div>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

</div>
<style>
    .position-forums >div{
        margin-bottom: 15px;
    }
    .position-forums .text-muted{
        margin-top: 5px;
    }
    .position-forums .follow-simple{
        font-size: 14px;
        color: #4f8ad0;
    }
    .forum-list-hr{
        margin-top: 0px;
        margin-bottom: 10px;
    }
    .forum-list-no-hr{
        padding: 10px;
    }
</style>
<script>
    $(function () {
        ucard();
    })
    var forum = {
        'following_simple': function (obj) {
            var id = $(obj).attr('data-id');
            var $obj = $('[data-role=followingSimple][data-id='+id+']');

            $.post(U('Forum/index/doFollowing'), {id: id}, function (msg) {
                handleAjax(msg);
                if (msg.status == 1) {
                    if(msg.follow==0){
                        $obj.each(function(){
                            $(this).find('span').text("<?php echo L('_PLUS_');?> <?php echo L('_FOLLOWERS_');?>");
                        })
                    }else{
                        $obj.each(function(){
                            $(this).find('span').text("<?php echo L('_MINUS_');?> <?php echo L('_FOLLOWED_');?>");
                        })
                    }
                }
            })
        }
    };
</script>