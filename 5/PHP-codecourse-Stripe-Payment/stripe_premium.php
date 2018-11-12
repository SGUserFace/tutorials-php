<?php
require_once './core/init.php';

if ($user->premium) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Stripe Premium</title>
    </head>
    <body>
        <form action="stripe_premium_charge.php" method="POST">
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="<?php echo $stripe['publishable'] ?>"
                data-image="/img/documentation/checkout/marketplace.png"
                data-name="Demo Site"
                data-description="Premium membership"
                data-amount="800"
                data-locale="auto"
                data-email="<?php echo $user->email ?>"
                >

            </script>
        </form>
    </body>
</html>

