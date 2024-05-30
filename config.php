<?php
$host = 'localhost'; 
$user = 'root'; 
$password = ''; 
$database = 'pw2024_tubes_233040113'; 

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $user, $password, $database);

// Periksa koneksi
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}