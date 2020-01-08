// ketika dokumennya sudah siap, jalankan fungsi didalamnya. menggantikan sebuah method namanya ready.
$(function () {
  // Tambah Data
  $('.btn-tambah-data').on('click', function () {
    $('#formModalLabel').html('Tambah Data Mahasiswa');
    $('.modal-footer button[type=submit]').html('Tambah Data');
  })
  // Edit Data
  // membuat even ketika tombol edit diklik.
  // jquery, tolong carikan saya, sebuah elemen yg nama kelasnya adalah showModalEdit, ketika diklik, jalankan fungsi sebelahnya
  $('.showModalEdit').on('click', function () {
    // tolong carikan saya id formModalLabel, lalu ubah isinya adalah Tambah Data Mahasiswa
    $('#formModalLabel').html('Edit Data Mahasiswa');
    // sekarang tombol submit langsung dari kelasnya aja, kaena dia submit. Menggunakan css selektor.
    $('.modal-footer button[type=submit]').html('Edit Data'); // css selector
    // menangkap id dari Mahasiswa
    // tombol yg kita klik, lalu ambil datanya yg namanya id.
    const id = $(this).data('id');
    // jalankan ajax menggunakan method .ajax({}). request data tanpa mereload seluruh halaman. jadi reload sebagian aja.
    $.ajax({
      // parameter
      // kita ingin mengambil data ke url mana pakai ajaxnya. misal kita ingin menjalankan method getUpdate di controller mahasiswa
      url: 'http://localhost/phpmvc/public/mahasiswa/getUpdate', // method getUpdate berfungsi untuk mengembalikkan data mahasiswa sesuai id yg dikirimkan dari cons.
      // sekarang kita kirimkan data
      data: {
        id: id
      }, // id yg sebelah kiri adalah data yg dikirimkan, yg sebelah kanan adalah isi datanya.
      // setelah itu datanya mau dikirimkan melalui method apa
      method: 'post',
      dataType: 'json',
      // ketika sukses, apa yg akan kita lakukan
      success: function (data) { // kalau permintaan ajax ke urlnya berhasil, kalo ada data yg mau dikembalikan, maka ditangkap oleh variable data.
        $('#nama').val(data.nama);
      }


    });



  });




});