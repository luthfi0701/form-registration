<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    $host = "localhost";
    $user = "root";
    $db_password = "";
    $db = "db_users";

    $koneksi = mysqli_connect($host, $user, "", $db);

    // Check connection
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Now you can use $email and $password in your PHP code
    // For example, you might want to validate the credentials against a database

    // Perform the query using MySQLi
    $cari = "SELECT email, password FROM tbl_users WHERE email='$email' AND password='$password'";
    $query = mysqli_query($koneksi, $cari);
    if (!$query) {
        die("Query failed: " . mysqli_error($koneksi));
    }

    $jumlah_data = mysqli_num_rows($query);
}

if($jumlah_data > 0){
    $_SESSION['email'] = $email;
    ?>
        <script>
            alert('anda berhasil login!')
        </script>
    <?php        
}else{
    ?>
        <script>
            alert('Anda gagal login, SIlahkan Masukkan Email yang benar!')
        </script>
    <?php
}


?>