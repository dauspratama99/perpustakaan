<div class="form-group well">
<legend><?php echo $title;?></legend>
<?php echo validation_errors();?>
<?php echo $message;?>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">ID</label>
        <div class="col-lg-5">
            <input type="text" name="id" class="form-control" value="<?php echo $petugas['id_petugas'];?>" readonly="readonly">
        </div>
    </div>
	
    <div class="form-group">
        <label class="col-lg-2 control-label">Username</label>
        <div class="col-lg-5">
            <input type="hidden" name="id" value="<?php echo $petugas['id_petugas'];?>">
            <input type="text" name="user" value="<?php echo $petugas['user'];?>" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Password</label>
        <div class="col-lg-5">
            <input type="password" name="password" value="<?php echo $petugas['password'];?>" class="form-control">
        </div>
    </div>
	
	<div class="form-group">
        <label class="col-lg-2 control-label">Email</label>
        <div class="col-lg-5">
            <input type="text" name="email" value="<?php echo $petugas['email'];?>" class="form-control">
        </div>
    </div>
	
	<div class="form-group">
        <label class="col-lg-2 control-label">Level</label>
        <div class="col-lg-5">
			<select name="level" class="form-control">
                <option value="<?php echo $petugas['level'];?>"><?php echo $petugas['level'];?></option>
                <option value="administrator">Administrator</option>
                <option value="petugas">Petugas</option>
            </select>
        </div>
    </div>
	
	<div class="form-group">
		<label class="col-lg-2 control-label">Jenis Kelamin</label>
        <div class="col-lg-5">
            <select name="jk" class="form-control">
                <option value="<?php echo $petugas['jk'];?>"><?php echo $petugas['jk'];?></option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
    </div>
	
	<div class="form-group">
        <label class="col-lg-2 control-label">Image</label>
        <div class="col-lg-5">
            <img src="<?php echo base_url('assets/img/petugas/'.$petugas['image']);?>" height="300px" width="300px">
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
            <a href="<?php echo site_url('dashboard/petugas');?>" class="btn btn-default">Kembali</a>
        </div>
    </div>
</form>