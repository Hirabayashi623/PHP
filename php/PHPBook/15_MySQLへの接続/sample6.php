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

$query = "delete from tbl_sample where id = ?";

// プリペアードステートメント取得
$stmt = mysqli_prepare($link, $query);

// ステートメントに値を格納
mysqli_stmt_bind_param($stmt, "d", $_GET['id']);

// クエリ実行
$result = mysqli_stmt_execute($stmt);

?>

<?php if($result){?>
<p class="bg-info">削除成功</p>
<?php }else{?>
<p class="bg-warning">削除失敗</p>
<?php }?>

<a href="sample5.php" class="btn btn-outline-primary">戻る</a>

<?php
// 接続断
mysqli_close($link);
?>
</body>
</html>