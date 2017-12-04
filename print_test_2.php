<?php
require_once "init.php";
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="print.css">
    <title>​</title>
</head>
<body>
<?php
$t = new Test();
$q = $t->prepare("select * from tests WHERE user_id = ? and test_id = ?");
$q->execute([$_SESSION['itu_uid'], $_GET['id']]);
$q->fetch();
$d = json_decode($t->data)->questions;
/*echo "<pre>";
var_dump($d);
echo "</pre>";*/

if ($_POST['groups'] > 20)
    $_POST['groups'] = 20;

$qs = [];

for ($i = 1; $i <= $_POST['groups']; $i++) {
    echo '<div class="test">';
    echo "<h1>{$t->name} - Skupina " . chr(0x40 + $i) ."</h1>";
    echo "<table border='0'>";

    if (count($qs) < $_POST['qs'])
        $qs = $d;

    for ($qi = 1; $qi <= $_POST['qs']; $qi++) {
        $q_no = mt_rand(0, count($qs) - 1);
        $q = $qs[$q_no];
        array_splice($qs, $q_no, 1);
        echo "<tr><td><div class='q-no'>$qi</div></td>";
        echo "<td><div class='q'><b>{$q->text}</b>";
        $opt_i = 0;
        foreach ($q->options as $option) {
            $ch = chr(0x40 + ++$opt_i);
            echo "<br>($ch) {$option->text}";
        }

        echo "</div><br></td></tr>";
    }
    echo "</table>";

    echo "</div>";
}

?>
</body>
</html>
