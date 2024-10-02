<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 11A</title>
    <style>
        /* Gaya untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Gaya untuk header tabel */
        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        /* Gaya untuk baris header */
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <?php
    // Mengambil data dari API
    $data = file_get_contents("https://reqres.in/api/users?page=1");
    // Menampilkan data mentah yang diterima dari API
    var_dump($data);
    // Menguraikan data JSON menjadi array asosiatif PHP
    $parse_data = json_decode($data, true);
    // $parse_data = json_decode($data);
    echo "<br /><br />";
    // Menampilkan data yang telah diuraikan
    var_dump($parse_data);

    // Memeriksa apakah data pengguna ada dalam respons
    if (isset($parse_data['data'])) {
        // Membuat tabel untuk menampilkan data pengguna
        echo "<table>";
        echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Avatar</th></tr>";

        // Loop melalui setiap pengguna dalam data
        foreach ($parse_data['data'] as $user) {
            echo "<tr>";
            echo "<td>" . $user['id'] . "</td>";
            echo "<td>" . $user['first_name'] . "</td>";
            echo "<td>" . $user['last_name'] . "</td>";
            echo "<td>" . $user['email'] . "</td>";
            echo "<td><img src='" . $user['avatar'] . "' alt='Avatar' width='50' height='50'></td>";
            echo "</tr>";
        }

        // Menutup tag tabel
        echo "</table>";
    } else {
        echo "No user data found.";
    }
    ?>
</body>

</html>