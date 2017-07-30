<?php
/**
 * 异常类
 *
 * @author: xieyong <xieyong1023@qq.com>
 * @Date: 2017/6/13
 * @Time: 8:59
 */

namespace Core;

class Exception extends \Exception
{
    /**
     * @var array 继承类需要重写错误列表
     * @example $error_list = [
     *                      'PARAM_ERROR' => ['code' => 1, 'chinese' => '参数错误']
     *                      ];
     */
    protected $error_list = [];
    public function __construct($error_type, $previous = null)
    {
        $code = $this->error_list[$error_type]['code'];
        $message = $this->error_list[$error_type]['chinese'];
        parent::__construct($message, $code, $previous);
    }
}
