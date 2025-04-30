<?php
$jumlahDataPerHalaman = 8;
$jumlahData = count($dataGuru);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$indexAwalData = ($halamanAktif - 1) * $jumlahDataPerHalaman;

// Tambahkan base_url ke setiap foto guru
foreach ($dataGuru as &$guru) {
    $guru['Foto'] = base_url($guru['Foto']);
}
unset($guru); // hindari efek samping referensi

$dataGuruHalamanIni = array_slice($dataGuru, $indexAwalData, $jumlahDataPerHalaman);
?>

    <section class="bg-light">
        <div class="container">
            <h1>Data Guru</h1>
            <div class="row" id="data-guru-container">
                </div>

            <nav aria-label="Halaman Data Guru">
                <ul class="pagination justify-content-center" id="pagination-container">
                    </ul>
            </nav>
        </div>
    </section>

    <script>
        const dataGuru = <?php echo json_encode($dataGuru ?? []); ?>;
        console.log(dataGuru);
        const jumlahDataPerHalaman = <?php echo $jumlahDataPerHalaman; ?>;
        const jumlahHalaman = <?php echo $jumlahHalaman; ?>;
        let halamanAktif = <?php echo $halamanAktif; ?>;
        const dataGuruContainer = document.getElementById('data-guru-container');
        const paginationContainer = document.getElementById('pagination-container');
        const baseUrl = '<?php echo base_url(); ?>'; // Pastikan base_url() sudah didefinisikan di CodeIgniter

        // Struktur HTML untuk satu item guru
        function buatItemGuruHTML(guru) {
            return `
                <div class="col-md-3">
                    <div class="photo-item card-guru" style="cursor: pointer;" onclick="window.location.href='${baseUrl}overview/detailGuru?id=${guru.Id}'">
                        <img src="${guru.Foto}" alt="${guru.Nama}" style="width: 100%; height: 30rem; display: block; object-fit: cover; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                        <div style="padding: 10px; text-align: center;">
                            <h6 class="photo-title" style="font-size: 0.9em; color: #333; margin-bottom: 5px;">${guru.Nama}</h6>
                            <p style="font-size: 0.8em; color: #666; margin-bottom: 10px;">NIP: ${guru.NIP}</p>
                        </div>
                    </div>
                </div>
            `;
        }

        function tampilkanDataGuru(halaman) {
            const indexAwal = (halaman - 1) * jumlahDataPerHalaman;
            const dataHalamanIni = dataGuru.slice(indexAwal, indexAwal + jumlahDataPerHalaman);
            let html = '';
            dataHalamanIni.forEach(guru => {
                html += buatItemGuruHTML(guru);
            });
            dataGuruContainer.innerHTML = html;
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
                        tampilkanDataGuru(halamanAktif);
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
        tampilkanDataGuru(halamanAktif);
        buatPagination();

        // Tangani perubahan URL history (jika pengguna menggunakan tombol back/forward browser)
        window.addEventListener('popstate', function(event) {
            const params = new URLSearchParams(window.location.search);
            const halaman = parseInt(params.get('halaman')) || 1;
            if (halaman >= 1 && halaman <= jumlahHalaman && halaman !== halamanAktif) {
                halamanAktif = halaman;
                tampilkanDataGuru(halamanAktif);
                buatPagination();
            }
        });
    </script>