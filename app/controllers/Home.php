<?php
  /**
   *
   */
  class Home extends Controller{ // bakal extends di kelas controller

    public function index(){ // untuk jadi method defaultnya.
      // jika tidak menuliskan apa-apa, maka method default ini yg akan terpanggil.
      // echo 'home/index';
      // memanggil view templates header
      $data['title'] = 'Home';
      // membuat data dari model untuk ditangkap ke url.
      $data['name'] = $this->model('User_model')->getUser(); // model = menjalankan model. User_model = nama modelnya. getUser() nama methodnya.
      $this->view('templates/header', $data);
      // memanggil view content.
      $this->view('home/index', $data); // view disini adalah method yg ada di class Controller yg ada di core.
      // memanggil view templates footer
      $this->view('templates/footer');
    }
  }





?>
