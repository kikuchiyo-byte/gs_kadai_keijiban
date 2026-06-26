<?php
$title = $_POST['title'];
$id = time(); // スレッドID
$time = date("Y-m-d H:i:s");

// スレッド一覧に追加
$line = $id . "<>" . $title . "<>" . $time . "\n";
file_put_contents("data/threads.txt", $line, FILE_APPEND);

// スレッド専用ファイルを作成（空でOK）
file_put_contents("data/thread_{$id}.txt", "");

header("Location: thread.php?id=$id");
exit;
