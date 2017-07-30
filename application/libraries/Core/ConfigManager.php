<?php
/**
 * 配置管理类
 *
 * @author: xieyong <xieyong1023@qq.com>
 * @Date: 2017/6/13
 * @Time: 22:46
 */

namespace Core;

/**
 * 配置文件目录
 */
define('CONFIG_PATH', APPPATH . 'config' . DIRECTORY_SEPARATOR);

/**
 * Class ConfigManager
 *
 * 配置文件管理类
 * 配置文件必须写成返回数组的形式
 * 例如return [
 *     'a' => 'b',
 * ];
 * @package Core
 */
class ConfigManager
{
    /**
     * @var array 所有配置内容的缓存
     */
    protected static $configs = [];

    /**
     * 获取配置
     *
     * @author: xieyong <xieyong1023@qq.com>
     * @date: 2017/6/13
     * @param $name 文件名
     *
     * @return mixed
     * @throws \Exception
     */
    public static function get($name)
    {
        if (isset(self::$configs[$name])) {
            return self::$configs[$name];
        } else {
            $path = CONFIG_PATH . $name . '.php';
            if (file_exists($path)) {
                $config = include_once $path;
                self::$configs[$name] = $config;
                return $config;
            }
        }

        throw new \Exception('config file : ' . $name . 'not found', -1);
    }
}
