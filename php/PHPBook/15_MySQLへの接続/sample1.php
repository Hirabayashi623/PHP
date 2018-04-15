<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="/css/bootstrap.min.css" rel="stylesheet" />
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<title>MySQL</title>
</head>
<body>
<?php
// MySQLへのコネクションを取得する
// $link = mysql_connect('localhost:3307', 'php', 'php');
$link = mysqli_connect('localhost', 'php', 'php', 'php', '3306');

// 接続が成功したか確認する
if(!$link){
    print('<p class="bg-danger">接続に失敗しました</p>');

    // スクリプトの終了
    die('<p class="bg-danger">'.mysqli_error().'</p>');
}

print('<p class="bg-info">接続に成功しました</p>');

// ########################################
// ##   ここに処理を記載
// ########################################

// MySQLとの接続を切断する
$close_flag = mysqli_close($link);
?>
</body>
</html>