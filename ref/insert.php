<?php
include('../common/functions.php');

//入力チェック(受信確認処理追加)
if(
  !isset($_POST["ans_user"]) || $_POST["ans_user"]=="" ||
  !isset($_POST["url"]) || $_POST["url"]=="" ||
  !isset($_POST["question"]) || $_POST["question"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$ans_user   = $_POST["ans_user"];
$url  = $_POST["url"];
$question = $_POST["question"];

//Fileアップロードチェック
if (isset($_FILES["upfile"] ) && $_FILES["upfile"]["error"] ==0 ) {
  //情報取得
  $file_name = $_FILES["upfile"]["name"];         //"1.jpg"ファイル名取得
  $tmp_path  = $_FILES["upfile"]["tmp_name"]; //"/usr/www/tmp/1.jpg"アップロード先のTempフォルダ
  $file_dir_path = "upload/";  //画像ファイル保管先

  //***File名の変更***
  $extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子取得(jpg, png, gif)
  $uniq_name = date("YmdHis").md5(session_id()) . "." . $extension;  //ユニークファイル名作成
  $file_name = $file_dir_path.$uniq_name; //ユニークファイル名とパス
  is_uploaded_file( $tmp_path );
  move_uploaded_file( $tmp_path, $file_name );
  chmod( $file_name, 0644 );
  // FileUpload [--End--]
}else{
  echo "ファイルがアップされていません。";
}


//2. DB接続します(エラー処理追加)
$pdo=db_con();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_question_table(id, ans_user, url, question,
datetime,image,upfile )VALUES(NULL, :a1, :a2, :a3, sysdate(), NULL, :a4)");
$stmt->bindValue(':a1', $ans_user,PDO::PARAM_STR);
$stmt->bindValue(':a2', $url,PDO::PARAM_STR);
$stmt->bindValue(':a3', $question,PDO::PARAM_STR);
$stmt->bindValue(':a4', $uniq_name,PDO::PARAM_STR);
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
