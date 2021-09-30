<div class="form-group well">
<legend>Tambah Petugas</legend>
<a href="<?php echo site_url('dashboard/tambahpetugas');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<?php echo $message;?>
<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
			<td>Gambar</td>
            <td>Username</td>
			<td>level</td>
			<td>email</td>
			<td>JK</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php $no=0; foreach($petugas as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
		<td><img src="<?php echo base_url('assets/img/petugas/'.$row->image);?>" height="100px" width="100px"></td>
        <td><?php echo $row->user;?></td>
		<td><?php echo $row->level;?></td>
		<td><?php echo $row->email;?></td>
		<td><?php echo $row->jk;?></td>
        <td><a href="<?php echo site_url('dashboard/edit/'.$row->id_petugas);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="#" class="hapus" kode="<?php echo $row->id_petugas;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
		
    </tr>
    <?php endforeach;?>
</table>
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
                url:"<?php echo site_url('dashboard/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('dashboard/petugas/delete_success');?>";
                }
            });
        });
    });
</script>
</div>