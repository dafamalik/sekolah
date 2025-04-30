<section class="bg-light py-5">
    <div class="container">
        <h1 class="mb-4">Detail Data Tenaga Kependidikan</h1>
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo base_url($pegawai['Foto']); ?>" alt="<?php echo $pegawai['Nama']; ?>" class="img-fluid shadow-sm" style="width: 100%; height: 30rem; display: block; object-fit: cover; border-top-left-radius: 5px; border-top-right-radius: 5px;">
            </div>
            <div class="col-md-8">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>: <?php echo $pegawai['Nama']; ?></td>
                        </tr>
                        <tr>
                            <td>NIP</td>
                            <td>: <?php echo $pegawai['NIP']; ?></td>
                        </tr>
                        <tr>
                            <td>NUPTK</td>
                            <td>: <?php echo $pegawai['NUPTK']; ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>: <?php echo $pegawai['Status']; ?></td>
                        </tr>
                        <tr>
                            <td>Pendidikan</td>
                            <td>: <?php echo $pegawai['Pendidikan']; ?></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>: <?php echo $pegawai['Jabatan']; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>: <?php echo ($pegawai['Jenis Kelamin'] == 'P' ? 'Perempuan' : 'Laki-Laki'); ?></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>: <?php echo $pegawai['Agama']; ?></td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>: <?php echo $pegawai['Tempat, Tanggal Lahir']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <?php echo $pegawai['Alamat']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-3">
            <a href="<?php echo base_url('overview/dataTeacher'); ?>" class="btn btn-secondary">Kembali ke Daftar Tenaga Kependidikan</a>
        </div>
    </div>
</section>