<?php $this->load->view('templates/header'); ?>
<?php

if (! is_null($msg)) {
    echo $msg;
}
?>
<div style="width: 500px; margin: 0 auto; margin-top: 10em; border:1px dotted #999; border-radius:5px; padding: 5px 15px 15px 15px;">
	<div>
		<h3 class="text-center" style="color: #27acdd">QR ID MANGEMENT SYSTEM : BAF</h3>
		<hr>
		<h4 class="text-center">Login</h4>
	</div>
	<form action="<?php echo site_url('login/process');?>" method="post" role="form">

		<div class="form-group">
			<div class="row">
				<div class="col-md-12">
					<label>Username</label>
					<input type="text" class="form-control input-lg" name="username">
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-md-12">
					<label>Password</label>
					<input type="password" class="form-control input-lg" name="password">
				</div>
			</div>
		</div>

		<hr>

		<input type="submit" class="btn btn-primary" name="submit" value="Login">&nbsp;&nbsp;&nbsp;
		<a href="<?php echo site_url('admin'); ?>">Forgot Password?</a>
	</form>
</div>

<?php $this->load->view('templates/footer'); ?>