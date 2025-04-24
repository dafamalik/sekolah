<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Bootsraps CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Google Font: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- BoxIcons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Flat UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/css/flat-ui.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
    <title><?= $title;?></title>
</head>
<body>

<header>
    <section class="news">
        <!-- Konten News -->
    </section>

    <!-- Navbar -->
    <section class="navbar navbar-expand-lg navbar-light .bg-primary py-3">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="assets/images/icons/LogoSekolah.png" width="60" height="60" class="d-inline-block align-top mr-3" alt="Logo">
            <div>
                <h5 class="mb-0">SDN-2 JAMBU</h5>
                <small class="text-muted">Sekolah Penggerak</small>
            </div>
        </a>
        <div class="collapse d-flex navbar-collapse justify-content-end" id="mainNavbar">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#">HOME</a></li>
                <li class="nav-item"><a class="nav-link" href="#">PROFIL</a></li>
                <li class="nav-item"><a class="nav-link" href="#">KESISWAAN</a></li>
                <li class="nav-item"><a class="nav-link" href="#">INFORMASI</a></li>
                <li class="nav-item"><a class="nav-link" href="#">GALERI</a></li>
            </ul>
        </div>
    </section>

    <!-- Banner -->
    <section class="banner">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="assets/images/banner/gambar1.jpg" class="d-block w-100" style="height: 600px; object-fit: cover;" alt="...">
            </div>
            <div class="carousel-item">
            <img src="assets/images/banner/gambar2.jpg" class="d-block w-100" style="height: 600px; object-fit: cover;" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleFade" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleFade" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
        </div>
    </section>
</header>
