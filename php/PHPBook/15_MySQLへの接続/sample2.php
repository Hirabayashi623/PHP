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

// SELECT文の実行
$query = 'select id, name from tbl_sample';
$result = mysqli_query($link, $query);

print('<table class="table table-bordered table-hover"><tr class="bg-primary"><th>ID</th><th>NAME</th></tr>');
// 結果の取得
while($row = mysqli_fetch_assoc($result)){
    print("<tr>");
    print("<td>".$row['id']."</td>");
    print("<td>".$row['name']."</td>");
    print("</tr>");
}

// MySQLとの接続を切断する
$close_flag = mysqli_close($link);
?>
</body>
</html>