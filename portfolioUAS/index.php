<?php
include "koneksi.php"; 

$perpage = 3;

$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;

$start = ($page > 1) ? ($page * $perpage) - $perpage : 0;



$results = mysqli_query($koneksi, "SELECT * FROM pengalaman LIMIT $start, $perpage");



$hasil = mysqli_query($koneksi, "SELECT * FROM pengalaman");

$total = mysqli_num_rows($hasil);



$pages = ceil($total / $perpage);



//searching 



$keyword = "";

if (isset($_POST['cari'])) {

    $keyword = $_POST['keyword'];

    $results = mysqli_query($koneksi, "SELECT * FROM pengalaman

                                        WHERE experience LIKE '%$keyword%' ");

}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Portfolio</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>

<div class="container">
<center>
	<h1>Portfolio</h1>
</center>
<table class="table-container">
	<tr>
		<td class="profile">
		<hr>
			<h1 class="title">My Profile</h1>
			<div>
				<img src="image/foto.jpg" alt="">
				<span>
					Assalamualaikum wr wb... Nama saya Sultan Ramadhan, saya berumur 22 tahun, saya berasal dari Cikarang. Saat ini saya sedang melanjutkan study di salah satu Universitas yang ada di cikarang yaitu Universitas Pelita Bangsa, saya mengambil jurusan dibidang Teknik Informatika dan sekarang sudah memasuki semester 4, kebetulan saya mengambil kelas non reguler/kelas karyawan. Selain berkuliah saya juga bekerja di salah satu perusahaan yang ada di Bekasi. Terima Kasih Wassalamualaikum wr wb...
				</span>
			</div>
			
		</td>

		<td class="skill">
		<hr>
			<h1 class="title">My Skill</h1>

			<div class="content">
				
			<ul>
				
				<li>
					Pemrograman Web
					<div class="level" style="width: 50%">
						50%
					</div>
				</li>

				<li>
					Photoshop
					<div class="level"  style="width: 40%">
						40%
					</div>
				</li>

				<li>
					Microsoft Office
					<div class="level"  style="width: 70%">
						70%
					</div>
				</li>

			</ul>

			</div>
			
		</td>
	</tr>
	<tr>
		<td class="profile">
		<hr>
			<h1 class="title">My Experience</h1>

			<div>
				Saya pernah bekerja di beberapa perusahaan dan banyak mengikuti seminar.
			</div>
			
			<table class="table">
			<form action="" method="post">

                <input type="text" name="keyword" id="keyword" class="myInput" size="40" autocomplete="off" placeholder="masukan experience">

                <button type="submit" name="cari" class="cari">Cari ! </button>

            </form>
			
				<tr>
					<th>No</th>
					<th>Experience</th>
					<th>Year</th>
				</tr>

				<tr>
				<?php $i=1;?>
				<?php while ($row = mysqli_fetch_assoc($results)) : ?>
			
					<td><?= $i ;?></td>
					<td><?= $row["experience"]; ?></td>
					<td><?= $row["year"]; ?></td>

				</tr>
				<?php $i++; ?>
				<?php endwhile; ?>
				
			
			</table>
			<div class="paginate">

                <?php for ($i = 1; $i <= $pages; $i++) : ?>

                    <?php if ($i == $page) : ?>

                        <a href="?halaman=<?= $i ?>" style="font-weight : bold; color: white;"><?= $i ?></a>

                    <?php else : ?>

                        <a href="?halaman=<?= $i ?>"><?= $i ?></a>

                    <?php endif; ?>

                <?php endfor; ?>

            </div>
		</td>

		<td class="profile">
		<hr>
			<h1 class="title">My Education</h1>

			<div>
				Beberapa pengalaman sekolah saya.
			</div>
			
			<table class="table">
				<tr>
					<th>No</th>
					<th>Institute Name</th>
					<th>Year</th>
				</tr>

				<tr>
					<td>1</td>
					<td>SMKN 1 Cikarang Selatan</td>
					<td>2016</td>

				</tr>
				<tr>
					<td>2</td>
					<td>Universitas Pelita Bangsa</td>
					<td>2022</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="project" colspan="2">
		<hr>
			<h1 class="title">My Project</h1>

			<div>
				<div class="content">
				<img src="image/project1.png" alt="">
				<p>
				website Petshop
				</p>
			</div>
			<div class="content">
				<img src="image/project2.png" alt="">
				<p>
				Website Restoran
				</p>
			</div>
            
			<div class="content">
				<img src="image/project3.png" alt="">
				<p>
				Website Onlineshop
				</p>
			</div>
			</div>
		</td>
	</tr>
	
</table>
</div>
<footer>
       <center> &copy; Sultan Ramadhan Universitas Pelita Bangsa 2020 </center>
      </footer>

</body>
</html>