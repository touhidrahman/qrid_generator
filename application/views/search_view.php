<?php /* This Page generates the search result */ 
$this->load->view('templates/header');
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar');
?>

<!--  style="margin: 0 auto; border:1px dotted #999; border-radius:5px; padding: 5px 15px 15px 15px;" -->

<div>
	<h2>Advanced Search</h2>
	<form action="<?php echo site_url('search/result');?>" method="post" role="form">

		<div class="form-group">
			<div class="row">
				<div class="col-md-4">
					<input class="form-control" type="text" name="term"
						placeholder="Search by Service No or Name" />
				</div>
				<div class="col-md-4">
					<input type="submit" class="btn btn-default" name="submit"
						value="Search">
				</div>
			</div>
		</div>
	</form>
</div>

<?php
if (empty($results)) {
    echo "<br><div class='alert alert-danger text-center'>No Results!</div>";
} else {
    ?>

<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
	       <?php
    
    foreach ($results as $row) {
        $bd_at_uri = site_url(
                'qr_gen/generate/' . $row->svc_no_type . '/' . $row->svc_no);
        $bd_at_uri_delete = site_url(
                'delete/' . $row->svc_no_type . '/' . $row->svc_no);
        $pic_of_pers = base_url(
                'photos/' . $row->svc_no_type . '_' . $row->svc_no . "_img.jpg");
        $sign_of_pers = base_url(
                'signs/' . $row->svc_no_type . '_' . $row->svc_no . "_sign.jpg");
        $html = <<<STAR
<tr><td rowspan="6"><img class= "img-thumbnail" src="$pic_of_pers" width="40%" height="auto"></td>
<td>Rank:</td><td>$row->rank</td></tr>
<tr><td>Name:</td><td>$row->name</td></tr>
<tr><td>Service No:</td><td>$row->svc_no_type/$row->svc_no</td></tr>
<tr><td>Branch/Trade:</td><td>$row->branch_trade</td></tr>
<tr><td>Date of Birth:</td><td>$row->birthday</td></tr>
<tr><td>Blood Group:</td><td>$row->blood</td></tr>
<tr><td rowspan="3"><img class= "img-thumbnail" src="$sign_of_pers" width="100%" height="auto"><td>Card ID:</td><td>$active_cid</td></tr>
<tr><td>Date of Issue:</td><td>$row->issue_dt</td></tr>
<tr><td><a href="$bd_at_uri_delete" class="btn btn-danger pull-right">Delete</a></td>
<td><a href="$bd_at_uri" class="btn btn-warning">Generate QR Code</a></td></tr>;
STAR;
        echo $html;
    }
}

?>
	       </table>
	</div>
</div>

<?php $this->load->view('templates/footer'); ?>