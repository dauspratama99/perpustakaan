<?php if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'):?>
<div class="col-md-13">
<div class="form-group well">
<legend><?php echo $title;?></legend>
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#settings" data-toggle="tab">Ubah Identitas</a></li>
			<li><a href="#password" data-toggle="tab">Ubah Password</a></li>
		</ul>
		<div class="tab-content">
			<div class="active tab-pane" id="settings">
			<br>
			<?php echo validation_errors();?>
			<?php echo $this->session->flashdata('message');?>
				<form class="form-horizontal" action="<?php echo site_url('profile/profilePetugas') ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-lg-2 control-label">ID</label>
						<div class="col-lg-5">
							<input type="text" name="id" class="form-control" value="<?php echo $this->session->userdata('id');?>" readonly="readonly">
						</div>
					</div>
	
					<div class="form-group">
						<label class="col-lg-2 control-label">Username</label>
						<div class="col-lg-5">
							<input type="hidden" name="id" value="<?php echo $this->session->userdata('id');?>">
							<input type="text" name="user" value="<?php echo $this->session->userdata('username');?>" class="form-control">
						</div>
					</div>
	
					<div class="form-group">
						<label class="col-lg-2 control-label">Email</label>
						<div class="col-lg-5">
							<input type="text" name="email" value="<?php echo $this->session->userdata('email');?>" class="form-control">
						</div>
					</div>
	
					<div class="form-group">
						<label class="col-lg-2 control-label">Level</label>
						<div class="col-lg-5">
							<select name="level" class="form-control" readonly="readonly">
								<option value="<?php echo $this->session->userdata('level');?>"><?php echo $this->session->userdata('level');?></option>
								<option value="Administrator">Administrator</option>
								<option value="Petugas">Petugas</option>
							</select>
						</div>
					</div>
	
					<div class="form-group">
						<label class="col-lg-2 control-label">Jenis Kelamin</label>
						<div class="col-lg-5">
							<select name="jk" class="form-control" readonly="readonly">
								<option value="<?php echo $this->session->userdata('jk');?>"><?php echo $this->session->userdata('jk');?></option>
								<option value="L">Laki-Laki</option>
								<option value="P">Perempuan</option>
							</select>
						</div>
					</div>
	
					<div class="form-group">
						<label class="col-lg-2 control-label">Image</label>
						<div class="col-lg-5">
							<img src="<?php echo base_url('assets/img/petugas/'.$this->session->userdata('gambar'));?>" height="300px" width="300px">
						</div>
					</div>
	
					<div class="form-group">
						<label class="col-lg-2 control-label"></label>
						<div class="col-lg-5">
							<input type="file" name="gambar" class="form-control">
						</div>
					</div>
    
					<div class="form-group well">
						<div class="col-lg-5">
							<button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
							<a href="<?php echo site_url('dashboard');?>" class="btn btn-default">Kembali</a>
						</div>
					</div>
				</form>
			</div>
			<div class="tab-pane" id="password">
			<br>
			<?php echo validation_errors();?>
			<?php echo $this->session->flashdata('message'); ?>
				<form class="form-horizontal" action="<?php echo site_url('profile/passwordPetugas') ?>" method="POST">
					<div class="form-group">
						<label for="passLama" class="col-sm-2 control-label">Password Lama</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" placeholder="Password Lama" name="passLama">
						</div>
					</div>
						
					<div class="form-group">
						<label for="passBaru" class="col-sm-2 control-label">Password Baru</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" placeholder="Password Baru" name="passBaru">
						</div>
					</div>
					
					<div class="form-group">
						<label for="passKonf" class="col-sm-2 control-label">Konfirmasi Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" placeholder="Konfirmasi Password" name="passKonf">
						</div>
					</div>
						
					<div class="form-group well">
						<div class="col-lg-5">
							<button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
							<a href="<?php echo site_url('dashboard');?>" class="btn btn-default">Kembali</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php else:?>
<div class="col-md-13">
<div class="form-group well">
<legend><?php echo $title;?></legend>
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#settings" data-toggle="tab">Ubah Identitas</a></li>
			<li><a href="#password" data-toggle="tab">Ubah Password</a></li>
		</ul>
		<div class="tab-content">
			<div class="active tab-pane" id="settings">
			<br>
				<?php echo $this->session->flashdata('message'); ?>
				<form class="form-horizontal" action="<?php echo site_url('profile/profileAnggota') ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-lg-2 control-label">NIS</label>
						<div class="col-lg-5">
							<input type="text" name="nis" class="form-control" value="<?php echo $this->session->userdata('nis');?>" readonly="readonly">
						</div>
					</div>
	
					<div class="form-group">
						<label class="col-lg-2 control-label">Nama</label>
						<div class="col-lg-5">
							<input type="text" name="nama" class="form-control" value="<?php echo $this->session->userdata('nama');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label">Username</label>
						<div class="col-lg-5">
							<input type="hidden" name="nis" value="<?php echo $this->session->userdata('nis');?>">
							<input type="text" name="user" value="<?php echo $this->session->userdata('username');?>" class="form-control">
						</div>
					</div>
	
					<div class="form-group">
						<label class="col-lg-2 control-label">Email</label>
						<div class="col-lg-5">
							<input type="text" name="email" value="<?php echo $this->session->userdata('email');?>" class="form-control">
						</div>
					</div>
	
					<div class="form-group">
						<label class="col-lg-2 control-label">Jenis Kelamin</label>
						<div class="col-lg-5">
							<select name="jk" class="form-control" readonly="readonly">
								<option value="<?php echo $this->session->userdata('jk');?>"><?php echo $this->session->userdata('jk');?></option>
								<option value="L">Laki-Laki</option>
								<option value="P">Perempuan</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-2 control-label">Tanggal Lahir</label>
						<div class="col-lg-5">
							<input type="text" name="ttl" id="tanggal" class="form-control" value="<?php echo $this->session->userdata('ttl');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-2 control-label">Kelas</label>
						<div class="col-lg-5">
							<input type="text" name="kelas" class="form-control" value="<?php echo $this->session->userdata('kelas');?>">
						</div>
					</div>
	
					<div class="form-group">
						<label class="col-lg-2 control-label">Image</label>
						<div class="col-lg-5">
							<img src="<?php echo base_url('assets/img/anggota/'.$this->session->userdata('gambar'));?>" height="300px" width="300px">
							<input type="file" name="gambar" class="form-control">
						</div>
					</div>
    
					<div class="form-group well">
						<div class="col-lg-5">
							<button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
							<a href="<?php echo site_url('dashboard');?>" class="btn btn-default">Kembali</a>
						</div>
					</div>
				</form>
			</div>
			<div class="tab-pane" id="password">
			<br>
				<form class="form-horizontal" action="<?php echo site_url('profile/passwordAnggota') ?>" method="post">
					<div class="form-group">
						<label for="passLama" class="col-sm-2 control-label">Password Lama</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" placeholder="Password Lama" name="passLama">
						</div>
					</div>
						
					<div class="form-group">
						<label for="passBaru" class="col-sm-2 control-label">Password Baru</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" placeholder="Password Baru" name="passBaru">
						</div>
					</div>
					
					<div class="form-group">
						<label for="passKonf" class="col-sm-2 control-label">Konfirmasi Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" placeholder="Konfirmasi Password" name="passKonf">
						</div>
					</div>
						
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check-circle"></i> Simpan</button>
							<a href="<?php echo site_url('dashboard');?>" class="btn btn-default">Kembali</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php endif;?>