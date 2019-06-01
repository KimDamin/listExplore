<?php
	require("db.php");

	$sql = "SELECT * FROM boards WHERE id = ?";

	$q = $con->prepare($sql);

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else {
		echo "잘못된 접근입니다.";
		exit;
	}

	$q->execute([$id]);
	$data = $q->fetch(PDO::FETCH_OBJ);

	if(!$data){
		echo "존재하지 않는 글입니다.";
		exit;
	}
?>
<link rel="stylesheet" type="text/css" href="style.css">
<!DOCTYPE html>
<html lang="ko">
	<?php require("head.php"); ?>
<body>
	<?php require("nav.php"); ?>

	<div class="content">
		<div class="size">
			<h1><?= $data->id ?> . <?= htmlentities($data->title) ?></h1>
			<div class="showWho">
				<span>작성자 : <?= htmlentities($data->writer) ?></span>
				<span>작성일 : <?= $data->wdate ?></span>
			</div>
			<div class="showContent">
				<?= nl2br( htmlentities($data->content) ) ?>
				<img src="<?= $data->img ?>" alt="pic">
			</div>
			<div class="showAll">
				<a class="btn showBtn" href="/form.php?id=<?= $data->id ?>">수정하기</a>
				<a class="btn showBtn" href="/delete.php?id=<?= $data->id ?>">삭제</a>
				<a class="btn showBtn" href="/list.php">목록 보기</a>
			</div>

		</div>
		
	</div>
	
	
</body>
</html>