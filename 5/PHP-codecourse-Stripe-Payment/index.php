<?php
require_once 'core/init.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Payment with stripe</title>
    </head>
    <body>
        <?php
        if ($user->premium) {
            echo '<p>you are premium.</p>';
        } else {
            echo '<p>you are not premium.</p>';
            echo '<a href="stripe_premium.php">Go premium.</a></p>';
        }
        ?>
    </body>
</html>

