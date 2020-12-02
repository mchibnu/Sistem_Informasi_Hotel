<?php
include 'config.php';
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Regist</title>
	<link rel="stylesheet" type="text/css" href="theme.css">
</head>
<body>

<h3> DAFTAR TAMU </h3>
<br>
<form action="" method="GET">
<table border="2px" width="700px" height="10px">
	<tr>
	<td> No. </td>
	<td> Nama  </td>
	<td> Email</td>
	<td> Hotel </td>
</tr>

<?php
include 'config.php';
$no = 1;
$result = mysqli_query($hotel, "SELECT A.id_tamu, A.nama_tamu, A.email, B.nama_hotel FROM tamu A LEFT JOIN hotel B ON A.id_hotel = B.id_hotel");
foreach ($result as $data) {
	# code...
?>
	<tr>
	 	<td><?php echo $no++ ; ?></td>
		<td><?php echo $data ['nama_tamu'] ; ?></td>
		<td><?php echo $data ['email'] ;?></td>
		<td><?php echo $data ['nama_hotel'] ;?></td>
	</tr>
	<?php } ?>
</table>
<form>
<td><a class="button" href="final.php">Lihat tabel full</a></td>
</form>
</body>
</html>