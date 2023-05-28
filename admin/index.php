<?php
session_start();
//koneksi ke database
include '../koneksi.php';

if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
function tanggal($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = bulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function bulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
function rupiah($angka)
{
    if ($angka != "") {
        $angkafix = $angka;
    } else {
        $angkafix = 0;
    }
    $hasilrupiah = "Rp " . number_format($angkafix, 2, ',', '.');
    return $hasilrupiah;
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>Pesankeun &mdash; ADMIN</title>

        <!-- General CSS Files -->
        <link rel="stylesheet" href="dist/assets/modules/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="dist/assets/modules/fontawesome/css/all.min.css">

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="dist/assets/modules/jqvmap/dist/jqvmap.min.css">
        <link rel="stylesheet" href="dist/assets/modules/summernote/summernote-bs4.css">
        <link rel="stylesheet" href="dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

        <!-- Template CSS -->
        <link rel="shortcut icon" type="image/png" href="assets/logobaru.png">
        <script src="assets/ckeditor/ckeditor.js"></script>
        <link rel="stylesheet" href="dist/assets/css/style.css">
        <link rel="stylesheet" href="dist/assets/css/components.css">
        <!-- Start GA -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-94034622-3');
        </script>
        <!-- /END GA -->
    </head>

    <body>
        <div id="app">
            <div class="main-wrapper main-wrapper-1">
                <div class="navbar-bg"></div>
                <nav class="navbar navbar-expand-lg main-navbar">
                    <form class="form-inline mr-auto">
                        <ul class="navbar-nav mr-3">
                            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                        </ul>
                    </form>
                    <ul class="navbar-nav navbar-right">

                        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <img alt="image" src="dist/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                                <div class="d-sm-none d-lg-inline-block">Admin</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="index.php?halaman=logout" onclick="return confirm('Apakah Anda Yakin Ingin Keluar ?');" class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="main-sidebar sidebar-style-2">
                    <aside id="sidebar-wrapper">
                        <div class="sidebar-brand">
                            <a href="index.php?halaman=beranda">ADMIN</a>
                        </div>
                        <div class="sidebar-brand sidebar-brand-sm">
                            <a href="index.php?halaman=beranda">St</a>
                        </div>
                        <ul class="sidebar-menu">
                            <li class="menu-header">Halaman</li>
                            <li><a class="nav-link active" href="index.php?halaman=beranda"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
                            <li><a class="nav-link active" href="index.php?halaman=kategori"><i class="fas fa-columns"></i> <span>Kategori</span></a></li>
                            <li><a class="nav-link active" href="index.php?halaman=produk"><i class="fas fa-square"></i> <span>Produk</span></a></li>
                            <li><a class="nav-link active" href="index.php?halaman=pembelian"><i class="fas fa-th"></i> <span>Transaksi</span></a></li>
                            <li><a class="nav-link active" href="index.php?halaman=pengguna"><i class="fa fa-user"></i> <span>Admin</span></a></li>
                            <li><a class="nav-link active" href="index.php?halaman=meja"><i class="fa fa-table"></i> <span>Meja</span></a></li>
                        </ul>
                    </aside>
                </div>
                <div class="container-fluid">
                    <div id="page-inner">
                        <?php
                        if (isset($_GET['halaman'])) {
                            if ($_GET['halaman'] == "produk") {
                                include 'produk.php';
                            } elseif ($_GET['halaman'] == "pembelian") {
                                include 'pembelian.php';
                            } elseif ($_GET['halaman'] == "detail") {
                                include 'detail.php';
                            } elseif ($_GET['halaman'] == "tambahproduk") {
                                include 'tambahproduk.php';
                            } elseif ($_GET['halaman'] == "hapusproduk") {
                                include 'hapusproduk.php';
                            } elseif ($_GET['halaman'] == "ubahproduk") {
                                include 'ubahproduk.php';
                            } elseif ($_GET['halaman'] == "logout") {
                                include 'logout.php';
                            } elseif ($_GET['halaman'] == "pembayaran") {
                                include 'pembayaran.php';
                            } elseif ($_GET['halaman'] == "kategori") {
                                include 'kategori.php';
                            } elseif ($_GET['halaman'] == "ubahkategori") {
                                include 'ubahkategori.php';
                            } elseif ($_GET['halaman'] == "detailproduk") {
                                include 'detailproduk.php';
                            } elseif ($_GET['halaman'] == "tambahkategori") {
                                include 'tambahkategori.php';
                            } elseif ($_GET['halaman'] == "hapuskategori") {
                                include 'hapuskategori.php';
                            } elseif ($_GET['halaman'] == "hapuspengguna") {
                                include 'hapuspengguna.php';
                            } elseif ($_GET['halaman'] == "pengguna") {
                                include 'pengguna.php';
                            } elseif ($_GET['halaman'] == "penggunatambah") {
                                include 'penggunatambah.php';
                            } elseif ($_GET['halaman'] == "penggunaedit") {
                                include 'penggunaedit.php';
                            } elseif ($_GET['halaman'] == "beranda") {
                                include 'beranda.php';
                            } elseif ($_GET['halaman'] == "meja") {
                                include 'meja.php';
                            } elseif ($_GET['halaman'] == "ubahmeja") {
                                include 'ubahmeja.php';
                            }
                        } else {
                            include 'beranda.php';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- General JS Scripts -->
        <script src="dist/assets/modules/jquery.min.js"></script>
        <script src="dist/assets/modules/popper.js"></script>
        <script src="dist/assets/modules/tooltip.js"></script>
        <script src="dist/assets/modules/bootstrap/js/bootstrap.min.js"></script>
        <script src="dist/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="dist/assets/modules/moment.min.js"></script>
        <script src="dist/assets/js/stisla.js"></script>

        <!-- JS Libraies -->
        <script src="dist/assets/modules/jquery.sparkline.min.js"></script>
        <script src="dist/assets/modules/chart.min.js"></script>
        <script src="dist/assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
        <script src="dist/assets/modules/summernote/summernote-bs4.js"></script>
        <script src="dist/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

        <!-- Page Specific JS File -->
        <script src="dist/assets/js/page/index.js"></script>

        <!-- Template JS File -->
        <script src="dist/assets/js/scripts.js"></script>
        <script src="dist/assets/js/custom.js"></script>
        <script src="assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/DataTables/JSZip-2.5.0/jszip.min.js"></script>
        <script src="assets/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
        <script src="assets/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
        <script src="assets/DataTables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
        <script src="assets/DataTables/Buttons-1.5.6/js/buttons.print.min.js"></script>
        <script src="assets/DataTables/Buttons-1.5.6/js/buttons.colvis.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#table').DataTable({
                    buttons: ['csv', 'print', 'excel', 'pdf'],
                    dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                        "<'row'<'col-md-12'tr>>" +
                        "<'row'<'col-md-5'i><'col-md-7'p>>",
                    lengthMenu: [
                        [5, 10, 25, 50, 100, -1],
                        [5, 10, 25, 50, 100, "ALL"]
                    ]
                });

                table.buttons().container()
                    .appendTo('#table_wrapper .col-md-5:eq(0)');
            });
        </script>
    </body>

    </html>