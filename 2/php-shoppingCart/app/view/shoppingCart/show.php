<?php

$paths = include dirname(dirname(dirname(__FILE__))) . "/paths.php";

include $paths['init'];

include $paths['header'];

Presentation::showPageName('Shopping Cart Content');

$lines 		= $data['lines'];

$products 	= $data['products'];

$shoppingCartId = $data['id'];

?>

<div class="table-container">

	<table class=table>
		<tr>
			<th>
				Product Id	
			</th>
			<th>
				Name	
			</th>
			<th>
				Qty	
			</th>
			<th>
				Price	
			</th>
			<th>
				Total
			</th>
			<th>
				Options
			</th>
		</tr>

	<?php
	foreach($lines as $key => $value){

		$linePrice = $products[$value['product_id']][0]['price'];
		$productId = $value['product_id'];
	?>
		<tr>
			<td>
				<?php echo $value['product_id']; ?>	
			</td>
			<td>
				<?php echo $products[$value['product_id']][0]['name'];?>
			</td>
			<td>
				<?php echo $value['quantity']; ?>						
			</td>
			<td>
				<?php echo $linePrice;?>
			</td>
			<td>
				<?php echo $linePrice * $value['quantity']; ?>
			</td>
			<td>
				<a href="<?php echo $publicBaseURL . "/shoppingCart/removeProduct/shoppingCartId=$shoppingCartId/productId=$productId";?>">
					Remove
				</a>				
			</td>
		</tr>		
	<?php
	}

	?>

		<tr>
			<td colspan="6">
				Total: <?php echo $data['total']; ?>
			</td>
		</tr>

	</table>

</div>

<div class="options-container">

	<div class="option option-blue">
		<a href="<?php echo $paths['index'];?>">
			Continue Shopping
		</a>
	</div>

	<div class="option option-green">
		<a href="<?php echo $publicBaseURL . '/order/confirm';?>">
			Checkout & Pay
		</a>	
	</div>

	<div class="option option-red">
		<a href="<?php echo $publicBaseURL . "/shoppingCart/clear";?>">
			Clear Cart
		</a>
	</div>
</div>

<?php

include $paths['footer'];