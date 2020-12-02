<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id_tamu = $_POST['id_tamu'];
    $nama_tamu = $_POST['nama_tamu'];
    $email = $_POST['email'];
    $nama_hotel = $_POST['nama_hotel'];
    $nama_kamar = $_POST['nama_kamar'];
    $no_kamar = $_POST['no_kamar'];
    $asian = $_POST['asian'];
    $western = $_POST['western'];


    // update user data
    $result = mysqli_query($hotel, "UPDATE tamu SET id_tamu='$id_tamu', nama_tamu='$nama_tamu', email='$email', id_hotel='$nama_hotel', id_kamar='$nama_kamar', id_menu='$asian' WHERE id_tamu=$id_tamu");
    if (!$result) {
        die (mysqli_error($hotel)); 
     }
    // Redirect to homepage to display updated user in list
    header("Location: final.php");
}
?>
<?php

$id_tamu = $_GET['id_tamu'];

// Fetech user data based on id
$result = mysqli_query($hotel, "SELECT * FROM tamu WHERE id_tamu=$id_tamu");

while ($user_data = mysqli_fetch_array($result)) {
    $id_tamu = $user_data['id_tamu'];
    $nama_tamu = $user_data['nama_tamu'];
    $email = $user_data['email'];
    $id_hotel = $user_data['id_hotel'];
    $id_kamar = $user_data['id_kamar'];
    $id_menu = $user_data['id_menu'];
}
?>
<html>

<head>
    <title>Edit User</title>
    <link rel="stylesheet" type="text/css" href="theme.css">
</head>

<body>
    <h1 align='center' line-height='50%'>Edit Data tamu</h1>

    <div class="form">
        <form action="edit.php" method="post">
            <input type="hidden" name="id_tamu" value=<?php echo $id_tamu; ?>>
            <tr>
              <label>Nama Tamu</label>
              <input type="text" name="nama_tamu" value=<?php echo $nama_tamu; ?>>
            </tr><br>
            <tr>
              <label>Email</label>
              <input type="text" name="email" value=<?php echo $email; ?>>
            </tr><br>
            <tr>
            <label>Hotel</label>
            <select name="nama_hotel">
                <option disabled>Select</option>
                <?php
                //include('config.php');
                   $sql="Select * FROM hotel";

                    $hasil=mysqli_query($hotel,$sql);
                    if (!$hasil) {
                        die (mysqli_error($hotel)); 
                     }
                    while ($data = mysqli_fetch_array($hasil)) {
                                          ?>
                    <option value="<?php echo $data['id_hotel'];?>"><?php echo $data['nama_hotel'];?></option>
                  <?php } ?>   
            </select>
            </tr><br>
            <tr>
            <label>Kamar</label>
            <select name="nama_kamar">
                <option disabled>Select</option>
                <?php
                //include('config.php');
                   $sql="Select * FROM kamar";

                    $hasil=mysqli_query($hotel,$sql);
                    if (!$hasil) {
                        die (mysqli_error($hotel)); 
                     }
                    while ($data = mysqli_fetch_array($hasil)) {
                                          ?>
                    <option value="<?php echo $data['id_kamar'];?>"><?php echo $data['nama_kamar'];?></option>
                  <?php } ?>
            </select>
            </tr><br>
            <tr>
            <label>No Kamar</label>
            <select name="no_kamar">
                <option disabled>Select</option>
                <?php
                //include('config.php');
                   $sql="Select * FROM kamar";

                    $hasil=mysqli_query($hotel,$sql);
                    if (!$hasil) {
                        die (mysqli_error($hotel)); 
                     }
                    while ($data = mysqli_fetch_array($hasil)) {
                                          ?>
                    <option value="<?php echo $data['id_kamar'];?>"><?php echo $data['no_kamar'];?></option>
                  <?php 
                    } ?>
            </select></td>
            </tr><br>
            <tr>
            <label>Menu Asian</label>
            <td><label></label>
                <select name="asian">
                <option disabled>Select</option>
                <?php
                //include('config.php');
                   $sql="Select * FROM menu";

                    $hasil=mysqli_query($hotel,$sql);
                    if (!$hasil) {
                        die (mysqli_error($hotel)); 
                     }
                    while ($data = mysqli_fetch_array($hasil)) {
                    ?>
                    <option value="<?php echo $data['id_menu'];?>"><?php echo $data['asian'];?></option>
                    <?php } ?>   
            </select></td><br>
            <tr>
            <td>Menu Western</td>
                <td><label></label>
                <select name="western">
                <option disabled>Select</option>
                <?php
                //include('config.php');
                   $sql="Select * FROM menu";

                    $hasil=mysqli_query($hotel,$sql);
                    if (!$hasil) {
                        die (mysqli_error($hotel)); 
                     }
                    while ($data = mysqli_fetch_array($hasil)) {
                    ?>
                    <option value="<?php echo $data['id_menu'];?>"><?php echo $data['western'];?></option>
                    <?php } ?>
            </select></td>
            </tr><br>
            <button1><a href="final.php">Batal</a></button1>
            <input type="submit" name="update" class="submit" value="Update">
        </form>
    </div>
</body>

</html>