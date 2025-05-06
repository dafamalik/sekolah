<?php
$dataVideo = [
    [
        "title" => "Juara OSN",
        "video_id" => "n92IMrMMY6c" // Contoh ID video YouTube
    ],
    [
        "title" => "Gerak Mulia",
        "video_id" => "3eSQFgNayPU" // Contoh ID video YouTube
    ],
    [
        "title" => "Juara OSN",
        "video_id" => "dQw4w9WgXcQ"
    ],
    [
        "title" => "Gerak Mulia",
        "video_id" => "dQw4w9WgXcQ"
    ],
    [
        "title" => "Juara OSN",
        "video_id" => "dQw4w9WgXcQ"
    ],
    [
        "title" => "Gerak Mulia",
        "video_id" => "dQw4w9WgXcQ"
    ],
    [
        "title" => "Gerak Mulia",
        "video_id" => "dQw4w9WgXcQ"
    ],
    // Tambahkan data lainnya dengan video_id yang sesuai...
];

$videoPerPages = 3;
$video = count($dataVideo);
$pages = ceil($video / $videoPerPages);

$currentPages = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
if ($currentPages < 1 || $currentPages > $pages) {
    $currentPages = 1;
}
?>

<section class="bg-light">
    <div class="container py-5">
        <div class="row">
            <?php if (!empty($videoThisPages = array_slice($dataVideo, ($currentPages - 1) * $videoPerPages, $videoPerPages))): ?>
                <?php foreach ($videoThisPages as $kv): ?>
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                        <a href="https://www.youtube.com/watch?v=<?php echo $kv["video_id"]; ?>" target="_blank">
                            <div class="card h-100 shadow-sm">
                                <div class="video-container">
                                    <iframe src="https://www.youtube.com/embed/<?php echo $kv["video_id"]; ?>"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                                <div class="card-body">
                                    <p class="card-title text-dark text-center font-weight-bold"><?php echo $kv["title"]; ?></p>
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
            <ul class="pagination justify-content-center" id="pagination-container">
                </ul>
        </nav>
    </div>
</section>

<script>
    const dataVideo = <?php echo json_encode($dataVideo); ?>;
    const videoPerPages = <?php echo $videoPerPages; ?>;
    const jumlahHalaman = <?php echo $pages; ?>;
    let halamanAktif = <?php echo $currentPages; ?>;
    const videoContainer = document.querySelector('.row');
    const paginationContainer = document.getElementById('pagination-container');

    function tampilkanVideo(halaman) {
        const indexAwal = (halaman - 1) * videoPerPages;
        const dataHalamanIni = dataVideo.slice(indexAwal, indexAwal + videoPerPages);
        let html = '';
        if (dataHalamanIni.length > 0) {
            dataHalamanIni.forEach(kv => {
                html += `
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                        <a href="https://www.youtube.com/watch?v=${kv.video_id}" target="_blank">
                        <div class="card h-100 shadow-sm">
                            <div class="video-container">
                                <iframe src="https://www.youtube.com/embed/${kv.video_id}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="card-body">
                                <p class="card-title text-dark text-center font-weight-bold">${kv.title}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                `;
            });
        } else {
            html = '<div class="col-12"><p class="text-center">Tidak ada konten untuk ditampilkan.</p></div>';
        }
        videoContainer.innerHTML = html;
    }

    function buatPagination() {
        let paginationHTML = '';
        if (halamanAktif > 1) {
            paginationHTML += `<li class="page-item"><a class="page-link" href="#" data-halaman="${halamanAktif - 1}">Sebelumnya</a></li>`;
        }
        for (let i = 1; i <= jumlahHalaman; i++) {
            const activeClass = (i === halamanAktif) ? 'active' : '';
            paginationHTML += `<li class="page-item ${activeClass}"><a class="page-link" href="#" data-halaman="${i}">${i}</a></li>`;
        }
        if (halamanAktif < jumlahHalaman) {
            paginationHTML += `<li class="page-item"><a class="page-link" href="#" data-halaman="${halamanAktif + 1}">Selanjutnya</a></li>`;
        }
        paginationContainer.innerHTML = paginationHTML;

        // Tambahkan event listener untuk link pagination
        const paginationLinks = paginationContainer.querySelectorAll('a.page-link');
        paginationLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault(); // Mencegah link melakukan reload halaman
                const targetHalaman = parseInt(this.dataset.halaman);
                if (targetHalaman >= 1 && targetHalaman <= jumlahHalaman && targetHalaman !== halamanAktif) {
                    halamanAktif = targetHalaman;
                    tampilkanVideo(halamanAktif);
                    buatPagination(); // Perbarui tampilan pagination
                    // Atur URL di browser tanpa reload (opsional)
                    const newUrl = new URL(window.location);
                    newUrl.searchParams.set('halaman', halamanAktif);
                    window.history.pushState({ path: newUrl.href }, '', newUrl.href);
                }
            });
        });
    }

    // Panggil fungsi untuk pertama kali saat halaman dimuat
    tampilkanVideo(halamanAktif);
    buatPagination();

    // Tangani perubahan URL history (jika pengguna menggunakan tombol back/forward browser)
    window.addEventListener('popstate', function(event) {
        const params = new URLSearchParams(window.location.search);
        const halaman = parseInt(params.get('halaman')) || 1;
        if (halaman >= 1 && halaman <= jumlahHalaman && halaman !== halamanAktif) {
            halamanAktif = halaman;
            tampilkanVideo(halamanAktif);
            buatPagination();
        }
    });
</script>