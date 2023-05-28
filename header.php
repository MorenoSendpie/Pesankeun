<?php
include 'koneksi.php';
$datakategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {
  $datakategori[] = $tiap;
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
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Pesankeun</title>
    <link rel="stylesheet" href="assets_home/css/bootstrap.css" />
    <link rel="stylesheet" href="assets_home/vendors/linericon/style.css" />
    <link rel="stylesheet" href="assets_home/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets_home/css/themify-icons.css" />
    <link rel="stylesheet" href="assets_home/css/flaticon.css" />
    <link rel="stylesheet" href="assets_home/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets_home/vendors/lightbox/simpleLightbox.css" />
    <link rel="stylesheet" href="assets_home/vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="assets_home/vendors/animate-css/animate.css" />
    <link rel="stylesheet" href="assets_home/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="assets_home/css/style.css" />
    <link rel="stylesheet" href="assets_home/css/responsive.css" />
    <link rel="shortcut icon" type="image/png" href="assets_home/img/logobaru.png">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">

  </head>

  <body>
    <header class="header_area">
      <div class="top_menu">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="float-left">
                <p><i class="fa fa-phone"></i> 1273 5423 47</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="main_menu">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light w-100">
            <a class="navbar-brand logo_h" href="index.php">
              <img style="height:80px;padding-top:10%;" src="assets_home/img/logobaru.png" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
              <div class="row w-100 mr-0">
                <div class="col-lg-12 pr-0">
                  <ul class="nav navbar-nav center_nav pull-right">
                    <li class="nav-item">
                      <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="produk.php">Menu</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="keranjang.php">Keranjang</a>
                    </li>
                    <li class="nav-item submenu dropdown">
                      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kategori</a>
                      <ul class="dropdown-menu">
                        <?php foreach ($datakategori as $key => $value) : ?>
                          <li class="nav-item">
                            <a class="nav-link" href="kategori.php?id=<?php echo $value["idkategori"] ?>"><?php echo $value["namakategori"] ?></a>
                          </li>
                        <?php endforeach ?>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="riwayat.php">Pesanan</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </header>