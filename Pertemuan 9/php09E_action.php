<?php

// Informasi koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pbw09";

// Membuat koneksi baru menggunakan mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    // Jika koneksi gagal, tampilkan pesan error dan hentikan proses
    die("Connection failed: " . $conn->connect_error);
}

// Mendapatkan nilai dari formulir yang disubmit
$slot = $_POST["slot"];
$name = $_POST["name"];
$email = $_POST["email"];

// Membuat dan menjalankan query SQL untuk menambahkan data ke database
$sql = "INSERT INTO meetings (slot, name, email) VALUES ('$slot', '$name', '$email')";

if ($conn->query($sql) === TRUE) {
    // Jika query berhasil dieksekusi, tampilkan pesan berhasil dan arahkan ke halaman php09F.php
    echo "Data berhasil ditambahkan";
    header("Location: ./php09F.php");
} else {
    // Jika terjadi error saat menjalankan query, tampilkan pesan error
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi database
$conn->close();

?>
