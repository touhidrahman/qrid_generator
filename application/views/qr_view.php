<?php /* This Page generates the qr code */ 
$this->load->view('templates/header');
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar');
?>

<div>
<img src="<?php echo base_url('qr_images/'.$svc_no_type.'_'.$svc_no. '_qr.png') ; ?>">
<br><a class="btn btn-default" href="<?php echo site_url('draw_card/go/'.$svc_no_type.'/'.$svc_no); ?>">Identity Card</a>
<a class="btn btn-default" href="<?php echo site_url('draw_card/spl/'.$svc_no_type.'/'.$svc_no); ?>">AirHQ Special Identity Card</a>
<a class="btn btn-default" href="<?php echo site_url('draw_card/mdl/'.$svc_no_type.'/'.$svc_no); ?>">Military Driving License</a>
<a class="btn btn-default" href="<?php echo site_url('home'); ?>">Cancel</a>

</div>

<?php $this->load->view('templates/footer'); ?>

