<!DOCTYPE html>
<html>
<head><title>ID Card: <?php echo $bd_type; ?>/<?php echo $bd; ?></title></head>
<body style="background: #c0c0c0; padding: 0; margin: 0; float: left;">
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="329px" height="206px">
    <rect x="0" y="0" width="329" height="206" rx="10" fill="white" stroke="none" />
    <image xlink:href="<?php echo base_url('assets/baf.png'); ?>" x="8" y="8" width="32" height="40" />
    <text x="60" y="31" font-size="1.3em" font-family="segoe ui" font-weight="bold" fill="#28acdd">BANGLADESH AIR FORCE</text>
    
    <image xlink:href="<?php echo base_url('photos/' . $bd_type .'_'. $bd . '_img.jpg'); ?>" x="8" y="55" width="76" height="76" />
    <text x="90" y="62" font-size=".8em" font-family="segoe ui" font-weight="700">Service No : <?php echo $bd_type; ?>/<?php echo $bd; ?></text>
    <text x="90" y="76" font-size=".8em" font-family="segoe ui" font-weight="700">Rank : <?php echo $rank; ?></text>
    <text x="90" y="90" font-size=".8em" font-family="segoe ui" font-weight="700">Name : <?php echo $name; ?></text>
    <text x="90" y="103" font-size=".7em" font-family="segoe ui" font-weight="bold" fill="red">Blood Group : <?php echo $blood; ?></text>
    <text x="90" y="116" font-size=".7em" font-family="segoe ui" font-weight="bold">Date of Birth : <?php 
        $dob = new DateTime($b_day);
        echo $dob->format('d/m/Y');
        ?></text>
    <text x="90" y="129" font-size=".7em" font-family="segoe ui" font-weight="bold">Date of Issue : <?php echo date('d/m/Y'); ?></text>
    
    <text x="268" y="52" font-size=".6em" font-family="segoe ui" font-weight="800" fill="green" textLength="45" lengthAdjust="spacingAndGylphs">CARD NO</text>
    <text x="268" y="62" font-size=".6em" font-family="segoe ui" font-weight="800" fill="green" textLength="45" lengthAdjust="spacing"><?php echo $card_no; ?></text>
    
    <image xlink:href="<?php echo base_url('assets/sign_pm.jpg'); ?>" x="8" y="135" width="76" height="30" />
    <image xlink:href="<?php echo base_url('signs/' .$bd_type .'_'. $bd.'_sign.jpg'); ?>" x="128" y="135" width="76" height="30" />
    <text x="18" y="172" font-size=".6em" font-family="segoe ui" font-weight="300">Provost Marshal</text>
    <text x="138" y="172" font-size=".6em" font-family="segoe ui" font-weight="300">Sign of Holder</text>
    <image xlink:href="<?php echo base_url('qr_images/' . $bd_type .'_'. $bd . '_qr.png'); ?>" x="240" y="118" width="76" height="76" />
    
     <rect x="0" y="182" width="203" height="14" fill="red" stroke="none" />
     <polygon fill="red" stroke="none" points="203,182 203,196 219,196" />
     <text x="18" y="192" font-size=".55em" font-family="segoe ui" font-weight="800" fill="white">Issuing Authority: Air HQ, PM Directorate</text>
     
</svg>

</body>
</html>