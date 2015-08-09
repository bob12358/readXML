<meta charset="utf-8"/>
<?php

include_once "lib.php";

/**
 *  扫描sampleXML下所有的xml文件
 *
 */
//设置xml的路径
$xml_dir = "sampleXML";

$fileList = glob($xml_dir . '/*.xml');

for ($i = 0; $i < count($fileList); $i++) {
    echo $fileList[$i] . '<br/>';
}

/**
 *  在数据库中读取路径
 *
 */
$dbms = 'mysql';     //数据库类型
$host = 'localhost'; //数据库主机名
$dbName = 'readxml';    //使用的数据库
$user = 'root';      //数据库连接用户名
$pass = 'root';          //对应的密码
$dsn = "$dbms:host=$host;dbname=$dbName";

//假设$userId为1
$userId = 1;
//指定用户下的xml列表
$xmlList = array();

try {
    $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
    echo "连接成功<br/>";
    $sql = "select xmlPath from xmls as x where  x.userId = ?";

    $sth = $dbh->prepare($sql);

    $sth->execute(array($userId));
    $result = $sth->fetchAll();

    foreach($result as $row) {
        $xmlList[] = $row['xmlPath'];
    }

    $dbh = null;
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}

foreach( $xmlList as $xml) {
    if( in_array($xml,$fileList) ) {
        echo $xml;
        readXML($xml);
    } else {
        echo "无此文件<br/>";
    }

}






