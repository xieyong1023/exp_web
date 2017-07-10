<?php
/**
 * 后台控制器基础类
 *
 * @author: xieyong <xieyong1023@qq.com>
 * @Date: 2017/7/10
 * @Time: 0:14
 */

namespace Core;

class AdminController extends \CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 封装一下show_jsonmsg
     *
     * 输出数据给后台的js
     *
     * @author: xieyong <xieyong1023@qq.com>
     * @param string $remsg
     * @param int    $status
     */
    public function outputJson($remsg = '', $status = 200)
    {
        $rtv = [
            'remsg' => $remsg,
            'status' => $status,
        ];

        echo \json_encode($rtv);
        exit();
    }
}
