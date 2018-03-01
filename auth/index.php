<?php
session_start();

include('../common/functions.php');
//入力チェック(受信確認処理追加)
chkssid();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>POSTデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<?php include('../common/auth_header.php'); ?>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ブックマーク</legend>
     <label>タイトル：<input type="text" name="title"></label><br>
     <label>url：<input type="text" name="url"></label><br>
     <label><textArea name="memo" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

<?php include("../common/auth_fotter.php"); ?>

</body>
</html>
