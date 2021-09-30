<!doctype html>
    <html>
        <head>
            <title>Perpustakaan</title>
            <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css');?>" rel="stylesheet">
        
            <link href="<?php echo base_url('assets/css/plugins/morris/morris-0.4.3.min.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('assets/css/plugins/timeline/timeline.css');?>" rel="stylesheet">
        
            
            <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
            <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
            <script src="<?php echo base_url('assets/js/tinymce/tinymce.min.js');?>"></script>
            <script>
                    tinymce.init({selector:'textarea'});
            </script>
        </head>
        <body>
          
            <!-- Static navbar -->
			<div style="margin-bottom:65px;">
            <nav class="navbar navbar-inverse navbar-fixed-top"   role="navigation">
                <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url('web');?>">Perpustakaan</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo site_url('web');?>"><i class="glyphicon glyphicon-home"></i> Home</a></li>
						<li><a href="<?php echo site_url('web/buku');?>"><i class="glyphicon glyphicon-book text-success"></i> Buku</a></li>
                    </ul>
                    <div class="nav navbar-nav navbar-right">
                        <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('web/cari_anggota');?>" method="post">
                            <div class="form-group">
                                <input type="text" name="cari" class="form-control" placeholder="Cari Anggota">
                            </div>
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
                        </form>
                    </div>
                </div><!--/.nav-collapse -->
                </div>
				<!---<img src="<?php echo base_url('assets/img/cover2.png');?>" height="180px" width="100%">-->
            </div>
			<div class="col-md-8 col-md-offset-2" style="margin-top:100px; font-family: Geneva, Arial, Helvetica, sans-serif; font-style: normal;">
              <div align="center">
                <legend><b>Selamat Datang Di Website Perpustakaan Berbasic Codeigniter</legend>
                </b>
                </div>
			</div>

	<div id="loginbox" style="margin-top:0px;" class="mainbox col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">                    
		<div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">
				<span class="glyphicon glyphicon-lock"></span> Sign In
				</div>
            </div>     
            <div class="panel-body">
                <form class="form-horizontal" role="form" action="<?php echo site_url('web/proses');?>" method="post">
					<?php echo $this->session->flashdata('message');?>
					<br/>
					<div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
						<div class="col-sm-9">
                            <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username" required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                        </div>
                    </div>
					
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-success btn-sm">
                                Sign in</button>
                                    <button type="reset" class="btn btn-default btn-sm">
                                Reset</button>
                        </div>
                    </div>
        
                   <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                Don't have an account! 
                                    <a href="<?php echo site_url('web/daftar');?>">
                                Sign Up Here
                                    </a>
                            </div>
                        </div>
                    </div>    
                </form>
            </div>
		</div>
	</div>
</div>
            
    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url('assets/js/holder.js');?>"></script>
    
    <script src="<?php echo base_url('assets/js/application.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-1.10.2.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/morris/raphael-2.1.0.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/morris/morris.js');?>"></script>
    <script src="<?php echo base_url('assets/js/sb-admin.js');?>"></script>
    <script src="<?php echo base_url('assets/js/demo/dashboard-demo.js');?>"></script>   
</body>
</html>