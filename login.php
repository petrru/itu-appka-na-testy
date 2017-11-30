<?php
require_once "init.php";
$q = DB::prepare("select user_id, `password` from users WHERE name = ?");
$q->execute([$_POST['nick'] ?? '']);
$r = $q->fetch(PDO::FETCH_NUM);
if (!$r || !password_verify($_POST['heslo'], $r[1])) {
    header("Location: ./?bad-pass&nick=" . ($_POST['nick'] ?? ''));
}
else {
    $_SESSION['itu_uid'] = $r[0];
    header('Location: main.php');
}