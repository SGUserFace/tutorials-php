<?php

require './libraries/vendor/autoload.php';
require './core/functions/payments.php';

$errors = array();

//should be on config
define('SITE_URL','http://localhost/_projetos/Payment_projects/codecourse-paypal-struct');



$clientId = '';// see paypal sandbox account
$clientSecret = '';// see paypal sandbox account

$paypal = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential($clientId, $clientSecret)
);
