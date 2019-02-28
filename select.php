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


//DB接続 以下をまとめる
$pdo =db_conn();

//2. データ表示SQL作成
$sql = 'SELECT * FROM gs_bm_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//3. データ表示
$view='';
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('sqlError:'.$error[2]);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<li class="list-group-item">';
        $view .= '<p>'.$result['name'].'-'.$result['url'].'-'.$result['comment'].'-'.$result['indate'].'</p>';
        $view .= '<a href="detail.php?id='.$result['id'].'" class="badge badge-success">Edit</a>';  //編集ボタン
        $view .= '<a href="delete.php?id='.$result['id'].'" class="badge badge-danger">Delete</a>'; //削除ボタン
       
        $view .= '</li>';
    }
}


?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>読んだ本一覧</title>
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
            <a class="navbar-brand" href="#">読んだ本一覧</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
           
                <ul class="navbar-nav">
                <?=$menu?> 
                <!-- <li>ようこそ!<?php echo $_SESSION['name'] ?>さん</li> -->
                </ul>
            </div>

            <div class="collapse navbar-collapse" id="navbarNav">
           
           <ul class="navbar-nav">
           ようこそ!<span><?php echo $_SESSION['name'] ?></span>さん
           </ul>
       </div>

        </nav>
    </header>

    <div>
        <ul class="list-group">
            <!-- ここにDBから取得したデータを表示しよう -->
            <?=$view?>
        </ul>
    </div>

</body>

</html>