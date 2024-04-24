// Fungsi untuk mengkonversi suhu
function temperature() {
  // Ambil nilai input dari pengguna
  let inputValue = parseFloat(document.getElementById("inputValue").value);
  let type1 = document.getElementById("type1").value; // Jenis suhu awal
  let type2 = document.getElementById("type2").value; // Jenis suhu tujuan
  let result;

  // Validasi input
  if (isNaN(inputValue)) {
    alert("Please enter temperature as a number."); // Tampilkan pesan kesalahan jika input tidak valid
    return; // Hentikan eksekusi jika input tidak valid
  } else if (type1 === "celcius") {
    // Konversi dari Celcius ke jenis suhu lainnya
    if (type2 === "fahrenheit") {
      result = (inputValue * 9) / 5 + 32;
      document.getElementById(
        "result"
      ).innerText = `${inputValue}°C is equal to ${result.toFixed(2)}°F`;
    } else if (type2 === "kelvin") {
      // Konversi dari Celcius ke Kelvin
      result = inputValue + 273.15;
      document.getElementById(
        "result"
      ).innerText = `${inputValue}°C is equal to ${result.toFixed(2)} K`;
    } else if (type2 === "reaumur") {
      // Konversi dari Celcius ke Reaumur
      result = (inputValue * 4) / 5;
      document.getElementById(
        "result"
      ).innerText = `${inputValue}°C is equal to ${result.toFixed(2)}°Re`;
    } else if (type2 === "rankine") {
      // Konversi dari Celcius ke Rankine
      result = ((inputValue + 273.15) * 9) / 5;
      document.getElementById(
        "result"
      ).innerText = `${inputValue}°C is equal to ${result.toFixed(2)}°R`;
    } else {
      result = inputValue;
    }
  } else if (type1 === "fahrenheit") {
    // Konversi dari Fahrenheit ke jenis suhu lainnya
    if (type2 === "celcius") {
      // Konversi dari Fahrenheit ke Celcius
      result = ((inputValue - 32) * 5) / 9;
      document.getElementById(
        "result"
      ).innerText = `${inputValue}°F is equal to ${result.toFixed(2)}°C`;
    } else if (type2 === "kelvin") {
      // Konversi dari Fahrenheit ke Kelvin
      result = ((inputValue - 32) * 5) / 9 + 273.15;
      document.getElementById(
        "result"
      ).innerText = `${inputValue}°F is equal to ${result.toFixed(2)} K`;
    } else if (type2 === "reaumur") {
      // Konversi dari Fahrenheit ke Reaumur
      result = ((inputValue - 32) * 4) / 9;
      document.getElementById(
        "result"
      ).innerText = `${inputValue}°F is equal to ${result.toFixed(2)}°Re`;
    } else if (type2 === "rankine") {
      // Konversi dari Fahrenheit ke Rankine
      result = inputValue + 459.67;
      document.getElementById(
        "result"
      ).innerText = `${inputValue}°F is equal to ${result.toFixed(2)}°R`;
    } else {
      result = inputValue;
    }
  } else if (type1 === "kelvin") {
    // Konversi dari Kelvin ke jenis suhu lainnya
    if (type2 === "celcius") {
      // Konversi dari Kelvin ke Celcius
      result = inputValue - 273.15;
      document.getElementById(
        "result"
      ).innerText = `${inputValue} K is equal to ${result.toFixed(2)}°C`;
    } else if (type2 === "fahrenheit") {
      // Konversi dari Kelvin ke Fahrenheit
      result = ((inputValue - 273.15) * 9) / 5 + 32;
      document.getElementById(
        "result"
      ).innerText = `${inputValue} K is equal to ${result.toFixed(2)}°F`;
    } else if (type2 === "reaumur") {
      // Konversi dari Kelvin ke Reaumur
      result = ((inputValue - 273.15) * 4) / 5;
      document.getElementById(
        "result"
      ).innerText = `${inputValue} K is equal to ${result.toFixed(2)}°Re`;
    } else if (type2 === "rankine") {
      // Konversi dari Kelvin ke Rankine
      result = (inputValue * 9) / 5;
      document.getElementById(
        "result"
      ).innerText = `${inputValue} K is equal to ${result.toFixed(2)}°R`;
    } else {
      result = inputValue;
    }
  } else if (type1 === "reaumur") {
    // Konversi dari Reaumur ke jenis suhu lainnya
    if (type2 === "celcius") {
      // Konversi dari Reaumur ke Celcius
      result = (inputValue * 5) / 4;
      document.getElementById(
        "result"
      ).innerText = `${inputValue}°Re is equal to ${result.toFixed(2)}°C`;
    } else if (type2 === "fahrenheit") {
      // Konversi dari Reaumur ke Fahrenheit
      result = (inputValue * 9) / 4 + 32;
      document.getElementById(
        "result"
      ).innerText = `${inputValue}°Re is equal to ${result.toFixed(2)}°F`;
    } else if (type2 === "kelvin") {
      // Konversi dari Reaumur ke Kelvin
      result = (inputValue * 5) / 4 + 273.15;
      document.getElementById(
        "result"
      ).innerText = `${inputValue}°Re is equal to ${result.toFixed(2)} K`;
    } else if (type2 === "rankine") {
      // Konversi dari Reaumur ke Rankine
      result = (inputValue * 5) / 4 + (273.15 * 9) / 5;
      document.getElementById(
        "result"
      ).innerText = `${inputValue}°Re is equal to ${result.toFixed(2)}°R`;
    } else {
      result = inputValue;
    }
  } else if (type1 === "rankine") {
    // Konversi dari Rankine ke jenis suhu lainnya
    if (type2 === "celcius") {
      // Konversi dari Rankine ke Celcius
      result = ((inputValue - 491.67) * 5) / 9;
      document.getElementById(
        "result"
      ).innerText = `${inputValue}°R is equal to ${result.toFixed(2)}°C`;
    } else if (type2 === "fahrenheit") {
      // Konversi dari Rankine ke Fahrenheit
      result = inputValue - 459.67;
      document.getElementById(
        "result"
      ).innerText = `${inputValue}°R is equal to ${result.toFixed(2)}°F`;
    } else if (type2 === "kelvin") {
      // Konversi dari Rankine ke Kelvin
      result = (inputValue * 5) / 9;
      document.getElementById(
        "result"
      ).innerText = `${inputValue}°R is equal to ${result.toFixed(2)} K`;
    } else if (type2 === "reaumur") {
      // Konversi dari Rankine ke Reaumur
      result = ((inputValue - 491.67) * 4) / 9;
      document.getElementById(
        "result"
      ).innerText = `${inputValue}°R is equal to ${result.toFixed(2)}°Re`;
    } else {
      result = inputValue;
    }
  } else if (type1 === type2) {
    // Jika jenis suhu awal dan tujuan sama
    result = inputValue;
    // Tampilkan hasil tanpa melakukan konversi
    document.getElementById("result").innerText = `${inputValue}${getSymbol(
      type1
    )} is equal to ${result.toFixed(2)}${getSymbol(type2)}`;
  } else {
    result = inputValue;
  }
}

// Fungsi untuk membersihkan input dan hasil
function clearFields() {
  document.getElementById("inputValue").value = ""; // Kosongkan input nilai
  document.getElementById("result").innerText = ""; // Kosongkan hasil konversi
}

// Event listener untuk memanggil fungsi validasi input saat halaman dimuat
window.onload = function () {
  document
    .getElementById("inputValue")
    .addEventListener("input", validateInput);
};

// Fungsi untuk memvalidasi input
function validateInput() {
  var inputValue = document.getElementById("inputValue").value;
  if (inputValue === "") {
    alert("Please enter temperature as a number."); // Tampilkan pesan kesalahan jika input kosong
    location.reload(); // Muat ulang halaman jika input kosong
  }
}
