<!doctype html>
    <html>
        <head>
            <title>Perpustakaan</title>
            <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
			
            <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
        </head>
        <body>
 <!-- Static navbar -->

<div class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        <a class="navbar-brand" href="<?php echo site_url('dashboard');?>" >Perpustakaan</a>
        </div>
<?php if($this->session->userdata('akses')=='3'):?>
<ul class="nav navbar-nav">
	<li class="dropdown user user-menu">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<span class="glyphicon glyphicon-folder-close"></span>
					<strong>Master</strong>
			</a>
		<ul class="dropdown-menu">
		<div class="panel-heading">
			<li class="table">
				<span class="glyphicon glyphicon-book text-success"></span> 
				<a href="<?php echo site_url('buku');?>">Buku</a>
			</li>
			<li>
				<span class="glyphicon glyphicon-list-alt text-primary"></span>
				<a href="<?php echo site_url('profile/profileAnggota');?>">Profile</a>
			</li>
		</div>
		</ul>
	</li>
</ul>
<ul class="nav navbar-nav">
	<li class="dropdown user user-menu">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<span class="glyphicon glyphicon-th"></span>
					<strong>Transaksi</strong>
			</a>
		<ul class="dropdown-menu">
		<div class="panel-heading">
			<li>
				<span class="glyphicon glyphicon-saved"></span>
				<a href="<?php echo site_url('peminjaman');?>"> Peminjaman</a>
			</li>
		</div>
		</ul>
	</li>
</ul>
<ul class="nav navbar-nav">
	<li class="dropdown user user-menu">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<span class="glyphicon glyphicon-file"></span>
					<strong>Laporan</strong>
			</a>
		<ul class="dropdown-menu">
		<div class="panel-heading">
			<li>
				<span class="glyphicon glyphicon-tasks"></span>
				<a href="<?php echo site_url('laporan/peminjaman');?>"> Data Peminjaman</a>
			</li>
		</div>
		</ul>
	</li>
</ul>
<?php endif; ?>
<ul class="nav navbar-nav">
<li id="clock" class="waktu">								
<!-- menampilkan waktu --->						
<script type="text/javascript">
<!--
function showTime() {
    var a_p = "";
    var today = new Date();
    var curr_hour = today.getHours();
    var curr_minute = today.getMinutes();
    var curr_second = today.getSeconds();
    if (curr_hour < 24) {
        a_p = "AM";
    } else {
        a_p = "PM";
    }
    if (curr_hour == 0) {
        curr_hour = 24;
    }
    if (curr_hour > 24) {
        curr_hour = curr_hour - 24;
    }
    curr_hour = checkTime(curr_hour);
    curr_minute = checkTime(curr_minute);
    curr_second = checkTime(curr_second);
 document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
    }

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
setInterval(showTime, 500);
//-->
</script>
</li>
<br>
<!-- Menampilkan Hari, Bulan dan Tahun -->
<li class="tanggal">
<script type='text/javascript'>
var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
var date = new Date();
var day = date.getDate();
var month = date.getMonth();
var thisDay = date.getDay(),
	thisDay = myDays[thisDay];
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;
document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
</script>
</li>  
</ul>
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown user user-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="glyphicon glyphicon-user"></span> 
					<strong>Hai, <?php echo $this->session->userdata("username"); ?></strong>
				<span class="glyphicon glyphicon-chevron-down"></span>
			</a>
		<ul class="dropdown-menu" style="width:300px; padding:0px;">
			<div class="panel panel-primary" style="margin-bottom:0px;">
				<div class="panel panel-heading">
				<li>
				My Profile
				</li>
				<center>
				<li class="user-header">
				<?php if($this->session->userdata('akses')=='1'):?>
				<img src="<?php echo base_url('assets/img/petugas/'.$this->session->userdata('gambar'));?>" height="100px" width="100px" class="img-circle"></a>
				<?php elseif($this->session->userdata('akses')=='2'):?>
				<img src="<?php echo base_url('assets/img/petugas/'.$this->session->userdata('gambar'));?>" height="100px" width="100px" class="img-circle"></a>
				<?php else:?>
				<img src="<?php echo base_url('assets/img/anggota/'.$this->session->userdata('gambar'));?>" height="100px" width="100px" class="img-circle"></a>
				<?php endif;?>
				<p>
					<?php echo $this->session->userdata('email');?>
				</p>
				</li></center>
			  </div>
				<div class="panel-body">
				<li class="user-footer">
					<div class="pull-left">
					<p>
						<a href="<?php echo site_url('profile');?>"  class="glyphicon glyphicon-user btn btn-default btn-flat">Profil</a>
					</p>
					</div>
					<p>
					<div class="pull-right">
						<a href="<?php echo site_url('dashboard/logout');?>" class="glyphicon glyphicon-off btn btn-default btn-danger">Logout</a>
					</p>
					</div>
					</div>
				</li>
				</div>
			</div>
		</ul>
	</ul>
</div>
</div>
</body>