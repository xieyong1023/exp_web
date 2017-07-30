<?php
/**
 * 日志类
 *
 * @author: xieyong <xieyong1023@qq.com>
 * @Date: 2017/7/9
 * @Time: 23:33
 */

namespace Library\Log;

class Logger
{
    /**
     * @var Logger 实例
     */
    protected static $_instance = null;
    public static $error_level = 'ALL';

    /**
     * 单例模式
     * Logger constructor.
     */
    private function __construct()
    {
    }

    /**
     * 获取实例
     * @author: xieyong <xieyong1023@qq.com>
     * @return null|static
     */
    public static function getInstance()
    {
        if(self::$_instance != null){
            return self::$_instance;
        }

        self::$_instance = new static();
        return self::$_instance;
    }

    public function log()
    {

    }
}
