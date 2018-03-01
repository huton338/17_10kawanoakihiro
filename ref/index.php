<?php

include('../common/functions.php');
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
<?php include('../common/ref_header.php'); ?>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php" enctype="multipart/form-data">
  <div class="jumbotron">
   <fieldset>
    <legend>質問</legend>
     <label>質問相手：<input type="text" name="ans_user"></label><br>
     <label>url：<input type="text" name="url"></label><br>
     <label><textArea name="question" rows="4" cols="40"></textArea></label><br>
     <input type="file" name="upfile"><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
