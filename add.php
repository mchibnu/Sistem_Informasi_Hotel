<?php
include 'config.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tamu</title>
    <link rel="stylesheet" type="text/css" href="theme.css">
</head>

<body>
    <div class="form">
<?php
    // Check If form submitted, insert form data into users table.
    //include 'config.php';
    if(isset($_POST['Submit'])) {
        $nama = $_POST['nama_tamu'];
        $email = $_POST['email'];
        $nama_hotel = $_POST['nama_hotel'];
        $nama_kamar = $_POST['nama_kamar'];
        $no_kamar = $_POST['no_kamar'];
        $asian = $_POST['asian'];
        $western = $_POST['western'];
        // include database connection file
        //include_once("config.php");
        // Insert user data into table
        $result = mysqli_query($hotel, "INSERT INTO tamu(nama_tamu,email,id_hotel,id_kamar,id_menu) VALUES('$nama','$email', '$nama_hotel', '$nama_kamar','$asian')");
        if (!$result) {
           //die (mysqli_error($hotel)); 
        }
        header("location:booking.php");
    }
    ?>
<h2>Registrasi</h2>
<form action="add.php" method="post" name="form1">
  <table width="25%" border="0">
    <tr> 
      <td>Nama : </td>
      <td><input type="text" name="nama_tamu"></td>
    </tr>

    <tr> 
      <td>Email : </td>
      <td><input type="text" name="email"></td>
    </tr>

    <tr> 
      <td>Hotel : </td>
      <td>
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
            <option value="<?php echo $data['id_hotel'];?>"> <?php echo $data['nama_hotel'];?></option>
            <?php } ?>   
        </select>
      </td>
      </tr>

      <tr> 
        <td>Kamar : </td>
        <td>
        <select name="nama_kamar">
        <option disabled>Select</option>
        <?php
        $sql="Select * FROM kamar";
        $hasil=mysqli_query($hotel,$sql);
        if (!$hasil) {
            die (mysqli_error($hotel)); 
        }
        while ($data = mysqli_fetch_array($hasil)) {
        ?>
        <option value="<?php echo $data['id_kamar'];?>"> <?php echo $data['nama_kamar'];?></option>
        <?php } ?>
        </select>
        </td>
        </tr>
        <tr> 
        <td>No Kamar : </td>
        <td>
        <select name="no_kamar">
        <option disabled>Select</option>
        <?php
        $sql="Select * FROM kamar";
        $hasil=mysqli_query($hotel,$sql);
        if (!$hasil) {
            die (mysqli_error($hotel)); 
        }
        while ($data = mysqli_fetch_array($hasil)) {
            ?>
            <option value="<?php echo $data['id_kamar'];?>"> <?php echo $data['no_kamar'];?></option>
            <?php 
        } ?>
        </select></td>
        </tr>
        <tr> 
        <td>Menu Asian : </td>
        <td>
        <select name="asian">
        <option disabled>Select</option>
        <?php
        $sql="Select * FROM menu";
        $hasil=mysqli_query($hotel,$sql);
        if (!$hasil) {
            die (mysqli_error($hotel)); 
        }
        while ($data = mysqli_fetch_array($hasil)) {
            ?>
            <option value="<?php echo $data['id_menu'];?>"> <?php echo $data['asian'];?></option>
            <?php } ?>   
        </select></td>
        </tr>
        <tr> 
        <td>Menu Western : </td>
        <td>
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
            <option value="<?php echo $data['id_menu'];?>"> <?php echo $data['western'];?></option>
            <?php } ?>
        </select></td>
        </tr>
        <tr> 
        <td></td>
        <td><input class="button" type="submit" name="Submit" value="Daftar"></td>
        </tr>
      </table>
    </form>  
</body>
</html>
