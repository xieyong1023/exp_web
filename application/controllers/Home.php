<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home extends CI_Controller
{
    var $menu;

    function __construct()
    {
        parent::__construct();

        if ($this->uri->segment(2) && ! is_numeric($this->uri->segment(2))) {
            show_404();
        }
        $this->menu = $this->Cache_model->loadMenu();
    }

    public function index()
    {
        $this->Cache_model->setLang();
        $config = $this->Cache_model->loadConfig();
        $config['site_name'] = "首页";
        $this->menu['dir'] = $this->menu['default'];
        $this->menu['controller'] = 'home';
        $this->load->setPath();

        //如果未登陆，检查是否存在自动登陆cookie
        $this->Member_model->loginCheck();

        $page = $this->uri->segment(2);
        if ($page === false || $page < 1) {
            $page = 1;
        }

        $list = $this->Article_model->loadHomeList(10, $page);
        foreach ($list['listData'] as $key => $value) {
            $list['listData'][$key]['puttime'] = $this->Article_model->convertPutTime($value['puttime']);
            $list['listData'][$key]['category'] = $this->menu['id'][$value['category']];
            $list['listData'][$key]['avatar'] = $config['site_templateurl'] . $list['listData'][$key]['avatar'];
        }

        //登陆状态
        $login = false;
        if (($user_name = $this->session->userdata('user_name')) != false) {
            $login = true;
        }

        //个人信息
        $user_detail = $this->Member_model->getUserDetail($user_name);
        $user_detail['createtime'] = dateFormat($user_detail['createtime']);
        $user_detail['avatar'] = $config['site_templateurl'] . $user_detail['avatar'];

        //点击排行
        $hitsList = $this->Article_model->loadMostHits();

        //文章数
        $countMyArticle = $this->Article_model->countMyArticle($user_detail['id']);

        //实验数
        $countMyExp = $this->Experiment_model->countMyExp($user_name);

        //收藏数
        $countFavorite = $this->Member_model->countFavorite($user_detail['id']);

        //报告数
        $countMyReports = $this->Member_model->countMyReports($user_detail['id']);

        $paging = array(
            'dir'       => '',
            'pageIndex' => $page,
            'pageSum'   => $list['listSum'],
            'pageSize'  => $list['pageSize'],
        );

        $res = array(
            'config'         => $config,
            'menu'           => $this->menu,
            'list'           => $list,
            'paging'         => $paging,
            'login'          => $login,
            'user_detail'    => $user_detail,
            'hitsList'       => $hitsList,
            'countMyArticle' => $countMyArticle,
            'countMyExp'     => $countMyExp,
            'countFavorite'  => $countFavorite,
            'countMyReports' => $countMyReports,
        );

        $this->load->view('platform/home', $res);
    }
}
