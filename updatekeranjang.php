<?php
session_start();
include 'koneksi.php';
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
$idproduk = $_POST['idproduk'];
$jumlah = $_POST['jumlah'];

$_SESSION['keranjang'][$idproduk] = $jumlah;

// Calculate the new total harga
$ambil = $koneksi->query("SELECT * FROM produk WHERE idproduk='$idproduk'");
$data = $ambil->fetch_assoc();
$totalharga = $data['hargaproduk'] * $jumlah;

// Return the new total harga as a response
$response = array('totalharga' => rupiah($totalharga), 'tulisan' => 'Jumlah Pesanan : ' . $jumlah . ' x ' . rupiah($data['hargaproduk']));
echo json_encode($response);
