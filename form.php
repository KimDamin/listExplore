<?php
	require ("db.php");

	if(!isset($_SESSION['user'])){
		$_SESSION['nextPage'] = "form.php";
		msgAndGo("글을 쓰기 위해서는 로그인을 해야합니다.", "login.php");
		exit;
	}

	$mod = 0; //글 작성 모드
	if(isset($_GET['id'])){
		//글 수정모드
		$mod = $_GET['id'];
		$sql = "SELECT * FROM boards WHERE id = ?";
		$q = $con->prepare($sql);
		$q->execute([ $_GET['id'] ]);
		$data = $q->fetch(PDO::FETCH_OBJ);

		if(!$data){
			echo "존재하지 않는 글입니다.";
			exit;
		}
	}
?>

<!DOCTYPE html>
<html lang="ko">
	<?php require("head.php"); ?>
<body>
	<?php require("nav.php"); ?>


	<div class="content">
		<div class="size">
			<?php if($mod == 0) : ?>
				<h1>글쓰기</h1>
			<?php else : ?>
				<h1>글 수정</h1>
			<?php endif ?>

		    
		    <form action="/process.php" method="POST" class="writeForm" enctype="multipart/form-data">
		    	<input type="hidden" name="id" value="<?= $mod ?>">
		    	 <input type="hidden" name="writer" value="<?= $_SESSION['user']->nickname ?>">
		    	<div class="aAll">
		    		<div>
		    			<span>제목</span>
		    			<input type="text" name="title" class="a" value="<?= $mod != 0 ? $data->title : "" ?>">
		    		</div>
		    		<div>
		    			<span>글쓴이</span>
		    			<input type="text" name="writer" class="a" value="<?= $_SESSION['user']->nickname ?>" readonly>
		    		</div>    		
		    	</div>
		    	
		    	<textarea name="content" cols="30" rows="10"><?= $mod != 0 ?$data->content : "" ?></textarea>

		    	<div class="filebox">
		    		<label for="ex_file">업로드</label>
		    		<input type="file" id="ex_file" name="upload">
		    	</div>
		    	
		    	<div class="line"></div>

		        <input type="submit" value="전송" class="btn">

		    </form>

		</div>
	</div>

</body>
</html>