<?php
  /**
   * Merupakan kelas utama. Akan menjadi extend adari foler controllersnya.
   */
  class Controller{
    // buat method view

    public function view($view, $data = []){ // ada 2 params, yaitu viewnya apa dan data yg mau dikirim ke view tersebut. Datanya dikasih default berupa array.
      // kita awalnya berada di index.
      require_once '../app/views/' . $view . '.php'; //lalu cari ada gak file yg namanya view
    }
    // mengelola model
    public function model($model){
      require_once '../app/models/' . $model . '.php'; // cari ada gak file yg namanya models
      // karena dia model, maka harus kita instansiasi dulu supaya bisa kita pakai.
      return  new $model;
    }
  }



?>
