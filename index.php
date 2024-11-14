<?php

function replaceHtml($i) {
	return htmlspecialchars($i, ENT_QUOTES, 'UTF-8');
}

?>

<!doctype html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>book card</title>
	<link rel="stylesheet" href="style.css?ver1">
	<meta name="robots" content="noindex">
	<meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#000000">
</head>
<body>

<?php

if(isset($_GET['id'])) {
    $id = replaceHtml($_GET['id']);
    if(empty($id)) {
        header('Location: /index.php', true, 302);
        exit();
    }else {
        $pageMax = count(glob('books/' . $id . '/*')) - 1;
        if(isset($_COOKIE[$id])) {
            $pageNum = replaceHtml($_COOKIE[$id]);
        }else {
            $pageNum = 1;
        }
    }
}else {
	$books = glob('books/*');
	$body = '<div class="book_list"><h1 class="book_list">List of books</h1>';
	foreach($books as $i) {
		$index = json_decode(file_get_contents($i . '/index.json'), true);
		$body = $body . '<a class="book_list" href="index.php?id=' . substr($i, 6, 8) . '">' . $index['title'] . '</a>';
	}
	$body = $body . '</div></body>';
	echo $body;
	exit();
}

?>

<body>
	<div id="frame">
		<div id="left"></div>
		<div id="right"></div>
		<div id="toolbar">
			<div id="direction">
				<p id="dir_sign"></p>
			</div>
			<p id="textarea"></p>
			<div id="info"><img id="info_img" src="info.svg" alt="info icon"></div>
		</div>
		<img id="page" src="//:0" class="hidden" alt="page image">
		<div id="info_panel" class="hidden">
			<p>タイトル</p>
			<p class="td"></p>
			<p>著者</p>
			<p class="td"></p>
			<p>出版社</p>
			<p class="td"></p>
			<p>出版年</p>
			<p class="td"></p>
		</div>
	</div>
	<input id="id" type="hidden" value="<?=$id?>">
	<input id="pageMax" type="hidden" value="<?=$pageMax?>">
	<input id="pageNum" type="hidden" value="<?=$pageNum?>">
	
	<script src="index.js?ver1" defer></script>
</body>
</html>