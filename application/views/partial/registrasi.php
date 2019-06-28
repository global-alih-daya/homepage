<!-- section Register -->
<section
  style="background: url(https://www.gad.co.id/assets/img/bg-slide2.jpg) center top no-repeat; background-size: cover;"
  class="bar no-mb bg-fixed relative-positioned">
  <div class="container zoome boxshdregister bg-white">

    <div class="heading text-center">
      <h2>Registrasi</h2>
    </div>
    <p class="lead text-center">Gabung menjadi partner kami sekarang!</p>
    <div class="row">
      <div class="col-lg-12">
        <?php echo $this->session->flashdata('message');?>
        <?php if(isset($error)){print $error;}?>
        <form action="<?php echo base_url('Dashboard/add') ?>" id="myForm" role="form" data-toggle="validator"
          method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="firstname">Nama Awal</label>
                <input id="firstname" name="firstname" type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="lastname">Nama Akhir</label>
                <input id="lastname" name="lastname" type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_hp">Nomor HP / Whatsapp</label>
                <input id="no_hp" name="no_hp" type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="address">Alamat</label>
                <textarea id="address" name="address" class="form-control"></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select name="provinsi" id="provinsi" class="custom-select">
                  <option selected>Pilih Provinsi</option>
                  <?php
                  foreach($provinces as $data){ // Lakukan looping pada variabel dari controller
                      echo "<option value='".$data->id."'>".$data->name."</option>";
                  } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kota">Kota</label>
                <select name="kota" id="kota" class="custom-select">
                  <option selected>Pilih Kota</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="job_interested">Pekerjaan yang diinginkan</label>
                <select id="job_interested" name="job_interested" class="custom-select">
                  <option value="Inbound">Inbound Contact Center</option>
                  <option value="Outbound">Outbound Contact Center</option>
                  <option value="IT - Application Web Developer">IT - Application Web Developer</option>
                  <option value="Recruitment">Recruitment</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group files">
                <label>Unggah cv terbaru anda </label>
                <input type="file" class="form-control" name="cv_file" id="cv_file">
              </div>
            </div>
            <div class="col-md-12" style="padding-bottom: 20px;">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="syaratcheck" id="syaratcheck" onClick="enableregisbutton()">
                <label class="custom-control-label lead" for="syaratcheck">Dengan mengklik tombol Daftar atau
                  menggunakan layanan kami,
                  Anda setuju untuk terikat oleh Ketentuan Penggunaan dan Kebijakan Privasi kami, yang menetapkan
                  hak-hak
                  yang Anda miliki sehubungan dengan data Anda.</label>
              </div>
            </div>
            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-info btn-block" value="Save" id="daftarregis"><i class="fa fa-envelope-o"></i>
                Daftar</button>
            </div>
          </div>
        </form>

      </div>
    </div>
</section>