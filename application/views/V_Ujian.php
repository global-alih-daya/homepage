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

<body style="height: 100%;">

  <div class="container" style="padding-top:20px;">
    <div class="h-100 row align-items-center">
      <div class="col-lg-12">
        <?php echo $this->session->flashdata('message');?>
        <br>
        <div class="card text-center">
          <div class="card-body">
            <h3 class="text-center display-1 text-info"><strong>
                <span id="spnSeconds" data-time="1510000">00:00</span>
              </strong></h3>
            <hr>
            <p class="lead text-danger"><strong>Perhatian! Setelah waktu habis, ujian akan otomatis tersubmit.</strong></p>
          </div>
        </div>
        <br>
        <form action="<?php echo base_url('Dashboard/jawab_ujian') ?>" method="post">
          <div id="smartwizard" class="swMain">
            <ul>
              <li><a href="#step-1" style="display: none;">Exam Test<br /><small></small></a></li>
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
                      data-validation="required" data-validation-error-msg="Mohon isi nama anda" oninput="hello()">
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="ID Peserta" id="refid" name="refid"
                      data-validation="required" data-validation-error-msg="Mohon isi ID/Nomor peserta anda" oninput="hello()">
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
                  <label class="btn btn-outline-dark btn-lg" id="btngroupwiz">
                    <input type="radio" name="jawaban<?=$i?>" value="1" autocomplete="off"
                      data-validation="required"> <?=$soal[0]?>
                  </label>
                  <label class="btn btn-outline-dark btn-lg">
                    <input type="radio" name="jawaban<?=$i?>" value="2" autocomplete="off"
                      data-validation="required""> <?=$soal[1]?>
                  </label>
                </div>
              </div>
              <?php $i++; $q++;} ?>
            </div>
          </div>
        </form>
      </div>
    </div>
    <br>
  </div>

  <script src="<?=base_url()?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>/assets/vendor/popper.js/umd/popper.min.js"></script>
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

  <script type="text/javascript">
    $(document).ready(function () {

      // variabel untuk membuat extra button pada smartwizard
      var btnFinish = $('<button id="submit"></button>').text('Selesai')
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
          $('.sw-btn-next').hide(); //sembunyikan tombol next
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
      $('.sw-btn-next').prop("disabled", true);
      $('.sw-btn-next').click(function () {
        $(this).prop("disabled", true);
      });
      $('.btn-group-vertical').click(function (event) {
        //Process button click event
        $('.sw-btn-next').prop("disabled", false);
      });
    });
  </script>

  <script>
  function hello() {
    if ($('#nama').val == "" || $('#refid').val == "") {
      $('.sw-btn-next').prop("disabled", true)
    } else {
      $('.sw-btn-next').prop("disabled", false)
    }
  }
  </script>

  <script>
    function pad(num, size) {
      var s = "000000000" + num;
      return s.substr(s.length - size);
    }

    $(document).ready(function () {
      window.setInterval(function () {
        var iTimeRemaining = $("#spnSeconds").data('time');
        iTimeRemaining = ~~iTimeRemaining;
        if (iTimeRemaining == 0) {
          $('#submit').trigger('click');
        } else {
          var mins = ~~(iTimeRemaining / 60000);
          $("#spnSeconds").html(mins + ":" + pad(~~(iTimeRemaining / 1000 % 60), 2));
          $("#spnSeconds").data('time', iTimeRemaining - 1000);
        }
      }, 1000);
    });
  </script>

</body>

</html>