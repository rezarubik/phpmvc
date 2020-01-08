<?php
  /**
   *
   */
  class App{
    // membuat properti untuk kelas App. Menentukan properti untuk controller, method, defaultnya.
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = []; // default parameter adalah array kosong.

    public function __construct(){
      // echo "OK!";
      $url = $this->parseURL();
      // url akan berisi apapun yg kita tulis didalam urlnya
      // kita cek dulu, ada gak file didalam folder controller yang namanya sesuai dengan nama yg ditulis di url

      // CONTROLLER
      if (file_exists('../app/controllers/' . $url[0] . '.php')) { // filenya ada gak didalam folder controller. $url[0] adalah index pertama yaitu home
        // menimpa controller yg ada di atribut menjadi:
        // mengambil properti $controller menggunakan $this->
        $this->controller = $url[0]; // properti controller diisi dengan url ke 0
        // menghilangkan controllernya dari elemen arraynya
        unset($url[0]);
        // kita sudah berhasil mengambil controllernya jika filenya ada.
        // var_dump($url);
      }
      // panggil controllernya:
      require_once '../app/controllers/' . $this->controller . '.php';
      // kelasnya di instansiasi supaya dapat memanggil methodnya
      $this->controller = new $this->controller; // instansiasi objek si $this->controller

      // Method
      if (isset($url[1])) { // kita cek dulu, ada gak methodnya didalam controller
        if (method_exists($this->controller, $url[1])) { // didalam sebuah objek, objek yg sudah diinstans ada pada baris ke 29, ada gak methodnya. dari ctrnya, ada gak methodnya
          // kalau ada kita timpa menjadi yg baru
          $this->method = $url[1];
          // lalu kita unset lagi
          unset($url[1]); // jadi sisanya hanya parameternya aja kalau ada.
        }
      }

      // Kelola Parameter
      // kita cek dulu ada gak parameternya
      if ( !empty($url) ) { // kalo kita ilangin masih tetap ada, nah kemungkinan itu adalah parameternya
        // sekarang mengambil data menggunakan fungsi array_values
        $this->params = array_values($url); // akan dimasukkan ke properti params
      }
      // jalankan controller dan method serta kirimkan params jika ada menggunakan fungsi call_user_func_array
      call_user_func_array([$this->controller, $this->method], $this->params);
      // params 1 = function, params 2 = param_arr.
    }
    public function parseURL(){
      if (isset($_GET['url'])) { // jika ada url yg dikirimkan
        $url = rtrim($_GET['url'], '/'); // untuk memotong urlnya menjadi tidak menggunakan slash / diakhir url. Yg dihapus adalah tanda slash '/'
        $url = filter_var($url, FILTER_SANITIZE_URL); // membersihkan url dari karakter-karakter yang aneh dan ngaco. Untuk melindungi dari hack.
        $url = explode('/', $url); // memecah url berdasarkan tanda slash '/'
        return $url;
      }
    }
  }


?>
