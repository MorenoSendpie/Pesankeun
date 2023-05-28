​​<div style="background: url('foto/bgbawah.webp');width: 100%;height: 350px;background-size: 100% 100%;">
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="assets_home/js/jquery-3.2.1.min.js"></script>
<script src="assets_home/js/popper.js"></script>
<script src="assets_home/js/bootstrap.min.js"></script>
<script src="assets_home/js/stellar.js"></script>
<script src="assets_home/vendors/lightbox/simpleLightbox.min.js"></script>
<script src="assets_home/vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="assets_home/vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="assets_home/vendors/isotope/isotope-min.js"></script>
<script src="assets_home/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="assets_home/js/jquery.ajaxchimp.min.js"></script>
<script src="assets_home/vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="assets_home/vendors/counter-up/jquery.counterup.js"></script>
<script src="assets_home/js/mail-script.js"></script>
<script src="assets_home/js/theme.js"></script>
<script>
    $(document).ready(function() {
        $('#tabel').DataTable({
            "lengthChange": false,
            "bInfo": false
        });
        var tabelkeranjang = $('#tabelkeranjang').DataTable({
            'paging': false,
            'lengthChange': false,
            'searching': true,
            'ordering': false,
            'info': false,
            'autoWidth': false
        })
        $('#pencariantabelkeranjang').on('keyup', function() {
            tabelkeranjang.search(this.value).draw();
        });
    });
</script>
</body>

</html>