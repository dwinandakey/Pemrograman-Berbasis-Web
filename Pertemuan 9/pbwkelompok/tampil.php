<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <style>
        h2 {
            color: white;
            text-align: center;
        }

        html,
        body {
            height: 100%;
        }

        body {
            margin: 0;
            background: linear-gradient(45deg, #49a09d, #5f2c82);
            font-family: sans-serif;
            font-weight: 100;
        }

        .container {
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        table {
            width: 800px;
            border-collapse: collapse;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }

        th,
        td {
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            text-align: center;
        }

        th {
            text-align: center;
            background-color: #55608f;
        }

        tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        tbody td {
            position: relative;
        }

        tbody td:hover:before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: -9999px;
            bottom: -9999px;
            background-color: rgba(255, 255, 255, 0.2);
            z-index: -1;
        }
    </style>

</head>

<body>
    <h2>Data Golongan Darah Mahasiswa</h2>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Id</th>
            <th>Nama</th>
            <th>Gender</th>
            <th>Golongan Darah</th>
            <th>Alamat</th>
            <th>No Hp</th>
        </tr>




        <?php
        $db_hostname = "localhost"; // Write your own db server here
        $db_database = "pbwkelompok"; // Write your own db name here
        $db_username = "root"; // Write your own username here
        $db_password = ""; // Write your own password here. For the best practice, don't use your real password when submitting your work
        $db_charset = "utf8mb4"; // Optional
        $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        );
        try {
            $pdo = new PDO($dsn, $db_username, $db_password, $opt);
            $stmt = $pdo->query("select * from mahasiswa");
            $count = 0;
            foreach ($stmt as $row) {
                $count++;
                echo "<tr>";
                echo "<td> ", $count, "</td>";
                echo "<td> ", $row["id"], "</td>";
                echo "<td>", $row["nama"], "</td>";
                echo "<td>", $row["gender"], "</td>";
                echo "<td> ", $row["goldar"], "</td>";
                echo "<td> ", $row["alamat"], "</td>";
                echo "<td> ", $row["kontak"], "</td>";
                echo "</tr>";
            }
            $pdo = NULL;
        } catch (PDOException $e) {
            exit("PDO Error: " . $e->getMessage() . "<br>");
        }
        ?>
    </table>
</body>

</html>