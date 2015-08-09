<?php
/**
 * Created by PhpStorm.
 * User: Chao
 * Date: 2015/8/9
 * Time: 17:25
 */
include_once "db.php";


/**
 * sql语句查询封装
 * @param $sql : sql语句
 * @param $array ：sql语句的参数
 */
function sqlQuery($sql, $array)
{
    $dbInfo = DBInfo::getInstance();
    $dsn = "$dbInfo->dbms:host=$dbInfo->host;dbname=$dbInfo->dbName";
    try {

        $dbh = new PDO($dsn, $dbInfo->user, $dbInfo->pass); //初始化一个PDO对象
        echo "连接成功<br/>";
        $sth = $dbh->prepare($sql);
        $sth->execute($array);
        $result = $sth->fetchAll();
        return $result;
    } catch (PDOException $e) {
        die ("Error!: " . $e->getMessage() . "<br/>");
    }
}

/**
 * 读取XML
 * @param $file 文件路径
 */
function readXML($file) {
    $reader = new XMLReader();
    $reader->open($file);                                                     //读取xml数据
    $i=1;
    while ($reader->read()) {                                                              //是否读取
        //判断是元素
        if($reader->nodeType == XMLReader::ELEMENT){
            $nodeName = $reader->name;
            echo $nodeName." :  ";
        }
        //判断是属性
        if ($reader->nodeType == XMLReader::TEXT  ) {               //判断node类型
            echo $reader->value;
        }

        echo "<br/>";
        $i++;
    }
}