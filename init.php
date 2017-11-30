<?php
session_start();
spl_autoload_register(function ($class_name) {
    include_once $class_name . '.php';
});
DB::init_conn();
if (empty($_SESSION['itu_uid']) && !isset($do_not_verify_username)) {
    header("location: index.php");
    exit;
}
