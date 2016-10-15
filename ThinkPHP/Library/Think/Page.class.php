<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2013 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
namespace Think;

class Page{
    public $firstRow; // 起始行数
    public $listRows; // 列表每页显示行数
    public $parameter; // 分页跳转时要带的参数
    public $totalRows; // 总行数
    public $totalPages; // 分页总页面数
    public $rollPage   = 11;// 分页栏每页显示的页数
	public $lastSuffix = true; // 最后一页是否显示总页数

    private $p       = 'page'; //分页参数名
    private $url     = ''; //当前链接URL
    public  $nowPage = 1;

	// 分页显示定制
    private $config  = array(
        'header' => '<span class="rows">共 %TOTAL_ROW% 条记录</span>',
        'prev'   => '<',
        'next'   => '>',
        'theme'  => '%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%',
    );

    /**
     * 架构函数
     * @param array $totalRows  总的记录数
     * @param array $listRows  每页显示记录数
     * @param array $parameter  分页跳转的参数
     */
    public function __construct($totalRows, $listRows, $parameter = array()) {
        C('VAR_PAGE') && $this->p = C('VAR_PAGE'); //设置分页参数名称
        /* 基础设置 */
        $this->totalRows  = $totalRows; //设置总记录数
        $this->listRows   = $listRows;  //设置每页显示行数
        $this->parameter  = empty($parameter) ? I('get.') : $parameter;
        $this->nowPage    = empty($_GET[$this->p]) ? 1 : intval($_GET[$this->p]);
        $this->firstRow   = $this->listRows * ($this->nowPage - 1);
    }

    /**
     * 定制分页链接设置
     * @param string $name  设置名称
     * @param string $value 设置值
     */
    public function setConfig($name,$value) {
        if(isset($this->config[$name])) {
            $this->config[$name] = $value;
        }
    }

    /**
     * 生成链接URL
     * @param  integer $page 页码
     * @return string
     */
    private function url($page){
        return str_replace(urlencode('[PAGE]'), $page, $this->url);
    }

    /**
     * 组装分页链接
     * @return string
     */
    public function show() {
        //TODO
        if(0 == $this->totalRows) return '';

        /* 生成URL */
        $this->parameter[$this->p] = '[PAGE]';
        $this->url = U(ACTION_NAME, $this->parameter);
        /* 计算分页信息 */
        $this->totalPages = ceil($this->totalRows / $this->listRows); //总页数
        if(!empty($this->totalPages) && $this->nowPage > $this->totalPages) {
            $this->nowPage = $this->totalPages;
        }

        /* 计算分页零时变量 */
        $now_cool_page      = $this->rollPage/2;
		$now_cool_page_ceil = ceil($now_cool_page);
		$this->lastSuffix && $this->config['last'] = $this->totalPages;

        //上一页
        $up_row  = $this->nowPage - 1;
        $up_page = $up_row > 0 ? '<li><a style="border-radius: 100%!important;padding: 0 5px;float: none;" class="prev" href="' . $this->url($up_row) . '">' . $this->config['prev'] . '</a></li>' : '<li style="color: #ddd"><a style="border-radius: 100%!important;padding: 0 5px;color: #ddd;float: none;" class="">' . $this->config['prev'] . '</a></li>';

        //当前页
        $now_page = $this->nowPage;
        $link_page = "";
        for($page = 1; $page <= $this->totalPages; $page++) {
            $selected = $page==$now_page ? 'selected' : '';
            $link_page .= '<option value="' . $this->url($page) . '"' . $selected . '>' . $page . '</option>';
        }
        if($this->totalPages != 1) {
            $link_page = '<select name="page" onchange="window.open(this.options[this.selectedIndex].value,\'_self\')" style="outline: none;-webkit-appearance:none;border: none;padding: 0 8px 0 8px;">' . $link_page . '</select>';
        } else {
            $link_page = '<span style="padding: 0 12px 0 12px">1</span>';
        }


        //下一页
        $down_row  = $this->nowPage + 1;
        $down_page = ($down_row <= $this->totalPages) ? '<li><a style="border-radius: 100%!important;padding: 0 5px;float: none;" class="next" href="' . $this->url($down_row) . '">' . $this->config['next'] . '</a></li>' : '<li style="color: #ddd"><a style="border-radius: 100%!important;padding: 0 5px;color: #ddd;float: none;" class="">' . $this->config['next'] . '</a></li>';

        //第一页
//        $the_first = '';
//        if($this->totalPages > $this->rollPage && ($this->nowPage - $now_cool_page) >= 1){
//            $the_first = '<li><a class="first" href="' . $this->url(1) . '">' . $this->config['first'] . '</a></li>';
//        }

        //最后一页
//        $the_end = '';
//        if($this->totalPages > $this->rollPage && ($this->nowPage + $now_cool_page) < $this->totalPages){
//            $the_end = '<li><a class="end" href="' . $this->url($this->totalPages) . '">' . $this->config['last'] . '</a></li>';
//        }


        //替换分页内容
        $page_str = str_replace(
            array('%HEADER%', '%NOW_PAGE%', '%UP_PAGE%', '%DOWN_PAGE%', '%LINK_PAGE%', '%TOTAL_ROW%', '%TOTAL_PAGE%'),
            array($this->config['header'], $this->nowPage, $up_page, $down_page, $link_page, $this->totalRows, $this->totalPages),
            $this->config['theme']);
        return "<div class='pager'>{$page_str}</div>";
    }

    // 设置分页栏每页显示的页数 //zzl添加 2015-6-11 10:44
    public function setRollPage($num)
    {
        $this->rollPage=$num;
    }
}
