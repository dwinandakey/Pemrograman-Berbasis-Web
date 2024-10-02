<!DOCTYPE html>
<html lang='en-GB'>

<head>
    <title>PHP09 D</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1,
        h2 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            /* Memposisikan tabel ke tengah halaman */
            border: 2px solid black;
            /* Mengatur warna border tabel */
            padding: 10px;
            /* Menambahkan padding agar konten tetap terlihat rapi */
        }

        th,
        td {
            padding: 10px;
            border: 1px solid black;
            /* Mengatur warna border untuk sel tabel */
        }

        th {
            background-color: #333;
            color: white;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>PHP and Databases</h1>
    <?php
    // Database configuration
    $db_hostname = "localhost"; // Server database
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
        // Connect to the database
        $pdo = new PDO($dsn, $db_username, $db_password, $opt);

        // Display data using a while loop
        echo "<h2 style='text-align:center;'>Data in meeting table (While loop)</h2>\n";
        $stmt = $pdo->query("SELECT * FROM meetings");
        echo "<p style='text-align:center;'>Rows retrieved: " . $stmt->rowcount() . "</p><br>\n";

        echo "<table>\n";
        echo "<tr><th>Slot</th><th>Name</th><th>Email</th></tr>\n";
        while ($row = $stmt->fetch()) {
            echo "<tr><td>" . $row["slot"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td></tr>\n";
        }
        echo "</table><br><br>\n";

        // Display data using a foreach loop
        echo "<h2 style='text-align:center;'>Data in meeting table (Foreach loop)</h2>\n";
        $stmt = $pdo->query("SELECT * FROM meetings");
        echo "<p style='text-align:center;'>Rows retrieved: " . $stmt->rowcount() . "</p><br>\n";

        echo "<table>\n";
        echo "<tr><th>Slot</th><th>Name</th><th>Email</th></tr>\n";
        foreach ($stmt as $row) {
            echo "<tr><td>" . $row["slot"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td></tr>\n";
        }
        echo "</table>\n";

        // Close the database connection
        $pdo = NULL;
    } catch (PDOException $e) {
        // Handle PDO exceptions
        exit("PDO Error: " . $e->getMessage() . "<br>");
    }
    ?>
</body>

</html>