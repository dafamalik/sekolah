<?php
$dataPhoto = [
    [
        "image" => "gambar1.jpg",
        "title" => "Juara OSN",
        "kategori" => "Kegiatan SMPI Tahun 2018"
    ],
    [
        "image" => "gambar2.jpg",
        "title" => "Gerak Mulia",
        "kategori" => "Kegiatan SMPI Tahun 2019"
    ],
    [
        "image" => "gambar1.jpg",
        "title" => "Juara OSN",
        "kategori" => "Kegiatan SMPI Tahun 2018"
    ],
    [
        "image" => "gambar2.jpg",
        "title" => "Gerak Mulia",
        "kategori" => "Kegiatan SMPI Tahun 2019"
    ],
    [
        "image" => "gambar1.jpg",
        "title" => "Juara OSN",
        "kategori" => "Kegiatan SMPI Tahun 2018"
    ],
    [
        "image" => "gambar2.jpg",
        "title" => "Gerak Mulia",
        "kategori" => "Kegiatan SMPI Tahun 2019"
    ],
    [
        "image" => "gambar2.jpg",
        "title" => "Gerak Mulia",
        "kategori" => "Kegiatan SMPI Tahun 2019"
    ],
];

$photoPerPages = 3;
$photo = count($dataPhoto);
$pages = ceil($photo / $photoPerPages);
$currentPages = 1;

$style = "<style>
    .container {
        max-width: 960px;
        margin: 0 auto;
        padding: 20px;
        text-align: center;
    }

    .category-list {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-bottom: 20px;
    }

    .category-item {
        cursor: pointer;
        padding: 10px 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .category-item:hover {
        background-color: #eee;
    }

    .photo-grid {
        display: flex; /* Menggunakan flexbox untuk mengatur item */
        flex-wrap: wrap; /* Memungkinkan item untuk pindah ke baris baru */
        gap: 15px;
        margin-top: 20px;
        justify-content: flex-start; /* Atau center sesuai preferensi */
    }

    .photo-item {
        width: calc(33.33% - 10px); /* Contoh: 3 item per baris pada layar besar */
        border: 1px solid #ddd;
        border-radius: 5px;
        height: 15rem; /* Menambahkan tinggi tetap */
        overflow: hidden;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        margin-bottom: 20px; /* Spasi antar card */
    }

    /* Media query untuk layar yang lebih kecil (misalnya, tablet) */
    @media (max-width: 768px) {
        .photo-item {
            width: calc(50% - 7.5px); /* 2 item per baris pada tablet */
            height: auto; /* Biarkan tinggi menyesuaikan konten pada layar kecil */
        }
    }

    /* Media query untuk layar yang lebih kecil lagi (misalnya, ponsel) */
    @media (max-width: 576px) {
        .photo-item {
            width: 100%; /* 1 item per baris pada ponsel */
            height: auto; /* Biarkan tinggi menyesuaikan konten pada layar kecil */
        }
    }

    .photo-item img {
        width: 100%;
        height: auto;
        display: block;
        object-fit: cover;
        border-radius-top-left: 5px;
        border-radius-top-right: 5px;
        flex-grow: 1; /* Agar gambar mengisi sebagian besar tinggi card */
    }

    .photo-title {
        font-size: 0.9em;
        color: #333;
        text-align: center;
        padding: 10px;
        margin-bottom: 0; /* Menghapus margin bawah default */
    }

    #photo-container {
        display: none;
        position: relative; /* Tambahkan ini agar nav bisa diposisikan relatif */
        padding-bottom: 40px; /* Tambahkan ruang di bawah grid untuk pagination */
    }

    nav[aria-label=\"Halaman Galeri\"] {
        position: absolute; /* Sekarang relatif terhadap #photo-container */
        bottom: 0;
        left: 50%; /* Posisikan tengah secara horizontal */
        transform: translateX(-50%); /* Koreksi pergeseran karena left: 50% */
        display: flex;
        align-items: center;
        padding: 5px 0;
    }

    .pagination {
        display: flex;
        padding-left: 0;
        list-style: none;
        border-radius: 0.25rem;
        background-color: transparent;
    }

    .page-item {
        margin-right: 2px;
        background-color: #e9ecef; /* Light grey background for items */
    }

    .page-item:not(:first-child) {
        margin-left: 0px;
    }

    .page-link {
        position: relative;
        display: block;
        padding: 0.2rem 0.4rem;
        line-height: 1;
        color: #000;
        text-decoration: none;
        cursor: pointer;
        font-size: 0.7rem;
        border: 1px; /* Optional: Add border */
        background-color: white; /* Optional: Match background */
    }

    .page-link:hover {
        z-index: 2;
        color: #333;
        border-color: #dee2e6;
        background-color: transparent; /* Slightly darker on hover */
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #000;
        background-color: transparent;
        border-color: 1px solid #000;
    }

    .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }
