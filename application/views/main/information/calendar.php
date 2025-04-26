<?php
$bulan_nama = [
    1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',
    7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember'
];
$tahun = date('Y');
?>

<style>
    body {
        background: transparent;
        font-family: 'Segoe UI', sans-serif;
    }
    .month-section {
        margin-bottom: 40px;
    }
    .calendar-title {
        font-weight: bold;
        font-size: 1.5rem;
        margin-bottom: 15px;
    }
    .day-name, .day, .empty-day {
        text-align: center;
        padding: 8px 0;
        border: 1px solid #ddd;
    }
    .day-name {
        font-weight: bold;
        background: #f1f1f1;
    }
    .day {
        font-weight: 500;
    }
    .day:nth-child(1) {
        color: red;
    }
    .empty-day {
        background: #fdfdfd;
    }
    .kegiatan {
        font-style: italic;
        color: #666;
    }
</style>

<section class="bg-light">
    <div class="container my-5">
        <h2 class="text-center mb-4">Kalender Tahun <?php echo date('Y'); ?></h2>

        <?php
        foreach ($bulan_nama as $bulan => $nama_bulan) {
            $jumlah_hari   = cal_days_in_month(CAL_GREGORIAN,$bulan,$tahun);
            $hari_pertama  = date('w',mktime(0,0,0,$bulan,1,$tahun)); // 0‑6 (Min‑Sab)
            ?>
            <div class="month-section">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="calendar-title"><?= $nama_bulan; ?></div>
                        <div class="row no-gutters">
                            <?php
                            $nama_hari = ['Mg','Sn','Sl','Rb','Km','Jm','Sb'];
                            foreach ($nama_hari as $hari){
                                echo '<div class="col day-name">'.$hari.'</div>';
                            }
                            ?>
                        </div>
                        <?php
                        $hitung_hari = 1;
                        for ($i = 0; $i < 6; $i++) {
                            echo '<div class="row no-gutters">';
                            for ($j = 0; $j < 7; $j++) {
                                if ($hitung_hari == 1 && $j < $hari_pertama) {
                                    echo '<div class="col empty-day"></div>';
                                } elseif ($hitung_hari <= $jumlah_hari) {
                                    $color = ($j == 0) ? 'style="color:red;"' : '';
                                    echo '<div class="col day" '.$color.'>'.$hitung_hari.'</div>';
                                    $hitung_hari++;
                                } else {
                                    echo '<div class="col empty-day"></div>';
                                }
                            }
                            echo '</div>';
                            if ($hitung_hari > $jumlah_hari) break;
                        }
                        ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="calendar-title">Kegiatan di bulan <?= $nama_bulan; ?></div>
                        <p class="kegiatan">(Tambahkan deskripsi kegiatan di sini)</p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</section>