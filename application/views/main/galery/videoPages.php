<?php
$dataVideo = [
    [
        "image" => "gambar1.jpg",
        "title" => "Juara OSN",
        "url" => "https://youtu.be/O1PkZaFy61Y?si=P-OxZcKZDnCuW5sg"
    ],
    [
        "image" => "gambar2.jpg",
        "title" => "Gerak Mulia",
        "url" => "https://youtu.be/iQo-8wx0l0Y?si=CJkLHdMLgFRKEiR4"
    ],
    [
        "image" => "gambar1.jpg",
        "title" => "Juara OSN",
        "url" => "https://youtu.be/O1PkZaFy61Y?si=P-OxZcKZDnCuW5sg"
    ],
    [
        "image" => "gambar2.jpg",
        "title" => "Gerak Mulia",
        "url" => "https://youtu.be/iQo-8wx0l0Y?si=CJkLHdMLgFRKEiR4"
    ],
    [
        "image" => "gambar1.jpg",
        "title" => "Juara OSN",
        "url" => "https://youtu.be/O1PkZaFy61Y?si=P-OxZcKZDnCuW5sg"
    ],
    [
        "image" => "gambar2.jpg",
        "title" => "Gerak Mulia",
        "url" => "https://youtu.be/iQo-8wx0l0Y?si=CJkLHdMLgFRKEiR4"
    ],
    [
        "image" => "gambar2.jpg",
        "title" => "Gerak Mulia",
        "url" => "https://youtu.be/iQo-8wx0l0Y?si=CJkLHdMLgFRKEiR4"
    ],
    // Tambahkan data lainnya...
];

$videoPerPages = 3;
$video = count($dataVideo);
$pages = ceil($video / $videoPerPages);

$currentPages = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
if ($currentPages < 1 || $currentPages > $pages) {
    $currentPages = 1;
}
$firstIndex = ($currentPages - 1) * $videoPerPages;
$videoThisPages = array_slice($dataVideo, $firstIndex, $videoPerPages);
?>

<html>
<body>
    <div class="container py-5">
        <div class="row">
            <?php if (!empty($videoThisPages)): ?>
                <?php foreach ($videoThisPages as $kv): ?>
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                        <a href="<?= $kv["url"]; ?>" target="_blank">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= base_url('assets/images/banner/' . $kv["image"]); ?>" class="card-img-top" alt="<?= $kv["title"]; ?>">
                            <div class="card-body">
                                <p class="card-title text-dark text-center font-weight-bold"><?= $kv["title"]; ?></p>
                            </div>
                        </div>
                        </a>
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
</body>
</html>