</style>";

?>

<section class="bg-light">
    <?= $style ?>
    <div class="container py-3">
        <h4 class="text-center mb-4">Galery</h4>
        <div class="category-list" id="category-list">
            <div class="category-item" data-category="Kegiatan SMPI Tahun 2018">Kegiatan SMPI Tahun 2018</div>
            <div class="category-item" data-category="Kegiatan SMPI Tahun 2019">Kegiatan SMPI Tahun 2019</div>
        </div>

        <div id="photo-container">
            <h5 class="text-center mb-3" id="category-title">Galery</h5>
            <div class="photo-grid" id="photo-grid">
                </div>
            <nav aria-label="Halaman Galeri mt-3">
                <ul class="pagination justify-content-center" id="photo-pagination">
                    </ul>
            </nav>
        </div>
    </div>

    <div class="modal fade" id="photoModal" tabindex="-1" role="dialog" aria-labelledby="photoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="photoModalLabel"></h5>
                </div>
                <div class="modal-body">
                    <img id="modal-image" src="" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<script>
    const dataPhoto = <?php echo json_encode($dataPhoto); ?>;
    const photoPerPages = <?php echo $photoPerPages; ?>;
    const pages = <?php echo $pages; ?>;
    let currentPage = <?php echo $currentPages; ?>;

    const categoryList = document.getElementById('category-list');
    const photoContainer = document.getElementById('photo-container');
    const photoGrid = document.getElementById('photo-grid');
    const categoryTitleElement = document.getElementById('category-title');
    const photoPagination = document.getElementById('photo-pagination');
    const photoModal = document.getElementById('photoModal');
    const modalImage = document.getElementById('modal-image');
    const modalTitle = document.getElementById('photoModalLabel');

    let currentCategory = null;
    let filteredPhotos = [];

    function openModal(imgSrc, title) {
        modalImage.src = "<?= base_url('assets/img/banner/') ?>/" + imgSrc;
        modalTitle.textContent = title;
        $(photoModal).modal('show');
    }

    function displayPhotos(photos, page) {
        photoGrid.innerHTML = '';
        photoGrid.classList.remove('single-item');

        const startIndex = (page - 1) * photoPerPages;
        const endIndex = startIndex + photoPerPages;
        const photosToDisplay = photos.slice(startIndex, endIndex);

        if (photosToDisplay.length === 1) {
            photoGrid.classList.add('single-item');
        }

        if (photosToDisplay.length > 0) {
            photosToDisplay.forEach(photo => {
                const photoItem = document.createElement('div');
                photoItem.className = 'photo-item';
                photoItem.innerHTML = `
                    <img src="<?= base_url('assets/img/banner/') ?>/${photo.image}" alt="${photo.title}">
                    <p class="photo-title">${photo.title}</p>
                `;
                photoItem.addEventListener('click', () => {
                    openModal(photo.image, photo.title);
                });
                photoGrid.appendChild(photoItem);
            });
        } else {
            photoGrid.innerHTML = '<p>Tidak ada foto untuk ditampilkan.</p>';
        }
    }

    function buatPagination(totalPhotos) {
        photoPagination.innerHTML = '';
        const totalPages = Math.ceil(totalPhotos / photoPerPages);
        let halamanAktif = currentPage; // Gunakan currentPage galeri

        if (totalPages > 1) {
            if (halamanAktif > 1) {
                photoPagination.innerHTML += `<li class="page-item"><a class="page-link" href="#" data-halaman="${halamanAktif - 1}">Sebelumnya</a></li>`;
            }
            for (let i = 1; i <= totalPages; i++) {
                const activeClass = (i === halamanAktif) ? 'active' : '';
                photoPagination.innerHTML += `<li class="page-item ${activeClass}"><a class="page-link" href="#" data-halaman="${i}">${i}</a></li>`;
            }
            if (halamanAktif < totalPages) {
                photoPagination.innerHTML += `<li class="page-item"><a class="page-link" href="#" data-halaman="${halamanAktif + 1}">Selanjutnya</a></li>`;
            }

            // Tambahkan event listener untuk link pagination
            const paginationLinks = photoPagination.querySelectorAll('a.page-link');
            paginationLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault(); // Mencegah link melakukan reload halaman
                    const targetHalaman = parseInt(this.dataset.halaman);
                    if (targetHalaman >= 1 && targetHalaman <= totalPages && targetHalaman !== halamanAktif) {
                        currentPage = targetHalaman; // Perbarui currentPage galeri
                        displayPhotos(filteredPhotos, currentPage);
                        buatPagination(filteredPhotos.length); // Perbarui tampilan pagination
                        // Atur URL di browser tanpa reload (opsional)
                        const newUrl = new URL(window.location);
                        newUrl.searchParams.set('halaman', currentPage);
                        window.history.pushState({ path: newUrl.href }, '', newUrl.href);
                    }
                });
            });
        } else {
            photoPagination.innerHTML = ''; // Sembunyikan pagination jika hanya satu halaman
        }
    }

    categoryList.addEventListener('click', function(event) {
        if (event.target.classList.contains('category-item')) {
            currentCategory = event.target.dataset.category;
            filteredPhotos = dataPhoto.filter(photo => photo.kategori === currentCategory);
            categoryTitleElement.textContent = `${currentCategory}`;
            photoContainer.style.display = 'block';
            currentPage = 1;
            displayPhotos(filteredPhotos, currentPage);
            buatPagination(filteredPhotos.length);

            document.querySelectorAll('.category-item').forEach(item => {
                item.classList.remove('active');
            });
            event.target.classList.add('active');
        }
    });

    window.onload = function() {
        if (categoryList.children.length > 0) {
            const firstCategoryElement = categoryList.children[0];
            const firstCategory = firstCategoryElement.dataset.category;

            currentCategory = firstCategory;
            filteredPhotos = dataPhoto.filter(photo => photo.kategori === firstCategory);
            categoryTitleElement.textContent = `${currentCategory}`;
            photoContainer.style.display = 'block';
            currentPage = 1;
            displayPhotos(filteredPhotos, currentPage);
            buatPagination(filteredPhotos.length);

            firstCategoryElement.classList.add('active');
        }
    };

    // Tangani perubahan URL history (jika pengguna menggunakan tombol back/forward browser)
    window.addEventListener('popstate', function(event) {
        const params = new URLSearchParams(window.location.search);
        const halaman = parseInt(params.get('halaman')) || 1;
        const totalPages = Math.ceil(filteredPhotos.length / photoPerPages);
        if (halaman >= 1 && halaman <= totalPages && halaman !== currentPage) {
            currentPage = halaman;
            displayPhotos(filteredPhotos, currentPage);
            buatPagination(filteredPhotos.length);
        }
    });
</script>