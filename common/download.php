<?php

session_start();

include('../common/functions.php');

chkssid();

$upfile = $_GET["upfile"];

//パス
$dirpath ='../ref/upload/';
$fpath = $dirpath."$upfile";



header('Content-Type: application/force-download');
header('Content-Length: '.filesize($fpath));
header('Content-disposition: attachment; filename="'.$upfile.'"');
readfile($fpath);
?>