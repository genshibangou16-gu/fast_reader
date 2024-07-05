<?php

session_start();
require_once('func.php');

sessionCheck();

$csrfToken = genToken();
$_SESSION['csrfToken'] = $csrfToken;

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fast reader</title>
	<meta name="robot" content="noindex">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="style/reset.css">
	<link rel="stylesheet" href="style/style.css?<?=genUnique()?>">
	<script src="script/font.js" defer></script>
</head>

<body>
	<form action="read.php" method="post">
		<input type='checkbox' class="mode" id="mode" name="mode">
		<div class="wrapper__page">
			<h1 class="wrapper__title">速読リーダー</h1>
			<div>
				<p class="wrapper__text">ダークモード/ライトモード</p>
				<label for="mode" class="mode__label">
					<img src="image/dark_mode.svg" alt="ダークモード" class="mode__image--dark">
					<img src="image/light_mode.svg" alt="ライトモード" class="mode__image--light">
				</label>
			</div>
			<input type="hidden" name="csrfToken" value="<?=$csrfToken?>">
			<textarea name="inputText" class="wrapper__textarea" placeholder="速読したい文を入力してください"></textarea>
			<input type="submit" class="wrapper__submit" value="送信">
		</div>
	</form>
</body>
</html>