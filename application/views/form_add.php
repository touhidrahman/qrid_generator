<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/navbar'); ?>
<?php $this->load->view('templates/sidebar'); ?>

<?php /* This Page is the form for adding new entry excluding photo upload */ ;?>

<?php

if (isset($html)) {
    echo $html;
}
?>

<div>
	<h2>Add Personnel Details</h2>

	<form action="<?php echo site_url('add/save');?>" method="post"
		role="form">
		<div class="form-group">
			<div class="row">
				<div class="col-md-4">
					<label>Rank</label> <input type="text" class="form-control"
						name="rank" placeholder="Rank in Full Form">
				</div>
				<div class="col-md-8">
					<label>Name</label> <input type="text" class="form-control"
						name="name" placeholder="Enter Full Name">
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-md-2">
					<label>Service No Type</label> <input type="text"
						class="form-control" name="svc_no_type" placeholder="BD/MS/T">
				</div>
				<div class="col-md-2">
					<label>Service No</label> <input type="text" class="form-control"
						name="svc_no" placeholder="Service No">
				</div>
				<div class="col-md-3">
					<label>Branch/Trade</label> <input type="text" class="form-control"
						name="branch_trade" placeholder="Branch or Trade">
				</div>
				<div class="col-md-3">
					<label>Class</label> <input type="text" class="form-control"
						name="class" placeholder="1=Offr, 2=Airman, 3-6=Civ I-IV">

				</div>
				<div class="col-md-2">
					<label>Blood Group</label> <input type="text" class="form-control"
						name="blood" placeholder="Enter Blood Group eg: O+ve">
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-md-4">
					<label>Date of Birth</label>
					<div class="row">
						<div class="col-md-4">
							<input type="text" class="form-control" name="b_dd"
								placeholder="DD">
						</div>
						<div class="col-md-4">
							<input type="text" class="form-control" name="b_mm"
								placeholder="MM">
						</div>
						<div class="col-md-4">
							<input type="text" class="form-control" name="b_yy"
								placeholder="YYYY">
						</div>
					</div>
				</div>
				<div class="col-md-2">
				     <label>Eye Colour</label> <input type="text" class="form-control"
						name="eye" placeholder="Black, Grey, Blue">
				</div>
				<div class="col-md-2">
				     <label>Height (Inch)</label> <input type="text" class="form-control"
						name="height" placeholder="70">
				</div>
				<div class="col-md-4">
				     <label>Identity Mark (If Any)</label>
				     <input type="text" class="form-control"
						name="ident_mark" placeholder="Scar at forehead">
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<div class="row">
				<div class="col-md-6">
					<label>Present Address</label> <input type="text" class="form-control"
						name="address" placeholder="Service accommodation or current address">
				</div>
				<div class="col-md-6">
					<label>Permanent Address</label> <input type="text" class="form-control"
						name="address_perm" placeholder="Permanent address">
				</div>
			</div>
		</div>
		
		<!-- <div class="form-group">
			<div class="row">
				<div class="col-md-8">
					<label>Card No</label> <input type="text"
						class="form-control col-md-4" name="card_no"
						placeholder="Enter Existing or New Card No">
				</div>
			</div>
		</div> -->
		<div class="form-group">
			<div class="row">
				<div class="col-md-4">
					<label>Contact No</label>
					<input type="text" class="form-control" name="contact" placeholder="Person's contact number">
				</div>
				<div class="col-md-8">
					<label>Details of Spouse</label>
					<input type="text" class="form-control" name="spouse" placeholder="Full name, profession, address and contact number of spouse">
				</div>
			</div>
		</div>
		
		
		
		
		<!-- 				<div class="form-group"> -->
		<!-- 					<label>Photo</label> <input type="file" name="pic"> -->
		<!-- 					<p class="help-block">Photo size must be 390 x 450 pixel</p> -->
		<!-- 				</div> -->

		<input type="submit" class="btn btn-primary" name="submit"
			value="Save & Upload Photo">

	</form>
</div>
<?php $this->load->view('templates/footer'); ?>