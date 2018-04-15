<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/index.css" rel="stylesheet" />
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/index.js"></script>
    <title>MyPage</title>
</head>
<body>
<form>
	<?php
	include ('config/config.php');
	// コネクション取得
	$link = mysqli_connect($host, $user, $pass, $db, $port);
	if(!$link){
	    print '<p class="bg-warning">接続に失敗しました</p>';
	}

	// クエリ定義
	$query = 'select m.name as main, s.name as sub, i.name as item, i.url as url ';
	$query = $query.'from tbl_main_category m, tbl_sub_category s, tbl_items i ';
	$query = $query.'where m.id = s.parent_id ';
	$query = $query.'and m.id = i.main_parent_id ';
	$query = $query.'and s.seq = i.sub_parent_id ';
	$query = $query.'order by m.id, s.seq, i.seq';

    $main_tmp = '';
    $sub_tmp = '';
    $isFirstMain = true;
    $isFirstSub = true;

	// クエリ実行
	$result = mysqli_query($link, $query);
    ?>
	<ul class="list-group">
	<?php while($row = mysqli_fetch_assoc($result)){  ?>
		<?php if($main_tmp != $row['main']){?>
			<?php if(!$isFirstMain){
			    echo '</ul>';    // 直前のサブカテゴリのリスト終了
			    echo '</li>';    // 自分のアイテム終了
			    echo '</ul>';    // 直前のサブカテゴリのリスト終了
                echo '</li>';    // 自分のアイテム終了
			}else{
			    $isFirstMain = false;
			}?>
    		<li class="list-group-item">
    			<h4 class="triger"><?php echo $row['main']; $main_tmp = $row['main'];?></h4>
    				<ul class="list-group target">
		<?php $isFirstSub = true;}?>
		<?php if($sub_tmp!=$row['sub']){?>
    		<?php
    		if(!$isFirstSub){
    		    echo '</ul>';     // 直前のリンクリスト終了
                echo '</li>';     // 自分のアイテム終了
    		}else{
    		    $isFirstSub = false;
    		}
    		?>
    		<li class="list-group-item"><h5 class="triger"><?php echo $row['sub']; $sub_tmp = $row['sub']?></h5>
    			<ul class="list-group target">
    	<?php }?>
    	<li class="list-group-item"><a href="<?php echo $row['url']?>" target="_blank"><?php echo $row['item']?></a></li>
	<?php } ?>
	</ul>	<!-- サブカテゴリのリスト終了 -->
	</li>	<!-- メインカテゴリのアイテム終了 -->
	</ul>	<!-- メインカテゴリのリスト終了 -->


	<?php
	// 接続断
	mysqli_close($link);
	?>
</form>
</body>
</html>
