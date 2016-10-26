<?php if (!defined('THINK_PATH')) exit(); if(!empty($event_lists)): ?><div class="block-bar">
    <div class="container">
        <div class=" block-body row">
            <div class="col-xs-12">
                <div class="common-block">
                    <header style="margin-bottom: 0;padding-bottom: 0px"><?php echo modC('EVENT_SHOW_TITLE', '', 'Event');?></header>

                    <div class="common-block-body">
                        <div class="news_list">
                            <?php if(is_array($event_lists)): $i = 0; $__LIST__ = $event_lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="col-xs-6" style="position: relative">
                                    <hr style="margin-top: 10px;margin-bottom: 10px"/>
                                    <?php if($data['cover_id'] != 0): ?><div class="col-xs-4">
                                            <?php if(time() < $data['eTime']): ?><div class="event_state" style="background: #d61f39;color: #ffffff;position: absolute">
                                                    <?php echo L('_IN_PROGRESS_');?>
                                                </div>
                                                <?php else: ?>
                                                <div class="event_state" style="background: #000;color: #ffffff;position: absolute">
                                                    <?php echo L('_ALREADY_OVER_');?>
                                                </div><?php endif; ?>
                                            <a title="<?php echo (op_t($data["title"])); ?>"
                                               href="<?php echo U('Event/index/detail',array('id'=>$data['id']));?>">

                                                <img alt="<?php echo (op_t($data["title"])); ?>"
                                                     src="<?php echo (getthumbimagebyid($data["cover_id"],153,135)); ?>"
                                                     style="width: 153px;height: 135px">
                                            </a>
                                        </div>
                                        <div class="col-xs-8 ">
                                            <div>
                                                <h3 class="text-more" style="width: 100%;margin-top: 0">
                                                    <a title="<?php echo (op_t($data["title"])); ?>"
                                                       href="<?php echo U('Event/index/detail',array('id'=>$data['id']));?>"><?php echo ($data["title"]); ?></a>
                                                </h3>
                                            </div>
                                            <div>
                                                <span class="author" style="color: #848484"><a href="<?php echo ($data["user"]["space_url"]); ?>"
                                                                        ucard="<?php echo ($data["uid"]); ?>"><?php echo ($data["user"]["nickname"]); ?></a>&nbsp;&nbsp;时间&nbsp;&nbsp;<?php echo date('Y-m-d',$data['sTime']);?>--<?php echo date('Y-m-d',$data['eTime']);?></span><br>
                                                <span >报名截止时间：<?php echo date('Y-m-d',$data['deadline']);?> </span>
                                                <p style="margin: 0px"><span style="width: 90%;" class="text-more">简介：<?php echo (getshortsp($data["explain"],30)); ?></span></p>
                                            </div>
                                            <div>

                                            </div>
                                        </div>
                                        <?php else: ?>
                                        <div class="col-xs-12">
                                            <div>
                                                <h3 class="text-more" style="width: 100%">
                                                    <a title="<?php echo (op_t($data["title"])); ?>"
                                                       href="<?php echo U('Event/index/detail',array('id'=>$data['id']));?>"><?php echo ($data["title"]); ?></a>
                                                </h3>
                                            </div>
                                            <div>
                                                <span class="author"><a href="<?php echo ($data["user"]["space_url"]); ?>"
                                                                        ucard="<?php echo ($data["uid"]); ?>"><?php echo ($data["user"]["nickname"]); ?></a>&nbsp;&nbsp;时间&nbsp;&nbsp;<?php echo date('Y-m-d',$data['sTime']);?>--<?php echo date('Y-m-d',$data['eTime']);?></span><br>
                                                <span >报名截止时间：<?php echo date('Y-m-d',$data['deadline']);?> </span>
                                                <p style="margin: 0px"><span style="width: 80%;" class="text-more">简介：<?php echo (getshortsp($data["explain"],30)); ?></span></p>
                                            </div>
                                            <div>

                                            </div>
                                        </div><?php endif; ?>
                                    <span class="pull-right" style="position: absolute;right: 0;bottom: 0">
                                        &nbsp;&nbsp;<span><i class="icon-eye-open"></i>  <?php echo ($data["view_count"]); ?> </span>&nbsp;&nbsp;
                                    </span>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php endif; ?>