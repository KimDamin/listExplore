<!DOCTYPE html>
<html lang="ko">

<?php require("head.php"); ?>

<body>
	<?php require("nav.php"); ?>

	<div class="login_container">
		<div class="login_h1">
			<h1>로그인</h1>
		</div>

		<div class="login_content">
			<form action="/login_ok.php" method="POST">
				<div class="login_form">
					<label for="email">이메일</label>
					<input type="text" id="email" name="email" class="login_form_control" placeholder="이메일 입력">
				</div>
				<div class="login_form">
					<label for="password">비밀번호</label>
					<input type="password" id="password" name="password" class="login_form_control" placeholder="비밀번호 입력">
				</div>

				<button class="btn" type="submit">완료</button>
				<a href="/register.php" class="btn">회원가입</a>
				
			</form>
		</div>
	</div>
	
</body>
</html>