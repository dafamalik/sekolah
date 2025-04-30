<section class="bg-light py-5">
    <div class="container">
        <h1 class="mb-4">Detail Data Guru</h1>
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo base_url($guru['Foto']); ?>" alt="<?php echo $guru['Nama']; ?>" class="img-fluid shadow-sm" style="max-height: 400px; object-fit: cover; width: 100%;">
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Nama</th>
                            <td><?php echo $guru['Nama']; ?></td>
                        </tr>
                        <tr>
                            <th>NIP</th>
                            <td><?php echo $guru['NIP']; ?></td>
                        </tr>
                        <tr>
                            <th>NUPTK</th>
                            <td><?php echo $guru['NUPTK']; ?></td>
                        </tr>
                        <tr>
                            <th>NRG</th>
                            <td><?php echo $guru['NRG']; ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><?php echo $guru['Status']; ?></td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td><?php echo $guru['Jabatan']; ?></td>
                        </tr>
                        <tr>
                            <th>Pangkat Golongan</th>
                            <td><?php echo $guru['Pangkat Golongan']; ?></td>
                        </tr>
                        <tr>
                            <th>Pendidikan</th>
                            <td><?php echo $guru['Pendidikan']; ?></td>
                        </tr>
                        <tr>
                            <th>Mata Pelajaran</th>
                            <td><?php echo $guru['Mata Pelajaran']; ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td><?php echo ($guru['Jenis Kelamin'] == 'P' ? 'Perempuan' : 'Laki-Laki'); ?></td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td><?php echo $guru['Agama']; ?></td>
                        </tr>
                        <tr>
                            <th>Tempat, Tanggal Lahir</th>
                            <td><?php echo $guru['Tempat, Tanggal Lahir']; ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?php echo $guru['Alamat']; ?></td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td><?php echo $guru['Telepon']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-3">
            <a href="<?php echo base_url('overview/dataTeacher'); ?>" class="btn btn-secondary">Kembali ke Daftar Guru</a>
        </div>
    </div>
</section>