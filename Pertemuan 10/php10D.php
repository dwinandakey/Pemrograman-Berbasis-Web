<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Gaya untuk body, mengatur font, background, dan posisi */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Gaya untuk kontainer form */
        .form-container {
            background-color: #ffffff;
            max-width: 600px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
        }

        /* Gaya untuk tabel, mengatur lebar dan border */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Gaya untuk sel tabel, mengatur padding */
        td {
            padding: 10px;
        }

        /* Gaya untuk label, mengatur font weight */
        label {
            font-weight: bold;
        }

        /* Gaya untuk input teks dan password */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Gaya untuk tombol submit */
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Gaya untuk tombol submit saat hover */
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <title>Login Form</title>
</head>

<body>
    <!-- Kontainer untuk form login -->
    <div class="form-container">
        <!-- Form login, mengirim data ke php10D_action.php menggunakan metode POST -->
        <form action="php10D_action.php" method="post">
            <table>
                <tr>
                    <!-- Baris untuk input username -->
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" id="username" name="username" required></td>
                </tr>
                <tr>
                    <!-- Baris untuk input password -->
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" id="password" name="password" required></td>
                </tr>
                <tr>
                    <!-- Baris untuk tombol submit, menggabungkan dua kolom -->
                    <td colspan="2"><input type="submit" value="Login"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>