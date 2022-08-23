<?php
header("Access-Control-Allow-Origin: *");
 header("Content-type:application/json;charset=utf-8");
 $ip = $_SERVER["REMOTE_ADDR"];
 $data=file_get_contents('http://ip.taobao.com/outGetIpInfo?ip='.$ip.'&accessKey=alibaba-inc');
 echo $data;
?>