<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
?>
<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container" style="margin-top: 12em">
        <div class="jumbotron">
        <h1 class="text-center">QR ID MANAGEMENT SYSTEM</h1>
        <h3 class="text-center">Bangladesh Air Force</h3>
        <p class="text-center"><a href="<?php echo site_url('add'); ?>" class="btn btn-primary btn-lg">Get Started &raquo;</a></p>
      </div>
    </div>
<?php 
$this->load->view('templates/footer');
?>