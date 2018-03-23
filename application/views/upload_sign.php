<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/navbar'); ?>
<?php $this->load->view('templates/sidebar'); ?>

<?php
/* This Page is for photo upload */

if (isset($html)) {
    echo $html;
}
?>

<div>
	<h2>Upload Sign</h2>

	<form action="<?php echo site_url('upload/sign');?>" method="post"
		enctype="multipart/form-data" role="form">



		<div class="form-group">
			<div class="row">
				<div class="col-md-4">
					<label>Service No Type</label> <input type="text"
						class="form-control" name="svc_no_type" placeholder="BD/MS/T"
						<?php
    if (isset($svc_no_type)) {
        echo " value='" . $svc_no_type . "'";
    } else {
        echo "";
    }
    ?>>
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-md-4">
					<label>Service No</label> <input type="text" class="form-control"
						name="svc_no" placeholder="Service No"
						<?php
    if (isset($svc_no)) {
        echo " value='" . $svc_no . "'";
    } else {
        echo "";
    }
    ?>>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label>Photo</label> <input type="file" name="sign"> <span
				class="help-block">Maximum 300 x 120 pixel</span>
		</div>
		<input type="submit" class="btn btn-primary" name="submit"
			value="Complete Saving">

	</form>
</div>
</div>
<?php $this->load->view('templates/footer'); ?>