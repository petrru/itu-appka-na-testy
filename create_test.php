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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        <?php
            if (empty($_GET['id'])) {
        ?>
        var data = {
            name: '',
            questions: []
        };
        var ID = 0;
        <?php
            }
            else {
                $t = new Test();
                $q = $t->prepare("select * from tests WHERE user_id = ? and test_id = ?");
                $q->execute([$_SESSION['itu_uid'], $_GET['id']]);
                $q->fetch();
                echo "var data = JSON.parse('{$t->data}');";
                echo "var ID = '{$_GET['id']}';";
            }
        ?>
    </script>

    <script type="text/javascript">
                    function delete_test(test_id){
                $.ajax({
                    type: "POST",
                    url: "delete_test.php",
                    data: {test_id: test_id},
                    success: function(html){
                        location.href = "main.php";
                    }
                });
            }
    </script>

    <script src="create_test.js"></script>
    <title>Nový test</title>
</head>
<body class="main_screen">
    <form class="save-all">
    <div class="content">
        <div class="content_header">
            <a href="main.php"><div id='main_logo'></div></a>
            <h1>Nový test</h1>
        </div>
        <div class="content_content test_edit">
            <div class="question_number question_-1">
                Název testu
                <br>
                <input class='test_input' id="test_name" />
            </div>
            <div class="question sample_question">
                <div class="question_number">
                    Otázka <span>1</span>
                </div>
                <table class="test_options">
                    <tr>
                        <td colspan="3"> <input class='test_input q_text' type="text" /> </td>
                    </tr>
                    <tr>
                        <td class="add_option_column">
                            <ul class="option_list answers">
                                <!--<li>
                                    <input type="checkbox">
                                    <input type="text" class="answer" placeholder="Přidat odpověď">
                                </li>-->
                                <li class="sample_answer">
                                    <input type="checkbox" class="correct" tabindex="-1">
                                    <input type="text" class="answer" placeholder="Přidat odpověď">
                                    <i class="material-icons remove-answer">clear</i>
                                </li>
                            </ul>
                        </td>
                        <td class="test_options_desc">Formát odpovědi:</td>
                        <td class="test_options_desc">
                            <select class="select_answer_format q_options" tabindex="-1">
                                <option value="auto" class="auto-type">Auto (jedna správná)</option>
                                <option value="full_text">Full text</option>
                                <option value="single">Jedna správná</option>
                                <option value="multiple">Více správných</option>
                            </select>
                            <select class="q_options" tabindex="-1">
                                <option value="">Další možnosti</option>
                                <option value="delete-q">Odstranit otázku</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <input class="control_buttons" type="submit" value="Uložit změny">
            <input class="control_buttons" type="button" value="Přidat otázku" id="add-q">
            <input class="control_buttons" type="button" value="Smazat test">

        

        </div>
    </div>
    </form>
</body>
</html>
