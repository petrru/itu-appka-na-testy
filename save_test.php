<?php
require_once "init.php";
$data = $_POST['data'] ?? '';
$obj = json_decode($data);
$name = $obj->name;
if (empty($_POST['id'])) {
    $sql = "INSERT INTO tests VALUES (default, ?, ?, ?)";
    $q = DB::prepare($sql);
    $q->execute([$_SESSION['itu_uid'], $name, $data]);
    echo "ok-new";
}
else {
    $sql = "UPDATE tests SET name = ?, data = ? WHERE test_id = ? AND user_id = ?";
    $q = DB::prepare($sql);
    $q->execute([$name, $data, $_POST['id'], $_SESSION['itu_uid']]);
    echo "ok-edit";
}