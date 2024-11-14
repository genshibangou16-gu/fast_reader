<!doctype html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>book card</title>
	<link rel="stylesheet" href="./src/style.css">
	<meta name="robots" content="noindex">
	<meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#000000">
</head>

<!-- ここからPHP -->
<?php
// functions.phpから関数を読み込む
require_once('./src/functions.php');

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

	// list.phpを読み込む（本リストのHTMLを書き出し）
	// ※ 本リストのHTMLはlist.phpに記述
	// ※ 本リストのHTMLはここに直接書かない
	require_once('./src/list.php');
	exit(); // 本リストを表示したら終了（以降のHTMLは出力しない）
}

?>
<!-- ここまでPHP -->

<!-- 以降は本ページのHTML -->
<body>
	<div id="frame">
		<div id="left"></div>
		<div id="right"></div>
		<div id="toolbar">
			<div id="home">
				<img id="homeButton" src="./src/home.svg" alt="リストに戻る">
			</div>
			<p id="textarea"></p>
			<div id="info">
				<img id="infoButton" src="./src/info.svg" alt="本の情報を開く">
			</div>
		</div>
		<img id="page" src="//:0" class="hidden" alt="page image">
		<div id="infoPanel" class="hidden">
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

	<!-- JavaScriptで使う変数 -->
	<input id="id" type="hidden" value="<?=$id?>">
	<input id="pageMax" type="hidden" value="<?=$pageMax?>">
	<input id="pageNum" type="hidden" value="<?=$pageNum?>">
	<input id="extension" type="hidden" value="<?=$extension?>">
	
	<script src="./src/index.js" defer></script>
</body>
</html>