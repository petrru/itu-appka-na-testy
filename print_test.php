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
<?php
$t = new Test();
$q = $t->prepare("select * from tests WHERE user_id = ? and test_id = ?");
$q->execute([$_SESSION['itu_uid'], $_GET['id']]);
$q->fetch();
$q_cnt = substr_count($t->data, '"options"');
?>
    <div class="content">
        <div class="content_header">
            <a href="main.php"><div id='main_logo'></div></a>
            <h1>Vytisknout test</h1>
        </div>
        <div class="content_content test_edit">
        <form action="print_test_2.php?id=<?php echo $_GET['id']; ?>"
              method="post">
              <table class="print_table">
                <tr>
                  <td>Otázek pro jednu skupinu:</td>
                  <td><input type="text" name="qs"
                                             value="<?php echo $q_cnt; ?>"
                                             max="<?php echo $q_cnt; ?>"></td>
                </tr>
                <tr>
                  <td>Skupin:</td>
                  <td><input type="text" name="groups" value="1"></td>
                </tr>
                <tr>
                  <td><input type="submit" name="Go for it!"></td>
                </tr>
              </table>
        </form>
        </div>
    </div>
</body>
</html>


