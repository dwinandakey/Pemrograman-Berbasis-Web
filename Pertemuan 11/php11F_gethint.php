<?php
    // Konfigurasi database
    $db_hostname = "localhost"; // Nama server database
    $db_database = "pbw10"; // Nama database
    $db_username = "root"; // Username database
    $db_password = ""; // Password database
    $db_charset = "utf8mb4"; // Optional, set charset untuk koneksi

    // Data Source Name (DSN) untuk PDO
    $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
    // Opsi konfigurasi untuk PDO
    $opt = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Menangani error dengan exception
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Set mode fetch data sebagai associative array
        PDO::ATTR_EMULATE_PREPARES => false // Nonaktifkan emulasi prepared statements
    );

    try {
        // Membuat objek PDO untuk koneksi ke database
        $pdo = new PDO($dsn, $db_username, $db_password, $opt);
        
        // Menyiapkan query untuk mencari nama yang mirip dengan keyword
        $stmt = $pdo->prepare("SELECT name FROM meetings WHERE name LIKE ?");
        // Menjalankan query dengan parameter keyword
        $stmt->execute(["%" . $_REQUEST['keyword'] . "%"]);
        // Mengambil semua hasil query
        $stmt = $stmt->fetchAll();
    
        if ($stmt) {
            // Jika ada hasil, encode hasil sebagai JSON dan kirim ke client
            echo json_encode($stmt);
        } else {
            // Jika tidak ada hasil, kirim respons "no suggestion"
            $response[] = array(
                'name'=>'no suggestion'
            );
            echo json_encode($response);
        }
        // Menutup koneksi PDO
        $pdo = NULL;
    } catch (PDOException $e) {
        // Menangani kesalahan koneksi dan menampilkan pesan error
        exit("PDO Error: " . $e->getMessage() . "<br>");
    }
?>
