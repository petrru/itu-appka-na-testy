<?php
require_once "init.php";

$t = new Test();
$q = $t->prepare("delete from tests WHERE user_id = ? and test_id = ?");
$q->execute([$_SESSION['itu_uid'], $_GET['id']]);
header("location: main.php?deleted");