<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/navbar'); ?>

<?php
if (isset($error)) {
echo $error;
}


if ($data != "") {
echo $data;
}
?>


<?php $this->load->view('templates/footer'); ?>