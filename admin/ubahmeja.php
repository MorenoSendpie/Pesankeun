<?php
if(isset($_POST['ubah'])){
    $jumlah_meja = $_POST['meja'];

    // Delete all existing tables
    $koneksi->query("DELETE FROM meja");

    // Insert new tables
    for($i = 1; $i <= $jumlah_meja; $i++){
        $koneksi->query("INSERT INTO meja (nomeja) VALUES ('$i')");
    }

    // Redirect to table list page
    echo "<script>alert('Meja berhasil diubah');</script>";
    echo "<script>location='index.php?page=meja';</script>";
}

$ambil = $koneksi->query("SELECT * FROM meja");
$data = $ambil->fetch_assoc();
?>
<br><br><br>
<div class="main-content">
    <div class="section-header mb-4">
        <h2>Ubah Meja</h2>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <form method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Jumlah Meja</label>
                                <input type="number" class="form-control" name="meja" value="<?php echo $data['nomeja']; ?>" required="">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" name="ubah">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
