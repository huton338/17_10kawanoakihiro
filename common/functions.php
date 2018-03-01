<?php
//共通で使うものを別ファイルにしておきましょう。

//セッションの整合性確認
function chkssid(){
    if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] !=session_id()){
      exit("Login...");
    }else{
      session_regenerate_id(true);
      $_SESSION["chk_ssid"]=session_id();
    }
  }

//DB接続関数（PDO）
function db_con(){
    try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
    return $pdo;
    } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
    }
};

//SQL処理エラー
function error_db_info($stmt){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
};


//XSS:htmlspecialchars
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
};




?>
