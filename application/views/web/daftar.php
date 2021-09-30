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
        <div class="navbar navbar-inverse navbar-fixed-top"   role="navigation">
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
        </div>
	</div>
	<div class="col-md-8 col-md-offset-2" style="margin-top:5px">
        <center><legend><b>Aplikasi Website Perpustakaan Berbasic Codeigniter</legend></center></b>
    </div>
             <div class="container">    
                <div id="loginbox" style="margin-top:5px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                    <div class="panel panel-info" >

                            <div class="panel-heading">
                                <div class="panel-title"><?php echo $title;?></div>
                            </div>
                            <div style="padding-top:30px" class="panel-body" >
							<?php echo validation_errors();?>
							<?php echo $message;?>
							<br/>
                                    <form id="signupform" class="form-horizontal" role="form" action="<?php echo site_url('web/daftar');?>" method="post">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">NIS</label>
                                            <div class="col-md-9">
                                                <input type="text" name="nis" class="form-control" placeholder="NIS">
                                            </div>
                                        </div>
                                            
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Lengkap</label>
                                            <div class="col-md-9">
                                                <input type="text" name="nama" class="form-control" placeholder="Nama lengkap">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="user" placeholder="username">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                            </div>
                                        </div>
                                            
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Email</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="email" placeholder="Email">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jenis Kelamin</label>
                                            <div class="col-md-9">
                                                <select name="jk" class="form-control">
													<option></option>
													<option value="L">Laki-Laki</option>
													<option value="P">Perempuan</option>
												</select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal lahir</label>
                                            <div class="col-md-9">
                                                <input type="date" name="ttl" id="tanggal" class="form-control" placeholder="yyyy-mm-dd">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Kelas</label>
                                            <div class="col-md-9">
                                                <input type="text" name="kelas" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Image</label>
                                            <div class="col-md-9">
                                                <input type="file" name="gambar" class="form-control">
                                            </div>
                                        </div>										
                                        <div class="form-group">
                                            <!-- Button -->                                        
                                            <div class="col-md-offset-3 col-md-9">
                                                <button class="btn btn-primary"><i class="icon-hand-right"></i> Daftar</button>
												<a href="<?php echo site_url('web');?>" class="btn btn-default">Kembali</a>
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