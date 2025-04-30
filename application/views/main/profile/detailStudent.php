<section class="bg-light py-5">
    <div class="container">
        <h1 class="mb-4">Detail Data Peserta Didik</h1>
        <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>: <?php echo $siswa['Nama']; ?></td>
                        </tr>
                        <tr>
                            <td>NISN</td>
                            <td>: <?php echo $siswa['NISN']; ?></td>
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td>: <?php echo $siswa['NIS']; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>: <?php echo ($siswa['Jenis Kelamin'] == 'P' ? 'Perempuan' : 'Laki-Laki'); ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>: <?php echo $siswa['Tanggal Lahir']; ?></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>: <?php echo $siswa['Agama']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <?php echo $siswa['Alamat']; ?></td>
                        </tr>
                        <tr>
                            <td>Kota</td>
                            <td>: <?php echo $siswa['Kota']; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>: <?php echo $siswa['Kelas']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <?php echo $siswa['Alamat']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-3">
            <a href="<?php echo base_url('overview/studentData'); ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</section>