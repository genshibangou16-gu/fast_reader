<?php

/**
 * HTMLで特殊な意味を持つ文字をエスケープする
 * 
 * htmlspecialchars関数のラッパー
 * HTMLには特殊な意味を持つ文字があるため、それらを置換する
 *
 * @param string $text
 * @return string
 */
function replaceSpecialChars($text) {
	return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

/**
 * 本の情報を取得
 * 
 * booksフォルダ内のidフォルダ内のindex.jsonファイルを読み込み、配列に変換して返す
 *
 * @param string $id
 * @return string[]
 */
function getBookInfo($id) {
	return json_decode(file_get_contents('books/' . $id . '/index.json'), true);
}
