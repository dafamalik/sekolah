<!-- Data Foto -->
<?php
$dataPhoto = [
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

//Jumlah foto yang ingin ditampilkan per halaman.
$photoPerPages = 3;

//total jumlah foto dalam array $dataPhoto.
$photo = count($dataPhoto);

//Menghitung jumlah total halaman yang dibutuhkan.
$pages = ceil($photo / $photoPerPages);

//cek apakah data foto nya ada atau engga, kalau ga ada halaman nya bakal muncul 1 halaman aja, dan kalau ada maka halaman nya bakal muncul sesuai data dari si foto.
$currentPages = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;

//Memastikan bahwa nilai $currentPages valid, yaitu tidak kurang dari 1 dan tidak lebih dari total halaman.
if ($currentPages < 1 || $currentPages > $pages) {
    $currentPages = 1;
}

//ngambil berapa foto yang dibutuhin dari $photoPerPages
$firstIndex = ($currentPages - 1) * $photoPerPages;
$photoThisPages = array_slice($dataPhoto, $firstIndex, $photoPerPages);

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

    .card {
        cursor: pointer; /* Menambahkan cursor pointer agar terlihat bisa diklik */
    }
</style>";

?>

<html>
<body>
    <?= $style ?>
    <div class="container py-5">
        <h4 class="text-center mb-4">Kegiatan Siswa-Siswi SDN Rawa Buaya 09</h4>
        <div class="row">
            <?php if (!empty($photoThisPages)): ?>
                <?php foreach ($photoThisPages as $kv): ?>
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm" onclick="openLightbox('<?= base_url('assets/img/banner/' . $kv["image"]); ?>')">
                            <img src="<?= base_url('assets/img/banner/' . $kv["image"]); ?>" class="card-img-top gallery-image" alt="<?= $kv["title"]; ?>">
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
                <li class="page-item <?php if ($currentPages == 1) echo 'disabled'; ?>">
                    <a class="page-link" href="<?php if ($currentPages > 1) echo '?halaman=' . ($currentPages - 1); ?>" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $pages; $i++): ?>
                    <li class="page-item <?php if ($currentPages == $i) echo 'active'; ?>"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
                <?php endfor; ?>
                <li class="page-item <?php if ($currentPages == $pages) echo 'disabled'; ?>">
                    <a class="page-link" href="<?php if ($currentPages < $pages) echo '?halaman=' . ($currentPages + 1); ?>" aria-label="Next">
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