<?php
$dataVideo = [
    [
        "image" => "gambar2.jpg",
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

$perPage = 3;
$totalData = count($dataVideo);
$totalPages = ceil($totalData / $perPage);
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$startIndex = ($currentPage - 1) * $perPage;
$videoThisPages = array_slice($dataVideo, $startIndex, $perPage);
?>

<div class="container py-5">
    <div class="row" id="video-container">
        <?php if (!empty($videoThisPages)): ?>
            <?php foreach ($videoThisPages as $kv): ?>
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                    <a href="<?= $kv["url"]; ?>" target="_blank">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= base_url('assets/img/banner/' . $kv["image"]); ?>" class="card-img-top" alt="<?= $kv["title"]; ?>">
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
        <ul class="pagination">
            <li class="page-item <?php if ($currentPage <= 1) { echo 'disabled'; } ?>">
                <a class="page-link" href="#" data-page="<?php echo $currentPage - 1; ?>">Previous</a>
            </li>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php if ($i == $currentPage) { echo 'active'; } ?>">
                    <a class="page-link" href="#" data-page="<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?php if ($currentPage >= $totalPages) { echo 'disabled'; } ?>">
                <a class="page-link" href="#" data-page="<?php echo $currentPage + 1; ?>">Next</a>
            </li>
        </ul>
    </nav>
</div>

<script>
    const paginationLinks = document.querySelectorAll('.pagination a');
    const videoContainer = document.getElementById('video-container');

    paginationLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const page = this.getAttribute('data-page');
            loadVideos(page);
        });
    });

    function loadVideos(page) {
        // Kirim permintaan AJAX ke server untuk mendapatkan data video berdasarkan halaman
        fetch(`?page=${page}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest' // Untuk menandakan ini adalah permintaan AJAX
            }
        })
        .then(response => response.text())
        .then(data => {
            // Perbarui konten container video dengan data yang diterima
            videoContainer.innerHTML = data;

            // Perbarui status aktif pada link pagination
            document.querySelectorAll('.pagination .page-item').forEach(item => {
                item.classList.remove('active');
            });
            const currentPageLink = document.querySelector(`.pagination a[data-page="${page}"]`);
            if (currentPageLink) {
                currentPageLink.parentNode.classList.add('active');
            }

            // Perbarui status disabled pada tombol Previous/Next
            const prevLink = document.querySelector('.pagination a[data-page="<?php echo $currentPage - 1; ?>"]');
            const nextLink = document.querySelector('.pagination a[data-page="<?php echo $currentPage + 1; ?>"]');
            const prevItem = prevLink ? prevLink.parentNode : null;
            const nextItem = nextLink ? nextLink.parentNode : null;
            const currentPageNum = parseInt(page);

            if (prevItem) {
                prevItem.classList.remove('disabled');
                if (currentPageNum <= 1) {
                    prevItem.classList.add('disabled');
                }
                prevLink.setAttribute('data-page', currentPageNum - 1);
            }

            if (nextItem) {
                nextItem.classList.remove('disabled');
                if (currentPageNum >= <?php echo $totalPages; ?>) {
                    nextItem.classList.add('disabled');
                }
                nextLink.setAttribute('data-page', currentPageNum + 1);
            }
        })
        .catch(error => {
            console.error('Terjadi kesalahan:', error);
            videoContainer.innerHTML = '<p class="text-center">Gagal memuat konten.</p>';
        });
    }

    // Muat halaman pertama saat halaman dimuat
    // loadVideos(1); // Ini tidak perlu karena konten awal sudah dimuat oleh PHP
</script>