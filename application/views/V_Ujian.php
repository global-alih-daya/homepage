<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="<?=base_url()?>/assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/vendor/bootstrap-select/css/bootstrap-select.min.css">
  <link href="<?=base_url()?>/assets/css/smart_wizard.css" rel="stylesheet" type="text/css" />
  <!-- Favicon and apple touch icons-->
  <link rel="shortcut icon" href="<?=base_url()?>/assets/img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="<?=base_url()?>/assets/img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="57x57" href="<?=base_url()?>/assets/img/apple-touch-icon-57x57.png">

  <title>Live Exam</title>
  <style>
    .zoome {
      zoom: 85%;
    }

    .btn-xl {
      padding: 10px 20px;
      font-size: 20px;
      border-radius: 10px;
      width: 50%;
    }
  </style>
</head>

<body style="padding-top: 5rem;">

  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">GAD Live Exam</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
      aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
      </ul>
    </div>
  </nav>

  <div class="container" style="padding-top:20px;">
    <!-- <div class="row align-items-center h-100">
      <div class="col-lg-12 my-auto mx-auto">
        <?php echo $this->session->flashdata('message');?>
        <form action="<?php echo base_url('Dashboard/jawab_ujian') ?>" method="post">
          <div class="card"
            style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding-bottom: 20px;">
            <div class="card-header text-center">
              PT. Global Alih Daya Live Exam Test
            </div>
            <div class="card-body">
              <p class="card-text">Silahkan masukkan nama dan ID peserta anda pada kolom dibawah ini sebelum memulai
                ujian.</p>
              <div class="row">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Nama Lengkap" id="nama" name="nama"
                    data-validation="required" data-validation-error-msg="Mohon isi nama anda">
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="ID Peserta" id="refid" name="refid"
                    data-validation="required" data-validation-error-msg="Mohon isi ID/Nomor peserta anda">
                </div>
                <input type="hidden" name="jam_mulai" value="">
              </div>
            </div>
          </div>
          <br>
          <div class="card"
            style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding-bottom: 20px;">
            <div class="card-header text-center">
              jawablah soal dibawah ini sesuai dengan diri anda
            </div>
            <div class="card-body">
              <table class="table table-borderless">
                <tbody>
                  <?php 
                        $i=1;
                        $no=1;
                        foreach($soal_ujian as $su){ 
                      ?>
                  <?php $soal = array($su->soal_1,$su->soal_2); ?>
                  <tr>
                    <td class="text-center">
                      <div class="btn-group btn-group-toggle btn-block btn-lg" data-toggle="buttons">
                        <label class="btn btn-outline-dark">
                          <input type="radio" name="jawaban<?=$i?>" value="1" autocomplete="off"
                            data-validation="required"> <?=$soal[0]?>
                        </label>
                        <label class="btn btn-outline-dark">
                          <input type="radio" name="jawaban<?=$i?>" value="2" autocomplete="off"
                            data-validation="required"> <?=$soal[1]?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <?php $i++; $no++;} ?>
                </tbody>
              </table>
            </div>
            <div class="card-footer text-muted">
              <button type="submit" class="btn btn-primary btn-block">Selesai</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <br> -->
    <div class="row align-items-center h-100">
      <div class="col-lg-12 my-auto mx-auto">
        <h3>PT. Global Alih Daya Live Exam</h3>
        <?php echo $this->session->flashdata('message');?>
        <div class="card">
          <div class="card-body">
            <form action="<?php echo base_url('Dashboard/jawab_ujian') ?>" method="post">
              <div id="smartwizard" class="swMain">
                <ul>
                  <li><a href="#step-1">Exam Test<br /><small></small></a></li>
                  <?php 
                    $i=1;
                    $q=2;
                    foreach($soal_ujian as $su){ 
                    ?>
                  <li><a href="#step-<?=$q?>" style="display: none;"><?=$i?><br /><small></small></a></li>
                  <?php $i++; $q++;} ?>
                </ul>
                <div>
                  <div id="step-1">
                    <p class="lead">Silahkan masukkan nama dan ID peserta anda pada kolom dibawah ini sebelum
                      memulai
                      ujian.</p>
                    <div class="row">
                      <div class="col">
                        <input type="text" class="form-control" placeholder="Nama Lengkap" id="nama" name="nama"
                          data-validation="required" data-validation-error-msg="Mohon isi nama anda">
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="ID Peserta" id="refid" name="refid"
                          data-validation="required" data-validation-error-msg="Mohon isi ID/Nomor peserta anda">
                      </div>
                      <input type="hidden" name="jam_mulai" value="">
                    </div>
                  </div>
                  <?php 
                    $i=1;
                    $q=2;
                    foreach($soal_ujian as $su){ 
                  ?>
                  <?php $soal = array($su->soal_1,$su->soal_2); ?>
                  <div id="step-<?=$q?>" class="text-center">
                    <p class="lead">Silahkah pilih salah satu yang sesuai dengan diri anda</p>
                    <div class="btn-group-vertical btn-group-toggle btn-block" data-toggle="buttons">
                      <label class="btn btn-outline-dark btn-lg">
                        <input type="radio" name="jawaban<?=$i?>" value="1" autocomplete="off"
                          data-validation="required"> <?=$soal[0]?>
                      </label>
                      <label class="btn btn-outline-dark btn-lg">
                        <input type="radio" name="jawaban<?=$i?>" value="2" autocomplete="off"
                          data-validation="required"> <?=$soal[1]?>
                      </label>
                    </div>
                  </div>
                  <?php $i++; $q++;} ?>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <br>
  </div>

  <script src="<?=base_url()?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>/assets/vendor/popper.js/umd/popper.min.js"> </script>
  <script src="<?=base_url()?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>/assets/js/jquery.smartWizard.js"></script>

  <script>
    $(document).ready(function () {
      localStorage.removeItem("fulldate");
      var d = new Date($.now());
      var fulldate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
      localStorage.setItem("fulldate", fulldate);
      $('input[name="jam_mulai"]').val(localStorage.getItem("fulldate"));
    });
  </script>

  <script>
    $.validate({
      lang: 'en',
      modules: 'toggleDisabled',
      disabledFormFilter: 'form.toggle-disabled',
      borderColorOnError: '#FFF',
      addValidClassOnAll: true,
      errorMessagePosition: 'top'
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function () {

      // variabel untuk membuat extra button pada smartwizard
      var btnFinish = $('<button></button>').text('Selesai')
        .addClass('btn btn-success');

      $('#smartwizard').smartWizard({
        selected: 0,  // Initial selected step, 0 = first step 
        cycleSteps: false,
        keyNavigation: true,
        useURLhash: false,
        transitionEffect: 'fade',
        transitionSpeed: '400',
        //autoAdjustHeight: false,
        lang: {  // Language variables
          next: 'Selanjutnya',
          previous: 'Sebelumnya'
        },
        anchorSettings: {
          anchorClickable: false, // Enable/Disable anchor navigation
          enableAllAnchors: false, // Activates all anchors clickable all times
          markDoneStep: false, // add done css
          enableAnchorOnDoneStep: false // Enable/Disable the done steps navigation
        },
        toolbarSettings: {
          toolbarPosition: 'bottom',
          toolbarButtonPosition: 'end',
          toolbarExtraButtons: [btnFinish]
        }
      });

      $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection) {
        if ($('button.sw-btn-next').hasClass('disabled')) {
          $('.button.sw-btn-next').hide(); //sembunyikan tombol next
          $('.sw-btn-group-extra').show(); //tampilkan tombol selesai
        } else {
          $('.sw-btn-group-extra').hide();
          $('.sw-btn-group-next').show();
        }

      });
    });
  </script>

  <script>
    //Disable extra button pada smartwizard pada saat page load
    $(document).ready(function () {
      $('.sw-btn-group-extra').hide();
    });
  </script>

</body>

</html>