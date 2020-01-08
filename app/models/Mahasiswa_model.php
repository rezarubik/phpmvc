<?php

/**
 *
 */
class Mahasiswa_model
{
  // private $mhs = [
  //   [
  //     "name" => "Muhammad Reza Pahlevi",
  //     "nim" => "4616010050",
  //     "email" => "rezarubik17@gmail.com",
  //     "jurusan" => "Teknik Informatika dan Komputer"
  //   ],
  //   [
  //     "name" => "Nadiah Tsamara Pratiwi",
  //     "nim" => "4616010026",
  //     "email" => "tspnadiah@gmail.com",
  //     "jurusan" => "Teknik Informatika dan Komputer"
  //   ],
  //   [
  //     "name" => "INVICIT",
  //     "nim" => "46160100001",
  //     "email" => "invicit@gmail.com",
  //     "jurusan" => "Teknik Informatika dan Komputer"
  //   ]
  // ];
  // Sekarang ngambil data dari database
  // Variabel untuk mengelola database
  // Teknik connect to databasenya menggunakan PDO(PHP Data Object). Lebih fleksibel ketika ingin mengganti databasenya bukan menggunakan mysql lagi. Dengan PDO, lebih mudah daripada menggunakan drivernya mysqli.
  // private $dbh; //database handler, untuk menampung database.
  // private $query; // untuk menyimpan query.

  // public function __construct(){ // menaruh di construct agar ketika pagenya di load, datanya langsung kepanggil.
  //   // data source name = identitas servernya.
  //   $dsn = 'mysql:host=localhost;dbname=phpmvc'; // koneksi ke PDOnya.
  //   // tes apakah sudah terhubung atau belum.
  //   try {
  //     $this->dbh = new PDO($dsn, 'root', ''); // (dsn, username db, password db)
  //   } catch (PDOException $e) {
  //     die($e->getMessage()); // ketika error, hentikan programnya.
  //   }
  //
  // }

  // sebelum bisa menggunakan class database disini, harus diload terlebih dahulu databasenya, harus dipanggil dulu di file init.php
  // buat variabel untuk nama databasenya. khusus model ini menggunakan tabel apa.
  private $table = 'mahasiswa';
  private $db; // untuk menampung class databasenya tadi.
  public function __construct()
  { // langsung connect ke class databasenya.
    $this->db = new Database(); // instansiasi kelas database.
  }

  // method untuk mendapatkan data mahasiswanya;
  public function getMahasiswa()
  {
    // untuk mengambil mhs tinggal menggunakan ini
    // return $this->mhs;
    // untuk mendapatkan semua mahasiswanya, kita butuh querynya
    // ini sudah dilakukan oleh wrappernya.
    // $this->query = $this->dbh->prepare('select * from mahasiswa'); // isi quernya adalah menyiapkan quernya dulu(di PDO seperti ini).
    // // Setelah itu bari di execute. kalo pdo dia dua kali supaya aman.
    // $this->query->execute();
    // return $this->query->fetchAll(PDO::FETCH_ASSOC); // mengambil semua datanya. parameter fetchAll adalah kita ingin mengembalikan datanya dalam bentuk apa, misal dalam bentuk array assosiatif.
    $this->db->query('select * from ' . $this->table);
    // kembalikan hasilnya
    return $this->db->resultSet(); // tampilin semua datanya. isinya banyak.
  }

  // method untuk detail mahasiswa
  public function getMahasiswaById($id)
  {
    $this->db->query('select * from ' . $this->table . ' where id=:id'); // untuk menyimpan data yg akan kita binding. id=:id untuk menghindari sql injection.
    // idnya baru kita masukkan disini menggunakan bind
    $this->db->bind('id', $id); // idnya diisi dengan $id
    // return
    return $this->db->single();
  }

  // tambah data mahasiswa
  public function tambahDataMahasiswa($data)
  {
    $query = "insert into mahasiswa
                values
                ('', :nama, :nim, :email, :jurusan)";
    // jalankan querynya
    $this->db->query($query);
    // binding
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('nim', $data['nim']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('jurusan', $data['jurusan']);
    // eksesuki
    $this->db->execute();
    // fungsi tambahDataMahasiswa belum mengembalikan angka. karena di controller mahasiswa yg dibutuhkan adalah angka.
    // kita perlu mengembalikan nilai. tapi didalam class database kita, belum ada sebuah method untuk menghitung ada berapa baris yg baru crud.
    return $this->db->rowCount();
  }

  // delete data Mahasiswa
  public function deleteDataMahasiswa($id)
  {
    $query = "delete from mahasiswa where id = :id";
    $this->db->query($query);
    $this->db->bind('id', $id);
    $this->db->execute();
    return $this->db->rowCount();
  }
}
