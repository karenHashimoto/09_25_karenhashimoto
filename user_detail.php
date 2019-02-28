<?php
//関数の呼び出し
include('functions.php');

//GETで送信されたidを取得
$id=$_GET['id'];

//DB接続
$pdo=db_conn();

//データ登録SQLを作成、指定したidのみを表示する
$sql = 'SELECT * FROM user_table WHERE id=:id';
$stmt=$pdo->prepare($sql);//実行の準備をする
$stmt->bindValue(':id', $id, PDO::PARAM_INT);//バインド変数idから取るから必要な文
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
            <a class="navbar-brand" href="#">会員登録編集画面</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                  <li class="nav-item">
                  <a class="nav-link" href="user_select.php">戻る</a>
                </ul>
            </div>
        </nav>
    </header>

    <form action="user_update.php" method="POST">
        <div class="form-group">
            <label for="name">名前</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$rs['name']?>">
        </div>
        <div class="form-group">
            <label for="lid">ログインID</label>
            <input type="text" class="form-control" id="lid" name="lid" value="<?=$rs['lid']?>">
        </div>
        <div class="form-group">
            <label for="lpw">パスワード</label>
            <input type="password" class="form-control" id="lpw" name="lpw" value="<?=$rs['lpw']?>">
        </div>

     
        <div class="form-group">
            <label for="kanri_flg">一般：０ 管理人：１</label>
            <input type="text" class="form-control" id="kanri_flg" name="kanri_flg" value="<?=$rs['kanri_flg']?>">
        </div>

        <div class="form-group">
            <label for="life_flg">アクティブ：０ 非アクティブ：1</label>
            <input type="text" class="form-control" id="life_flg" name="life_flg" value="<?=$rs['life_flg']?>">
        </div>


       
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

        <input type="hidden" name="id" value="<?=$rs['id']?>">

    
    </form>

</body>

</html>
