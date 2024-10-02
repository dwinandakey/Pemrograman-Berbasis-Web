<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form Data Golongan Darah</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #2C4E80;
    }

    main {
      border: 1px solid #ccc;
      padding: 15px;
      border-radius: 10px;
      background-color: #f9f9f9;
      position: relative;
      box-shadow: 0px 0px 20px 1px rgba(2, 2, 2, 2);

    }

    form {
      text-align: left;
      padding: 10px 15px 90px 15px;
      position: relative;
    }

    table {
      margin: auto;
    }

    h2 {
      padding: 10px 20px 10px 20px;
      text-align: center;

    }

    label {
      display: block;
      margin-bottom: 5px;
      padding-right: 20px;
    }

    input[type="text"],
    input[type="tel"],
    select,
    textarea {
      width: 100%;
      padding: 8px;
      margin-top: 3px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }


    .radio-container {
      display: inline-block;
      vertical-align: middle;
      margin-right: 2px;
      margin-top: 3px;
      margin-bottom: 10px;
    }

    .radio-container label {
      display: inline;
    }


    button {
      padding: 10px 20px;
      margin: 20px 15px;
      border: none;
      border-radius: 5px;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      position: absolute;
      right: 5px;
    }

    button:hover {
      background-color: #0056b3;
    }

    .lihat-data-button {
      position: absolute;
      text-decoration: none;
      bottom: 55px;
      left: 15px;
      padding: 10px 5px 2px;
      color: blue;
      margin-left: 13px;
      border-bottom: 2px solid;

    }

    .lihat-data-button:hover {
      border-color: red;
      color: red;
    }
  </style>
</head>

