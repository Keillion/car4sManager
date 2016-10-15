<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Weibo\Widget;

use Think\Controller;

/**
 * 分类widget
 * 用于动态调用分类信息
 */
class WeiboDetailWidget extends Controller
{

    /* 显示指定分类的同级分类或子分类列表 */
    public function detail($weibo_id,$can_hide=0)
    {
        if(!$can_hide){
            $weiboCacheModel=D('Weibo/WeiboCache');
            $html=$weiboCacheModel->getCacheHtml($weibo_id);//获取weibo html缓存
            if($html===null){
                $weibo = D('Weibo/Weibo')->getWeiboDetail($weibo_id);
                $this->assign('weibo', $weibo);
                $html=$this->fetch(T('Weibo@Widget/detail'));
                $weiboCacheModel->setCacheHtml($weibo_id,$html);//设置weibo html缓存
            }
            $html=replace_weibo_html($html,$weibo_id);
            $this->show($html);
        }else{
            $weibo = D('Weibo/Weibo')->getWeiboDetail($weibo_id);

            $map['follow_who'] = $weibo['uid'];
            $map['who_follow'] = is_login();
            if($map['follow_who'] != $map['who_follow']) {
                $res = M('follow')->where($map)->find();
                if($res) {
                    $sign = 1;
                }
            } else {
                $sign = 1;
            }
            $this->assign('sign', $sign);

            //置顶动态隐藏显示
            $this->assign('can_hide',$can_hide);
            $top_hide=0;
            if($can_hide){
                $hide_ids=cookie('Weibo_index_top_hide_ids');
                $hide_ids=explode(',',$hide_ids);
                $top_hide=in_array($weibo_id,$hide_ids);
            }
            $this->assign('top_hide',$top_hide);

            $this->assign('weibo', $weibo);
            $this->display(T('Weibo@Widget/detail'));
        }
    }

    public function weibo_html($weibo_id)
    {
        $weibo = D('Weibo/Weibo')->getWeiboDetail($weibo_id);
        $this->assign('weibo', $weibo);
        $html=$this->fetch(T('Application://Weibo@Widget/detail'));
        $weiboCacheModel=D('Weibo/WeiboCache');
        $weiboCacheModel->setCacheHtml($weibo_id,$html);//设置weibo html缓存
        $html=replace_weibo_html($html,$weibo_id);
        return $html;
    }
}
