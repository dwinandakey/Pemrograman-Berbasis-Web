<?php
// Memulai sesi
session_start();

// Fungsi untuk menghancurkan sesi dan data
function destroy_session_and_data()
{
    // Menghapus semua variabel sesi
    session_unset();

    // Jika session_id tidak kosong atau jika ada cookie sesi yang terdaftar
    if (session_id() != "" || isset($_COOKIE[session_name()])) {
        // Mengatur ulang cookie sesi dengan waktu kedaluwarsa yang sudah lewat
        // Komentar ini menunjukkan cara menghapus cookie dengan mengatur waktu kedaluwarsa di masa lalu
        // setcookie(
        //     session_name(),
        //     session_id(),
        //     time() - 2592000,
        //     '/'
        // );

        // Mengatur cookie sesi dengan waktu kedaluwarsa di masa depan (menambah waktu 30 hari)
        setcookie(session_name(), session_id(), time() + 2592000, '/');
    }

    // Menghancurkan sesi
    session_destroy();
}

// Fungsi untuk menghitung jumlah permintaan halaman oleh pengguna
function count_requests()
{
    // Jika variabel sesi 'requests' belum diset, inisialisasi dengan nilai 1
    if (!isset($_SESSION['requests'])) {
        $_SESSION['requests'] = 1;
    } else {
        // Jika variabel sesi 'requests' sudah diset, tambahkan 1
        $_SESSION['requests']++;
    }

    // Mengembalikan nilai dari variabel sesi 'requests'
    return $_SESSION['requests'];
}
?>