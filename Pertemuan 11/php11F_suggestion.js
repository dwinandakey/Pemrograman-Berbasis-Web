function showHint(str) {
    if (str.length == 0) {
        // Code 4a: Handle case input kosong
        // Jika input kosong, set innerHTML elemen txtHint menjadi kosong
        document.getElementById("txtHint").innerHTML = "";
        return; // Hentikan eksekusi fungsi
    }
    var xhttp = new XMLHttpRequest(); // Buat objek XMLHttpRequest baru
    xhttp.onreadystatechange = function() {
        // Fungsi ini akan dipanggil setiap kali state berubah
        if (this.readyState == 4 && this.status == 200) {
            // Code 4b: Handle response from the server
            // Jika request selesai (readyState 4) dan sukses (status 200)
            var suggestions = JSON.parse(this.responseText); // Parse JSON response dari server
            var hint = ""; // Inisialisasi variabel hint untuk menyimpan saran
            for (var i = 0; i < suggestions.length; i++) {
                // Loop melalui setiap saran
                hint += suggestions[i].name + "<br>"; // Tambahkan nama saran ke hint, dipisahkan dengan <br>
            }
            document.getElementById("txtHint").innerHTML = hint; // Tampilkan hint di elemen txtHint
        }
    };
    xhttp.open("GET", "php11F_gethint.php?keyword=" + str, true); // Konfigurasi request GET dengan keyword sebagai parameter
    xhttp.send(); // Kirim request
}
