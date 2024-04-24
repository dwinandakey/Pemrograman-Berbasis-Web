for (var ii = 4, jj = 3; jj >= 0; ii++, jj--) {
  // Menampilkan hasil perkalian dan pembagian ii dengan jj
  document.writeln(ii + " * " + jj + " = " + (ii * jj).toFixed(3) + "<br>");
  document.writeln(ii + " / " + jj + " = " + (ii / jj).toFixed(3) + "<br>");

  // Menampilkan logaritma dan akar kuadrat dari nilai jj
  document.writeln("log(" + jj + ") = " + Math.log(jj).toFixed(3) + "<br>");
  document.writeln(
    "sqrt(" + (jj - 1) + ") = " + Math.sqrt(jj - 1).toFixed(3) + "<br><br>"
  );

  // Membandingkan dua nilai x dan y
  x = 1.275;
  y = 1.2749999999999999118;
  document.writeln(
    x + " and " + y + " are " + (x == y ? "equal" : "not equal") + "<br>"
  );

  /* Meskipun pernyataan di atas benar, namun ada yang aneh terjadi pada nilai variabel y.
  Nilai variabel y mengalami pembulatan sehingga tercetak sebagai 1.275.
  Hal ini disebabkan oleh representasi angka pecahan dalam JavaScript, yang menggunakan
  sistem floating point double-precision sesuai dengan standar IEEE 754.
  Karena batasan 64-bit (17 digit angka), beberapa angka akan dibulatkan saat memiliki
  lebih dari 17 digit. Oleh karena itu, baik 1.275 dan 1.27499999999999991118 memiliki
  representasi yang sama dalam IEEE 754. */
}
