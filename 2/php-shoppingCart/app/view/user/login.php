<?php
$paths = include dirname(dirname(dirname(__FILE__))) . "/paths.php";

include $paths['init'];

include $paths['header'];

$userCtrl = new UserController();

$userCtrl->redirectIfloggedIn();

Presentation::showPageName('Login');

if(isset($data['errors'])){

	Presentation::showRequestResult($data, 'logged');
}

?>

<!-- Form -->

<div class="form-container">
	<form method="POST" action="<?php echo $publicBaseURL . '/user/startSession';?>">

		<?php require_once('_partials/registerLoginFormFields.php');?>
		
	</form>
</div>

<div>
	Admin
	<ul>
		<li>admin@gmail.com - password: 12</li>
	</ul>
	Clients:
	<ul>
		<li>client1@gmail.com - password: 12</li>
		<li>client2@gmail.com - password: 12</li>
	</ul>
</div>

<?php

include $paths['footer'];