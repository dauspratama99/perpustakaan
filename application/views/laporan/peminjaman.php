<?php if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'):?>
<script>
    $(function(){
        $("#tampilkan").click(function(){
            var tanggal1=$("#tanggal1").val();
            var tanggal2=$("#tanggal2").val();
            
            $.ajax({
                url:"<?php echo site_url('laporan/cari_pinjaman');?>",
                type:"POST",
                data:"tanggal1="+tanggal1+"&tanggal2="+tanggal2,
                cache:false,
                success:function(html){
                    $("#tampil").html(html);
                }
            })
        })
    })
	
</script>
<div class="form-group well">
<legend><?php echo $title;?></legend>
<div class="form-horizontal">
    <div class="form-group">
        <label class="col-lg-3">Tanggal Awal</label>
        <div class="col-lg-5">
            <input type="text" id="tanggal1" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-3">Tanggal Selesai</label>
        <div class="col-lg-5">
            <input type="text" id="tanggal2" class="form-control">
        </div>
        
        <div class="col-lg-4">
            <button id="tampilkan" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Tampilkan</button>
        </div>
    </div>
</div>
<div id="tampil"></div>
<?php endif;?>


<?php if($this->session->userdata('akses')=='1'):?>
<div class="form-group well">
<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>ID Transaksi</td>
            <td>Tanggal Pinjam</td>
            <td>Tanggal Kembali</td>
            <td>Nis</td>
        </tr>
    </thead>
    <?php $no=0; foreach($lap as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><a href="<?php echo site_url('laporan/detail_pinjam/'.$row->id_transaksi);?>"><?php echo $row->id_transaksi;?></a></td>
        <td><?php echo $row->tanggal_pinjam;?></td>
        <td><?php echo $row->tanggal_kembali;?></td>
        <td><?php echo $row->nis;?></td>
    </tr>
    <?php endforeach;?>
</table>
<?php endif;?>


<?php if($this->session->userdata('akses')=='3'):?>
<div class="form-group well">
<legend><?php echo $title;?></legend>
    <form class="form-horizontal" action="<?php echo site_url('laporan/peminjaman')?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-5">ID Transaksi</label>
        <div class="col-lg-5">
            : <?php echo $this->session->userdata('id_transaksi');?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-5">Tanggal Pinjam</label>
        <div class="col-lg-5">
            : <?php echo $this->session->userdata('tanggal_pinjam');?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-5">NIS</label>
        <div class="col-lg-5">
            : <?php echo $this->session->userdata('nis');?>
        </div>
    </div>
</div>

<?php endif;?>
