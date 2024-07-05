<?php

session_start();
require_once('func.php');
require_once('parts.php');

sessionCheck();
csrfCheck();

$encodedText = parts($_POST['inputText']);

if(empty($_POST['mode'])) {
	$mode = '';
}else {
	$mode = 'checked';
}

?>

<!doctype html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>Fast reader</title>
	<meta name="robot" content="noindex">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="style/reset.css">
	<link rel="stylesheet" href="style/style.css?<?=genUnique()?>">
</head>

<body>
	<input type="hidden" id="encodedText" value="<?=replaceHtml($encodedText)?>">
	<input type="checkbox" class="mode" name="mode" <?=$mode?>>
	<div class="wrapper__page">
		<p class="stepped" id="stepped"></p>
	</div>
	<script src="script/step.js?<?=genUnique()?>" defer></script>
	<script src="script/read.js?<?=genUnique()?>" defer></script>
</body>
</html>