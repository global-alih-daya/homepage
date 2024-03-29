<!-- section Register -->
<section style="background: url(<?=base_url()?>/assets/img/cc06.jpg) center top no-repeat; background-size: cover;" class="bar no-mb bg-fixed relative-positioned">
  <div class="container zoome boxshdregister bg-white">

    <div class="heading text-center">
      <h2>Registrasi</h2>
    </div>
    <p class="lead text-center">Uji Coba Gratis!</p>
    <div class="row">
      <div class="col-lg-12">
        <?php echo $this->session->flashdata('message');?>
        <form action="<?php echo base_url('Dashboard/add_company') ?>" id="myForm" role="form" data-toggle="validator"
          method="post" accept-charset="utf-8">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="pic_name">Nama Perwakilan</label>
                <input id="pic_name" name="pic_name" type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="company_name">Nama Perusahaan</label>
                <input id="company_name" name="company_name" type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email Pribadi / Perusahaan</label>
                <input id="email" name="email" type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_hp">Nomor HP / Whatsapp Pribadi</label>
                <input id="no_hp" name="no_hp" type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="company_address">Alamat Perusahaan</label>
                <textarea id="company_address" name="company_address" class="form-control"></textarea>
              </div>
            </div>
            <div class="col-md-12">
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
            <div class="col-md-12">
              <div class="form-group">
                <label for="kota">Kota</label>
                <select name="kota" id="kota" class="custom-select">
                  <option selected>Pilih Kota</option>
                </select>
              </div>
            </div>
            <!-- <div class="col-md-12">
              <div class="form-group">
                <label>Verifikasi</label>
                <?php //echo $recaptcha_html;?>
                <?php //echo form_error('g-recaptcha-response'); ?>
              </div>
            </div> -->
            <div class="col-md-12" style="padding-bottom: 20px;">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="syaratcheck" id="syaratcheck">
                <label class="custom-control-label lead" for="syaratcheck">Dengan mengklik tombol Daftar atau menggunakan layanan kami,
                Anda setuju untuk terikat oleh Ketentuan Penggunaan dan Kebijakan Privasi kami, yang menetapkan hak-hak
                yang Anda miliki sehubungan dengan data Anda.</label>
              </div>
            </div>
            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-info btn-block" value="Save"><i class="fa fa-envelope-o"></i>
                Daftar Uji Coba</button>
            </div>
          </div>
        </form>

      </div>
    </div>
</section>