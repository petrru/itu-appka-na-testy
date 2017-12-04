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
    <title>Seznam testů</title>
</head>
<body class="main_screen">
    <div class="content">
        <h1>Aplikace na generování testů</h1>
        <a href="create_test.php" class="btn"><i class="material-icons">add</i> Nový test</a>
        <!--<div class="test_wrapper">
            <table class="test_lines">
                <tr class="first_row">
                <td class= "test_name">1. světová válka</td>
                <td class= "test_buttons" rowspan="2">
                <a href="/itu/new" class="btn"><div>Edit<i class="material-icons">keyboard_arrow_right</i></div></a>
                <div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn">More</button>
                  <div id="myDropdown" class="dropdown-content">
                    <a href="#">Smazat test</a>
                    <a href="#">Vytisknout test</a>
                    <a href="#">Sdílet test</a>
                  </div>
                </div>
                </td>
                </tr>
                <tr class="second_row">
                    <td class="test_info">160 otázek, 8 skupin</td>
                </tr>
            </table>
        </div>-->
            <?php
            $test = new Test;
            $q = $test->prepare("select test_id, name, data from tests where user_id = ?");
            $q->bindValue(1, 1);
            $q->execute();
            $i = 0;
            while ($q->fetch()) {
                $q_cnt = substr_count($test->data, '"options"');
                echo "<div class=\"test_wrapper\">
                      <table class=\"test_lines\">
                      <tr class=\"first_row\">
                      <td class= \"test_name\">" . $test->name . "</td>
                      <td class= \"test_buttons\" rowspan=\"2\">
                <a href=\"/itu/create_test.php?id={$test->test_id}\" class=\"btn\"><div>Edit<i class=\"material-icons\">keyboard_arrow_right</i></div></a>
                    <div class=\"dropdown\">
                  <button id =\"" . $i . "\"onclick=\"myFunction(this.id)\" class=\"dropbtn\">More</button>
                  <div id=\"myDropdown" . $i++ ."\" class=\"dropdown-content\">
                    <a href=\"delete_test.php?id={$test->test_id}\">Smazat test</a>
                    <a href=\"print_test.php?id={$test->test_id}\">Vytisknout test</a>
                    <a href=\"#\">Sdílet test</a>
                  </div>
                </div>
                     </td>
                    </tr>
                     <tr class=\"second_row\">
                    <td class=\"test_info\">$q_cnt otázek</td>
                    </tr>
                    </table>
                     </div>";
            }
            //echo $_GET['p'];
            ?>
    </div>


    <script>
    //Inspired by: https://www.w3schools.com/howto/howto_js_dropdown.asp
    function myFunction(id) {
    var items = document.getElementsByClassName("dropdown-content");
    items[id].classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}</script>
</body>
</html>
