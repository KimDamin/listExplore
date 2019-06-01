<?php
	require ("db.php");

	$page = isset($_GET['p']) ? $_GET['p'] : 1;

	if(!is_numeric($page)) $page = 1;

	$sql = "SELECT COUNT(*) AS cnt FROM boards";

	$data= fetch($con, $sql);
	$totalCnt = $data->cnt;
	$ppn = 12; //페이지당 글의 수
	$totalPage = ceil($totalCnt / $ppn);

	$cpp = 5; //챕터당 페이지 수

	$endPage = ceil($page / $cpp) * $cpp;
	$startPage = $endPage - $cpp + 1;

	$prev = true;
	$next = true;
	if($endPage >= $totalPage){
		$endPage = $totalPage;
		$next = false;
	}

	if($startPage == 1){
		$prev = false;
	}

	$sql = "SELECT * FROM boards ORDER BY id DESC LIMIT " . ($page - 1) * $ppn . ", $ppn";

	$list = fetchAll($con, $sql);

	// $sql = "SELECT * FROM boards ORDER BY id DESC";

	// $q = $con->query($sql);

	// $list = $q->fetchAll(PDO::FETCH_OBJ);
?>
<link rel="stylesheet" type="text/css" href="style.css">
<!DOCTYPE html>
<html lang="ko">
	<?php require("head.php"); ?>
<body>
	<?php require("nav.php"); ?>

	<div class="content">
		<div class="size">
			<h1>게시판 리스트</h1>
			<table cellpadding="0">
				<tr>
					<th>번호</th>
					<th>제목</th>
					<th>글쓴이</th>
					<th>작성일</th>
				</tr>
			

				<?php
					foreach($list as $item) : 
				?>
					<tr>
						<td><?= $item->id ?></td>
						<td class="title">
							<a href="/view.php?id=<?= $item->id ?>">
								 <?= htmlentities($item->title) ?>
							</a>
						</td>
						<td><?= htmlentities($item->writer) ?></td>
		                <td><?= $item->wdate ?></td>
		            </tr>
		        <?php
		            endforeach;
		        ?>

		   	</table>

		   	<a href="/form.php" class="writeBtn btn">글쓰기</a>

		   	<div class="list_numbering_bar">
		   		<ul class="pagination">
		   			<li class="page_item  <?= $prev ? "" : "disabled" ?>">
		   				<?php if($prev) : ?>
		   				<a class="page_link" href="/list.php?p=<?= $startPage - 1 ?>">
		   				<?php else : ?>
						<a class="page_link" href="javascript:void(0);">
		   				<?php endif; ?>
		   					이전
		   				</a>
		   			</li>

		   			<?php for($i = $startPage; $i <= $endPage; $i++) : ?>
		   				<li class="page_item">
		   					<a class="page_link" href="/list.php?p=<?= $i ?>">
		   						<?= $i ?>
		   					</a>
		   				</li>
					<?php endfor; ?>

		   			<li class="page_item <?= $next ? "" : "disabled" ?>">
		   				<?php if($next) : ?>
		   				<a class="page_link" href="/list.php?p=<?= $endPage + 1 ?>">
		   				<?php else :?>
						<a class="page_link" href="javascript:void(0);">
						<?php endif; ?>
		   					다음
		   				</a>
		   			</li>
		   		</ul>
		   	</div>
			
		</div>
	</div>

	

</body>
</html>