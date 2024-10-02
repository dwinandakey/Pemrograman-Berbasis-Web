<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>Edit Meeting</title>
    <style>
        /* CSS untuk tata letak umum */
        body {
            font-family: Arial, sans-serif;
            font-size: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f9f9f9;
        }

        /* CSS untuk kontainer */
        .container {
            width: 50%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        /* CSS untuk judul */
        h1 {
            text-align: center;
        }

        /* CSS untuk label */
        label {
            display: inline-block;
            width: 100px;
            margin-bottom: 10px;
        }

        /* CSS untuk input */
        input[type="text"],
        input[type="email"] {
            padding: 8px;
            width: calc(100% - 100px);
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* CSS untuk tombol submit */
        input[type="submit"] {
            padding: 10px 20px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: blue;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Data Meetings</h1>
        <?php
        // Konfigurasi database
        $db_hostname = "localhost"; // Nama server database
        $db_database = "pbw09"; // Nama database
        $db_username = "root"; // Username database
        $db_password = ""; // Password database
        $db_charset = "utf8mb4"; // Karakter set (opsional)

        // PDO configuration
        $dsn ="mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        );

        try {
            // Membuat koneksi PDO
            $pdo = new PDO($dsn,$db_username,$db_password,$opt);

            // Mengambil data dari database berdasarkan slot yang diberikan
            $stmt = $pdo->prepare("SELECT * FROM meetings WHERE slot=?");
            $stmt->execute([$_GET["slot"]]);
            $row = $stmt->fetch();
            $pdo = NULL;

            // Mengecek apakah data ditemukan
            if(!$row){
                echo "<p>Data tidak ditemukan</p>";
            }
            else{
                ?>
                    <!-- Formulir untuk mengedit data -->
                    <form action="php09G_action.php" method="POST">
                        <label for="slot">Slot</label>
                        <input type="text" id="slot" name="slot" value="<?php echo $row["slot"]; ?>" required><br>

                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $row["name"]; ?>" required><br>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $row["email"]; ?>" required><br>

                        <input type="submit" value="Update">
                    </form>
                <?php
            }
        } catch (PDOException $e) {
            exit("PDO Error: ".$e->getMessage()."<br>");
        }
        ?>
    </div>
</body>
</html>
