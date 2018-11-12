<?php

$paths = include dirname(dirname(dirname(__FILE__))) . "/paths.php";

include $paths['init'];

include $paths['header'];

Presentation::showPageName('My Orders');

$orders = $data['ordersGrouped'];

foreach($orders as $orderId => $orderLines){

	?>

	<div class="table-title">
		<p>
			Order Id: <?php echo $orderId; ?>	
		</p>			
	</div>

	<div class="table-container">

		<table class="table">
			<tr>
				<th>Product Id</th>
				<th>Product Name</th>
				<th>Quantity</th>
			</tr>

		<?php

		foreach($orderLines as $orderLine){

			?>
			
				<tr>
					<td><?php echo $orderLine['product_id']; ?></td>
					<td><?php echo $orderLine['product_name']; ?></td>
					<td><?php echo $orderLine['quantity']; ?></td>
				</tr>
			

			<?php
		}

		?>

		</table>

	</div>

	<?php
}

include $paths['footer'];