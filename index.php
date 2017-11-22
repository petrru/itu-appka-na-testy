<!DOCTYPE html>
<html lang="cs">
  <head>
  <meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
  <title>Login</title>
  </head>
  <body class='login_screen'>
  <div class='login_wrapper'>
    <div id='login_window'>
      <form action="login.php" method="post">     
        <div id='login_logo'>        
        </div>
          <table id='login_rows'>
            <tr>
              <td><input class='login_lines' type="text" name="nick" placeholder="Login"  tabindex="1" /></td>
            </tr>
            <tr>
              <td><input  class='login_lines' type="password" name="heslo" placeholder="Password"  tabindex="2" /></td>
            </tr>
            <tr>
              <td colspan="2" >
              <div id='login_button_wrapper'>
              <input id='login_button' type="submit" name="submit" value="Log In" tabindex="3"/>
              </div>
              </td>
            </tr>
          </table>
        </form>
    </div>
  </div>
  </body>
</html>
