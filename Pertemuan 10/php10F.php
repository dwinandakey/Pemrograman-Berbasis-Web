<!DOCTYPE html>
<html lang='en-GB'>

<head>
    <!-- Metadata dan pengaturan gaya -->
    <title>PHP10 F</title>
    <style>
        /* CSS untuk general layout */
        body {
            font-family: Arial, sans-serif;
            font-size: 20px;
            margin: 0;
            background-color: #f9f9f9;
        }

        /* CSS untuk header */
        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: left;
        }

        /* CSS untuk menu navigasi */
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #575757;
            border-radius: 5px;
        }

        /* CSS untuk judul */
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* CSS untuk kontainer */
        .container {
            width: 100%;
            max-width: 800px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            text-align: center;
            /* Memusatkan konten */
        }

        /* Styling untuk tombol tambah */
        #newData {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            width: 100%;
            box-sizing: border-box;
        }

        #newData:hover {
            background-color: #0056b3;
            color: #fff;
        }

        /* Styling untuk tabel */
        table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: white;
        }

        /* Styling untuk kontainer tombol edit dan delete */
        .buttonContainer {
            display: flex;
            align-items: center;
            justify-content: center;
            /* Pusatkan tombol pada vertikal */
            text-align: center;
            /* Pusatkan tombol pada horizontal */
        }

        /* Styling untuk tombol edit dan delete */
        .editButton,
        .deleteButton {
            background-color: transparent;
            padding: 10px;
            cursor: pointer;
            margin-right: 5px;
            transition: color 0.3s;
            border: none;
        }

        .editButton img,
        .deleteButton img {
            width: 40px;
            height: 40px;
            margin-right: 5px;
            vertical-align: middle;
        }

        .editButton:hover,
        .deleteButton:hover {
            color: #007bff;
        }
    </style>
</head>

<body>
    <?php
    // Memulai sesi
    session_start();

    // Memeriksa apakah pengguna sudah login, jika tidak arahkan ke halaman login
    if (!isset($_SESSION['username'])) {
        header("Location: php10D.php");
        exit();
    }

    // Menyertakan file header untuk navigasi
    include ('php10F_header.php');
    ?>

    <div class="container">
        <h1>Meetings Data Employee</h1>
        <table>
            <thead>
                <tr>
                    <th>Slot</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Konfigurasi database
                $db_hostname = "localhost"; // Nama server database
                $db_database = "pbw10"; // Nama database
                $db_username = "root"; // Username database
                $db_password = ""; // Password database
                $db_charset = "utf8mb4"; // Optional
                
                // Konfigurasi PDO
                $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
                $opt = array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                );

                try {
                    // Membuat objek PDO untuk koneksi ke database
                    $pdo = new PDO($dsn, $db_username, $db_password, $opt);

                    // Mendapatkan data dari database dan menampilkannya dalam tabel
                    $stmt = $pdo->query("SELECT * FROM meetings ORDER BY slot");
                    while ($row = $stmt->fetch()) {
                        // Menampilkan setiap baris data dalam tabel HTML
                        echo "<tr>
                        <td>" . $row["slot"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td class='buttonContainer'>
                        <a href='php10G.php?slot=", $row["slot"], "' class='editButton'><img src='edit.png' alt='Edit'></a>
                        <a href='php10H.php?slot=", $row["slot"], "' class='deleteButton'><img src='delete.png' alt='Delete'></a>
                        </td>
                        </tr>";
                    }
                    // Menutup koneksi PDO
                    $pdo = NULL;
                } catch (PDOException $e) {
                    // Menampilkan pesan error jika koneksi gagal
                    exit("PDO Error: " . $e->getMessage() . "<br>");
                }
                ?>
            </tbody>
        </table>
        <!-- Link untuk menambahkan data baru -->
        <a id="newData" href="php10E.php">Tambah</a>
    </div>
</body>

</html>