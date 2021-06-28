                <!-- Begin Page Content -->
                <div class="container-fluid">

                <?php if (session()->get('message')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Data Karyawan Baru <strong><?= session()->getFlashdata('message'); ?></strong>
                        </div>

                        <script>
                            $(".alert").alert();
                        </script>
                    <?php endif; ?>
                    
                    <?php if (session()->get('cuti')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Ambil Cuti Karyawan <strong><?= session()->getFlashdata('cuti'); ?></strong>
                        </div>

                        <script>
                            $(".alert").alert();
                        </script>
                    <?php endif; ?>
                    <!-- Page Table -->
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable-wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12">
                                            <?php
                                            if (session()->get('err')) {
                                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" . session()->get('err') . "</div>";
                                                session()->remove('err');
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 offset-md-6 col-sm-12">
                                            <button type="button" class="btn btn-primary col-sm-12 col-md-4 offset-md-8 " data-toggle="modal" data-target="#modelTambah">
                                                Tambah Karyawan
                                            </button>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <table class="table table-striped col-sm-12 col-md-12">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nomer Induk</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Tanggal Bergabung</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($karyawan as $row) : ?>
                                                    <tr>
                                                        <td scope="row"><?= $i++; ?></td>
                                                        <td><?= $row['nomor_induk']; ?></td>
                                                        <td><?= $row['nama']; ?></td>
                                                        <td><?= $row['alamat']; ?></td>
                                                        <td><?= $row['tanggal_lahir']; ?></td>
                                                        <td><?= $row['tanggal_bergabung']; ?></td>
                                                        <td>
                                                            <a href="" id="edit-btn" data-toggle="modal" data-target="#modelEdit" data-nik="<?= $row['nomor_induk']; ?>" data-nama="<?= $row['nama']; ?>" data-alamat="<?= $row['alamat']; ?>" data-lahir="<?= $row['tanggal_lahir']; ?>" data-gabung="<?= $row['tanggal_bergabung']; ?>">
                                                                <i class="fas fa-edit  btn btn-primary btn-sm"></i>
                                                            </a>
                                                            <span></span>
                                                            <a href="" data-toggle="modal" data-target="#modelHapus" id="remove-btn" data-nik="<?= $row['nomor_induk']; ?>" data-nama="<?= $row['nama']; ?>">
                                                                <i class="fas fa-trash-alt btn btn-danger btn-sm"></i>
                                                            </a>
                                                            <span></span>
                                                            <a href="" data-toggle="modal" data-target="#modelCuti" id="cuti-btn" data-nik="<?= $row['nomor_induk']; ?>" data-nama="<?= $row['nama']; ?>">
                                                                <i class="fas fa-address-card btn btn-success btn-sm"></i>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- End of Main Content -->

                <!-- Modal Hapus -->
                <div class="modal fade" id="modelHapus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi</h5>
                            </div>
                            <div class="modal-body">
                                <p>Apakah yakin akan menghapus <b id="nama-hapus"></b> dari daftar karyawan?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                <a id="remove-yes" class="btn btn-danger">Ya</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Tambah -->
                <div class="modal fade" id="modelTambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Karyawab Baru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('karyawan/tambah') ?>" method="post">
                                    <div class="form-group">
                                        <label for="nomor_induk">Nomor Induk</label>
                                        <input type="text" name="nomor_induk" id="nomor_induk" class="form-control" value="<?= 'IP0' . $seq ?>" readonly>

                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control">

                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" id="alamat" class="form-control">

                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" id="tgl_lahir" class="form-control">

                                        <label for="tanggal_bergabung">Tanggal Bergabung</label>
                                        <input type="date" name="tanggal_bergabung" id="tgl_gabung" class="form-control">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

                <!-- Modal Edit -->
                <div class="modal fade" id="modelEdit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ubah Data Karyawab</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('karyawan/edit') ?>" method="post">
                                    <div class="form-group">
                                        <label for="nomor_induk">Nomor Induk</label>
                                        <input type="text" name="nomor_induk" id="nomor-induk" class="form-control" value="<?= $row['nomor_induk']; ?>" readonly>

                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $row['nama']; ?>">

                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $row['alamat']; ?>">

                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" id="tgl-lahir" class="form-control" value="<?= $row['tanggal_lahir']; ?>">

                                        <label for="tanggal_bergabung">Tanggal Bergabung</label>
                                        <input type="date" name="tanggal_bergabung" id="tgl-gabung" class="form-control" value="<?= $row['tanggal_bergabung']; ?>">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

                <!-- Modal Edit -->
                <div class="modal fade" id="modelCuti" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ambil Cuti Karyawab</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('karyawan/cuti') ?>" method="post">
                                    <div class="form-group">
                                        <label for="nomor_induk">Nomor Induk</label>
                                        <input type="text" name="nomor_induk" id="nomor-induk" class="form-control" value="<?= $row['nomor_induk']; ?>" readonly>

                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $row['nama']; ?>" readonly>

                                        <label for="tanggal_cuti">Tanggal Cuti</label>
                                        <input type="date" name="tanggal_cuti" id="tgl-cuti" class="form-control">

                                        <label for="lama_cuti">Lama Cuti</label>
                                        <input type="number" name="lama_cuti" id="lama-cuti" class="form-control">

                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" name="keterangan" id="keterangan" class="form-control">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>