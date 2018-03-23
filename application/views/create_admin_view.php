<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4 custom-box">
		<div class="enter-data">
			<form action="<?php echo site_url('admin/admin_created');?>"
				method="post" role="form">

				<div class="form-group">
					<label for="admin_name">Username</label> <input class="form-control col-md-4"
						type="text" name="admin_name" placeholder="Username of Admin" />
				</div>
				<div class="form-group">
					<label for="admin_pass">Password</label> <input class="form-control col-md-4"
						type="password" name="admin_pass" placeholder="Password of Admin" />
				</div>
				<div class="form-group">
					<label for="admin_pass">Password</label> <input class="form-control col-md-4"
						type="password" name="admin_pass_conf" placeholder="Password of Admin Again" />
				</div>
				<hr>

				<input type="submit" class="btn btn-primary pull-right"
					name="submit" value="Create Admin">
			</form>
		</div>
	</div>
	<div class="col-md-4"></div>
</div>