<?php

$paths = include dirname(dirname(dirname(__FILE__))) . "/paths.php";

include $paths['init'];

include $paths['header'];

Presentation::showPageName('Home');

if(isset($_SESSION['user_id'])){
	
}

include $paths['products'];

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

$serviceUrl = 'http://localhost:51325/api/values';

$restClient = new RestClientCurl($serviceUrl);

// ---------------------------------------------
// Get all -------------------------------------
// ---------------------------------------------

$response = $restClient->get();

$responseJSON = json_decode($response);

echo 'All: ';

var_dump($responseJSON->products);

echo '<br><br>';

// ---------------------------------------------
// Get by id product id ------------------------
// ---------------------------------------------

/*

$params = [
	'id' => 0
];

$response2 = $restClient->get($params);

echo 'All: ';

var_dump($response2);

echo '<br><br>';

*/

include $paths['footer'];
