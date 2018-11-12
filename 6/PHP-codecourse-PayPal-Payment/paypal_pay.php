<?php

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

require './core/init.php';

if (!isset($_GET['success'], $_GET['paymentId'], $_GET['PayerID'])) {
    $error = error_message_paypal('parameters in the url');
    exit($error);
}

if ((bool) $_GET['success'] === false) {
    $error = error_message_paypal('paramenter \'success\' in the url');
    exit($error);
}

$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];

$payment = Payment::get($paymentId, $paypal);

$execute = new PaymentExecution();
$execute->setPayerId($payerId);


try {
    $result = $payment->execute($execute, $paypal);
} catch (Exception $exc) {
    //$error_data = json_decode($exc->getData());
    //var_dump($error_data);
    //exit($exc->getMessage());
    $error = error_message_paypal('execution of the transaction');
    exit($error);
}

echo 'Payment Made'; //--------> Redirect
