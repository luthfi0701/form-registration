<?php
   $host = "localhost";
   $user = "root";
   $password = "";
   $db = "db_users";
   
   try {
       $koneksi = new PDO("mysql:host=$host;dbname=$db", $user, "");
       // Set the PDO error mode to exception
       $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       echo "Connected successfully"; 
   } catch(PDOException $e) {
       echo "Connection failed: " . $e->getMessage();
   }
?>  