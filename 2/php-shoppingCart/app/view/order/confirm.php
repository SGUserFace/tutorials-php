<?php

$paths = include dirname(dirname(dirname(__FILE__))) . "/paths.php";

include $paths['init'];

include $paths['header'];

Presentation::showPageName('Confirm Order and Payment');

?>

<div class="label-centered">Do you confirm the order and payment?</div>

<div class="option option-green">
	<a href="<?php echo $publicBaseURL . '/order/store';?>">
		Yes
	</a>
</div>

<div class="option option-red">
	<a href="<?php echo $paths['index'];?>">
		No
	</a>
</div>

<?php

include $paths['footer'];