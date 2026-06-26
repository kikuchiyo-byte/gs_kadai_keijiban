<?php
$id = $_POST['id'];
$name = $_POST['name'];
$msg  = $_POST['msg'];

$time = date("Y-m-d H:i:s");

$line = $name . "<>" . $msg . "<>" . $time . "\n";

file_put_contents("data/thread_{$id}.txt", $line, FILE_APPEND);

header("Location: thread.php?id=$id");
exit;
