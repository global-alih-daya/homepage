<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendor/popper.js/umd/popper.min.js')?>"> </script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendor/jquery.cookie/jquery.cookie.js')?>"> </script>
<script src="<?php echo base_url('assets/vendor/waypoints/lib/jquery.waypoints.min.js')?>"> </script>
<script src="<?php echo base_url('assets/vendor/jquery.counterup/jquery.counterup.min.js')?>"> </script>
<script src="<?php echo base_url('assets/vendor/owl.carousel/owl.carousel.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.parallax-1.1.3.js')?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap-select/js/bootstrap-select.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendor/jquery.scrollto/jquery.scrollTo.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/front.js')?>"></script>
<script src="https://blackrockdigital.github.io/startbootstrap-scrolling-nav/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url('assets/js/gad.js')?>"></script>

<script>
$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    
    $("#kota").prop( "disabled", true ); // Sembunyikan dulu combobox kota nya
    $("#provinsi").change(function(){ // Ketika user mengganti atau memilih data provinsi
    
    $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("Dashboard/ListKota"); ?>", // Isi dengan url/path file php yang dituju
        data: {province_id : $("#provinsi").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
        if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
        }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
        // set isi dari combobox kota
        // lalu munculkan kembali combobox kotanya
        $("#kota").prop( "disabled", false );
        $("#kota").html(response.list_kota).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
    });
    });
});
</script>