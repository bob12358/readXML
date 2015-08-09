<?php
/**
 * Created by PhpStorm.
 * User: Chao
 * Date: 2015/8/9
 * Time: 17:25
 */
include_once "db.php";

function sqlQuery($sql , $array){
    $dbInfo = new  DBInfo();
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

function readXML($file) {
    $reader = new XMLReader();
    $reader->open($file);                                                     //读取xml数据
    $i=1;
    while ($reader->read()) {                                                              //是否读取

        if($reader->nodeType == XMLReader::ELEMENT){
            $nodeName = $reader->name;
            echo $nodeName." :  ";
        }

        if ($reader->nodeType == XMLReader::TEXT  ) {               //判断node类型
            echo $reader->value;
        }

        echo "<br/>";
        $i++;
    }
}