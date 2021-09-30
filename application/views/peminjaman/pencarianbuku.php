<table class="table table-striped">
        <thead>
            <tr>
                <td>Kode Buku</td>
				<td>Image</td>
                <td>Judul Buku</td>
                <td>Pengarang</td>
                <td></td>
            </tr>
        </thead>
        <?php foreach($buku as $tmp):?>
        <tr>
            <td><?php echo $tmp->kode_buku;?></td>
			<td><img src="<?php echo base_url('assets/img/buku/'.$tmp->image);?>" height="100px" width="100px"></td>
            <td><?php echo $tmp->judul;?></td>
            <td><?php echo $tmp->pengarang;?></td>
            <td><a href="#" class="tambah" kode="<?php echo $tmp->kode_buku;?>"
            judul="<?php echo $tmp->judul;?>"
            pengarang="<?php echo $tmp->pengarang;?>"><i class="glyphicon glyphicon-plus"></i></a></td>
        </tr>
        <?php endforeach;?>
    </table>