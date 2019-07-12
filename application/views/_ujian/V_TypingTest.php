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

  <title>GAD - TypingTest</title>
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

    .vl {
      border-left: 2px solid rgb(179, 176, 176);
      height: auto;
    }

    .highlight {
      background-color: #FFFF88;
    }
  </style>
</head>

<body style="height: 100%;" oncontextmenu="return false">
  <div class="preload"><img src="<?php echo base_url('assets/img/Spinner-1s-200px.gif')?>"></div>

  <div class="hasil">
    <div class="col-lg-12">
      <h1 class="display-6 text-center">Terimakasih telah melakukan TypingTest!</h1>
      <p class="lead text-center">Jika Anda lolos, Anda akan dihubungi oleh kami kembali untuk proses selanjutnya.
      </p>
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
            <div class="row">
              <div class="col">
                <p>Waktu</p>
                <h4 class="text-center">
                  <span id="spnSeconds" data-time="60000" class="text-info">1:00</span>
                </h4>
              </div>
              <div class="vl"></div>
              <div class="col">
                <p>Jumlah / Total Karakter</p>
                <h4><span id="characters" name="characters">0</span> / <span id="characters2"
                    class="text-success"></span>
                </h4>
              </div>
              <div class="vl"></div>
              <div class="col">
                <p>WPM</p>
                <h4><span id="wpmshow" name="wpmshow">00.00</span>
              </div>
            </div>
          </div>
        </div>
        <br>
        <form id="typingtestForm">
          <div id="smartwizard" class="swMain">
            <ul>
              <li><a href="#step-1" style="display: none;">Exam Test<br /><small></small></a></li>
              <?php 
                $i=1;
                $q=2;
                foreach($typingtest as $su){ 
                ?>
              <li><a href="#step-<?=$q?>" style="display: none;"><?=$i?><br /><small></small></a></li>
              <?php $i++; $q++;} ?>
            </ul>
            <div>
              <div id="step-1">
                <p class="lead">Silahkan masukkan Nama, Nomor HP, dan ID Peserta anda pada kolom dibawah
                  ini sebelum
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
                  <input type="hidden" name="symbolCount" id="symbolCount" value="">
                  <input type="hidden" name="timerHitung" id="timerHitung" value="">
                  <input type="hidden" name="jumlah_karakter" id="jumlah_karakter" value="">
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
                foreach($typingtest as $su){ 
              ?>
              <div id="step-<?=$q?>">
                <div class="row">
                  <div class="col">
                    <p class="lead text-center">Ketik kembali teks dibawah ini</hp>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col">
                    <p class="text-justify" id="soal" onmousedown='return false;' onselectstart='return false;'
                      ondragstart="return false" oncopy="return false" onpaste="return false"><?php echo $su->soal ?>
                    </p>
                    <hr>
                    <div class="form-group">
                      <textarea class="form-control" id="words" rows="6"></textarea>
                    </div>
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
  <script src="<?=base_url()?>/assets/js/jquery.highlight.js"></script>

  <!-- SmartWizard -->
  <script type="text/javascript">
    $(document).ready(function () {

      // variabel untuk membuat extra button pada smartwizard
      var btnFinish = $('<button id="submit"></button>').text('Selesai')
        .addClass('btn btn-success');

      $('#smartwizard').smartWizard({
        selected: 0,  // Initial selected step, 0 = first step 
        cycleSteps: false,
        keyNavigation: false,
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
          $('.sw-btn-group').hide(); //sembunyikan tombol next
          $('.sw-btn-group-extra').show(); //tampilkan tombol selesai
          $('#words').bind("cut copy paste", function (e) {
            e.preventDefault();
          });
        } else {
          $('.sw-btn-group-extra').hide();
          $('.sw-btn-group-next').show();
        }
      });

      //Jika user pada step 0 / soal pertama maka timer akan dimulai
      $("#smartwizard").on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {
        if (stepNumber == "0") {
          $('#words').focus();
          intervalsx();
          JamStart();
          var start = new Date;

          stopTimer = setInterval(function () {
            $('#timerHitung').val((Math.round((new Date - start) / 1000, 0)));
          }, 1000);
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

          if (!$('#characters').text() == "") {
            var cs = $('#characters').text();
            var as = $('#timerHitung').val();

            var bb = parseFloat(cs / 5 / (as / 60));
            var ahs = bb.toFixed(2);
          }

          $('#wpmshow').text(ahs);
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

      $('textarea').keyup(updateCount);
      $('textarea').keydown(updateCount);

      function updateCount() {

        var cs = $(this).val().length;
        var aa = $(this).val();

        $('#characters').text(cs);
        $('#jumlah_karakter').val(cs);


        if (!$(this).val().match(/[$-/:-?{-~!"^_`\[\]]/g)) {
          $('#symbolCount').val('0');
        } else {
          var regsym = $(this).val().match(/[$-/:-?{-~@#()!"^_`\[\]]/g).length;
          $('#symbolCount').val(regsym);
        }

      }

      var text = document.querySelector('#soal').innerText;
      var textlengthx = text.trim().length;

      $('#characters2').text(textlengthx);
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
          url: "<?php echo base_url('Ujian/jawab_typingtest')?>",
          type: "POST",
          data: $("#typingtestForm").serialize(),
          success: function (data) {
            $(function () {
              clearInterval(stopTimer);
              $('#words').attr("disabled", "disabled");
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