<?php
//セッションのスタート
session_start();

//関数の呼び出し
include('functions.php');

//ログイン状態のチェック
chk_ssid();
$menuusr = menuusr();
$menukanri =menukanri();

if($_SESSION["kanri_flg"]==0){
    $menu=$menuusr;
}elseif($_SESSION["kanri_flg"]==1){
    $menu=$menukanri;

}else{
    echo'error';
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会員登録画面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div{
            padding: 10px;
            font-size:16px;
            }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">会員登録画面</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            
                <ul class="navbar-nav">
                <?=$menu?>

        </nav>
    </header>

    <form action="user_insert.php" method="POST">
        <div class="form-group">
            <label for="name">名前</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="lid">ログインID</label>
            <input type="text" class="form-control" id="lid" name="lid">
        </div>
        <div class="form-group">
            <label for="lpw">パスワード</label>
            <input type="password" class="form-control" id="lpw" name="lpw">
        </div>
       
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    <input type="hidden" id="kanri_flg" name="kanri_flg" value="0">
    <input type="hidden" id="life_flg" name="life_flg" value="0">


    </form>

</body>

</html>