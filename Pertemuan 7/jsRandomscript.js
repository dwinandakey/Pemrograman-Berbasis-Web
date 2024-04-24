// Fungsi untuk menghasilkan angka acak pada sel yang diklik
function randomize(number) {
  // Mendapatkan nilai maksimum dari input
  var maxLimit = parseInt(document.getElementById("maxLimit").value);
  // Menghasilkan angka acak antara 1 dan nilai maksimum
  var hasil = Math.floor(Math.random() * maxLimit + 1);
  // Mengubah teks di dalam sel yang diklik menjadi angka acak
  document.getElementById(number.id).innerHTML = hasil;
}

// Fungsi untuk menghitung jumlah, rata-rata, dan median dari nilai-nilai pada sel
function calculate() {
  var values = []; // Array untuk menyimpan nilai-nilai
  var sum = 0; // Variabel untuk menampung total sum

  // Mengumpulkan nilai dari setiap sel ke dalam array values dan menghitung total sum
  for (let i = 0; i < 9; i++) {
    var cellValue = parseInt(
      document.getElementById(String.fromCharCode(97 + i)).innerHTML
    );
    values.push(cellValue); // Menambahkan nilai ke dalam array values
    sum += cellValue; // Menambahkan nilai ke total sum
  }

  // Menghitung rata-rata dari nilai-nilai
  var average = sum / 9;
  // Menampilkan total dan rata-rata di bawah tabel
  document.getElementById("total").innerText = "Jumlah: " + sum;
  document.getElementById("average").innerText =
    "Rata-rata: " + average.toFixed(2);

  // Mengurutkan nilai-nilai dan mencari median
  var sortedValues = values.slice().sort((a, b) => a - b);
  var median = sortedValues[4];
  // Menampilkan median di bawah tabel
  document.getElementById("median").innerText = "Median: " + median;
}

// Fungsi untuk menghasilkan angka acak pada semua sel
function randomizeAll() {
  // Mendapatkan nilai maksimum dari input
  var maxLimit = parseInt(document.getElementById("maxLimit").value);
  // Menghasilkan angka acak untuk setiap sel dan mengubah teks di dalamnya
  for (let i = 1; i <= 9; i++) {
    var hasil = Math.floor(Math.random() * maxLimit + 1);
    document.getElementById(String.fromCharCode(96 + i)).innerHTML = hasil;
  }
}

// Mendengarkan perubahan pada input untuk memastikan nilai maksimum tidak melebihi 1000
document.getElementById("maxLimit").addEventListener("input", function () {
  if (parseInt(this.value) > 1000) {
    this.value = 1000;
  }
});
