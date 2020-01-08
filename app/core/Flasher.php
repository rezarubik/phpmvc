<?php
  // file ini nanti akan mengelola flash message dan menampilkannya.

  /**
   *
   */
  class Flasher{
    // akan membuat 2 method static supaya bisa memanggil methodnya tanpa harus instasiasi pada kelas Flasher ini.
    public static function setFlash($message, $action, $type){ // pesannya apa, dan aksi untuk generiknya, lalu kita akan menyimpan dari tipe kelas bootstrap mana yg akan dipake.
      // untuk menentukan pesan flashnya mau seperti apache_child_terminate
      // set dulu data flashnya ingin seperti apa. kita buat session array
      $_SESSION['flash'] = [
        'message' => $message,
        'action' => $action,
        'type' => $type
      ];
    }
    // method untuk melakukan flashnya atau menampilkan pesannya.
    public static function flash(){
      // kita cek dulu ada gak session flash yg udah kita set tadi
      if ( isset($_SESSION['flash']) ) {
        // kalau ada kita tampilkan pesannya.
        echo '<div class="alert alert-' . $_SESSION['flash']['type'] .  ' alert-dismissible fade show" role="alert">
              Data Mahasiswa
              <strong>' . $_SESSION['flash']['message'] . '</strong>' . $_SESSION['flash']['action'] . '
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>';
            // setelah sudah terpakai, kita hapus karena hanya digunakan sekali menggunakan funtion unset
            unset($_SESSION['flash']);
      }
    }



  }




?>
