<?php
/**
 * Created by PhpStorm.
 * User: Chao
 * Date: 2015/8/9
 * Time: 17:25
 */

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