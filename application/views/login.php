<?php 
    if($this->session->userdata('is_logged_in')){
       echo "You are logged In already";
          }
	   else{
	       
    ?>



	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="login-form"><!--login form-->
						<h3></h3>
						<h2>Login to your account</h2>
						<form name="login" action="<?php echo base_url();?>main/login_process" method='post'>

							<?php echo form_error('emailAddress'); ?>
							<input type="text" name="emailAddress" value="<?php echo set_value('emailAddress'); ?>" placeholder="Email Address" />

							<?php echo form_error('password'); ?>
							<input type="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/slider-->
	<?php 
	 
	   }
	?>
	











