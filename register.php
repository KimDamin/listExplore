<!DOCTYPE html>
<html lang="ko">

<?php require("head.php"); ?>

<body>
	<?php require("nav.php"); ?>

	<div class="register_container">
		<div class="register_h1">	
			<h1>회원가입</h1>
		</div>

		<div class="register_content">
			<form action="/register_ok.php" method="POST">
				<div class="register_form">	
					<label for="email">이메일 주소</label>
					<input type="email" id="email" name="email" class="register_form_control" placeholder="name@email.com">
				</div>
				<div class="register_form">	
					<label for="nick">닉네임</label>
					<input type="text" id="nick" name="nick" class="register_form_control" placeholder="사용할 닉네임">
				</div>
				<div class="register_form">	
					<label for="password">비밀번호 입력</label>
					<input type="password" id="password" name="password" class="register_form_control" placeholder="******">
				</div>
				<div class="register_form">	
					<label for="password2">비밀번호 확인</label>
					<input type="password" id="password2" name="password2" class="register_form_control" placeholder="******">
				</div>

				<button type="submit" class="btn">완료</button>
				<a href="/login.php" class="btn">로그인하러 가기</a>
			</form>
		</div>
	</div>
	
</body>
</html>