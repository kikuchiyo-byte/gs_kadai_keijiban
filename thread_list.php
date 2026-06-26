<?php
$threads = [];
if (file_exists("data/threads.txt")) {
    $lines = file("data/threads.txt", FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        list($id, $title, $time) = explode("<>", $line);
        $threads[] = [
            "id" => $id,
            "title" => $title,
            "time" => $time
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>スレッド一覧</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <!-- ★ Welcome セクション（Reddit 風） -->
    <div class="welcome-card">
        <h1>ようこそ、みんなの掲示板へ！</h1>
        <p>ここでは自由にスレッドを作成し、会話を楽しめます。</p>
        <p>気になる話題を見つけたり、新しいスレッドを立ててみましょう。</p>
    </div>

    <h2 class="page-title">スレッド一覧</h2>

    <a class="new-thread-btn" href="thread_new.php">＋ 新しいスレッドを作る</a>

    <?php foreach ($threads as $t): ?>
        <div class="thread-card">


            <div class="thread-content">
                <a class="thread-title" href="thread.php?id=<?= $t['id'] ?>">
                    <?= htmlspecialchars($t['title']) ?>
                </a>
                <div class="thread-meta">
                    作成日時：<?= $t['time'] ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>

</body>
</html>
