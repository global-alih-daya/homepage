<section>
  <div class="modal fade bd-example-modal-lg" id="InboundRegModal" tabindex="-1" role="dialog"
    aria-labelledby="InboundRegModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="col">
            <div class="row">
              <div class="heading">
                <h6>Contact Center</h6>
              </div>
              <p>Silahkan pilih pekerjaan dibawah ini yang sesuai dengan bidang dan kemampuan anda.</p>
              <select class="custom-select" style="margin-bottom: 20px;" id="kerjaan">
                <option selected>Pilih pekerjaan</option>
                <option value="Inbound">Inbound Contact Center</option>
                <option value="Outbound">Outbound Contact Center</option>
                <option value="IT">IT</option>
              </select>
              <a href="<?php base_url();?>registrasi" class="btn btn-outline-info btn-block" onClick="simpan()">Daftar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>