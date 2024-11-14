<!-- 本リストで使う<body> -->
<!-- PHPで読み込んで表示 -->

<body>
    <div class="wrapper">
        <h1>List of books</h1>
        <div class="bookList">

            <!-- ここからPHP -->
            <?php
            // booksフォルダ内のフォルダ名を取得
            $books = glob('books/*');
            // booksフォルダ内にフォルダがない場合はトップページにリダイレクト
            if(empty($books)) {
                header('Location: /index.php', true, 302);
                exit();
            }
            // フォルダ名を元に本の情報を取得してリンクを生成
            foreach($books as $i) {
                // フォルダ名からidを取得
                $id = basename($i);
                // 本の情報（index.jsonの中身）を連想配列で取得
                $bookInfo = getBookInfo($id);

                // !! 本のタイトルをリンクとして表示 !!
                // - 「<<<EOE」から「EOE」までが1つのecho文
                // - 変数は{}で囲む
                echo <<<EOE
                <a class="bookList__item" href="index.php?id={$id}">
                    <img src="{$bookInfo['image']}" class="bookList__image" alt="本のアイコン">
                    <p>{$bookInfo['title']}</p>
                </a>
                EOE;
            }
            ?>
            <!-- ここまでPHP -->

        </div>
    </div>
</body>