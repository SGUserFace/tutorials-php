<?php
/*
$paths = include dirname(dirname(dirname(__FILE__))) . "/paths.php";

include $paths['init'];

if(isset($data['products'])){
	var_dump($data['products']);
}
*/
?>

<?php

$productCtrl = new ProductController();

$products = $productCtrl->all();

?>

<div class="table-container">
	<table class="table">

		<tr>
			<th>
				Name
			</th>
			<th>
				Price
			</th>
			<th>

			</th>
		</tr>

		<?php
		foreach ($products as $key => $value) {
			
			?>

			<tr>
				<td>
					<?php echo $value['name'];?>
				</td>

				<td>
					<?php echo $value['price'];?>
				</td>
				<td>
					<a href="<?php echo $publicBaseURL . '/shoppingCartLine/store/productId/' . $value['id'];?>">
						Add to cart
					</a>
				</td>
			</tr>

			<?php
		}

		?>

	</table>
</div>
