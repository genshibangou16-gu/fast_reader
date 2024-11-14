# Welcome to Card reader ✋

実験用の読書環境です。

# 技術スタック

```
PHP
JavaScript
CSS
```

# ディレクトリ構造 📁

```
/
├─ books
│  ├─ [book_id]           本の画像を入れておくフォルダ
│  │  ├─ 01.png           画像ファイルの拡張子は何でもよいが、フォルダ内で統一すること
│  │  ├─ 02.png
│  │  ├─ ...
│  │  └─ index.json       本の情報を書いておくファイル
│  └─ ...
├─ src                    ユーザーが直接アクセスしないファイルを入れておくフォルダ
│  ├─ function.php        phpの処理に使う関数が書いてあるファイル
│  ├─ home.svg            ホームアイコン
│  ├─ index.js            ページめくりやページ保存等を制御しているファイル
│  ├─ info.svg            インフォアイコン
│  └─ style.css           デザインを決めているファイル
├─ favicon.ico            ブラウザのアイコンに使われるファイル
└─ index.php              全てのアクセスを受け付けるファイル
```

# フロー

`index.php`での処理の流れは次のフリーチャートの通りです。

![フローチャート](https://github.com/user-attachments/assets/f48187fd-8fba-414e-9b24-4f23ade6150c)

# デプロイ

サーバーへのアップロードは`GitHub`で自動化されています。

`main`ブランチに`push`した変更は即座にサーバーへ反映されます。

# XAMPP

ローカル環境でのPHPの実行にはXAMPPという環境が必要です。

[ここ](https://www.apachefriends.org/jp/index.html)からインストールしてください。
