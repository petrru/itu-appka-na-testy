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
<body class="main_screen">
    <div class="content">
        <div class="content_header">
        <div id='main_logo'>        
        </div>
            <h1>Nový test</h1>
        </div>
        <div class="content_content">
        <table class="test_edit">
        <tr class="question_number">
        <td>Název testu</td>
        </tr>
        <tr class="test_input_wrapper">
        <td><input class='test_input' type="text" name="nick"/></td>
        </tr>
        <!-- Každá otázka musí vygenerovat toto celé -->
        <tr class="question_number">
        <td>Otázka 1</td>
        </tr>
        <tr class="test_input_wrapper">
        <td>
            <table class="test_options">
                <tr>
                    <td colspan="3"> <input class='test_input' type="text" name="nick"/> </td>
                </tr>
                <tr style="height: 10%;">
                    <td class="add_option_column" rowspan="3">
                    <ul class="option_list">
                    <li><input type="checkbox" name="vehicle" value="Bike"> I have a bike</li>
                    <li><input type="checkbox" name="vehicle" value="Bike"> Přidat odpověd</li>
                    </ul>
                    </td>
                    <td class="test_options_desc">Formát odpovědi:</td>
                    <td class="test_options_desc">
                        <select class="select_answer_format">
                          <option value="auto">Auto (jedna správná)</option>
                          <option value="full_text">Full text</option>
                          <option value="multiple">Více správných</option>
                        </select>
                    </td>
                </tr>
               <tr> 
                    <td class="test_options_desc"></td>                
                    <td class="test_options_desc">
                        <select class="select_answer_format">
                          <option value="auto">Další možnosti</option>
                        </select>
                    </td>
               </tr>
            </table>
            </tr>
            <!-- Konec otázky -->
        <tr class="question_number">
        <td>Otázka 2</td>
        </tr>
        <tr class="test_input_wrapper">
        <td>
            <table class="test_options">
                <tr>
                    <td colspan="3"> <input class='test_input' type="text" name="nick"/> </td>
                </tr>
                <tr style="height: 10%;">
                    <td class="add_option_column" rowspan="3">
                    <ul class="option_list">
                    <li><input type="checkbox" name="vehicle" value="Bike"> I have a bike</li>
                    <li><input type="checkbox" name="vehicle" value="Bike"> Přidat odpověd</li>
                    </ul>
                    </td>
                    <td class="test_options_desc">Formát odpovědi:</td>
                    <td class="test_options_desc">
                        <select class="select_answer_format">
                          <option value="auto">Auto (jedna správná)</option>
                          <option value="full_text">Full text</option>
                          <option value="multiple">Více správných</option>
                        </select>
                    </td>
                </tr>
               <tr> 
                    <td class="test_options_desc"></td>                
                    <td class="test_options_desc">
                        <select class="select_answer_format">
                          <option value="auto">Další možnosti</option>
                        </select>
                    </td>
               </tr>
            </table>
            </tr>
        </td>
        </tr>
        <tr>
        <td><input id='login_button' type="submit" name="submit" value="Uložit" tabindex="3"/></td>
        </tr>
        </table>

        </div>
    </div>
</body>
</html>
