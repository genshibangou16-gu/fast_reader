<?php

session_start();
require_once('func.php');

sessionCheck();
//genCSP();

if(isset($_SESSION['error'])) {
	$error = $_SESSION['error'];
	if(isset($_SESSION['errorMessage'])) {
		$errorMessage = $_SESSION['errorMessage'];
	}else {
		$errorMessage = '';
	}
}else {
	transit('index.php');
}

?>

<!doctype html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>Fast reader | Error</title>
	<meta name="robots" content="noindex">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="style/reset.css">
	<link rel="stylesheet" href="style/style.css?<?=genUnique()?>">
</head>

<body>
	<div id="wrapper">
		<h1 class="wrapper__title">Error: <?=$error?></h1>
		<p class="wrapper__text"><?=$errorMessage?></p>
	</div>
</body>
</html>