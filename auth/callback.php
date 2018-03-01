<?php
session_start();

include('../common/auth_twitter.php');
include('../common/functions.php');
//入力チェック(受信確認処理追加)
chkssid();

//ライブラリを読み込む
require "../twitteroauth-master/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth; 

//oauth_tokenとoauth_verifierを取得
if($_SESSION['oauth_token'] == $_GET['oauth_token'] and $_GET['oauth_verifier']){
	
	//Twitterからアクセストークンを取得する
	$connection = new TwitterOAuth(Consumer_Key, Consumer_Secret, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
	$access_token = $connection->oauth('oauth/access_token', array('oauth_verifier' => $_GET['oauth_verifier'], 'oauth_token'=> $_GET['oauth_token']));
 
	//取得したアクセストークンでユーザ情報を取得
	$user_connection = new TwitterOAuth(Consumer_Key, Consumer_Secret, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$user_info = $user_connection->get('account/verify_credentials');	
	
	// ユーザ情報の展開
	//var_dump($user_info);
	
    //適当にユーザ情報を取得
    $lid=$_SESSION["ID"];
	$tw_id = $user_info->id;
	$tw_name = $user_info->name;
	$screen_name = $user_info->screen_name;
	$profile_image_url_https = $user_info->profile_image_url_https;
    $text = $user_info->status->text;
    $oauth_token=$access_token['oauth_token'];
    $oauth_token_secret=$access_token['oauth_token_secret'];

    //DBに登録情報格納
    $pdo=db_con();

    // 実行したいSQL文
    $sql="INSERT INTO gs_twitter_table(id,lid,tw_name,tw_id,screen_name,profile_image_url_https,text,oauth_token,oauth_token_secret) VALUE (null,:a1,:a2,:a3,:a4,:a5,:a6,:a7,:a8)";

    //MySQLで実行したいSQLセット。プリペアーステートメントで後から値は入れる
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':a1',$lid,PDO::PARAM_STR);
    $stmt->bindValue(':a2',$tw_name,PDO::PARAM_STR);
    $stmt->bindValue(':a3',$tw_id,PDO::PARAM_STR);
    $stmt->bindValue(':a4',$screen_name,PDO::PARAM_STR);
    $stmt->bindValue(':a5',$profile_image_url_https,PDO::PARAM_STR);
    $stmt->bindValue(':a6',$text,PDO::PARAM_STR);
    $stmt->bindValue(':a7',$oauth_token,PDO::PARAM_STR);
    $stmt->bindValue(':a8',$oauth_token_secret,PDO::PARAM_STR);

    //実際に実行
    $flag=$stmt->execute();

    //実行完了した場合はentry.phpにリダイレクト
    //失敗した場合はエラーメッセージ表示
    if($flag==false){
        $error = $stmt->errorInfo();
        echo var_dump($error[2]);
        exit("ErrorQuery:".$error[2]);
    }else{
        header('Location: index.php');
        exit();
    }

}else{
	header('Location: twitter_gettoken.php');
	exit();
}