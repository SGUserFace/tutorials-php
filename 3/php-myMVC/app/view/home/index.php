<?php

$paths = include dirname(dirname(dirname(__FILE__))) . "/paths.php";

include $paths['init'];

include $paths['header'];

Presentation::showPageName('Home');

?>
<div>
	<ul>
		<li>
			<a href="<?php echo $publicBaseURL . '/test/sqli';?>">
				Test: sqli
			</a>
		</li>
		<li>
			<a href="<?php echo $publicBaseURL . '/test/interfaces';?>">
				Test: interfaces
			</a>
		</li>
	</ul>	
</div>

<?php

include $paths['footer'];
