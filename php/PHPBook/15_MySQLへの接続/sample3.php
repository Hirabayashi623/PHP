<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="/css/bootstrap.min.css" rel="stylesheet">
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
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

// IDの最大値の取得
$query = 'select max(id)+1 as id from tbl_sample';
$result = mysqli_query($link, $query);

$row = mysqli_fetch_assoc($result);
print('次のID：'.$row['id']);

// MySQLとの接続を切断する
$close_flag = mysqli_close($link);
?>

<form action="sample4.php" method="GET" class="form-horizontal">
	<div class="form-group">
		<label for="id" class="control-label col-sm-1">ID:</label>
		<div class="col-sm-4">
			<input type="text" id="id" name="id" value="<?php echo $row['id'];?>" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label for="name" class="control-label col-sm-1">NAME:</label>
		<div class="col-sm-4">
			<input type="text" id="name" placeholder="NAME" name="name" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<input type='submit' value="submit" class="btn btn-outline-primary">
	</div>
</form>



</body>
</html>