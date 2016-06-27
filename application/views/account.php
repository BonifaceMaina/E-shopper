
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				
				<h4 class="col-sm-offset-5">Create a new Account!</h4>
				<div class="col-sm-4 col-sm-offset-3 signup-form ">
								
				<form name ="userinput" action="<?php echo base_url(); ?>main/account_validation" method="post">
					<h5>First Name</h5>
					<?php echo form_error('firstname'); ?>
					<input type="text" name="firstname" value="<?php echo   set_value('firstname'); ?>" size="30">

					<h5>Last Name</h5>
					<?php echo form_error('lastname'); ?>
					<input type="text" name="lastname" value="<?php echo set_value('lastname'); ?>" size="30">

					<h5>Email (this will be your username)</h5>
					<?php echo form_error('emailAddress'); ?>
					<input type="text" name="emailAddress" value="<?php echo set_value('emailAddress'); ?>" size="30">

					<h5>Location</h5>
					<?php echo form_error('location'); ?>
					<input type="text" name="location" value="<?php echo set_value('location'); ?>" size="30">

					<h5>Your password</h5>
					<?php echo form_error('password'); ?>
					<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="30">

					<h5>Confirm Password</h5>
					<?php echo form_error('password_confirm'); ?>
					<input type="password" name="password_confirm" value="<?php echo set_value('password_confirm'); ?>" size="30">

					<button type="clear" class="btn btn-default">Clear</button>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
				</div>
			</div>
		</div>
	</section><!--/slider-->