<?php
session_start();

include('../common/functions.php');
chkssid();


$ans_user=$_SESSION["NAME"];

//1.  DB接続します
$pdo=db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_question_table WHERE ans_user =:a1");
$stmt->bindValue(':a1', $ans_user, PDO::PARAM_STR);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .='<p>';
    //※変数の埋め込み方※
    $view .='<a href="detail.php?id='.$result["id"].'">';
    $view .= $result["ans_user"]."[".$result["datetime"]."]";
    $view .='</a>';
    $view .='　';
    $view .='<a href="delete.php?id='.$result["id"].'">[削除]</a>';
    $view .='</p>';
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ブックマーク</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<?php include('../common/auth_header.php'); ?>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
  </div>
</div>
<!-- Main[End] -->

<?php include("../common/auth_fotter.php"); ?>

</body>
</html>
