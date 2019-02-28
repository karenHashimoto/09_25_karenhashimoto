<?php
//関数を表示
include('functions.php');

//getで送信されたidを取得
$id=$_GET['id'];

//DB接続
$pdo=db_conn();

//データ登録SQLを作成、指定したidのみを表示する
$sql = 'SELECT * FROM gs_bm_table WHERE id=id';
$stmt=$pdo->prepare($sql);//実行の準備をする
$stmt->bindValue(':id , $id, PDO::PARAM_INT');//バインド変数idから取るから必要な文
$status =$stmt->execute();//実行する

//データの表示
if ($status==false){
    //エラーの時
    errorMsg($stmt);
}else{
    //エラーでない時
    $rs = $stmt->fetch();
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
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">ログイン画面へ戻る</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="select_nologin.php">読んだ本一覧</a>
                    </li>
                </ul>
            </div>

        </nav>
    </header>

    <form action="update.php" method="POST">
        <div class="form-group">
            <label for="name">本の名前</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$rs['name']?>" readonly>
        </div>
        <div class="form-group">
            <label for="url">本のURL</label>
            <input type="text" class="form-control" id="url" name="url" value="<?=$rs['url']?>" readonly>
        </div>
        <div class="form-group">
            <label for="comment">本の感想</label>
            <textarea class="form-control" id="comment" name="comment" rows="3" readonly><?=$rs['comment']?></textarea>
        </div>
        <div class="form-group">
            <label for="Indate">読んだ日</label>
            <input type="date" class="form-control" id="indate" name="indate" value="<?=$rs['indate']?>" readonly>
        </div>
       
        <!-- <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div> -->
        <input type="hidden" name="id" value="<?=$rs['id']?>">
    </form>

</body>

</html>