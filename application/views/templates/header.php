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