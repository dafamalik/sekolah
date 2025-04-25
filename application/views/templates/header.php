<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $title; ?></title>
        <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- BoxIcons -->
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
        <!-- Flat UI -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/css/flat-ui.min.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet" />

        <style>
            * {
                font-family: "Poppins", verdana, arial, sans-serif !important;
            }

            .m0 {
                margin: 0 !important;
            }

            .bg-custom-1 {
                background: #00ACEE !important;
            }

            .bg-custom-2 {
                background: #222f3e !important;
            }

            .bg-custom-3 {
                background: #1e272e !important;
            }
            
            .text-justify {
                text-align: justify !important;
            }

            .heading-custom {
                font-size: 3.1rem !important;
            }

            .fs-custom {
                font-size: 1.2rem !important;
            }
            
            .masthead::before {
                background-color:rgba(30, 39, 46, .9) !important;
            }

            .nav-link:hover {
                color: #0097e6 !important;
            }
            
            .navbar-brand img {
                width: 10% !important;
            }

            section, footer {
                padding: 5rem 0 !important;
            }

            .info-footer-custom {
                text-decoration: none !important;
            }

            .info-footer-custom:hover {
                color: #0097e6 !important;
            }

            /* Divider Custom */
            .divider-custom {
                width: 100% !important;
                display: flex !important;
                justify-content: center !important;
                align-items: center !important;
            }

            .divider-custom .divider-custom-line {
                width: 100% !important;
                max-width: 8.5rem !important;
                height: .25rem !important;
                background: #2c3e50 !important;
                border-radius: 1rem !important;
                border-color: #2c3e50 !important;
            }

            .divider-custom .divider-custom-icon {
                width: 1rem !important;
                height: 1rem !important;
                color: #2c3e50 !important;
                font-size: 2rem !important;
                border: .8rem solid #2c3e50 !important;
                border-radius: 50% !important;
            }

            .divider-custom .divider-custom-line:first-child {
                margin-right: 1rem !important;
            }

            .divider-custom .divider-custom-line:last-child {
                margin-left: 1rem !important;
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-sm" id="mainNav">
            <div class="container">
                <div class="d-block">
                    <a class="navbar-brand fw-bold fs-4" href="<?= base_url(); ?>">
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
                            <a class="nav-link me-lg-3" href="#page-top">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle me-lg-3" role="button" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                Profil
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Visi Misi dan Tujuan Sekolah</a></li>
                                <li><a class="dropdown-item" href="#">Data Guru</a></li>
                                <li><a class="dropdown-item" href="#">Data Tenaga Kependidikan</a></li>
                                <li><a class="dropdown-item" href="#">Data Peserta Didik</a></li>
                                <li><a class="dropdown-item" href="#">Data Kelas</a></li>
                                <li><a class="dropdown-item" href="#">Struktur Organisasi</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle me-lg-3" role="button" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                Kesiswaan
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Pendaftaran Peserta Didik Baru</a></li>
                                <li><a class="dropdown-item" href="#">Ekstrakulikuler</a></li>
                                <li><a class="dropdown-item" href="#">Tata Tertib SD</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle me-lg-3" role="button" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                Informasi
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Bantuan Dana untuk Siswa</a></li>
                                <li><a class="dropdown-item" href="#">Kalender Pendidikan</a></li>
                                <li><a class="dropdown-item" href="#">Kontak</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle me-lg-3" role="button" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                Galeri
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Kumpulan Video Sekolah</a></li>
                                <li><a class="dropdown-item" href="#">Kegiatan Siswa Siswi</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Background Video -->
        <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"><source src="<?= base_url('assets/'); ?>img/mp4/banner_video.mp4" type="video/mp4" /></video>
        
        <!-- Masthead-->
        <header class="masthead">
            <div class="masthead-content text-white">
                <div class="container-fluid px-4 px-lg-0">
                    <h1 class="heading-custom fst-italic lh-1 mb-4">Selamat Datang di Website Sekolah Kami</h1>
                    <p class="fs-custom mb-5">
                        Sekolah kami adalah tempat yang aman dan nyaman untuk belajar. Kami berkomitmen untuk memberikan pendidikan yang berkualitas kepada semua siswa kami. Kami berharap Anda dapat menemukan semua informasi yang Anda butuhkan di website kami.
                    </p>
                </div>
            </div>
        </header>
        
        <!-- Social Icons-->
        <div class="social-icons">
            <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
                <a class="btn btn-dark m-3" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-dark m-3" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark m-3" href="#!"><i class="fab fa-instagram"></i></a>
            </div>
        </div>