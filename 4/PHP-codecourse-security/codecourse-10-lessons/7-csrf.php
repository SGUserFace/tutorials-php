<?php
require './app/db.php';
?>

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <form action="./7-CSRF/delete.php" method="post">
            <input type="submit" value="delete my account">
            <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
        </form>
    </body>
</html>


