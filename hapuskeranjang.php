<?php
session_start();

if (isset($_POST['idproduk'])) {
    $idproduk = $_POST['idproduk'];
    unset($_SESSION['keranjang'][$idproduk]);
    $response = array('idproduk' => $idproduk);
    echo json_encode($response);
}
