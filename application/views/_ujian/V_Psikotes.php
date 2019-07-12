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

  <title>GAD - Psikotes (Bagian 2)</title>
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

    #konten {
      display: none;
    }

    .preload {
      display: inline-block;
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      width: 200px;
      height: 100px;
      margin: auto;
    }

    .hasil {
      display: none;
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      width: 900px;
      height: 100px;
      margin: auto;
    }
  </style>
</head>

<body style="height: 100%;">
  <div class="preload"><img src="<?php echo base_url('assets/img/Spinner-1s-200px.gif')?>"></div>

  <div class="hasil">
    <div class="col-lg-12">
      <h1 class="display-6 text-center">Terimakasih telah melakukan psikotes!</h1>
      <p class="lead text-center">Jika Anda lolos, Anda akan dihubungi oleh kami kembali untuk proses selanjutnya.</p>
      <br>
      <p class="text-center">Anda akan diarahkan menuju halaman utama kami dalam 10 detik.</p>
    </div>
  </div>

  <div class="container" style="padding-top:20px;" id="konten">

    <div class="h-100 row align-items-center">
      <div class="col-lg-12">
        <br>
        <div class="card text-center">
          <div class="card-body">
            <!-- Tampilkan Timer -->
            <h3 class="text-center display-1 text-info"><strong>
                <span id="spnSeconds" data-time="600000">10:00</span>
              </strong></h3>
            <hr>
            <p class="lead text-danger"><strong>Perhatian! Setelah waktu habis, jawaban psikotes langsung
                tersubmit.</strong></p>
          </div>
        </div>
        <br>
        <form id="mbtiForm">
          <div id="smartwizard" class="swMain">
            <ul>
              <li><a href="#step-1" style="display: none;">Exam Test<br /><small></small></a></li>
              <?php 
                $i=1;
                $q=2;
                foreach($psikotes as $su){ 
                ?>
              <li><a href="#step-<?=$q?>" style="display: none;"><?=$i?><br /><small></small></a></li>
              <?php $i++; $q++;} ?>
            </ul>
            <div>
              <div id="step-1">
                <p class="lead">Silahkan masukkan Nama, Nomor HP, dan ID Peserta anda pada kolom dibawah ini sebelum
                  memulai
                  psikotes.</p>
                <div class="row">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Nama Lengkap" id="nama" name="nama"
                      data-validation="required" data-validation-error-msg="Mohon isi nama anda" oninput="hello()">
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="No HP" id="no_hp" name="no_hp"
                      data-validation="required" data-validation-error-msg="Mohon isi nomor HP anda" oninput="hello()">
                  </div>
                  <input type="hidden" name="jam_mulai" value="">
                </div>
                <br>
                <div class="row">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="ID Peserta" id="refid" name="refid"
                      data-validation="required" data-validation-error-msg="Mohon ID Peserta anda" oninput="hello()">
                  </div>
                </div>
              </div>
              <?php 
                $i=1;
                $q=2;
                foreach($psikotes as $su){ 
              ?>
              <?php $jwb = array($su->jawaban_1,$su->jawaban_2,$su->jawaban_3,$su->jawaban_4); ?>
              <div id="step-<?=$q?>">
                <h4><strong><?=$i?>. <?php echo $su->soal ?> ?</strong></h4>
                <hr>
                <div class="form-group">
                  <div class="custom-control custom-radio">
                    <input type="radio" id="jawaban<?=$i?>" name="jawaban<?=$i?>" class="custom-control-input" value="A">
                    <label class="custom-control-label" for="jawaban<?=$i?>"><?=$jwb[0]?></label>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <div class="custom-control custom-radio">
                    <input type="radio" id="jawaban<?=$i?>1" name="jawaban<?=$i?>" class="custom-control-input" value="B">
                    <label class="custom-control-label" for="jawaban<?=$i?>1"><?=$jwb[1]?></label>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <div class="custom-control custom-radio">
                    <input type="radio" id="jawaban<?=$i?>2" name="jawaban<?=$i?>" class="custom-control-input" value="C">
                    <label class="custom-control-label" for="jawaban<?=$i?>2"><?=$jwb[2]?></label>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <div class="custom-control custom-radio">
                    <input type="radio" id="jawaban<?=$i?>3" name="jawaban<?=$i?>" class="custom-control-input" value="D"> 
                    <label class="custom-control-label" for="jawaban<?=$i?>3"><?=$jwb[3]?></label>
                  </div>
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
  <script src="<?=base_url()?>/assets/js/jquery.smartWizard.js"></script>

  <!-- SmartWizard -->
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
        showStepURLhash: false,
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

      //fungsi showStep pada smartwizard
      $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection) {
        if ($('button.sw-btn-next').hasClass('disabled')) {
          $('.sw-btn-next').hide(); //sembunyikan tombol next
          $('.sw-btn-group-extra').show(); //tampilkan tombol selesai
        } else {
          $('.sw-btn-group-extra').hide();
          $('.sw-btn-group-next').show();
        }
      });

      //Jika user pada step 0 / soal pertama maka timer akan dimulai
      $("#smartwizard").on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {
        if (stepNumber == "0") {
          intervalsx();
          JamStart();
        };
      });
    });
  </script>

  <!-- Timer -->
  <script>
    function pad(num, size) {
      var s = "000000000" + num;
      return s.substr(s.length - size);
    }

    var intervalsx = function startTimer() {
      window.setInterval(function () {
        var iTimeRemaining = $("#spnSeconds").data('time');
        iTimeRemaining = ~~iTimeRemaining;
        if (iTimeRemaining == 0) {
          $("#spnSeconds").data('time', iTimeRemaining + 10000000000);
          $('#submit').trigger('click');
        } else {
          var mins = ~~(iTimeRemaining / 60000);
          $("#spnSeconds").html(mins + ":" + pad(~~(iTimeRemaining / 1000 % 60), 2));
          $("#spnSeconds").data('time', iTimeRemaining - 1000);
        }
      }, 1000);
    }
  </script>

  <script>
    $(document).ready(function () {
      $('.sw-btn-group-extra').hide();
      $('.sw-btn-next').prop("disabled", true);
      $('.sw-btn-next').click(function () {
        $(this).prop("disabled", true);
      });
      $('.custom-radio').click(function (event) {
        $('.sw-btn-next').prop("disabled", false);
      });
    });
  </script>

  <script>
    function hello() {
      var textBox = $.trim($('input[type=text]').val())
      if (textBox == "") {
        $('.sw-btn-next').prop("disabled", true)
      } else {
        $('.sw-btn-next').prop("disabled", false)
      }
    }

    function JamStart() {
      localStorage.removeItem("fulldate");
      var d = new Date($.now());
      var fulldate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
      localStorage.setItem("fulldate", fulldate);
      $('input[name="jam_mulai"]').val(localStorage.getItem("fulldate"));
    }
  </script>

  <script>
    $(function () {
      $(".preload").fadeOut(2000, function () {
        $("#konten").fadeIn(1000);
      });
    });
  </script>

  <script>
    $(document).ready(function () {
      $('#submit').click(function () {

        $('.sw-btn-group-extra').hide();
        $.ajax({
          url: "<?php echo base_url('Ujian/jawab_psikotes')?>",
          type: "POST",
          data: $("#mbtiForm").serialize(),
          success: function (data) {
            $(function () {
              $("#konten").fadeOut(1000, function () {
                $(".hasil").fadeIn(500);
              });
              window.setTimeout(function () {
                window.location.href = '<?php echo base_url() ?>';
              }, 10000);
            });
          }

        });

        return false;

      });
    });
  </script>

</body>

</html>