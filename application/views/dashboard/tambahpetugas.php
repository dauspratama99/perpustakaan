<div class="form-group well">
<legend><?php echo $title;?></legend>
<?php echo $message;?>
<?php echo validation_errors();?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
	
    <div class="form-group">
        <label class="col-lg-3 control-label">Username</label>
        <div class="col-lg-5">
            <input type="text" name="user" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-3 control-label">Password</label>
        <div class="col-lg-5">
            <input type="password" name="password"  class="form-control">
        </div>
    </div>
	
	<div class="form-group">
        <label class="col-lg-3 control-label">Level</label>
        <div class="col-lg-5">
			<select name="level" class="form-control">
                <option value="Administrator">Administrator</option>
                <option value="Petugas">Petugas</option>
            </select>
        </div>
    </div>
	
	<div class="form-group">
        <label class="col-lg-3 control-label">Email</label>
        <div class="col-lg-5">
            <input type="text" name="email" class="form-control">
        </div>
    </div>
	
	<div class="form-group">
		<label class="col-lg-3 control-label">Jenis Kelamin</label>
        <div class="col-lg-5">
            <select name="jk" class="form-control">
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
    </div>
	
	<div class="form-group">
        <label class="col-lg-3 control-label">Image</label>
        <div class="col-lg-5">
            <input type="file" name="gambar" class="form-control">
        </div>
    </div>	
    
    <div class="form-group well">
        <div class="col-lg-5">
            <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
            <a href="<?php echo site_url('dashboard/petugas');?>" class="btn btn-default">Kembali</a>
        </div>
    </div>
</form>