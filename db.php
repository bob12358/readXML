<?php

class DBInfo
{
    var $dbms = 'mysql';     //数据库类型
    var $host = 'localhost'; //数据库主机名
    var $dbName = 'readxml';    //使用的数据库
    var $user = 'root';      //数据库连接用户名
    var $pass = 'root';          //对应的密码

    private static $_instance = null;

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    /**
     * 单例
     * @return DBInfo|null
     */
    static public function getInstance()
    {
        if (is_null(self::$_instance) || isset (self::$_instance)) {
            self::$_instance = new self ();
        }
        return self::$_instance;
    }

}

