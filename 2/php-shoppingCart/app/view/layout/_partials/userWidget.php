<div class="navbar-user-nav">
	<div class="navbar-user-nav-options">
		<?php
		if(isset($_SESSION['user_id']) == false){
			?>	
							
			<div class="navbar-user-nav-item">
				<a href="<?php echo $publicBaseURL . '/user/register';?>">
					Register
				</a>
			</div>
			
			<div class="navbar-user-nav-item">
				<a href="<?php echo $publicBaseURL . '/user/login';?>">
					Login
				</a>
			</div>
	
			<?php

		}else{
			?>	

			<div class="navbar-user-nav-item">
				<a href="<?php echo $publicBaseURL . '/user/logout';?>">
				 	Log Out
				</a>
			</div>

			<div class="navbar-user-nav-item">
				<?php echo $_SESSION['user_email']; ?>
			</div>
			
			<?php
		}
		?>
	</div>	
</div>		