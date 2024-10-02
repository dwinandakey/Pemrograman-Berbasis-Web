<!DOCTYPE html>
<html lang='en-GB'>

<head>
    <title>PHP09 F</title>
    <style>
        /* CSS untuk styling judul, tombol tambah, dan tabel */
        body {
            font-size: 20px;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        /* Styling untuk link tambah data */
        #newData {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
            margin: 0 auto;
            /* Memposisikan ke tengah */
            display: block;
            /* Membuat link menjadi blok agar bisa diatur lebar dan posisi tengah */
            width: fit-content;
            /* Menyesuaikan lebar dengan isi */
        }

        /* Efek hover pada link tambah data */
        #newData:hover {
            background-color: #0056b3;
            color: #fff;
        }

        /* Styling untuk kontainer tombol edit dan delete */
        .buttonContainer {
            display: flex;
            align-items: center;
            /* Pusatkan tombol pada vertikal */
        }

        /* Styling untuk tombol edit */
        .editButton,
        .deleteButton {
            background-color: transparent;
            border: none;
            padding: 10px;
            /* Ubah ukuran tombol */
            cursor: pointer;
            margin-right: 5px;
            transition: color 0.3s;
        }

        /* Styling untuk gambar di tombol edit dan delete */
        .editButton img,
        .deleteButton img {
            width: 20px;
            height: 20px;
            margin-right: 5px;
            vertical-align: middle;
        }

        /* Efek hover pada tombol edit dan delete */
        .editButton:hover,
        .deleteButton:hover {
            color: #007bff;
        }

        /* Styling untuk tabel */
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            border: 2px solid black;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }
    </style>
</head>

<body>
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
            $db_database = "pbw09"; // Nama database
            $db_username = "root"; // Username database
            $db_password = ""; // Password database
            $db_charset = "utf8mb4"; // Optional
            
            // PDO configuration
            $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
            $opt = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            );

            try {
                // Mendapatkan data dari database dan menampilkannya dalam tabel
                $pdo = new PDO($dsn, $db_username, $db_password, $opt);
                $stmt = $pdo->query("SELECT * FROM meetings ORDER BY slot");
                while ($row = $stmt->fetch()) {
                    echo "<tr>
                    <td>" . $row["slot"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td class='buttonContainer'>
                    <a href='php09G.php?slot=", $row["slot"], "'><img src='edit.png' style='width:50px;height:50px;' alt='Edit'></a><a
                    href='php09H.php?slot=", $row["slot"], "'><img src='delete.png' style='width:50px;height:50px;' alt='Delete'></a>
                    </td>
                    </tr>";
                }
                $pdo = NULL;
            } catch (PDOException $e) {
                exit("PDO Error: " . $e->getMessage() . "<br>");
            }
            ?>
        </tbody>
    </table>
    <br>
    <!-- Link untuk menambahkan data baru -->
    <a id="newData" href="php09E.php">Tambah</a>
    <br>
</body>

</html>