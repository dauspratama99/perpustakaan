<!doctype html>
    <html>
        <head>
            <title>Perpustakaan</title>
            <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
        </head>
        <body>
<?php if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'):?>
  <style>
    .glyphicons {
        padding-left: 0;
        padding-bottom: 1px;
        margin-bottom: 20px;
        list-style: none;
        overflow: hidden;
      }
          
      .glyphicons li {
        float: left;
        width: 11.5%;
        height: 115px;
        padding: 10px;
        margin: 0 -1px -1px 0;
        font-size: 12px;
        line-height: 1.4;
        text-align: center;
        border: 1px solid #ddd;
      }
      
      .glyphicons .glyphicon {
              margin-top: 5px;
              margin-bottom: 10px;
              font-size: 24px;
          display: block;
              text-align: center;
      }
</style>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4><b>Dashboard</h4></b>
    </div>

    <div class="panel-body">
        <div class="container">
            <ul class="glyphicons">
                <li>
                  <span class="glyphicon glyphicon-user"></span>
                  <a href="<?php echo site_url('anggota');?>">Anggota</a>
                </li>
                
                <li>
                  <span class="glyphicon glyphicon-book"></span>
                  <a href="<?php echo site_url('buku');?>">Buku</a>
                </li>
                
                <li>
                  <span class="glyphicon glyphicon-save"></span>
                  <a href="<?php echo site_url('peminjaman');?>">Peminjaman</a>
                </li>
                
                <li>
                  <span class="glyphicon glyphicon-saved"></span>
                  <a href="<?php echo site_url('pengembalian');?>">Pengembalian</a>
                </li>
                
                <li>
                  <span class="glyphicon glyphicon-print"></span>
                  <a href="<?php echo site_url('laporan/peminjaman');?>">Laporan</a>
                </li>
                
                <li>
                  <span class="glyphicon glyphicon-off"></span>
                  <a href="<?php echo site_url('dashboard/logout');?>">Logout</a>
                </li>
            </ul>
        </div>
    </div>
<?php elseif($this->session->userdata('akses')=='3'):?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4><b>Dashboard</h4></b>
    </div>
	<div class="panel-body">
	<img src="<?php echo base_url('assets/img/background2.png');?>" height="170px" width="100%"> 
        <div class="container">
		<ul class="glyphicons">
		<br>
		<ul>
		<li>Pengertian Perpustakaan dan Fungsi Perpustakaan</li><p> 
			<p>Perpustakaan berasal dari kata “pustaka”.<br> Arti pustaka adalah buku (Library dari bahasa Yunani).
			Perpustakaan dapat pula diartikan sebagai tempat kumpulan buku<br> atau tempat buku dihimpun dan diorganisasikan sebagai media belajar. Sedangkan Wafford mengartikan perpustakaan sebagai<br>
			salah satu organisasi sumber belajar yang mengelola, menyimpan,<p> dan memberikan layanan bahan pustaka baik buku maupun non buku kepada masyarakat tertentu maupun masyarakat umum.<br>
			Lebih luas lagi pengertian perpustakaan adalah salah satu unit kerja yang berupa tempat untuk mengatur, mengelola, menyimpan,<br> dan mengumpulkan koleksi bahan pustaka secara sistematis untuk digunakan oleh pemakai sebagai sumber informasi sekaligus<br>
			sebagai sarana belajar yang menyenangkan.
		</p>
		<li>Fungsi Informasi</li><p>

			<p>Perpustakaan menyediakan berbagai jenis informasi yang meliputi bahan tercetak, terekam maupun koleksi lainnya agar pengguna<br> perpustakaan dapat :<p>
				<ol><li>mengambil berbagai ide dan buku yang ditulis oleh para ahli dan berbagai bidang ilmu,</li>
					<li>menumbuhkan rasa percaya diri dalam menyerap informasi dalam berbagai bidang serta mempunyai kesempatan<br>
						untuk dapat memilih informasi yang layak yang sesuai dengan kebutuhannya,</li>
					<li>memperoleh kesempatan untuk mendapatkan berbagai informasi yang tersedia di perpustakaan dalam rangka mencapai<br>
						tujuan yang diinginkan,</li>
					<li>memperoleh informasi yang tersedia di perpustakaan untuk memecahkan masalah yang dihadapi dalam kehidupan<br>
						sehari-hari di masyarakat.</li>
				</ol>
		</ul>
		</div>
    </div>
</div>
<?php endif;?>