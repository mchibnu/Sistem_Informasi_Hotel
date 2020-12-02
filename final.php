<?php
include 'config.php';
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
	<title>List Regist</title>
	<link rel="stylesheet" type="text/css" href="theme.css">
</head>
<body>
<stylefont color="white">
<h3> DAFTAR REGISTRASI FULL </h3>
<form method = "POST"> 
<input type = "text" name="nama" placeholder="Cari Data">
<input type = "submit" name="search" value="search">
</form> 
<br>
<form action="" method="GET">
<table border="2px" width="1200px" height="200px">
	<tr>
	<td> No. </td>
	<td> Nama  </td>
	<td> Email</td>
	<td> Hotel </td>
    <td> Kamar </td>
    <td> No Kamar </td>
    <td> Asian </td>
    <td> Western </td>
</tr>

<?php
include 'config.php';
$no = 1;
$query = $_POST['nama'];
if($query != ''){
	$result = mysqli_query($hotel, "SELECT a.id_tamu, a.nama_tamu, a.email, b.nama_hotel, c.nama_kamar, c.no_kamar, d.asian, d.western FROM tamu a LEFT JOIN hotel b ON a.id_kamar = b.id_hotel LEFT JOIN kamar c ON a.id_kamar = c.id_kamar LEFT JOIN menu d ON a.id_menu = d.id_menu WHERE a.nama_tamu LIKE '%$query%' OR a.email LIKE '%$query%' OR b.nama_hotel LIKE '%$query%' OR c.nama_kamar LIKE '%$query%' OR c.no_kamar LIKE '%$query%' OR d.asian LIKE '%$query%' OR d.western LIKE '%$query%' ORDER BY a.nama_tamu");
}
else {
    $result = mysqli_query($hotel, "SELECT a.id_tamu, a.nama_tamu, a.email, b.nama_hotel, c.nama_kamar, c.no_kamar, d.asian, d.western FROM tamu a LEFT JOIN hotel b ON a.id_hotel = b.id_hotel LEFT JOIN kamar c ON a.id_kamar = c.id_kamar LEFT JOIN menu d ON a.id_menu = d.id_menu ");
}
if (mysqli_num_rows($result)){
    while ($data = mysqli_fetch_array($result)){
?>
	<tr>
		<td><?php echo $no++ ; ?></td>
		<td><?php echo $data ['nama_tamu'] ; ?>
		<td><?php echo $data ['email'] ;?>
		<td><?php echo $data ['nama_hotel'] ;?>
        <td><?php echo $data ['nama_kamar'] ;?>
        <td><?php echo $data ['no_kamar'] ;?>
        <td><?php echo $data ['asian'] ;?>
        <td><?php echo $data ['western'] ;?>
		<td><button><a class="Edit" href="edit.php?id_tamu=<?php echo $data['id_tamu'];?>"> Edit </a></button></td>
		<td><button><a class="Delete" href="delete.php?id_tamu=<?php echo $data['id_tamu'];?>"> Delete </a></button></td>
	</tr>
<?php
    }
}else {
    echo '<tr><td colspan="9"> Data tidak ditemukan</td></tr>';
}
?>
</table>
<a class="button" href="add.php">Tambah Booking</a>
</body>
</html>