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
     * @var string 表名
     */
    protected $table;
    /**
     * @var array 列名
     */
    protected $columns = [];
    /**
     * @var string 数据库名
     */
    protected $database;
    /**
     * @var \PDO 数据库连接
     */
    protected $pdo;
    /**
     * @var 实例
     */
    protected static $_instance = null;

    /**
     * 单例模式
     */
    private function __construct()
    {
    }

    public static function getInstance()
    {
        if(isset(self::$_instance)){
            return self::$_instance;
        }

        self::$_instance = new static();

        return self::$_instance;
    }

    /**
     * 初始化连接
     *
     * @author: xieyong <xieyong1023@qq.com>
     * @param \PDO $pdo
     */
    protected function setPdo($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * 获取插入id
     * @author: xieyong <xieyong1023@qq.com>
     * @return string
     * @throws \PDOException
     */
    public function lastInsertId()
    {
        try {
            return $this->pdo->lastInsertId();
        } catch (\PDOException $e) {

        }
    }
}
