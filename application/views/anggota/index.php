<div class="form-group well">
<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('anggota/cari');?>" method="post">
        <div class="form-group">
            <label>Cari Nis / Nama</label>
            <input type="text" class="form-control" placeholder="Search" name="cari">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
</div>
<?php if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'):?>
<a href="<?php echo site_url('anggota/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<?php endif;?>
<hr>
<?php echo $message;?>
<Table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>Image</td>
            <td>NIS</td>
            <td>Nama</td>
			<td>Username</td>
			<td>Email</td>
            <td>JK</td>
            <td>Tanggal Lahir</td>
            <td>Kelas</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php $no=0; foreach($anggota as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><img src="<?php echo base_url('assets/img/anggota/'.$row->image);?>" height="100px" width="100px"></td>
        <td><?php echo $row->nis;?></td>
        <td><?php echo $row->nama;?></td>
		<td><?php echo $row->username;?></td>
		<td><?php echo $row->email;?></td>
        <td><?php echo $row->jk;?></td>
        <td><?php echo $row->ttl;?></td>
        <td><?php echo $row->kelas;?></td>
<?php if($this->session->userdata('akses')=='1'):?>
        <td><a href="<?php echo site_url('anggota/edit/'.$row->nis);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="#" class="hapus" kode="<?php echo $row->nis;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
<?php endif;?>
	</tr>
    <?php endforeach;?>
</Table>
<?php echo $pagination;?>

<script>
    $(function(){
        $(".hapus").click(function(){
            var kode=$(this).attr("kode");
            
            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });
        
        $("#konfirmasi").click(function(){
            var kode=$("#idhapus").val();
            
            $.ajax({
                url:"<?php echo site_url('anggota/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('anggota/index/delete_success');?>";
                }
            });
        });
    });
</script>