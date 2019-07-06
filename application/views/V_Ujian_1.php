<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="shortcut icon" href="<?=base_url()?>/assets/img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="<?=base_url()?>/assets/img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="57x57" href="<?=base_url()?>/assets/img/apple-touch-icon-57x57.png">

  <title>GAD Exam</title>

  <!-- Bootstrap core CSS -->
  <link href="https://blackrockdigital.github.io/startbootstrap-bare/vendor/bootstrap/css/bootstrap.min.css"
    rel="stylesheet">
  <link href="<?=base_url()?>/assets/css/smart_wizard.css" rel="stylesheet" type="text/css" />

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Global Alih Daya</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Beranda
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5" style="padding-bottom:20px;">Global Alih Daya Virtual Live Exam</h1>
        <form id="exam_form" method="POST" role="form" data-toggle="validator" action="#">
          <div id="smartwizard">
            <ul>
              <?php 
              $no = 1;
              foreach($soal_ujian as $su){ 
              ?>
              <li><a href="#step-<?php echo $su->id ?>"><br /><?php echo $su->id ?></a></li>
              <?php } ?>
            </ul>

            <div class="text-center">
              <?php 
              $no = 1;
              foreach($soal_ujian as $su){ 
            ?>

              <div id="step-<?php echo $su->id ?>" class="text-center">

                <div class="row">

                  <div class="col">

                  <div id="form-step-<?php echo $su->id ?>" role="form" data-toggle="validator">
                    <div data-toggle="buttons">
                      <label class="btn btn-primary">
                        <input type="radio" name="options" id="soal-<?php echo $su->id ?>" autocomplete="off" value="1">
                        <?php echo $su->soal_1 ?>
                      </label>
                      <label class="btn btn-primary">
                        <input type="radio" name="options" id="soal-<?php echo $su->id ?>" autocomplete="off" value="2">
                        <?php echo $su->soal_2 ?>
                      </label>
                    </div>
                  </div>

                  </div>

                </div>

              </div>

              <?php } ?>
              
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url()?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>/assets/vendor/popper.js/umd/popper.min.js"> </script>
  <script src="<?=base_url()?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>/assets/js/jquery.smartWizard.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {

      var btnFinish = $('<button></button>').text('Selesai')
        .addClass('btn btn-success')
        .on('click', function () {
          if (!$(this).hasClass('disabled')) {
            var elmForm = $("#exam_form");
            if (elmForm) {
              elmForm.validator('validate');
              var elmErr = elmForm.find('.has-error');
              if (elmErr && elmErr.length > 0) {
                alert('Oops we still have error in the form');
                return false;
              } else {
                alert('Great! we are ready to submit form');
                elmForm.submit();
                return false;
              }
            }
          }
        });

      $('#smartwizard').smartWizard({
        selected: 0,
        autoAdjustHeight: true,
        transitionEffect: 'fade',
        transitionSpeed: '400',
        cycleSteps: false,
        showStepURLhash: false,
        contentCache: false,
        onFinish: function () {
          $("exam_form").submit();
        },
        lang: {  // Language variables
          next: '>>',
          previous: '<<'
        },
        toolbarSettings: {
          toolbarPosition: 'bottom',
          toolbarExtraButtons: [btnFinish]
        },
        anchorSettings: {
          markDoneStep: true, // add done css
          markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
          removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
          enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
        }
      });

      $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
                var elmForm = $("#form-step-" + stepNumber);
                // stepDirection === 'forward' :- this condition allows to do the form validation
                // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
                if(stepDirection === 'forward' && elmForm){
                  var radioValue = $("input[name='options']:checked").val();
                  if(radioValue){
                alert("Your are a - " + radioValue);
            }
                    elmForm.validator('validate');
                    var elmErr = elmForm.children('.has-error');
                    if(elmErr && elmErr.length > 0){
                        // Form validation failed
                        return false;
                    }
                }
                return true;
            });

      $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection) {
        // Enable finish button only on last step
        if (stepNumber == 3) {
          $('.btn-finish').removeClass('disabled');
        } else {
          $('.btn-finish').addClass('disabled');
        }
      });

    });
  </script>
</body>

</html>