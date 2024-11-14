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

<!-- ここからPHP -->
<?php
// functions.phpから関数を読み込む
require_once('functions.php');

// idパラメーターの有無を確認
if(isset($_GET['id'])) {
	// ~~~ パラメーターあり ~~~
	// => 本を表示

	// idパラメーターの値を取得
    $id = replaceSpecialChars($_GET['id']);
	// idパラメーターが空の場合はトップページにリダイレクト
    if(empty($id)) {
        header('Location: /index.php', true, 302);
        exit();
    }
	// idパラメーターのフォルダが存在しない場合はトップページにリダイレクト
	if(!file_exists('books/' . $id)) {
		header('Location: /index.php', true, 302);
		exit();
	}
	// idパラメーターのフォルダ内のファイル数を取得
	$pageMax = count(glob('books/' . $id . '/*')) - 1;
	// ページ番号を保存したcookieの有無を確認
	if(isset($_COOKIE[$id])) {
		// 保存したcookieがある場合はページ番号を取得
		$pageNum = replaceSpecialChars($_COOKIE[$id]);
	}else {
		// 保存したcookieがない場合は1ページ目を表示
		$pageNum = 1;
	}
	// 本の拡張子を取得
	// ※ 本の拡張子は全ページ同じと仮定
	$extension = pathinfo(glob('books/' . $id . '/*')[$pageNum], PATHINFO_EXTENSION);
}else {
	// ~~~ パラメーターなし ~~~
	// => 本リストを表示

	// booksフォルダ内のフォルダ名を取得
	$books = glob('books/*');
	// booksフォルダ内にフォルダがない場合はトップページにリダイレクト
	if(empty($books)) {
		header('Location: /index.php', true, 302);
		exit();
	}
	$body = <<<EOL
	<div class="book_list">
		<h1 class="book_list">List of books</h1>
	EOL;
	foreach($books as $i) {
		$id = basename($i);
		$bookInfo = getBookInfo($id);
		$body = $body . '<a class="book_list" href="index.php?id=' . $id . '">' . $bookInfo['title'] . '</a>';
	}
	$body = $body . <<<EOL
	</div>
	</body>
	EOL;
	echo $body;
	exit();
}

?>
<!-- ここまでPHP -->

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
	<input id="extension" type="hidden" value="<?=$extension?>">
	
	<script src="index.js?ver1" defer></script>
</body>
</html>