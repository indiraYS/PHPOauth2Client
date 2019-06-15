<?
require_once "init.php";
/**
 * Created by IntelliJ IDEA.
 * User: indy
 * Date: 16.06.19
 * Time: 2:12
 */
if (isset($_SESSION['user'])) {
    header("location: callback.php");
}
?>
<!DOCTYPE html>
<html lang="en">

 <head>
     <meta charset="utf-8">
     <title>test oauth2 spring</title>
 </head>
<body>
<h1>Sing in</h1>
<a href="login.php">click</a>
</body>
</html>