<body>

  <main>

    <form method="post" enctype="application/x-www-form-urlencoded"
      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <h2>DATA GOLONGAN DARAH</h2>
      <table>
        <tr>
          <td><label for="nama">Nama</label></td>
          <td><input type="text" id="nama" name="nama"
              value="<?php if (isset($_POST['nama']))
                echo htmlspecialchars($_POST['nama']); ?>" /></td>
        </tr>
        <tr>
          <td><label for="goldar">Golongan Darah</label></td>
          <td>
            <select id="goldar" name="goldar">
              <option value="" disabled selected>Select</option>
              <option value="A+" <?php if (isset($_POST['goldar']) && $_POST['goldar'] == 'A+')
                echo 'selected'; ?>>A+
              </option>
              <option value="A-" <?php if (isset($_POST['goldar']) && $_POST['goldar'] == 'A-')
                echo 'selected'; ?>>A-
              </option>
              <option value="B+" <?php if (isset($_POST['goldar']) && $_POST['goldar'] == 'B+')
                echo 'selected'; ?>>B+
              </option>
              <option value="B-" <?php if (isset($_POST['goldar']) && $_POST['goldar'] == 'B-')
                echo 'selected'; ?>>B-
              </option>
              <option value="O" <?php if (isset($_POST['goldar']) && $_POST['goldar'] == 'O')
                echo 'selected'; ?>>O
              </option>
              <option value="AB" <?php if (isset($_POST['goldar']) && $_POST['goldar'] == 'AB')
                echo 'selected'; ?>>AB
              </option>
            </select>
          </td>
        </tr>
        <tr>
          <td><label id="alamat" for="alamat">Alamat Indekos</label></td>
          <td><textarea id="alamat" name="alamat"
              value="<?php if (isset($_POST['alamat']))
                echo htmlspecialchars($_POST['alamat']); ?>"></textarea></td>

        </tr>
        <tr>
          <td><label for="kontak">No. HP</label></td>
          <td>
            <input type="tel" id="kontak" name="kontak" pattern="(62)[0-9]{5-20}"
              value="<?php if (isset($_POST['kontak']))
                echo htmlspecialchars($_POST['kontak']); ?>" />
          </td>

        </tr>
        <tr>
          <td><label>Gender</label></td>
          <td class="radio-container">
            <input type="radio" id="genderL" name="gender" value="Laki-Laki" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'Laki-Laki')
              echo 'selected'; ?> />
            <label for="genderL">Laki-Laki</label>
          </td>
          <td class="radio-container">
            <input type="radio" id="genderP" name="gender" value="Perempuan" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'Perempuan')
              echo 'selected'; ?> />
            <label for="genderP">Perempuan</label>
          </td>
        </tr>
      </table>

      <?php
      // Membuat koneksi ke database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "pbwkelompok";

      // Membuat koneksi
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Memeriksa koneksi
      if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
      }

      // Fungsi untuk memeriksa apakah string hanya mengandung huruf
      function isAllLetters($str)
      {
        return preg_match('/^[A-Za-z\s]+$/', $str);
      }

      // Fungsi untuk memeriksa apakah string hanya mengandung angka
      function isAllNumbers($str)
      {
        return preg_match('/^[0-9]+$/', $str);
      }


      // Fungsi untuk memvalidasi blood_type
      function isValidBloodType($blood_type)
      {
        // Daftar golongan darah yang valid
        $valid_types = array("A+", "A-", "B+", "B-", "O", "AB");

        // Memeriksa apakah jenis tiket yang dipilih termasuk dalam daftar valid
        return in_array($blood_type, $valid_types);
      }

      // Fungsi untuk memvalidasi blood_type
      function isValidGender($gender_type)
      {
        // Daftar golongan darah yang valid
        $valid_types = array("Laki-Laki", "Perempuan");

        // Memeriksa apakah jenis tiket yang dipilih termasuk dalam daftar valid
        return in_array($gender_type, $valid_types);
      }

      // Memeriksa apakah form telah disubmit
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = []; // Array untuk menyimpan pesan kesalahan
      
        // Memeriksa nama
        $nama = $_POST["nama"];
        if (empty($nama)) {
          $errors[] = "Nama harus diisi";
        } elseif (strlen($nama) > 50) {
          $errors[] = "Nama maksimal 50 karakter";
        } elseif (!isAllLetters($nama)) {
          $errors[] = "Nama hanya boleh mengandung huruf";
        }

        // Memeriksa alamat
        $alamat = $_POST["alamat"];
        if (empty($alamat)) {
          $errors[] = "Alamat harus diisi";
        } elseif (strlen($alamat) > 100) {
          $errors[] = "Alamat maksimal 100 karakter";
        }



        // Memeriksa nomor telepon
        $kontak = $_POST["kontak"];
        if (empty($kontak)) {
          $errors[] = "Nomor telepon harus diisi";
        } elseif (!isAllNumbers($kontak)) {
          $errors[] = "Nomor telepon hanya boleh angka";
        } elseif (strlen($kontak) < 10 || strlen($kontak) > 12) {
          $errors[] = "Nomor telepon harus terdiri dari 10 hingga 12 digit";
        }

        // Memeriksa pilih goldar
        $goldar = isset($_POST["goldar"]) ? $_POST["goldar"] : '';
        if (empty($goldar)) {
          $errors[] = "Harus memilih Golongan Darah terlebih dahulu";
        } elseif (!isValidBloodType($goldar)) {
          $errors[] = "Golongan Darah yang dipilih tidak valid";
        }

        // Memeriksa pilih jenis kelamin
        $gender = isset($_POST["gender"]) ? $_POST["gender"] : '';
        if (empty($gender)) {
          $errors[] = "Harus memilih gender terlebih dahulu";
        } elseif (!isValidGender($gender)) {
          $errors[] = "Gender yang dipilih tidak valid";
        }







        // Jika tidak ada kesalahan, lanjutkan dengan pemrosesan formulir
        if (empty($errors)) {
          // Mengambil nilai dari formulir
          $nama = $_POST["nama"];
          $alamat = $_POST["alamat"];
          $kontak = $_POST["kontak"];
          $goldar = $_POST["goldar"];
          $gender = $_POST["gender"];


          // SQL untuk menyimpan data ke dalam tabel
          if (preg_match("[\d]", $kontak) && $nama != null && $alamat != null) {
            $sql = "INSERT INTO mahasiswa (nama, goldar, alamat, kontak, gender)VALUES ('$nama', '$goldar', '$alamat', '$kontak', '$gender')";
            if ($conn->query($sql) === TRUE) {
              echo "<script>alert('Pendataan berhasil!');</script>";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
          } else {
            echo '<script>window.alert("Data tidak valid, Ada yang salah ni")</script>';
          }

          // Menutup koneksi
          $conn->close();
        } else {
          // Tampilkan pesan kesalahan jika ada
          echo "<div class='error-container'><ul>";
          foreach ($errors as $error) {
            echo "<li style='color:red;'>$error</li>";
          }
          echo "</ul></div>";
        }
      }
      ?>

      <button id="simpan" type="submit">SIMPAN</button>
    </form>
    <a class="lihat-data-button" href="tampil.php">Lihat Data</a>
  </main>
</body>

</html>