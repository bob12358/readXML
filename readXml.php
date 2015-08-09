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

//假设$userId为1
$userId = 1;
//指定用户下的xml列表
$xmlList = array();

try {
    $array = array($userId);
    $sql = "select xmlPath from xmls where xmls.userId = ?";
    $result = sqlQuery($sql, $array);
    foreach($result as $row) {
        //将xmlPath存起来
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






