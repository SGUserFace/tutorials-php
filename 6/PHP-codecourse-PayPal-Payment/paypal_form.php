<div class="paypal-container">
    <h2 class="paypal-container-header">pay for something </h2>
    <form action="paypal_checkout.php" method="post">
        <label for="item">
            Product
        </label>
        <input type="text" name="product">
        <br>
        <label for="number_items">
            Quantity
        </label>
        <input type="text" name="quantity">
        <br>
        <label for="amount">
            Price
        </label>
        <input type="text" name="price">
        <br>
        <input type="submit" name="Pay">
    </form>
    <p> you'll be redirected to paypal to complete your payment. </p>
</div>