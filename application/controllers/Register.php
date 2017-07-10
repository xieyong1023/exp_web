<?php
/**
 * 注册控制器
 *
 * @author: xieyong <xieyong1023@qq.com>
 * @Date: 2017/6/16
 * @Time: 2:23
 */

use \Core\BaseController;

class Register extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 显示注册页面
     *
     * @author: xieyong <xieyong1023@qq.com>
     * @date: 2017/6/16
     */
    public function index()
    {
        $this->Cache_model->setLang();
        $config = $this->Cache_model->loadConfig();
        $config['site_name'] = "注册";

        //存一个验证码到session里
        session_start();
        $code = getRandChar(4);
        $_SESSION['v_code'] = $code;

        $res = array(
            'config' => $config,
            'v_code' => $code,
        );

        $this->load->setPath();
        $this->load->view($config['site_template'] . '/register', $res);
    }

    /**
     * 处理注册请求
     *
     * @author: xieyong <xieyong1023@qq.com>
     * @date: 2017/6/16
     */
    public function handleApply()
    {
        $post = $this->input->post(null, true);
        if ($post['opt'] == 'ajax') {
            session_start();
            $code = $_SESSION['v_code'];
            if (! strcasecmp($code, $post['v_code'])) {
                $this->outputJson("验证码错误", -1);
            }

            $user['username'] = $post['userName'];
            $user['salt'] = random_string('alnum', 6);
            $user['password'] = md5pass($post['userPass'], $user['salt']);
            $user['createtime'] = time();
            $user['lasttime'] = time();
            $user['regip'] = $_SERVER["REMOTE_ADDR"];
            $user['lastip'] = $_SERVER["REMOTE_ADDR"];
            $user['logincount'] = 0;
            $user['studentID'] = $post['studentID'];
            $user['avatar'] = '/images/avatar/default.jpg';
            $user['school'] = trim($post['school']);
            $user['college'] = trim($post['college']);
            $user['department'] = trim($post['department']);
            $this->Member_model->add($user);
            $this->outputJson("ok");
        } else {
            header('Location: ' . base_url() . 'member/signup');
        }
    }

    /**
     * 传送验证码
     *
     * @author: xieyong <xieyong1023@qq.com>
     * @date: 2017/6/16
     */
    public function generateVcode()
    {
        $post = $this->input->post("vcode");
        if (isset($post) && $post == "vcode") {
            $code = getRandChar(4);

            session_start();
            $_SESSION['v_code'] = $code;

            $cookie = array(
                'name'   => 'v_code',
                'value'  => $code,
                'expire' => '60',
            );

            set_cookie($cookie);
            $this->outputJson($code);
        } else {
            show_404();
        }
    }
}
