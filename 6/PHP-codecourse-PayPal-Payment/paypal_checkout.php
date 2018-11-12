<?php

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

require './core/init.php';
/*
 * ***********************************************************
 * check errors
 * ***********************************************************
 */

if (empty($_POST) === false) {
    $required_fields = array('product', 'quantity', 'price');
    foreach ($_POST as $key => $value) {
        if (empty($value) && in_array($key, $required_fields) === true) {
            $errors[] = 'Fields marked with an asterisk are required.';
            break 1;
        }
    }

    $product = $_POST['product'];
    $price = (float) $_POST['price'];
    $quantity = (int) $_POST['quantity'];

    if (empty($errors) === true) {
        if (is_int($quantity) === false || $quantity < 0) {
            $errors[] += 'The quantity must be a number bigger than zero.';
        }
        if (is_float($price) === false || $price < 0) {
            $errors[] += 'The price must be a number bigger than zero.';
        }
    }
}

/*
 * ***********************************************************
 * if no errors, get approval link
 * ***********************************************************
 */


if (empty($_POST) === false && empty($errors) === true) {
    $shipping = 2.00;
    $total = ($price * $quantity) + $shipping;

    $description = 'pay for something';
    $currency = 'GBP';
    /*
     * ***************************************
     * Payer
     * ***************************************
     */
    $payer = new Payer();
    $payer->setPaymentMethod('paypal');

    /*
     * ***************************************
     * Items
     * ***************************************
     */
    $item = new Item();
    $item->setName($product);
    $item->setCurrency($currency);
    $item->setQuantity($quantity);
    $item->setPrice($price);

    /*
     * ***************************************
     * Items List
     * ***************************************
     */
    $itemList = new ItemList();
    $itemList->setItems([$item]);

    /*
     * ***************************************
     * Details
     * ***************************************
     */
    $details = new Details();
    $details->setShipping($shipping);
    $details->setSubtotal(($price * $quantity));

    /*
     * ***************************************
     * Amount
     * ***************************************
     */
    $amount = new Amount();
    $amount->setCurrency($currency);
    $amount->setTotal($total);
    $amount->setDetails($details);

    /*
     * ***************************************
     * Transaction
     * ***************************************
     */
    $transaction = new Transaction();
    $transaction->setAmount($amount);
    $transaction->setItemList($itemList);
    $transaction->setDescription($description);
    $transaction->setInvoiceNumber(uniqid());

    /*
     * ***************************************
     * RedirectUrls
     * ***************************************
     */
    $redirectPath = '/paypal_pay.php';
    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl(SITE_URL . $redirectPath . '?success=true');
    $redirectUrls->setCancelUrl(SITE_URL . $redirectPath . '?success=false');

    /*
     * ***************************************
     * Payment
     * ***************************************
     */

    $payment = new Payment();
    $payment->setIntent('sale');
    $payment->setPayer($payer);
    $payment->setRedirectUrls($redirectUrls);
    $payment->setTransactions([$transaction]);

    try {
        $payment->create($paypal);
    } catch (Exception $exc) {
        //exit($exc->getMessage());
        $error = error_message_paypal('creation of the payment');
        exit($error);
    }

    $approvalUrl = $payment->getApprovalLink();

    header("Location: {$approvalUrl}");
    
} else if (empty($errors) === false) {
    print_r($errors);
    $errors = '';
}

include_once './paypal_form.php';


