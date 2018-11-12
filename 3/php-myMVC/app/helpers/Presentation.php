<?php

class Presentation{
	
	public static function showRequestResult($data = '', $mode=''){

		$errors = $data['errors'];

		if(empty($errors)){

			$message="Successfully $mode user.";

			$class="alert-success";

		}else{

			$message=implode('; ', $errors);

			$class="alert-danger";	

		}

		?>

		<div class="<?php echo $class; ?>">

				<?php echo $message; ?>

		</div>	
		
		<?php
	}

	public static function showPageName($name){

		?>

		<div class="page-name-container">
		
			<p class="page-name">

				<?php echo $name; ?>

			</p>

		</div>

		<?php
	}

}