<?php
/**
 * 基础控制器
 *
 * @author: xieyong <xieyong1023@qq.com>
 * @Date: 2017/6/13
 * @Time: 0:56
 */

namespace Core;

class BaseController extends \CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 输出json格式的数据.
     *
     * @author: xieyong <xieyong1023@qq.com>
     * @date: 2017/6/13
     *
     * @param mixed $data 输出数据
     * @param int   $error 错误码. 0-无措，非0-有错
     */
    public function outputJson($data = [], int $error = 0)
    {
        echo json_encode(['error' => $error, 'data' => $data]);
        exit();
    }
}
