
<nav class="header">
	<div class="size">
		<div class="logo">
			<a href="index.php">NOTICE</a>
		</div>

	    <ul class="user_menu">
	    	<?php if(isset($_SESSION['user'])) : ?>
	    		<li class="user_item">
	    			<a href="#" class="user_link">
	    				<?= $_SESSION['user']->nickname ?>님
	    			</a>
	    		</li>
	    		<li class="user_item">
	    			<a href="/logout.php" class="user_link">로그아웃</a>
	    		</li>
	    	<?php else : ?>
	    		<li class="user_item">
	    			<a href="/register.php" class="user_link">회원가입</a>
	    		</li>
	    		<li class="user_item">
	    			<a href="/login.php" class="user_link">로그인</a>
	    		</li>
	    	<?php endif; ?>
	    </ul>

	     <ul class="menu">
	        <li><a href="/list.php">게시판</a></li>
	        <li><a href="/form.php">글쓰기</a></li>
	    </ul>
	</div>
</nav>
