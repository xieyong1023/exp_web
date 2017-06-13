<?php
/**
 * DAO 数据访问层基础类,不依赖CI框架.
 *
 * @author: xieyong <xieyong1023@qq.com>
 * @Date: 2017/6/13
 * @Time: 8:47
 */

namespace Core;

class DAO
{
    /**
     * @var 表名
     */
    protected $table;
    /**
     * @var string 数据库名
     */
    protected $database = 'default';
    /**
     * @var 操作句柄
     */
    protected $handle = null;
    /**
     * @var bool 长连接
     */
    protected $pconnect = false;
    public function __construct()
    {

    }
}
