<?php
session_start();

include('../common/functions.php');
//入力チェック(受信確認処理追加)
chkssid();

if(
  !isset($_POST["title"]) || $_POST["title"]=="" ||
  !isset($_POST["url"]) || $_POST["url"]=="" ||
  !isset($_POST["memo"]) || $_POST["memo"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$title   = $_POST["title"];
$url  = $_POST["url"];
$memo = $_POST["memo"];

//2. DB接続します(エラー処理追加)
$pdo=db_con();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_book_table(id, title, url, memo,
datetime )VALUES(NULL, :a1, :a2, :a3, sysdate())");
$stmt->bindValue(':a1', $title);
$stmt->bindValue(':a2', $url);
$stmt->bindValue(':a3', $memo);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  error_db_info($stmt);
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit;
}
?>
