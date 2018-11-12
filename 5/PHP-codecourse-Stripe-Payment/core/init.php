<?php

session_start();

// Composer's autoloader

require_once './library/vendor/autoload.php';
require './core/functions/payments.php';


$SESSION['user_id'] = 1;

$stripe = [
    'publishable' => '',// see stripe account
    'private' => ''// see stripe account
];

// Use stripe package to set api key

Stripe::setApiKey($stripe['private']);


// Local
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'secret';
$DB_NAME = 'camshow_db';

$db = new PDO('mysql:host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);

$userQuery = $db->prepare("
        SELECT user_id,username,email,premium
        FROM users
        WHERE user_id= :user_id
        ");

$userQuery->execute(['user_id' => $SESSION['user_id']]);

$user = $userQuery->fetchObject();

