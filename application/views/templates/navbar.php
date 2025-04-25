    <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-sm" id="mainNav">
            <div class="container">
                <div class="d-block">
                    <a class="navbar-brand fw-bold fs-4" href="<?= base_url(''); ?>">
                        <img src="<?= base_url('assets/'); ?>img/icons/LogoSekolah.png" alt="Logo Sekolah">
                        <span>SDN Rawa Buaya 09</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bi-list"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link me-lg-3" href="<?= base_url('overview'); ?>">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle me-lg-3" role="button" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                Profil
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url('overview/schoolVisiMisi'); ?>">Visi Misi dan Tujuan Sekolah</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('overview/dataTeacher'); ?>">Data Guru</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('overview/educaPersonalData'); ?>">Data Tenaga Kependidikan</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('overview/studentData'); ?>">Data Peserta Didik</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('overview/classData'); ?>">Data Kelas</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('overview/organizationStructur'); ?>">Struktur Organisasi</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle me-lg-3" role="button" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                Kesiswaan
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url('overview/newStudentRegist'); ?>">Pendaftaran Peserta Didik Baru</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('overview/Extracurricular'); ?>">Ekstrakulikuler</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('overview/rules'); ?>">Tata Tertib SD</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle me-lg-3" role="button" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                Informasi
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url('overview/FinancialAssStudent'); ?>">Bantuan Dana untuk Siswa</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('overview/calender'); ?>">Kalender Pendidikan</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('overview/contact'); ?>">Kontak</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle me-lg-3" role="button" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                Galeri
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url('overview/schoolVideo'); ?>">Kumpulan Video Sekolah</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('overview/studentActivities'); ?>">Kegiatan Siswa Siswi</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>