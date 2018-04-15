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
include ('config.php');
// コネクション取得
$link = mysqli_connect($host, $user, $pass, $db, $port);
if(!$link){
    print '<p class="bg-warning">接続に失敗しました</p>';
}

// 実行SQL
$query = "select id, name from tbl_sample";

// SQL実行
$result = mysqli_query($link, $query);

echo '<form action="sample6.php" method="GET">';
echo '<table class="table table-bordered table-hover">';
echo '<tr class="bg-info"><th>ID</th><th>NAME</th></tr>';
// 結果取得
while($row=mysqli_fetch_assoc($result)){
    echo '<tr>';
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['name']."</td>";
    echo '<td><button type="submit" name="id" value="'.$row['id'].'" class="btn btn-outline-danger">削除</button></td>';
    echo '</tr>';
}
echo '</table>';
echo '</form>';

// 接続断
mysqli_close($link);
?>
</body>
</html>