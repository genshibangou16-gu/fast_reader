<?php

require_once('func.php');

postCheck();

function parts($input) {
	$data = array(
		'id' => '1234-1',
		'jsonrpc' => '2.0',
		'method' => 'jlp.maservice.parse',
		'params' => array(
			'q' => str_replace(array(" ", "　", "\r\n", "\r", "\n"), '', $input)
		)
	);
	
	$header = array(
		'Content-Type: application/json',
		'User-Agent: Yahoo AppID: dj00aiZpPU5NWjE5OFF6Q1FncyZzPWNvbnN1bWVyc2VjcmV0Jng9MTA-'
	);
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, 'https://jlp.yahooapis.jp/MAService/V2/parse');
	$result = curl_exec($ch);
	curl_close($ch);
	
	$text = array(['', 0]);
	
	$tokens = json_decode($result, true)['result']['tokens'];
	
	if(count($tokens) > 1) {
		$count = 1;
		$end = true;
		$nextMarge = false;
		$tmpPart = '';
		$tmpPartV = '';
		foreach($tokens as $i) {
			$t = $i[0];
			if($i[3] == '特殊' && $i[4] != '括弧始') {
				// 接続、後置不可
				$marge = true;
				if($i[4] == '括弧終') {
					$end = false;
				}else {
					$end = true;
				}
			}else if(($i[3] == '助動詞' || $i[3] == '助詞' || $i[3] == '接尾辞' || $nextMarge || (($i[3] == '名詞' && $i[4] != '数詞') && ($tmpPart == '形容詞' || ($tmpPart == '名詞' && $tmpPartV != '副詞的名詞'))) || $t == 'ー' || (($i[4] == 'アルファベット' || $i[4] == 'その他' || $i[4] == '数詞') && ($tmpPartV == 'アルファベット' || $tmpPartV == 'その他' || $tmpPartV == '数詞'))) && !$end) {
				// 接続、後置可
				$marge = true;
				$end = false;
			}else {
				// 独立、後置可
				$marge = false;
				$end = false;
			}
			
			if($i[3] == '接頭辞' || $i[4] == '括弧始' || $i[4] == '数詞' || $i[3] == '連体詞') {
				$nextMarge = true;
			}else {
				$nextMarge = false;
			}
			
			$len = mb_strlen($t, 'UTF-8');
			if($marge) {
				$text[$count - 1][0] = $text[$count - 1][0] . $t;
				$text[$count - 1][1] = $text[$count - 1][1] + $len;
			}else {
				array_push($text, array($i[0], $len));
				$count++;
			}
			$tmpPart = $i[3];
			$tmpPartV = $i[4];
		}
		if(!$text[0][0]) {
			array_shift($text);
		}
	}else {
		$text = array([$tokens[0][0], 0]);
	}
	
	return json_encode($text);
}