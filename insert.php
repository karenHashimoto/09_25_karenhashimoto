<?php


//関数の呼び出し
include('functions.php');

//DB接続 以下をまとめる
$pdo =db_conn();


// 入力チェック
if(
    !isset($_POST['name']) || $_POST['name']=='' ||
    !isset($_POST['url']) || $_POST['url']=='' ||
    !isset($_POST['comment']) || $_POST['comment']=='' ||
    !isset($_POST['indate']) || $_POST['indate']==''
){
    exit('ParamError');
}


//POSTデータ取得
$name=$_POST['name'];
$url=$_POST['url'];
$comment=$_POST['comment'];
$indate=$_POST['indate'];





//データ登録SQL作成
$sql ='INSERT INTO gs_bm_table(id,name,url,comment,indate)VALUES(NULL,:a1,:a2,:a3, sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $url, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':a4', $indate, PDO::PARAM_STR); 
$status = $stmt->execute();

//４．データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('sqlError:'.$error[2]);
} else {
    //５．index.phpへリダイレクト
    header('LOCATION: index.php');
}
