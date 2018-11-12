<?php

$paths = include dirname(dirname(dirname(__FILE__))) . "/paths.php";

include $paths['init'];

include $paths['header'];

$userCtrl = new UserController();

$userCtrl->redirectIfloggedIn();

Presentation::showPageName('Register');

if(isset($data['errors'])){

	Presentation::showRequestResult($data, 'registered');

}

?>

<!-- Form -->

<div class="form-container">
	<form method="POST" action="<?php echo $publicBaseURL . '/user/store';?>">

		<?php require_once('_partials/registerLoginFormFields.php');?>

	</form>
</div>

<?php

include $paths['footer'];