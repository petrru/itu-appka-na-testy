<?php
spl_autoload_register(function ($class_name) {
    include_once $class_name . '.php';
});
DB::init_conn();
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
    <title>Document</title>
</head>
<body>
<h1>Aplikace na generování testů</h1>
<a href="/itu/new" class="btn"><i class="material-icons">add</i> Nový test</a>
<br>
<?php
$test = new Test;
$q = $test->prepare("select test_id, name from tests where user_id = ?");
$q->bindValue(1, 1);
$q->execute();
while ($q->fetch()) {
    echo "* " . $test->name . "<br>";
}
//echo $_GET['p'];
?>
</body>
</html>
