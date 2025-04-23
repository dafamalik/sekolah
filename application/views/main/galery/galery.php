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
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-top: 20px;
    }

    .photo-item {
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
        cursor: pointer;
        display: flex;
        flex-direction: column;
    }

    .photo-item img {
        width: 100%;
        height: auto;
        display: block;
        object-fit: cover;
    }

    .photo-title {
        padding: 10px;
        text-align: center;
        font-size: 0.9em;
        color: #333;
    }

    #photo-container {
        display: none;
    }

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

    .pagination {
        display: flex;
        padding-left: 0;
        list-style: none;
        border-radius: 0.25rem;
        align-items: center;
        margin-top: 10px;
        margin-bottom: 0;
        font-size: 0.7rem;
        background-color: white; /* Optional: Match background */
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
        color: #495057;
        text-decoration: none;
        cursor: pointer;
        font-size: 0.7rem;
        border: 1px solid #dee2e6; /* Optional: Add border */
        background-color: white; /* Optional: Match background */
    }

    .page-link:hover {
        z-index: 2;
        color: #0056b3;
        border-color: #dee2e6;
        background-color: #f8f9fa; /* Slightly darker on hover */
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    nav[aria-label=\"Page navigation example\"] {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding: 5px 0;
    }
</style>";

?>

<html>
<head>
    <?= $style ?>
</head>
<body>
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
            <nav aria-label="Photo pagination">
                <ul class="pagination" id="photo-pagination">
                </ul>
            </nav>
        </div>
    </div>

    <div id="lightbox" onclick="closeLightbox()">
        <span id="lightbox-close" onclick="closeLightbox()">&times;</span>
        <img id="lightbox-image" src="" alt="">
    </div>

    <script>
        const dataPhoto = <?php echo json_encode($dataPhoto); ?>;
        const photoPerPages = <?php echo $photoPerPages; ?>;
        const pages = <?php echo $pages; ?>;
        let currentPages = <?php echo $currentPages; ?>;

        const categoryList = document.getElementById('category-list');
        const photoContainer = document.getElementById('photo-container');
        const photoGrid = document.getElementById('photo-grid');
        const categoryTitleElement = document.getElementById('category-title');
        const photoPagination = document.getElementById('photo-pagination');
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightbox-image');

        let currentCategory = null;
        let currentPage = currentPages;
        let filteredPhotos = [];

        function openLightbox(imgSrc) {
            lightboxImage.src = imgSrc;
            lightbox.style.display = 'flex';
        }

        function closeLightbox() {
            lightbox.style.display = 'none';
        }

        function displayPhotos(photos, page) {
            photoGrid.innerHTML = '';
            const startIndex = (page - 1) * photoPerPages;
            const endIndex = startIndex + photoPerPages;
            const photosToDisplay = photos.slice(startIndex, endIndex);

            if (photosToDisplay.length > 0) {
                photosToDisplay.forEach(photo => {
                    const photoItem = document.createElement('div');
                    photoItem.className = 'photo-item';
                    photoItem.innerHTML = `
                        <img src="<?= base_url('assets/images/banner/') ?>/${photo.image}" alt="${photo.title}">
                        <p class="photo-title">${photo.title}</p>
                    `;
                    photoItem.addEventListener('click', () => {
                        openLightbox("<?= base_url('assets/images/banner/') ?>/" + photo.image);
                    });
                    photoGrid.appendChild(photoItem);
                });
            } else {
                photoGrid.innerHTML = '<p>Tidak ada foto untuk ditampilkan.</p>';
            }
        }

        function renderPagination(totalPhotos) {
            photoPagination.innerHTML = '';
            const totalPages = Math.ceil(totalPhotos / photoPerPages);

            if (totalPages > 1) {

                const prevLi = document.createElement('li');
                prevLi.className = 'page-item ' + (currentPage === 1 ? 'disabled' : '');
                prevLi.innerHTML = `<a class="page-link" onclick="changePage(${currentPage - 1})" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>`;
                photoPagination.appendChild(prevLi);

                for (let i = 1; i <= totalPages; i++) {
                    const listItem = document.createElement('li');
                    listItem.className = 'page-item ' + (currentPage === i ? 'active' : '');
                    listItem.innerHTML = `<a class="page-link" onclick="changePage(${i})">${i}</a>`;
                    photoPagination.appendChild(listItem);
                }

                const nextLi = document.createElement('li');
                nextLi.className = 'page-item ' + (currentPage === totalPages ? 'disabled' : '');
                nextLi.innerHTML = `<a class="page-link" onclick="changePage(${currentPage + 1})" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>`;
                photoPagination.appendChild(nextLi);
            }
        }

        function changePage(newPage) {
            currentPage = newPage;
            displayPhotos(filteredPhotos, currentPage);
            renderPagination(filteredPhotos.length);
        }

        categoryList.addEventListener('click', function(event) {
            if (event.target.classList.contains('category-item')) {
                currentCategory = event.target.dataset.category;
                filteredPhotos = dataPhoto.filter(photo => photo.kategori === currentCategory);
                categoryTitleElement.textContent = `${currentCategory}`;
                photoContainer.style.display = 'block';
                currentPage = 1;
                displayPhotos(filteredPhotos, currentPage);
                renderPagination(filteredPhotos.length);
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
                renderPagination(filteredPhotos.length);

                firstCategoryElement.classList.add('active');
            }
        };
    </script>
</body>
</html>