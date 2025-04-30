<?php

$jumlahDataPerHalaman = 10;
$jumlahData = count($dataKelas);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['halaman'])) ? (int)$_GET['halaman'] : 1;
?>


<section class="bg-light">
  <div class="container py-3">
    <h2>Data Kelas</h2>
    <div class="table-responsive">
      <table class="table table-bordered" id="tabel-kelas">
        <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Wali Kelas</th>
          </tr>
        </thead>
        <tbody id="data-kelas-container"></tbody>
      </table>
    </div>

    <nav>
      <ul class="pagination justify-content-center" id="pagination-container"></ul>
    </nav>
  </div>
</section>



<script>
  const dataKelas = <?php echo json_encode($dataKelas ?? []); ?>;
  const jumlahDataPerHalaman = <?php echo $jumlahDataPerHalaman; ?>;
  const jumlahHalaman = <?php echo $jumlahHalaman; ?>;
  let halamanAktif = <?php echo $halamanAktif; ?>;
  const baseUrl = '<?php echo base_url(); ?>';

  const tbody = document.getElementById('data-kelas-container');
  const paginationContainer = document.getElementById('pagination-container');

  function tampilkanDataKelas(halaman) {
    const indexAwal = (halaman - 1) * jumlahDataPerHalaman;
    const dataHalamanIni = dataKelas.slice(indexAwal, indexAwal + jumlahDataPerHalaman);
    let html = '';

    dataHalamanIni.forEach((kelas, index) => {
      html += `
        <tr>
          <td>${indexAwal + index + 1}</td>
          <td>${kelas.Kelas}</td>
          <td>${kelas.Jurusan}</td>
          <td>${kelas.WaliKelas}</td>
        </tr>
      `;
    });

    tbody.innerHTML = html;
  }

  function buatPagination() {
  let paginationHTML = '';

  const maxPageToShow = 5;
  let start = Math.max(1, halamanAktif - Math.floor(maxPageToShow / 2));
  let end = Math.min(jumlahHalaman, start + maxPageToShow - 1);
  if (end - start < maxPageToShow - 1) {
    start = Math.max(1, end - maxPageToShow + 1);
  }

  if (halamanAktif > 1) {
    paginationHTML += `<li class="page-item"><a class="page-link" href="#" data-halaman="${halamanAktif - 1}">&laquo;</a></li>`;
  }

  for (let i = start; i <= end; i++) {
    const active = (i === halamanAktif) ? 'active' : '';
    paginationHTML += `<li class="page-item ${active}"><a class="page-link" href="#" data-halaman="${i}">${i}</a></li>`;
  }

  if (halamanAktif < jumlahHalaman) {
    paginationHTML += `<li class="page-item"><a class="page-link" href="#" data-halaman="${halamanAktif + 1}">&raquo;</a></li>`;
  }

  paginationContainer.innerHTML = paginationHTML;

  document.querySelectorAll('.page-link').forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const targetHalaman = parseInt(this.dataset.halaman);
      if (!isNaN(targetHalaman)) {
        halamanAktif = targetHalaman;
        tampilkanDataKelas(halamanAktif);
        buatPagination();

        const newUrl = new URL(window.location);
        newUrl.searchParams.set('halaman', halamanAktif);
        window.history.pushState({ path: newUrl.href }, '', newUrl.href);
      }
    });
  });
}


  // Inisialisasi awal
  tampilkanDataKelas(halamanAktif);
  buatPagination();

  window.addEventListener('popstate', () => {
    const params = new URLSearchParams(window.location.search);
    const halaman = parseInt(params.get('halaman')) || 1;
    if (halaman !== halamanAktif && halaman >= 1 && halaman <= jumlahHalaman) {
      halamanAktif = halaman;
      tampilkanDataKelas(halamanAktif);
      buatPagination();
    }
  });
</script>
