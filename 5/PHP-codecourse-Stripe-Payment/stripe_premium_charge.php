<?php

require_once './core/init.php';

if ($user->premium) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['stripeToken'])) {
    $token = $_POST['stripeToken'];
    $token+='j';
    try {
        Stripe_Charge::create([
            "amount" => 800, // what is indeed charged. make sure it's equal as in premium.charge.php (data-amount)
            "currency" => "eur",
            "source" => $token, // obtained with Stripe.js
            "description" => $user->email
        ]);

        $db->query("
                UPDATE users 
                SET premium=1
                WHERE user_id={$user->user_id}
                ");
    } catch (\Stripe\Error\Card $e) {
        $body = $e->getJsonBody();
        $err = $body['error'];
        $err_msg = 'Status is:' . $e->getHttpStatus() . "\n";
        $err_msg+='Type is:' . $err['type'] . "\n";
        $err_msg+='Code is:' . $err['code'] . "\n";
        $err_msg+='Param is:' . $err['param'] . "\n";
        $err_msg+='Message is:' . $err['message'] . "\n";
        exit($err_msg);
    } catch (\Stripe\Error\RateLimit $e) {
        $err_msg = error_message_stripe('too many requests at the same time');
        exit($err_msg);
    } catch (\Stripe\Error\InvalidRequest $e) {
        $err_msg = error_message_stripe('invalid request');
        exit($err_msg);
    } catch (\Stripe\Error\Authentication $e) {
        $err_msg = error_message_stripe('invalid stripe credentials');
        exit($err_msg);
    } catch (\Stripe\Error\ApiConnection $e) {
        $err_msg = error_message_stripe('network communication with Stripe failed');
        exit($err_msg);
    } catch (\Stripe\Error\Base $e) {
        $err_msg = error_message_stripe('generic error');
        exit($err_msg);
    } catch (Exception $e) {
        $err_msg = error_message_stripe('error unrelated to stripe');
        exit($err_msg);
    }

    header('Location: index.php');
    exit();
}

