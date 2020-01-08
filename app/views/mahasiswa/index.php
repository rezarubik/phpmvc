<div class="container mt-3">
    <!-- Pesan Flashnya -->
    <div class="row">
        <div class="col-lg-6">
            <!-- Panggil flash messagenya. Cukup panggil kelasnya Flasher lalu panggil methodnya yaitu flash. Karena static maka diberi :: -->
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary btn-tambah-data" data-toggle="modal" data-target="#formModal">Tambah Data Mahasiswa</button>
            <h3 class="mt-3">Daftar Mahasiswa</h3>
            <p>Data ini sudah diambil dari database.</p>
            <!-- Hanya Menampilkan Satu Data -->
            <h3>Data Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                <li class="list-group-item">
                    <?php echo $mhs['nama']; ?>
                    <a href="<?php echo BASEURL; ?>/mahasiswa/delete/<?php echo $mhs['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Apakah Anda ingin menghapus?');">Delete</a>
                    <a href="<?php echo BASEURL; ?>/mahasiswa/edit/<?php echo $mhs['id']; ?>" class="badge badge-success float-right ml-1 showModalEdit" data-toggle="modal" data-target="#formModal" data-id="<?php echo $mhs['id']; ?>">Edit</a>
                    <!-- data-id untuk ditangkap oleh jquery -->
                    <a href="<?php echo BASEURL; ?>/mahasiswa/detail/<?php echo $mhs['id']; ?>" class="badge badge-primary float-right ml-1">Detail</a>
                </li>
                <?php endforeach; ?>
            </ul>
            <h4 class="mt-4">Data Detail Mahasiswa</h4>
            <!-- Untuk menampilkan semua data -->
            <?php foreach ($data['mhs'] as $mhs) : ?>
            <ul>
                <li><?php echo $mhs['nama']; ?></li>
                <!-- ['nama columnx'] -->
                <li><?php echo $mhs['nim']; ?></li>
                <li><?php echo $mhs['email']; ?></li>
                <li><?php echo $mhs['jurusan']; ?></li>
            </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Start Form -->
                <form class="" action="<?php echo BASEURL; ?>/mahasiswa/tambah" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" class="form-control" placeholder="Your Name" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="number" id="nim" class="form-control" placeholder="Your Name" name="nim">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Your Name" name="email">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="Teknik Informatika dan Komputer">Teknik Informatika dan Komputer</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Teknik Sipil">Teknik Sipil</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                        </select>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>

            </div>
        </div>
    </div>
</div> 