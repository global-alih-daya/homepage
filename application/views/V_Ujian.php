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
                <span id="spnSeconds" data-time="899000">15:00</span>
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

  <script type="text/javascript">
    //konfigurasi smartwizard
    var a=['\x61\x70\x70\x6c\x79','\x5c\x2b\x5c\x2b\x20\x2a\x28\x3f\x3a\x5f\x30\x78\x28\x3f\x3a\x5b\x61\x2d\x66\x30\x2d\x39\x5d\x29\x7b\x34\x2c\x36\x7d\x7c\x28\x3f\x3a\x5c\x62\x7c\x5c\x64\x29\x5b\x61\x2d\x7a\x30\x2d\x39\x5d\x7b\x31\x2c\x34\x7d\x28\x3f\x3a\x5c\x62\x7c\x5c\x64\x29\x29','\x69\x6e\x69\x74','\x74\x65\x73\x74','\x63\x68\x61\x69\x6e','\x69\x6e\x70\x75\x74','\x64\x6c\x76\x6a\x57','\x64\x65\x62\x75','\x67\x67\x65\x72','\x63\x61\x6c\x6c','\x61\x63\x74\x69\x6f\x6e','\x45\x74\x50\x79\x4c','\x72\x65\x74\x75\x72\x6e\x20\x28\x66\x75\x6e\x63\x74\x69\x6f\x6e\x28\x29\x20','\x7b\x7d\x2e\x63\x6f\x6e\x73\x74\x72\x75\x63\x74\x6f\x72\x28\x22\x72\x65\x74\x75\x72\x6e\x20\x74\x68\x69\x73\x22\x29\x28\x20\x29','\x63\x6f\x6e\x73\x6f\x6c\x65','\x6c\x6f\x67','\x77\x61\x72\x6e','\x64\x65\x62\x75\x67','\x69\x6e\x66\x6f','\x65\x78\x63\x65\x70\x74\x69\x6f\x6e','\x74\x72\x61\x63\x65','\x72\x49\x4c\x74\x46','\x65\x72\x72\x6f\x72','\x72\x65\x61\x64\x79','\x3c\x62\x75\x74\x74\x6f\x6e\x20\x69\x64\x3d\x22\x73\x75\x62\x6d\x69\x74\x22\x3e\x3c\x2f\x62\x75\x74\x74\x6f\x6e\x3e','\x74\x65\x78\x74','\x53\x65\x6c\x65\x73\x61\x69','\x61\x64\x64\x43\x6c\x61\x73\x73','\x62\x74\x6e\x20\x62\x74\x6e\x2d\x73\x75\x63\x63\x65\x73\x73','\x73\x6d\x61\x72\x74\x57\x69\x7a\x61\x72\x64','\x66\x61\x64\x65','\x34\x30\x30','\x53\x65\x6c\x61\x6e\x6a\x75\x74\x6e\x79\x61','\x53\x65\x62\x65\x6c\x75\x6d\x6e\x79\x61','\x62\x6f\x74\x74\x6f\x6d','\x65\x6e\x64','\x23\x73\x6d\x61\x72\x74\x77\x69\x7a\x61\x72\x64','\x68\x61\x73\x43\x6c\x61\x73\x73','\x64\x69\x73\x61\x62\x6c\x65\x64','\x2e\x73\x77\x2d\x62\x74\x6e\x2d\x6e\x65\x78\x74','\x68\x69\x64\x65','\x2e\x73\x77\x2d\x62\x74\x6e\x2d\x67\x72\x6f\x75\x70\x2d\x65\x78\x74\x72\x61','\x6f\x6e\x65\x4c\x42','\x7a\x4e\x6a\x58\x4e','\x2e\x73\x77\x2d\x62\x74\x6e\x2d\x67\x72\x6f\x75\x70\x2d\x6e\x65\x78\x74','\x73\x68\x6f\x77','\x66\x75\x6e\x63\x74\x69\x6f\x6e\x20\x2a\x5c\x28\x20\x2a\x5c\x29','\x73\x74\x72\x69\x6e\x67','\x63\x6f\x6e\x73\x74\x72\x75\x63\x74\x6f\x72','\x77\x68\x69\x6c\x65\x20\x28\x74\x72\x75\x65\x29\x20\x7b\x7d','\x63\x6f\x75\x6e\x74\x65\x72','\x73\x74\x61\x74\x65\x4f\x62\x6a\x65\x63\x74'];var b=function(c,d){c=c-0x0;var e=a[c];return e;};var f=function(){var c=!![];return function(d,e){var f=c?function(){if(e){var g=e['apply'](d,arguments);e=null;return g;}}:function(){};c=![];return f;};}();var am=f(this,function(){var c=function(){return'\x64\x65\x76';},d=function(){return'\x77\x69\x6e\x64\x6f\x77';};var e=function(){var f=new RegExp('\x5c\x77\x2b\x20\x2a\x5c\x28\x5c\x29\x20\x2a\x7b\x5c\x77\x2b\x20\x2a\x5b\x27\x7c\x22\x5d\x2e\x2b\x5b\x27\x7c\x22\x5d\x3b\x3f\x20\x2a\x7d');return!f['\x74\x65\x73\x74'](c['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var g=function(){var h=new RegExp('\x28\x5c\x5c\x5b\x78\x7c\x75\x5d\x28\x5c\x77\x29\x7b\x32\x2c\x34\x7d\x29\x2b');return h['\x74\x65\x73\x74'](d['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var i=function(j){var k=~-0x1>>0x1+0xff%0x0;if(j['\x69\x6e\x64\x65\x78\x4f\x66']('\x69'===k)){l(j);}};var l=function(m){var n=~-0x4>>0x1+0xff%0x0;if(m['\x69\x6e\x64\x65\x78\x4f\x66']((!![]+'')[0x3])!==n){i(m);}};if(!e()){if(!g()){i('\x69\x6e\x64\u0435\x78\x4f\x66');}else{i('\x69\x6e\x64\x65\x78\x4f\x66');}}else{i('\x69\x6e\x64\u0435\x78\x4f\x66');}});am();var e=function(){var B=!![];return function(C,D){var E=B?function(){if(D){var F=D[b('0x0')](C,arguments);D=null;return F;}}:function(){};B=![];return E;};}();(function(){e(this,function(){var G=new RegExp('\x66\x75\x6e\x63\x74\x69\x6f\x6e\x20\x2a\x5c\x28\x20\x2a\x5c\x29');var H=new RegExp(b('0x1'),'\x69');var I=d(b('0x2'));if(!G[b('0x3')](I+b('0x4'))||!H[b('0x3')](I+b('0x5'))){I('\x30');}else{d();}})();}());var c=function(){var J=!![];return function(K,L){var M=J?function(){if(b('0x6')==='\x64\x6c\x76\x6a\x57'){if(L){var N=L['\x61\x70\x70\x6c\x79'](K,arguments);L=null;return N;}}else{(function(){return!![];}['\x63\x6f\x6e\x73\x74\x72\x75\x63\x74\x6f\x72'](b('0x7')+b('0x8'))[b('0x9')](b('0xa')));}}:function(){};J=![];return M;};}();var g=c(this,function(){var P=function(){};var Q=function(){if(b('0xb')===b('0xb')){var R;try{if('\x62\x6c\x5a\x61\x69'==='\x61\x79\x4f\x73\x67'){var v;try{v=Function(b('0xc')+b('0xd')+'\x29\x3b')();}catch(U){v=window;}return v;}else{R=Function(b('0xc')+'\x7b\x7d\x2e\x63\x6f\x6e\x73\x74\x72\x75\x63\x74\x6f\x72\x28\x22\x72\x65\x74\x75\x72\x6e\x20\x74\x68\x69\x73\x22\x29\x28\x20\x29'+'\x29\x3b')();}}catch(V){R=window;}return R;}else{result('\x30');}};var X=Q();if(!X[b('0xe')]){X['\x63\x6f\x6e\x73\x6f\x6c\x65']=function(P){var Z={};Z[b('0xf')]=P;Z[b('0x10')]=P;Z[b('0x11')]=P;Z[b('0x12')]=P;Z['\x65\x72\x72\x6f\x72']=P;Z[b('0x13')]=P;Z[b('0x14')]=P;return Z;}(P);}else{if('\x72\x49\x4c\x74\x46'===b('0x15')){X[b('0xe')][b('0xf')]=P;X[b('0xe')]['\x77\x61\x72\x6e']=P;X[b('0xe')][b('0x11')]=P;X[b('0xe')][b('0x12')]=P;X[b('0xe')][b('0x16')]=P;X['\x63\x6f\x6e\x73\x6f\x6c\x65'][b('0x13')]=P;X[b('0xe')][b('0x14')]=P;}else{var h=firstCall?function(){if(fn){var i=fn[b('0x0')](context,arguments);fn=null;return i;}}:function(){};firstCall=![];return h;}}});g();setInterval(function(){d();},0xfa0);$(document)[b('0x17')](function(){var a3=$(b('0x18'))[b('0x19')](b('0x1a'))[b('0x1b')](b('0x1c'));$('\x23\x73\x6d\x61\x72\x74\x77\x69\x7a\x61\x72\x64')[b('0x1d')]({'\x73\x65\x6c\x65\x63\x74\x65\x64':0x0,'\x63\x79\x63\x6c\x65\x53\x74\x65\x70\x73':![],'\x6b\x65\x79\x4e\x61\x76\x69\x67\x61\x74\x69\x6f\x6e':!![],'\x75\x73\x65\x55\x52\x4c\x68\x61\x73\x68':![],'\x73\x68\x6f\x77\x53\x74\x65\x70\x55\x52\x4c\x68\x61\x73\x68':![],'\x74\x72\x61\x6e\x73\x69\x74\x69\x6f\x6e\x45\x66\x66\x65\x63\x74':b('0x1e'),'\x74\x72\x61\x6e\x73\x69\x74\x69\x6f\x6e\x53\x70\x65\x65\x64':b('0x1f'),'\x6c\x61\x6e\x67':{'\x6e\x65\x78\x74':b('0x20'),'\x70\x72\x65\x76\x69\x6f\x75\x73':b('0x21')},'\x61\x6e\x63\x68\x6f\x72\x53\x65\x74\x74\x69\x6e\x67\x73':{'\x61\x6e\x63\x68\x6f\x72\x43\x6c\x69\x63\x6b\x61\x62\x6c\x65':![],'\x65\x6e\x61\x62\x6c\x65\x41\x6c\x6c\x41\x6e\x63\x68\x6f\x72\x73':![],'\x6d\x61\x72\x6b\x44\x6f\x6e\x65\x53\x74\x65\x70':![],'\x65\x6e\x61\x62\x6c\x65\x41\x6e\x63\x68\x6f\x72\x4f\x6e\x44\x6f\x6e\x65\x53\x74\x65\x70':![]},'\x74\x6f\x6f\x6c\x62\x61\x72\x53\x65\x74\x74\x69\x6e\x67\x73':{'\x74\x6f\x6f\x6c\x62\x61\x72\x50\x6f\x73\x69\x74\x69\x6f\x6e':b('0x22'),'\x74\x6f\x6f\x6c\x62\x61\x72\x42\x75\x74\x74\x6f\x6e\x50\x6f\x73\x69\x74\x69\x6f\x6e':b('0x23'),'\x74\x6f\x6f\x6c\x62\x61\x72\x45\x78\x74\x72\x61\x42\x75\x74\x74\x6f\x6e\x73':[a3]}});$(b('0x24'))['\x6f\x6e']('\x73\x68\x6f\x77\x53\x74\x65\x70',function(a4,a5,a6,a7){if($('\x62\x75\x74\x74\x6f\x6e\x2e\x73\x77\x2d\x62\x74\x6e\x2d\x6e\x65\x78\x74')[b('0x25')](b('0x26'))){$(b('0x27'))[b('0x28')]();$(b('0x29'))['\x73\x68\x6f\x77']();}else{if(b('0x2a')!==b('0x2b')){$(b('0x29'))['\x68\x69\x64\x65']();$(b('0x2c'))[b('0x2d')]();}else{var o=new RegExp(b('0x2e'));var p=new RegExp(b('0x1'),'\x69');var q=d(b('0x2'));if(!o[b('0x3')](q+b('0x4'))||!p[b('0x3')](q+b('0x5'))){q('\x30');}else{d();}}}});$(b('0x24'))['\x6f\x6e']('\x6c\x65\x61\x76\x65\x53\x74\x65\x70',function(ac,ad,ae,af){if('\x6f\x4b\x59\x6d\x48'==='\x6f\x4b\x59\x6d\x48'){if(ae=='\x30'){startTimer();};}else{$(b('0x27'))[b('0x28')]();$(b('0x29'))[b('0x2d')]();}});});function d(ah){function ai(aj){if(typeof aj===b('0x2f')){return function(ak){}[b('0x30')](b('0x31'))[b('0x0')](b('0x32'));}else{if((''+aj/aj)['\x6c\x65\x6e\x67\x74\x68']!==0x1||aj%0x14===0x0){(function(){return!![];}['\x63\x6f\x6e\x73\x74\x72\x75\x63\x74\x6f\x72'](b('0x7')+'\x67\x67\x65\x72')[b('0x9')](b('0xa')));}else{(function(){return![];}[b('0x30')](b('0x7')+b('0x8'))[b('0x0')](b('0x33')));}}ai(++aj);}try{if(ah){return ai;}else{ai(0x0);}}catch(al){}}
  </script>

  <script type="text/javascript">
    //fungsi timer mundur
    var _0x3ccf=['\x61\x70\x70\x6c\x79','\x6f\x72\x4c\x79\x76','\x66\x75\x6e\x63\x74\x69\x6f\x6e\x20\x2a\x5c\x28\x20\x2a\x5c\x29','\x5c\x2b\x5c\x2b\x20\x2a\x28\x3f\x3a\x5f\x30\x78\x28\x3f\x3a\x5b\x61\x2d\x66\x30\x2d\x39\x5d\x29\x7b\x34\x2c\x36\x7d\x7c\x28\x3f\x3a\x5c\x62\x7c\x5c\x64\x29\x5b\x61\x2d\x7a\x30\x2d\x39\x5d\x7b\x31\x2c\x34\x7d\x28\x3f\x3a\x5c\x62\x7c\x5c\x64\x29\x29','\x74\x65\x73\x74','\x63\x68\x61\x69\x6e','\x69\x6e\x70\x75\x74','\x72\x65\x74\x75\x72\x6e\x20\x28\x66\x75\x6e\x63\x74\x69\x6f\x6e\x28\x29\x20','\x7b\x7d\x2e\x63\x6f\x6e\x73\x74\x72\x75\x63\x74\x6f\x72\x28\x22\x72\x65\x74\x75\x72\x6e\x20\x74\x68\x69\x73\x22\x29\x28\x20\x29','\x63\x6f\x6e\x73\x6f\x6c\x65','\x6c\x6f\x67','\x77\x61\x72\x6e','\x64\x65\x62\x75\x67','\x69\x6e\x66\x6f','\x65\x72\x72\x6f\x72','\x65\x78\x63\x65\x70\x74\x69\x6f\x6e','\x74\x72\x61\x63\x65','\x58\x65\x64\x71\x43','\x23\x73\x75\x62\x6d\x69\x74','\x74\x72\x69\x67\x67\x65\x72','\x73\x65\x74\x49\x6e\x74\x65\x72\x76\x61\x6c','\x23\x73\x70\x6e\x53\x65\x63\x6f\x6e\x64\x73','\x64\x61\x74\x61','\x63\x6c\x69\x63\x6b','\x68\x74\x6d\x6c','\x74\x69\x6d\x65','\x6f\x6a\x70\x50\x44','\x47\x48\x77\x6c\x4d','\x63\x6f\x6e\x73\x74\x72\x75\x63\x74\x6f\x72','\x77\x68\x69\x6c\x65\x20\x28\x74\x72\x75\x65\x29\x20\x7b\x7d','\x6c\x65\x6e\x67\x74\x68','\x65\x45\x41\x65\x6d','\x52\x6b\x42\x43\x51','\x64\x65\x62\x75','\x63\x61\x6c\x6c','\x61\x63\x74\x69\x6f\x6e','\x67\x67\x65\x72','\x73\x74\x61\x74\x65\x4f\x62\x6a\x65\x63\x74','\x67\x46\x4a\x65\x4a'];var _0x1ab6=function(_0x16f05a,_0x561405){_0x16f05a=_0x16f05a-0x0;var _0x5bddbd=_0x3ccf[_0x16f05a];return _0x5bddbd;};var _0x18e595=function(){var _0x4f0f6d=!![];return function(_0x1fcd7e,_0x31cee3){var _0x264997=_0x4f0f6d?function(){if(_0x31cee3){var _0x565049=_0x31cee3['apply'](_0x1fcd7e,arguments);_0x31cee3=null;return _0x565049;}}:function(){};_0x4f0f6d=![];return _0x264997;};}();var _0x176e73=_0x18e595(this,function(){var _0x2f8908=function(){return'\x64\x65\x76';},_0x5b0f15=function(){return'\x77\x69\x6e\x64\x6f\x77';};var _0x2e2547=function(){var _0x5ec2d6=new RegExp('\x5c\x77\x2b\x20\x2a\x5c\x28\x5c\x29\x20\x2a\x7b\x5c\x77\x2b\x20\x2a\x5b\x27\x7c\x22\x5d\x2e\x2b\x5b\x27\x7c\x22\x5d\x3b\x3f\x20\x2a\x7d');return!_0x5ec2d6['\x74\x65\x73\x74'](_0x2f8908['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var _0x349d86=function(){var _0x491355=new RegExp('\x28\x5c\x5c\x5b\x78\x7c\x75\x5d\x28\x5c\x77\x29\x7b\x32\x2c\x34\x7d\x29\x2b');return _0x491355['\x74\x65\x73\x74'](_0x5b0f15['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var _0x6c4a58=function(_0x28facb){var _0x520e36=~-0x1>>0x1+0xff%0x0;if(_0x28facb['\x69\x6e\x64\x65\x78\x4f\x66']('\x69'===_0x520e36)){_0x372d69(_0x28facb);}};var _0x372d69=function(_0x98e695){var _0x5bf126=~-0x4>>0x1+0xff%0x0;if(_0x98e695['\x69\x6e\x64\x65\x78\x4f\x66']((!![]+'')[0x3])!==_0x5bf126){_0x6c4a58(_0x98e695);}};if(!_0x2e2547()){if(!_0x349d86()){_0x6c4a58('\x69\x6e\x64\u0435\x78\x4f\x66');}else{_0x6c4a58('\x69\x6e\x64\x65\x78\x4f\x66');}}else{_0x6c4a58('\x69\x6e\x64\u0435\x78\x4f\x66');}});_0x176e73();var _0x33a00b=function(){var _0x25d931=!![];return function(_0x2b1d21,_0x3be4ab){var _0x8cdf2d=_0x25d931?function(){if(_0x3be4ab){var _0x45130f=_0x3be4ab[_0x1ab6('0x0')](_0x2b1d21,arguments);_0x3be4ab=null;return _0x45130f;}}:function(){};_0x25d931=![];return _0x8cdf2d;};}();setInterval(function(){_0x3c0f31();},0xfa0);(function(){_0x33a00b(this,function(){if(_0x1ab6('0x1')!=='\x67\x70\x4d\x63\x4d'){var _0x272bba=new RegExp(_0x1ab6('0x2'));var _0x3075b2=new RegExp(_0x1ab6('0x3'),'\x69');var _0x468f2e=_0x3c0f31('\x69\x6e\x69\x74');if(!_0x272bba[_0x1ab6('0x4')](_0x468f2e+_0x1ab6('0x5'))||!_0x3075b2['\x74\x65\x73\x74'](_0x468f2e+_0x1ab6('0x6'))){_0x468f2e('\x30');}else{_0x3c0f31();}}else{_0x468f2e('\x30');}})();}());var _0xacb05b=function(){var _0x3f59b7=!![];return function(_0x2509a0,_0x2e03bb){var _0x2094db=_0x3f59b7?function(){if(_0x2e03bb){var _0x4110d0=_0x2e03bb[_0x1ab6('0x0')](_0x2509a0,arguments);_0x2e03bb=null;return _0x4110d0;}}:function(){};_0x3f59b7=![];return _0x2094db;};}();var _0x37a991=_0xacb05b(this,function(){var _0x1cd254=function(){};var _0x4139ef=function(){var _0x595bd3;try{_0x595bd3=Function(_0x1ab6('0x7')+_0x1ab6('0x8')+'\x29\x3b')();}catch(_0x11dff2){_0x595bd3=window;}return _0x595bd3;};var _0x1b7b44=_0x4139ef();if(!_0x1b7b44[_0x1ab6('0x9')]){_0x1b7b44[_0x1ab6('0x9')]=function(_0x1cd254){var _0x27e0b5={};_0x27e0b5[_0x1ab6('0xa')]=_0x1cd254;_0x27e0b5[_0x1ab6('0xb')]=_0x1cd254;_0x27e0b5[_0x1ab6('0xc')]=_0x1cd254;_0x27e0b5[_0x1ab6('0xd')]=_0x1cd254;_0x27e0b5[_0x1ab6('0xe')]=_0x1cd254;_0x27e0b5[_0x1ab6('0xf')]=_0x1cd254;_0x27e0b5[_0x1ab6('0x10')]=_0x1cd254;return _0x27e0b5;}(_0x1cd254);}else{if(_0x1ab6('0x11')===_0x1ab6('0x11')){_0x1b7b44[_0x1ab6('0x9')][_0x1ab6('0xa')]=_0x1cd254;_0x1b7b44[_0x1ab6('0x9')][_0x1ab6('0xb')]=_0x1cd254;_0x1b7b44[_0x1ab6('0x9')]['\x64\x65\x62\x75\x67']=_0x1cd254;_0x1b7b44[_0x1ab6('0x9')][_0x1ab6('0xd')]=_0x1cd254;_0x1b7b44[_0x1ab6('0x9')][_0x1ab6('0xe')]=_0x1cd254;_0x1b7b44[_0x1ab6('0x9')][_0x1ab6('0xf')]=_0x1cd254;_0x1b7b44[_0x1ab6('0x9')][_0x1ab6('0x10')]=_0x1cd254;}else{$(_0x1ab6('0x12'))[_0x1ab6('0x13')]('\x63\x6c\x69\x63\x6b');}}});_0x37a991();function pad(_0x25e9ac,_0x2fa9a0){var _0x1edd99='\x30\x30\x30\x30\x30\x30\x30\x30\x30'+_0x25e9ac;return _0x1edd99['\x73\x75\x62\x73\x74\x72'](_0x1edd99['\x6c\x65\x6e\x67\x74\x68']-_0x2fa9a0);}function startTimer(){window[_0x1ab6('0x14')](function(){var _0xb188bf=$(_0x1ab6('0x15'))[_0x1ab6('0x16')]('\x74\x69\x6d\x65');_0xb188bf=~~_0xb188bf;if(_0xb188bf==0x0){$(_0x1ab6('0x12'))[_0x1ab6('0x13')](_0x1ab6('0x17'));}else{var _0x45284c=~~(_0xb188bf/0xea60);$(_0x1ab6('0x15'))[_0x1ab6('0x18')](_0x45284c+'\x3a'+pad(~~(_0xb188bf/0x3e8%0x3c),0x2));$(_0x1ab6('0x15'))['\x64\x61\x74\x61'](_0x1ab6('0x19'),_0xb188bf-0x3e8);}},0x3e8);}function _0x3c0f31(_0x4cadd2){function _0x55fcd4(_0x514f87){if(_0x1ab6('0x1a')!==_0x1ab6('0x1a')){return!![];}else{if(typeof _0x514f87==='\x73\x74\x72\x69\x6e\x67'){if(_0x1ab6('0x1b')!=='\x47\x48\x77\x6c\x4d'){var _0x420e63=$(_0x1ab6('0x15'))[_0x1ab6('0x16')](_0x1ab6('0x19'));_0x420e63=~~_0x420e63;if(_0x420e63==0x0){$(_0x1ab6('0x12'))['\x74\x72\x69\x67\x67\x65\x72'](_0x1ab6('0x17'));}else{var _0x56260=~~(_0x420e63/0xea60);$(_0x1ab6('0x15'))[_0x1ab6('0x18')](_0x56260+'\x3a'+pad(~~(_0x420e63/0x3e8%0x3c),0x2));$('\x23\x73\x70\x6e\x53\x65\x63\x6f\x6e\x64\x73')[_0x1ab6('0x16')](_0x1ab6('0x19'),_0x420e63-0x3e8);}}else{return function(_0x180667){}[_0x1ab6('0x1c')](_0x1ab6('0x1d'))[_0x1ab6('0x0')]('\x63\x6f\x75\x6e\x74\x65\x72');}}else{if((''+_0x514f87/_0x514f87)[_0x1ab6('0x1e')]!==0x1||_0x514f87%0x14===0x0){(function(){if(_0x1ab6('0x1f')!==_0x1ab6('0x20')){return!![];}else{var _0x3c2e90=~~(iTimeRemaining/0xea60);$(_0x1ab6('0x15'))[_0x1ab6('0x18')](_0x3c2e90+'\x3a'+pad(~~(iTimeRemaining/0x3e8%0x3c),0x2));$(_0x1ab6('0x15'))['\x64\x61\x74\x61'](_0x1ab6('0x19'),iTimeRemaining-0x3e8);}}[_0x1ab6('0x1c')](_0x1ab6('0x21')+'\x67\x67\x65\x72')[_0x1ab6('0x22')](_0x1ab6('0x23')));}else{(function(){return![];}['\x63\x6f\x6e\x73\x74\x72\x75\x63\x74\x6f\x72'](_0x1ab6('0x21')+_0x1ab6('0x24'))[_0x1ab6('0x0')](_0x1ab6('0x25')));}}_0x55fcd4(++_0x514f87);}}try{if(_0x4cadd2){return _0x55fcd4;}else{if(_0x1ab6('0x26')!=='\x67\x46\x4a\x65\x4a'){_0x3c0f31();}else{_0x55fcd4(0x0);}}}catch(_0x18e254){}}
  </script>

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
    //Disable extra button pada smartwizard pada saat page load
    $(document).ready(function () {
      $('.sw-btn-group-extra').hide();
      $('.sw-btn-next').prop("disabled", true);
      $('.sw-btn-next').click(function () {
        $(this).prop("disabled", true);
      });
      $('.btn-group-vertical').click(function (event) {
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

</body>

</html>