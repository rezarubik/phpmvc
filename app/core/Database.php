<?php
  /** This is wrapper database
   * Bisa digunakan ditable manapun nantinya.
   */
  class Database{

    // pertama kita menulis data dari database kita yg ada didalam file config tadi.
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;
    // membuat variabel koneksinya
    private $dbh; // database handler
    private $stt_query;

    public function __construct(){ // menaruh di construct agar ketika pagenya di load, datanya langsung kepanggil. Berisi koneksi ke Database.
      // data source name = identitas servernya.
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name; // koneksi ke PDOnya.
      // tes apakah sudah terhubung atau belum.
      $option = [
        // parameter dari konfigurasi dbnya.
        PDO::ATTR_PERSISTENT => true, // agar koneksi dbnya konsisten terjaga terus.
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // untuk mode errornya.
      ];
      try {
        $this->dbh = new PDO($dsn, $this->user, $this->pass, $option); // (dsn, username db, password db, option untuk mengoptimasi koneksi db kita.)
      } catch (PDOException $e) {
        die($e->getMessage()); // ketika error, hentikan programnya.
      }

    }
    // fungsi untk menjalankan querynya secara generik.
    public function query($query){ // quernya apapun
      $this->stt_query = $this->dbh->prepare($query); // siapkan query user maunya apa.
    }
    // binding datanya. Siapa tau didalam querynya ada wherenya.
    public function bind($param, $value, $type = null){ // parameter, nilai, tipe dibuat null supaya aplikasi yg menentukan.
      // kalo typenya nulll kita jalankan sesuatu
      if (is_null($type)) {
        switch (true) { // supaya switchnya jalan.
          case is_int($value): // kalo typenya int, tipenya otomatis kita set jadi parameter integer.
            $type = PDO::PARAM__INT;
            break;
            case  is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;
            case is_null($value):
              $type = PDO::PARAM_NULL;
              break;
          default:
            $type = PDO::PARAM_STR;
            break;
        }
      }
      $this->stt_query->bindValue($param, $value, $type); // supaya aman, agar terhindar dari query injection.
    }

    // eksekusi
    public function execute(){
      $this->stt_query->execute();
    }

    // setelah di eksesuki, kita ingin hasilnya ingin 1 atau banyak data.
    // jika isi datanya banyak
    public function resultSet(){
      // kita panggil executenya
      $this->execute();
      return $this->stt_query->fetchAll(PDO::FETCH_ASSOC); // jika ingin banyak datanya
    }
    // jika hanya ingin satu data
    public function single(){
      $this->execute();
      return $this->stt_query->fetch(PDO::FETCH_ASSOC);
    }

    // ada berapa baris yg berubah didalam tablenya.
    public function rowCount(){
      return $this->stt_query->rowCount(); // rowCount() dibaris ini punya PDO.
    }




  }




?>
