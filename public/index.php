<!-- Memanggil sebuah file di folder app -->
<?php
  // kita jalankan sessionnya disini
  // jika tidak terdeteksi ada session id
  // if ( !session_id() ) {
  //   session_start();
  // }

  require_once '../app/init.php';
  // init akan memanggil semua file yg dibutuhkan
  // teknik ini = bootstraping
  // memanggil 1 file nanti akan memanggil seluruh app mvcnya

  // inisialisasi
  $app = new App(); // menjalankan kelas App

?>
