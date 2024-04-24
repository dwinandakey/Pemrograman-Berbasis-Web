function hitungBiaya() {
  // Mendapatkan nilai jenis kendaraan dari elemen dengan id "jenisKendaraan"
  var jenisKendaraan = document.getElementById("jenisKendaraan").value;
  
  // Mendapatkan nilai jam masuk dari elemen dengan id "jamMasuk" dan mengonversinya ke tipe data integer
  var jamMasuk = parseInt(document.getElementById("jamMasuk").value);
  
  // Mendapatkan nilai menit masuk dari elemen dengan id "menitMasuk" dan mengonversinya ke tipe data integer
  var menitMasuk = parseInt(document.getElementById("menitMasuk").value);
  
  // Mendapatkan nilai jam keluar dari elemen dengan id "jamKeluar" dan mengonversinya ke tipe data integer
  var jamKeluar = parseInt(document.getElementById("jamKeluar").value);
  
  // Mendapatkan nilai menit keluar dari elemen dengan id "menitKeluar" dan mengonversinya ke tipe data integer
  var menitKeluar = parseInt(document.getElementById("menitKeluar").value);
    
     // Validasi input waktu
     if (isNaN(jamMasuk) || isNaN(menitMasuk) || isNaN(jamKeluar) || isNaN(menitKeluar) ||
     jamMasuk < 0 || jamMasuk > 23 || menitMasuk < 0 || menitMasuk > 59 ||
     jamKeluar < 0 || jamKeluar > 23 || menitKeluar < 0 || menitKeluar > 59) {
     alert("Mohon masukkan waktu masuk dan keluar yang valid.");
     return; // Keluar dari fungsi jika waktu tidak valid
 }
    
    // Konversi waktu masuk dan waktu keluar ke dalam jam
var waktuMasuk = jamMasuk + (menitMasuk / 60);
var waktuKeluar = jamKeluar + (menitKeluar / 60);

// Hitung lama parkir
var lamaParkir;
if (waktuKeluar < waktuMasuk) {
    // Jika waktu keluar lebih kecil dari waktu masuk, artinya melewati rentang jam tengah malam
    lamaParkir = (24 - waktuMasuk) + waktuKeluar;
} else {
    // Jika waktu keluar tidak melewati rentang jam tengah malam
    lamaParkir = waktuKeluar - waktuMasuk;
}

   // Membulatkan lama parkir menjadi jam dan menit
var lamaParkirJam = Math.floor(lamaParkir); // Mengambil bagian integer (jam) dari lama parkir
var lamaParkirMenit = (lamaParkir - lamaParkirJam) * 60; // Mengambil bagian desimal (menit) dan mengonversinya ke dalam menit

// Tarif parkir berdasarkan jenis kendaraan
var tarifParkir = {
    "sepeda": 1000, // Tarif parkir untuk sepeda
    "motor": 2000, // Tarif parkir untuk motor
    "mobil": 5000, // Tarif parkir untuk mobil
    "bus": 10000 // Tarif parkir untuk bus
};


    var biayaParkir = Math.ceil(lamaParkir) * tarifParkir[jenisKendaraan];
    
    document.getElementById("hasil").innerHTML = "Anda parkir selama " + lamaParkirJam +" jam "+lamaParkirMenit.toFixed(0) +" menit. Total biaya parkir: Rp " + biayaParkir.toFixed(2);
  }