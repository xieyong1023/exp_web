<?php
/**
 * 为了使用命名空间，并符合psr-4标准，注册自己的autoload方法
 *
 * @author: xieyong <xieyong1023@qq.com>
 * @Date: 2017/6/10
 * @Time: 9:45
 */

namespace Core;

class Autoload
{
    public static function psr4_autoload($class)
    {
        var_dump($class);
    }
}
