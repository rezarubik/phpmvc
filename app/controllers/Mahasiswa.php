<?php

/**
 *
 */
class Mahasiswa extends Controller
{

  public function index($name = 'Muhammad Reza Pahlevi Y', $nim = 4616010050)
  {
    $data['title'] = 'Daftar Mahasiswa';
    $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswa(); // data mhs isinya adalah model model mahasiswa. lalu mengambil method getMahasiswa pada model Mahasiswa_model
    $this->view('templates/header', $data);
    $this->view('mahasiswa/index', $data);
    $this->view('templates/footer');
  }

  // view untuk detail mahasiswa
  public function detail($id)
  {
    $data['title'] = 'Detail Mahasiswa';
    $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id); // data mhs isinya adalah model model mahasiswa. lalu mengambil method getMahasiswa pada model Mahasiswa_model
    $this->view('templates/header', $data);
    $this->view('mahasiswa/detail', $data);
    $this->view('templates/footer');
  }

  // tambah data
  public function tambah()
  {
    // cek datanya sudah benar masuk
    // var_dump($_POST);
    // kita akan menjalankan sebuah method didalam model kita yg namanya tambahDataMahasiswa
    if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) { // mengirimkan data $_POST. > 0 artinya ada baris baru yg ditambahkan. Maka datanya berhasil masuk.
      // sebelum diredirect, kita set dulu flash messagenya.
      Flasher::setFlash('berhasil', ' ditambahkan', 'success');
      header('Location: ' . BASEURL . '/mahasiswa'); // jika berhasil masuk maka akan redirect. Pindahkan ke halaman untama mahasiswanya.
      exit;
    } else {
      Flasher::setFlash('gagal', ' ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/mahasiswa'); // jika berhasil masuk maka akan redirect. Pindahkan ke halaman untama mahasiswanya.
      exit;
    }
  }

  // delete data
  public function delete($id)
  {
    // cek datanya sudah benar masuk
    // var_dump($_POST);
    // kita akan menjalankan sebuah method didalam model kita yg namanya tambahDataMahasiswa
    if ($this->model('Mahasiswa_model')->deleteDataMahasiswa($id) > 0) { // mengirimkan data $id
      // sebelum diredirect, kita set dulu flash messagenya.
      Flasher::setFlash('berhasil', ' dihapus', 'success');
      header('Location: ' . BASEURL . '/mahasiswa'); // jika berhasil masuk maka akan redirect. Pindahkan ke halaman untama mahasiswanya.
      exit;
    } else {
      Flasher::setFlash('gagal', ' dihapus', 'danger');
      header('Location: ' . BASEURL . '/mahasiswa'); // jika berhasil masuk maka akan redirect. Pindahkan ke halaman untama mahasiswanya.
      exit;
    }
  }

  public function getUpdate()
  {
    // echo $_POST['id']; // menerima id yg dikirim dari script.js
    // kita akan menjalankan method yg ada didalam model kita.
    echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id'])); // fungsi json_encode diphp supaya tidak mengeluarkan array assosiatif.
  }
}
