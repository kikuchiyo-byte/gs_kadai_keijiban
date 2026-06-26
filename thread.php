<?php
$id = $_GET['id'];
$file = "data/thread_{$id}.txt";

$posts = [];
if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        list($name, $msg, $time) = explode("<>", $line);
        $posts[] = [
            "name" => $name,
            "msg" => $msg,
            "time" => $time
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>スレッド</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<a href="thread_list.php">← スレッド一覧へ戻る</a>

<h2>スレッド内の投稿</h2>

<form action="thread_post.php" method="post">
    <input type="hidden" name="id" value="<?= $id ?>">

    <p>名前：<input type="text" name="name" required></p>
    <p>内容：<br>
    <textarea name="msg" rows="4" cols="40" required></textarea></p>

    <button type="submit">投稿する</button>
</form>

<hr>

<?php foreach ($posts as $p): ?>
<div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
    <strong><?= htmlspecialchars($p['name']) ?></strong><br>
    <?= nl2br(htmlspecialchars($p['msg'])) ?><br>
    <small><?= $p['time'] ?></small>
</div>
<?php endforeach; ?>

</body>
</html>
