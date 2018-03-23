<!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="border-radius: 0px;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url();?>">QRIDMS:BAF</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo ($this->session->userdata('name')); ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Profile</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Reports</a></li>
                <li class="divider"></li>
<!--                 <li class="dropdown-header">Nav header</li> -->
                <li><a href="<?php echo site_url('logout');?>">Logout</a></li>
              </ul>
            </li>
          </ul>
          
          <form class="navbar-form navbar-right" method="post" role="search" action="<?php echo site_url('search/result');?>">
			<div class="form-group">
				<input type="text" class="form-control" name="term" placeholder="Search">
			</div>
			<button type="submit" class="btn btn-default">Search</button>
		 </form>
          
        </div><!--/.nav-collapse -->
      </div>
    </div>