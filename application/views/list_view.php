<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/navbar'); ?>

<?php /* This Page is for listing all records with pagination */ ;?>


<div class="custom-box" style="width: 90%; margin: 0 auto;">
	<div class="enter-data">
		<table class="table table-bordered">
	       <?php
        
foreach ($results as $r) {
            echo "<tr class='text-center'><td>";
            echo "<td>" . $r->rank . "</td>";
            echo "<td>" . $r->name . "</td>";
            echo "<td>" . $r->bd . "</td>";
            echo "<td>" . $r->br . "</td>";
            echo "<td>" . $r->b_day . "</td>";
            echo "<td>" . $r->card_no . "</td>";
            echo "<td>" . $r->issue_day . "</td>";
            echo "</tr>";
        }
        ?>
	   </table>
	   <?php echo $links; ?>
	   
	   </div>
</div>

<?php $this->load->view('templates/footer'); ?>