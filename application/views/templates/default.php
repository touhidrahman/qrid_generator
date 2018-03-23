<!DOCTYPE html>
<html>
<head>
    <title>QR ID Generator for BAF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/bootstrap.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/style.css');?>" />
    <link rel="shortcut icon" href="<?php echo base_url('/assets/favicon.ico');?>" />
    
</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo site_url();?>">BAF QR ID Generator</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="<?php echo site_url('welcome');?>">Add</a></li>
      <li><a href="<?php echo site_url('search');?>">Search</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li><a href="#">Separated link</a></li>
          <li><a href="#">One more separated link</a></li>
        </ul>
      </li>
    </ul>
    <form class="navbar-form navbar-right" method="post" role="search" action="<?php echo site_url('search/search_result2');?>">
      <div class="form-group">
        <input type="text" class="form-control" name="term" placeholder="Quick Search BD">
      </div>
      <button type="submit" class="btn btn-default">Search</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="<?php echo site_url('admin');?>" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo site_url('admin');?>">Login</a></li>
          <li><a href="<?php echo site_url('admin/create_admin');?>">Create Admin</a></li> <!-- add a php if else statement to view this option based on looged in or not -->
          <li><a href="<?php echo site_url('admin/delete_admin');?>">Delete Admin</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo site_url('admin/logout');?>">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>




<?php echo $body; ?>





<footer>
    <div class="row footer-separation">
        <div class="col-md-12">
            <p class="text-center">&copy; <a href="mailto:tanimkg@gmail.com">TOUHIDUR RAHMAN</a></p>
        </div>
    </div>
</footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/js/jquery-2.0.3.js');?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-dropdown.js');?>"></script>

</body>
</html>