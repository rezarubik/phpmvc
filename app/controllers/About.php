<?php
  /**
   *
   */
  class About extends Controller{
    function index($name = 'Reza', $work = 'Programmer'){ // memberikan parameter default yaitu Reza dan Programmer. Jika params kosong, maka jadi default.
      // echo "Nama saya adalah $name, saya adalah seorang $work";

      // mengirimkan data ke view about/index, tinggal tambahkan variable $data ke view dibawah. Datanya dibuat array dulu, misal assosiatif.
      $data['title'] = 'About';
      $data['arr_name'] = $name;
      $data['arr_work'] = $work;
      $this->view('templates/header', $data);
      // akan membuat 2 buah view
      $this->view('about/index', $data); // memanggil view yg ada didalam folder about juga, tapi nama filenya = index.
      $this->view('templates/footer');
    }
    function page(){
      // echo "about/page";
      $data['title'] = 'Page';
      $this->view('templates/header', $data);
      $this->view('about/page'); // memanggil view yg ada didalam folder about juga, tapi nama filenya = page.
      $this->view('templates/footer');
    }

  }




?>
