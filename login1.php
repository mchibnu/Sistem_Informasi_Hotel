<?php
  include'config.php';
    $username = $_POST['username'];
    $password = md5 ($_POST['password']);

    if (!empty($username) && !empty($password)) {
      $data = mysqli_query($hotel, "SELECT * FROM login WHERE username='$username' AND password='$password' ");
      $result = mysqli_num_rows($data);
      if ($result) {
        header ("location:add.php");
      }
      else {
        echo "<script>window.alert('Username atau Password Salah')
        window.location='login.php'</script>";
      }
    }
?>