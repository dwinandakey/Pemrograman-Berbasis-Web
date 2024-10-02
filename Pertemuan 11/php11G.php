<!DOCTYPE html>
<html lang="en-GB">

<head>
    <title>PHP11 G</title>
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

        /* CSS untuk kontainer */
        .container {
            width: 50%;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
        }

        /* CSS untuk judul */
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* CSS untuk label */
        label {
            display: block;
            margin-bottom: 5px;
        }

        /* CSS untuk input fields */
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* CSS untuk tombol submit */
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            display: block;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php
    // Memulai sesi
    session_start();
    // Memeriksa apakah pengguna sudah login, jika tidak arahkan ke halaman login
    if (!isset($_SESSION['username'])) {
        header("Location: php11D.php");
        exit();
    }
    // Menyertakan file header untuk navigasi
    include ('php11F_header.php');
    ?>
    <div class="container">
        <h1>Edit Data Meetings</h1>
        <?php
        // Konfigurasi database
        $db_hostname = "localhost"; // Nama server database
        $db_database = "pbw10"; // Nama database
        $db_username = "root"; // Username database
        $db_password = ""; // Password database
        $db_charset = "utf8mb4"; // Karakter set (opsional)
        
        // Konfigurasi PDO
        $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        );

        try {
            // Membuat koneksi PDO
            $pdo = new PDO($dsn, $db_username, $db_password, $opt);

            // Mengambil data dari database berdasarkan slot yang diberikan
            $stmt = $pdo->prepare("SELECT * FROM meetings WHERE slot=?");
            $stmt->execute([$_GET["slot"]]);
            $row = $stmt->fetch();
            $pdo = NULL;

            // Mengecek apakah data ditemukan
            if (!$row) {
                echo "<p>Data tidak ditemukan</p>";
            } else {
                ?>
                <!-- Formulir untuk mengedit data -->
                <form action="php11G_action.php" method="POST">
                    <!-- Menyimpan slot asli sebagai hidden input -->
                    <input type="hidden" name="original_slot" value="<?php echo $row["slot"]; ?>">
                    <label for="slot">Slot</label>
                    <input type="text" id="slot" name="slot" value="<?php echo $row["slot"]; ?>" required>

                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo $row["name"]; ?>" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo $row["email"]; ?>" required>

                    <input type="submit" value="Update">
                </form>
                <?php
            }
        } catch (PDOException $e) {
            // Menampilkan pesan error jika koneksi atau query gagal
            exit("PDO Error: " . $e->getMessage() . "<br>");
        }
        ?>
    </div>
</body>

</html>