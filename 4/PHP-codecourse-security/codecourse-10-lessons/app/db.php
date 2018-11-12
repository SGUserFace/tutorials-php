<?php

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'secret';
$DB_NAME = 'camshow_db';

//7-inicio
session_start();
$_SESSION['id'] = 1;
//7-fim

try {
    $db = new PDO('mysql:host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
    echo 'connected';
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

//7-inicio
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<br>REQUEST_METHOD is post';
    if (!isset($_POST['_token'])) {
        die('<br>csrf-> $_post is not set');
    } else if ($_POST['_token'] !== $_SESSION['_token']) {
        die('<br>csrf-> tokens dont match');
    } else {
        echo '<br>valid token';
    }
} else {
    echo '<br>REQUEST_METHOD is not post';
}

$_SESSION['_token'] = bin2hex(openssl_random_pseudo_bytes(16));


echo('<br>token: ' . $_SESSION['_token']);

//7-fim
