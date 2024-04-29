<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telepon = $_POST['telepon'];

    $host = "localhost";
    $user = "root";
    $db_password = "";
    $db = "db_users";

    $koneksi = mysqli_connect($host, $user, "", $db);

    $query = "INSERT INTO tbl_users (name, email, password, telepon) VALUES ('$name', '$email', '$password', '$telepon')";
    $query_result = mysqli_query($koneksi, $query);

    echo $query_result;

    if (!$query_result) {
        die("Query failed: " . mysqli_error($koneksi));
    }

    $jumlah_data = mysqli_affected_rows($koneksi);  
}


if($jumlah_data > 0){
    ?>
        <script>
            alert('Data berhasil dibuat!')
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
