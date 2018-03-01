<?php


session_start();
include('../common/functions.php');  
include('../common/auth_twitter.php');
require "../twitteroauth-master/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;
chkssid();
//入力チェック(受信確認処理追加)
// if(
//   !isset($_GET["anwser"]) || $_GET["anwser"]==""
// ){
//   exit('ParamError');
// }
$post_text=$_POST["anwser"];

$pdo=db_con();

// 実行したいSQL文
$sql="SELECT * FROM gs_twitter_table WHERE lid=:lid";

//MySQLで実行したいSQLセット。プリペアーステートメントで後から値は入れる
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid',$_SESSION["ID"],PDO::PARAM_STR);

$row = $stmt->execute();
$query_result = $stmt->fetch();

$oauth_token=$query_result["oauth_token"];
$oauth_token_secret=$query_result["oauth_token_secret"];

if($row==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}

$twitter = new TwitterOAuth(Consumer_Key, Consumer_Secret, $oauth_token, $oauth_token_secret);
// $twitter = new TwitterOAuth(Consumer_Key, Consumer_Secret, "941229210361675776-9bO8J6RBWuNeH6xbGqOsRlMHLgklHGH", "oKCZZOHaNP8QImPWCU3ElAktOmgxWQaiKbNSj15ujYDKH");

  
$result = $twitter->post(
        "statuses/update",
        array("status" => $post_text)
);

if($twitter->getLastHttpCode() == 200) {
    // ツイート成功
    print "tweeted\n";
} else {
    // ツイート失敗
    print "tweet failed\n";
}