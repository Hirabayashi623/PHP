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
$id = $_GET['id'];
$name = $_GET['name'];
?>

<table class="table table-bordered table-hover">
<thead>
	<tr class="bg-info"><td>ID</td><td>NAME</td>
</thead>
<tbody>
	<tr><td><?php echo $id;?></td><td><?php echo $name;?></td>
</tbody>
</table>

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

// レコードを追加する
$query = 'insert into tbl_sample values('.$id.',\''.$name.'\')';

// SQLの確認
print "<p class=\"info\">次のSQLを実行します：$query</p>";

$result = mysqli_query($link, $query);
if($result){
    print '<p class="bg-success">登録成功しました</p>';
}else{
    print '<p class="bg-danger">登録失敗しました</p>';
    print('<p class="bg-danger">'.mysqli_error().'</p>');
}

// MySQLとの接続を切断する
$close_flag = mysqli_close($link);
?>
</body>
</html>