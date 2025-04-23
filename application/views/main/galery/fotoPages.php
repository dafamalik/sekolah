<!-- Data Foto -->
<?php
$kumpulanVideo = [
    [
        "image" => "gambar1.jpg",
        "title" => "Juara OSN",
    ],
    [
        "image" => "gambar2.jpg",
        "title" => "Gerak Mulia",
    ],
    [
        "image" => "gambar1.jpg",
        "title" => "Juara OSN",
    ],
    [
        "image" => "gambar2.jpg",
        "title" => "Gerak Mulia",
    ],
    [
        "image" => "gambar1.jpg",
        "title" => "Juara OSN",
    ],
    [
        "image" => "gambar2.jpg",
        "title" => "Gerak Mulia",
    ],
    [
        "image" => "gambar2.jpg",
        "title" => "Gerak Mulia",
    ],
];

$jumlahVideoPerHalaman = 3;
$jumlahVideo = count($kumpulanVideo);
$jumlahHalaman = ceil($jumlahVideo / $jumlahVideoPerHalaman);

$halamanSaatIni = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
if ($halamanSaatIni < 1 || $halamanSaatIni > $jumlahHalaman) {
    $halamanSaatIni = 1;
}
$indexAwal = ($halamanSaatIni - 1) * $jumlahVideoPerHalaman;
$videoPerHalamanIni = array_slice($kumpulanVideo, $indexAwal, $jumlahVideoPerHalaman);

$style = "<style>
    #lightbox {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    #lightbox img {
        max-width: 90%;
        max-height: 90%;
        object-fit: contain;
    }

    #lightbox-close {
        position: absolute;
        top: 20px;
        right: 30px;
        color: white;
        font-size: 30px;
        font-weight: bold;
        cursor: pointer;
    }
</style>";

?>

<html>
<body>
    <?= $style ?>
    <div class="container py-5">
        <h4 class="text-center mb-4">Kegiatan Siswa-Siswi SDN Rawa Buaya 09</h4>
        <div class="row">
            <?php if (!empty($videoPerHalamanIni)): ?>
                <?php foreach ($videoPerHalamanIni as $kv): ?>
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= base_url('assets/images/banner/' . $kv["image"]); ?>" class="card-img-top gallery-image" alt="<?= $kv["title"]; ?>" style="cursor: pointer;" onclick="openLightbox('<?= base_url('assets/images/banner/' . $kv["image"]); ?>')">
                            <div class="card-body">
                                <p class="card-title text-dark text-center font-weight-bold"><?= $kv["title"]; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-center">Tidak ada konten untuk ditampilkan.</p>
                </div>
            <?php endif; ?>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if ($halamanSaatIni == 1) echo 'disabled'; ?>">
                    <a class="page-link" href="<?php if ($halamanSaatIni > 1) echo '?halaman=' . ($halamanSaatIni - 1); ?>" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $jumlahHalaman; $i++): ?>
                    <li class="page-item <?php if ($halamanSaatIni == $i) echo 'active'; ?>"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
                <?php endfor; ?>
                <li class="page-item <?php if ($halamanSaatIni == $jumlahHalaman) echo 'disabled'; ?>">
                    <a class="page-link" href="<?php if ($halamanSaatIni < $jumlahHalaman) echo '?halaman=' . ($halamanSaatIni + 1); ?>" aria-label="Next">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div id="lightbox" onclick="closeLightbox()">
        <span id="lightbox-close" onclick="closeLightbox()">&times;</span>
        <img id="lightbox-image" src="" alt="">
    </div>

    <script>
        function openLightbox(imgSrc) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImage = document.getElementById('lightbox-image');
            lightboxImage.src = imgSrc;
            lightbox.style.display = 'flex';
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.style.display = 'none';
        }
    </script>
</body>
</html>