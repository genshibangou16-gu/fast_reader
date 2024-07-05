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
	<title>Fast read test</title>
	<meta name="robot" content="noindex">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="style/reset.css">
	<link rel="stylesheet" href="style/style.css?<?=genUnique()?>">
	<script src="script/font.js" defer></script>
</head>

<body>
	<input type='checkbox' class="mode" id="mode" name="mode">
	<div class="wrapper">
		<div class="wrapper__page">
			<h1 class="wrapper__title">速読テスト</h1>
			<p class="wrapper__text">ご協力ありがとうございます。</p>
			<p class="wrapper__text">フォントや<wbr>レイアウトの<wbr>違いが<wbr>読みの<wbr>スピードに<wbr>与える<wbr>影響を<wbr>調査する<wbr>テストです。</p>
			<p class="wrapper__text">各パラグラフの<wbr>読み始めから<wbr>読み終わりまでの<wbr>時間を<wbr>計測しています。</p>
			<div>
				<p class="wrapper__text">ダークモード/ライトモード</p>
				<label for="mode" class="mode__label">
					<img src="image/dark_mode.svg" alt="ダークモード" class="mode__image--dark">
					<img src="image/light_mode.svg" alt="ライトモード" class="mode__image--light">
				</label>
			</div>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page hidden">
			<h1 class="wrapper__title">注意事項</h1>
			<p class="wrapper__text">正しい結果を<wbr>得るために<wbr>スマートフォンで<wbr>アクセスして<wbr>ください。</p>
			<p class="wrapper__text">全部で<wbr>7つの<wbr>パラグラフが<wbr>提示されます。</p>
			<p class="wrapper__text">最初のパラグラフは練習です。</p>
			<p class="wrapper__text">止まったり<wbr>読み直したり<wbr>読み飛ばしたり<wbr>せずに<wbr>最後まで<wbr>読んでください。</p>
			<p class="wrapper__text">コンテンツは<wbr>ChatGPTによって<wbr>自動生成されたものです。</p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page hidden">
			<h1 class="wrapper__title">練習</h1>
			<p class="test">群馬県は、自然の美しさと温泉地が魅力の一つです。四季折々の風景や山々の緑、渓谷の清流など、自然が豊かで心癒されます。また、伝統的な温泉地やスキーリゾートも充実しており、リラックスやアクティビティに最適です。また、群馬は歴史や文化にも魅力があります。古くから栄えた城や寺院、伝統工芸品など、歴史的な価値を感じることができます。食文化も充実しており、群馬の名産品や郷土料理を楽しむことができます。群馬県は、多彩な魅力が詰まった魅力的な観光地です。</p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page hidden">
			<p class="wrapper__text">次のページからテストが始まります。</p>
			<p class="wrapper__text">止まったり<wbr>読み直したり<wbr>せずに<wbr>最後まで<wbr>読んでください。</p>
			<p class="wrapper__text">1/6</p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page wrapper__page--test hidden">
			<p class="test test--yu-mincho">日本には有名な観光地が多いですが、その中にはまだ知られていない穴場の旅行先もあります。以下にいくつかの穴場スポットを紹介します。島根県・隠岐諸島は自然豊かな島々で、美しい海や風光明媚な景観が広がります。美しいビーチや温泉、磯釣りなどのアクティビティを楽しむことができます。長野県・上高地は北アルプスの麓に広がる自然保護区で、美しい渓谷や高山植物が魅力です。ハイキングやトレッキングを楽しむことができ、四季折々の風景が広がります。富山県・黒部峡谷は険しい峡谷と清流が特徴で、美しい景観が広がります。黒部ダムや立山黒部アルペンルートを訪れることで、壮大な自然を満喫することができます。</p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page wrapper__page--test hidden">
			<p class="test test--yu-mincho">石川県・能登半島は美しい海岸線と歴史的な観光地が点在しています。金沢市や能登の伝統工芸品、温泉地などを訪れることで、ゆったりとした時間を過ごせます。山口県・萩は歴史的な町並みや美しい庭園があり、武士の街として知られています。萩市街地や萩城址公園、松陰神社などを訪れることで、歴史と文化に触れることができます。これらは日本の穴場として知られていない旅行先の一部です。自然や歴史、文化に触れることができる魅力的な場所ですので、観光地の賑わいを避けたい方や、新たな発見を求める方におすすめです。</p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page hidden">
			<h1 class="wrapper__title">休憩</h1>
			<p class="wrapper__text">準備ができたら次に進んでください。</p>
			<p class="wrapper__text">2/6</p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page wrapper__page--test hidden">
			<p class="test test--yu-gothic">書籍は、数千年にわたり人類の知識や物語を伝える重要なメディアであり続けてきました。しかし、現代のデジタル技術の進歩により、書籍の未来には大きな変化が訪れるでしょう。まず、電子書籍の普及が進みます。電子書籍は、モバイルデバイスや電子書籍リーダーを通じて手軽にアクセスできるため、利便性が高くなります。さらに、クラウドストレージの発展により、膨大な数の書籍を持ち歩くことが可能になります。次に、拡張現実（AR）や仮想現実（VR）の技術が書籍体験を変革するでしょう。読者は、物語の舞台や登場人物とのインタラクティブな体験を楽しむことができます。ARやVRを活用した書籍は、より没入感のある読書体験を提供し、読者の想像力を刺激するでしょう。</p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page wrapper__page--test hidden">
			<p class="test test--yu-gothic">また、AI技術の発展により、書籍の生成やカスタマイズが進むことも予想されます。AIは、膨大なデータから自動的に文章を生成することができます。これにより、読者の興味や好みに合わせたカスタム書籍が提供される可能性があります。しかし、デジタル化の進展にもかかわらず、紙の書籍はなお存在感を持ち続けるでしょう。紙の書籍は、独自の魅力や感触を提供し、読書体験においてリラックスや集中力を促す効果があります。また、アナログな書籍は情報漏洩のリスクが少なく、プライバシーを守る手段としての役割も果たすでしょう。総じて言えることは、書籍は依然として人々にとって重要な存在であり、進化し続けるであろうということです。デジタル技術の進歩により、書籍の形態や読書体験は変化するかもしれませんが、知識や物語の伝達手段としての役割は不変です。</p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page hidden">
			<h1 class="wrapper__title">休憩</h1>
			<p class="wrapper__text">準備ができたら次に進んでください。</p>
			<p class="wrapper__text">3/6</p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page wrapper__page--test hidden">
			<p class="test test--hiragino-mincho">宇宙ビジネスは、宇宙探査や宇宙技術の発展により急速に成長している分野です。宇宙は人類にとって未知の領域であり、その探索や利用には膨大な潜在力があります。一つの主要な宇宙ビジネスは、衛星通信です。人々の需要に応えるために、通信衛星の需要は増え続けています。高速インターネットやモバイル通信の普及により、宇宙からの通信インフラの重要性が高まっており、宇宙企業はこれに対応しています。また、宇宙観光も注目されています。民間企業が宇宙旅行を提供し、一般人が宇宙を体験することが可能になりました。これにより、新たな観光市場が生まれ、宇宙旅行に関連する様々なビジネスチャンスが広がっています。</p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page wrapper__page--test hidden">
			<p class="test test--hiragino-mincho">さらに、宇宙資源の探査や利用も進んでいます。月や小惑星などの天体には、水や鉱物などの資源が存在する可能性があります。これらの資源を採掘・利用する技術やビジネスモデルの開発が進められており、宇宙資源の産業化が期待されています。また、宇宙環境の監視や地球観測にも宇宙ビジネスは貢献しています。気候変動や天災の予知・監視、地球環境のモニタリングなど、宇宙技術を活用することで地球の持続可能性を向上させる取り組みが進められています。総括すると、宇宙ビジネスは衛星通信、宇宙観光、宇宙資源の探査・利用、宇宙環境の監視・地球観測など多岐にわたる分野で活発に展開されています。技術の進歩や民間企業の参入により、宇宙ビジネスはますます成長し、人類の未来に大きなインパクトを与えるでしょう。</p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page hidden">
			<h1 class="wrapper__title">休憩</h1>
			<p class="wrapper__text">準備ができたら次に進んでください。</p>
			<p class="wrapper__text">4/6</p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page wrapper__page--test hidden">
			<p class="test test--hiragino-kakugo">夏の暑さや湿度の高さによって、私たちは夏バテと呼ばれる疲労や体力低下を経験することがあります。しかし、適切な食事選びによって夏バテを予防し、健康的な夏を過ごすことができます。まず、水分補給が重要です。暑い季節には体内の水分が失われやすくなるため、こまめな水分摂取が必要です。水だけでなく、スポーツドリンクやハーブティーなども適度に摂ることで、体内の水分バランスを保ちましょう。また、栄養バランスの取れた食事を心掛けましょう。夏野菜や果物は水分やビタミン・ミネラルが豊富で、消化にも負担をかけません。例えば、キュウリやトマト、スイカなどは水分を多く含んでいるので、夏バテ対策に適した食材です。</p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page wrapper__page--test hidden">
			<p class="test test--hiragino-kakugo">さらに、消化を助ける軽めの食事がおすすめです。生野菜やサラダ、冷製のスープなどは胃腸への負担が少なく、消化しやすいです。また、脂っこい食事や重たい料理は避けるようにしましょう。夏には食欲も落ちがちですが、十分な栄養を摂るためにも小分けで頻繁に食事を取ることが重要です。3食の代わりに5〜6回に分けて軽めの食事を摂ることで、エネルギーを効率よく摂取することができます。総括すると、夏バテに効果的な食事は水分補給、栄養バランスの取れた食事、消化の良い軽めの食事、頻繁な食事摂取です。これらのポイントに気を付けて食事を工夫することで、夏の疲労感や体力低下を軽減できます。</p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page hidden">
			<h1 class="wrapper__title">休憩</h1>
			<p class="wrapper__text">準備ができたら次に進んでください。</p>
			<p class="wrapper__text">5/6</p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page wrapper__page--test">
			<input type="hidden" class="stepped__input" value="認知心理学は、人間の思考や認知プロセスを科学的に研究する学問です。哲学は古くから人間の思考や知識の本質について考える学問であり、認知心理学にも重要な影響を与えてきました。一つの影響は、認識論の視点からのアプローチです。認識論は知識や信念の性質や起源について考察する分野であり、哲学者たちはこれに多大な関心を抱いてきました。認知心理学はその基盤となる哲学的な問いに科学的な手法を取り入れ、人間の認知プロセスの研究を進めることで、知識や信念の形成や変容について理解を深めました。また、哲学は言語や意味に関する研究にも貢献しました。意味論や形式論理などの哲学的な概念やアイデアは、認知心理学の言語処理や意味解釈の研究に応用されました。">
			<p class="stepped__text test--source-han-serif"></p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page wrapper__page--test">
			<input type="hidden" class="stepped__input" value="言語の理解や生成、意味の解釈や表現に関する研究は、哲学的な問いに科学的な手法で取り組むことで進展しました。さらに、倫理学や道徳哲学は認知心理学における道徳判断や倫理的な意思決定の研究に影響を与えました。道徳的な判断や行動に関わるプロセスや心理的な要因について、哲学的な議論から洞察を得ることができました。倫理的な意思決定や行動の背後にある心理的なメカニズムの理解は、倫理学と認知心理学の統合的なアプローチによって進んでいます。総括すると、哲学は認知心理学に対して、認識論や言語、倫理学などの分野で深い影響を与えました。哲学的な問いに対して科学的な手法を用いることで、人間の思考や認知プロセスに関する理解が深まりました。">
			<p class="stepped__text test--source-han-serif"></p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page hidden">
			<h1 class="wrapper__title">休憩</h1>
			<p class="wrapper__text">準備ができたら次に進んでください。</p>
			<p class="wrapper__text">最後のパラグラフです。</p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page wrapper__page--test">
			<input type="hidden" class="stepped__input" value="朝、佐藤さんは明るい笑顔で目覚めました。彼女は女子大学生で、新たな一日が始まることにワクワクしていました。彼女は忙しい日々を過ごしていますが、充実感に満ちた生活を送っています。授業前には朝食をしっかりと摂ります。健康を大切にする彼女は、バランスのとれた食事を心がけています。体が満たされると、元気いっぱいで学校へ向かいます。キャンパスに着くと、友達との楽しいおしゃべりや授業が待っています。佐藤さんは積極的に参加し、意見を交換することが好きです。彼女の情熱と興味は、周りの人々にも感染します。ランチタイムには友人と一緒にカフェや学食で食事を楽しみます。彼女たちは日常の出来事や将来の夢について話し合い、お互いを励まし合います。笑顔が絶えない時間です。">
			<p class="stepped__text test--source-han-sans"></p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<div class="wrapper__page wrapper__page--test">
			<input type="hidden" class="stepped__input" value="午後の授業が終わると、佐藤さんはサークル活動に参加します。彼女は音楽サークルに所属しており、一緒に練習や演奏を楽しんでいます。音楽は彼女の心の支えであり、表現の場でもあります。帰宅後は少しのんびりと過ごします。読書や趣味の絵を描くことでリラックスし、自分自身と向き合います。家族との時間や友人との連絡も大切にします。夜、佐藤さんは充実感と満足感を抱きながら眠りにつきます。彼女は一日一日を大切に生きており、学びと成長の旅を楽しんでいます。明日も新たな挑戦が待っています。佐藤さんの一日は、活気とポジティブなエネルギーに満ち溢れています。彼女の心の豊かさと前向きな姿勢は、周りの人々にも影響を与えています。">
			<p class="stepped__text test--source-han-sans"></p>
			<input type="submit" class="wrapper__next" value="次へ">
		</div>
		<form class="wrapper__page hidden" method="post" action="https://docs.google.com/forms/u/0/d/e/1FAIpQLSemUK3Awy9Vv5-ZWt9GcZIr7FM3KZMm4m-MVEXisAxsuTc-RA/formResponse">
			<h1 class="wrapper__title">お疲れ様でした。</h1>
			<p class="wrapper__text">あなたの<wbr>読みの<wbr>スピードを<wbr>計算します。</p>
			<button class="wrapper__submit" id="result__button" type="button">結果を表示</button>
			<div class="result hidden" id="result">
				<table class="result__data" id="result__data"></table>
				<p class="wrapper__text">調査に<wbr>利用することに<wbr>ご同意いただける<wbr>場合は<wbr>結果の送信を<wbr>お願いします。</p>
				<div class="result__name">
					<label for="result__input">お名前（任意）</label>
					<input type="text" id="result__input" class="result__input" name="entry.888298444">
				</div>
				<input type="submit" class="wrapper__submit" value="送信">
				<p class="wrapper__text">最適化表示では<wbr>改行位置が<wbr>単語を<wbr>分解しない<wbr>ように<wbr>なっています。<br>また、<wbr>テキストの<wbr>ベースラインが<wbr>階段状に<wbr>なっており<wbr>眼球運動を<wbr>支援します。</p>
			</div>
			<footer class="credit">
				<small>本テストに<wbr>使用した<wbr>文章は、<wbr>OpenAIの<wbr>AI言語モデル<wbr>である<wbr>ChatGPTに<wbr>よって<wbr>生成された<wbr>ものです。<wbr>（引用元:<a class="credit__link" href="https://www.openai.com/">https://www.openai.com/</a>）<wbr>生成された<wbwr>回答は<wbr>機械学習<wbr>モデルの<wbr>結果であり、<wbr>正確性や<wbr>信頼性が<wbr>保証されて<wbr>いないことに<wbr>留意して<wbr>ください。</small>
				<small><a class="credit__link" href="mailto:sorabi.jp@gmail.com">連絡先（メール）</a></small>
				<small>&copy; 2023 北村梢生</small>
			</footer>
		</form>
	</div>
	<script src="script/step.js?<?=genUnique()?>" defer></script>
	<script src="script/test.js?<?=genUnique()?>" defer></script>
</body>
</html>