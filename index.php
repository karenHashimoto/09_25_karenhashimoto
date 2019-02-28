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
    <title>第９回課題</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
        span {
    color: #006eff;
}
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">読んだ本記録</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <?=$menu?>
            
                    
                </ul>
            </div>

            <div class="collapse navbar-collapse" id="navbarNav">
           
           <ul class="navbar-nav">
           ようこそ!<span><?php echo $_SESSION['name'] ?></span>さん
           </ul>
       </div>
        </nav>
    </header>

    <form action="insert.php" method="POST">
        <div class="form-group">
            <label for="name">本の名前</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="url">本のURL</label>
            <input type="text" class="form-control" id="url" name="url">
        </div>
        <div class="form-group">
            <label for="comment">本の感想</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="Indate">読んだ日</label>
            <input type="date" class="form-control" id="indate" name="indate">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</body>

</html>