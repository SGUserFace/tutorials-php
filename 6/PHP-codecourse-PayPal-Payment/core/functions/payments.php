<?php

function error_message_paypal($body) {
    $error_message_start = 'Paypal payment: Something went wrong with the payment. Description: ';
    $error_message_end = '. The transaction was not completed!';
    return $error_message_start . $body . $error_message_end;
}
