<?php
require_once "init.php";
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <title>Tisk testu</title>
</head>
<body class="main_screen">
<div class="content">
    <h1>Vytiskout test</h1>
    <form action="print_test_2.php?id<?php echo $_GET['id']; ?>"
          method="post">

    </form>
</div>
</body>
</html>
