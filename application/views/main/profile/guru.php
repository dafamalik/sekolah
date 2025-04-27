<?php
// Data guru (contoh)
$dataGuru = [
    [
        'id' => 1,
        'nama' => 'Ahmad Muhrtarom, S.Pd.I',
        'gelar' => 'Guru Pendidikan Agama Islam',
        'nip' => '197710262010011012',
        'foto' => 'assets/img/imgGuru/Ahmad_Muhtarom.png' // Ganti dengan path foto sebenarnya
    ],
    [
        'id' => 2,
        'nama' => 'Andheny Purwasih',
        'gelar' => 'S.Pd',
        'nip' => '198711062010012022',
        'foto' => 'assets/img/imgGuru/Ahmad_Muhtarom.png'
    ],
    [
        'id' => 3,
        'nama' => 'Bahdian',
        'gelar' => 'S.Pd',
        'nip' => '199904272024211001',
        'foto' => 'assets/img/imgGuru/Ahmad_Muhtarom.png'
    ],
    [
        'id' => 4,
        'nama' => 'Nama Guru 4',
        'gelar' => 'S.Pd',
        'nip' => 'NIP Guru 4',
        'foto' => 'assets/img/imgGuru/Ahmad_Muhtarom.png'
    ],
    [
        'id' => 5,
        'nama' => 'Nama Guru 5',
        'gelar' => 'S.Pd',
        'nip' => 'NIP Guru 5',
        'foto' => 'assets/img/imgGuru/Ahmad_Muhtarom.png'
    ],
    [
        'id' => 6,
        'nama' => 'Nama Guru 6',
        'gelar' => 'S.Pd',
        'nip' => 'NIP Guru 6',
        'foto' => 'assets/img/imgGuru/Ahmad_Muhtarom.png'
    ],
    [
        'id' => 7,
        'nama' => 'Nama Guru 6',
        'gelar' => 'S.Pd',
        'nip' => 'NIP Guru 6',
        'foto' => 'assets/img/imgGuru/Ahmad_Muhtarom.png'
    ],
    // Tambahkan data guru lainnya di sini
];

// Pagination
$jumlahDataPerHalaman = 4;
$jumlahData = count($dataGuru);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$indexAwalData = ($halamanAktif - 1) * $jumlahDataPerHalaman;
$dataGuruHalamanIni = array_slice($dataGuru, $indexAwalData, $jumlahDataPerHalaman);
?>

    <section class="bg-light">
        <div class="container">
            <h1>Data Guru</h1>
            <div class="row" id="data-guru-container">
                <?php foreach ($dataGuruHalamanIni as $guru) : ?>
                    <div class="col-md-3">
                        <div class="photo-item card-guru" style="cursor: pointer;" onclick="window.location.href='detail_guru.php?id=<?php echo $guru['id']; ?>'">
                            <img src="<?php echo $guru['foto']; ?>" alt="<?php echo $guru['nama']; ?>" style="width: 100%; height: auto; display: block; object-fit: cover; border-radius-top-left: 5px; border-radius-top-right: 5px;">
                            <div style="padding: 10px; text-align: center;">
                                <h6 class="photo-title" style="font-size: 0.9em; color: #333; margin-bottom: 5px;"><?php echo $guru['nama']; ?></h6>
                                <p style="font-size: 0.8em; color: #666; margin-bottom: 10px;">NIP: <?php echo $guru['nip']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <nav aria-label="Halaman Data Guru">
                <ul class="pagination justify-content-center" id="pagination-container">
                    </ul>
            </nav>
        </div>
    </section>

    <script>
        const dataGuru = <?php echo json_encode($dataGuru); ?>;
        const jumlahDataPerHalaman = <?php echo $jumlahDataPerHalaman; ?>;
        const jumlahHalaman = <?php echo $jumlahHalaman; ?>;
        let halamanAktif = <?php echo $halamanAktif; ?>;
        const dataGuruContainer = document.getElementById('data-guru-container');
        const paginationContainer = document.getElementById('pagination-container');

        function tampilkanDataGuru(halaman) {
            const indexAwal = (halaman - 1) * jumlahDataPerHalaman;
            const dataHalamanIni = dataGuru.slice(indexAwal, indexAwal + jumlahDataPerHalaman);
            let html = '';
            dataHalamanIni.forEach(guru => {
                html += `
                    <div class="col-md-3">
                        <div class="photo-item card-guru" style="cursor: pointer;" onclick="window.location.href='detail_guru.php?id=${guru.id}'">
                            <img src="${guru.foto}" alt="${guru.nama}" style="width: 100%; height: auto; display: block; object-fit: cover; border-radius-top-left: 5px; border-radius-top-right: 5px;">
                            <div style="padding: 10px; text-align: center;">
                                <h6 class="photo-title" style="font-size: 0.9em; color: #333; margin-bottom: 5px;">${guru.nama}, ${guru.gelar}</h6>
                                <p style="font-size: 0.8em; color: #666; margin-bottom: 10px;">NIP: ${guru.nip}</p>
                            </div>
                        </div>
                    </div>
                `;
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