                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Table -->
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable-wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <br>
                                    <div class="row">
                                        <table class="table table-striped col-sm-12 col-md-12">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nomer Induk</th>
                                                    <th>Nama</th>
                                                    <th>Sisa Cuti</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($cuti as $row) : ?>
                                                    <tr>
                                                        <td scope="row"><?= $i++; ?></td>
                                                        <td><?= $row['nomor_induk']; ?></td>
                                                        <td><?= $row['nama']; ?></td>
                                                        <td><?= $row['cuti']; ?></td>
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