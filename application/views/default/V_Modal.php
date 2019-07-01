<section>
  <div class="modal fade bd-example-modal-lg" id="InboundRegModal" tabindex="-1" role="dialog"
    aria-labelledby="InboundRegModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="col">
            <div class="row">
              <div class="heading">
                <h6>karir</h6>
              </div>
              <p>Silahkan pilih pekerjaan dibawah ini yang sesuai dengan bidang dan kemampuan anda.</p>
              <select class="custom-select" style="margin-bottom: 20px;" id="kerjaan" onChange="enableBtnDaftar()">
                <!-- <option selected>Pilih pekerjaan</option> -->
                <option value="nonekerja">Silahkan pilih</option>
                <option value="Inbound">Inbound Contact Center</option>
                <option value="Outbound">Outbound Contact Center</option>
              </select>
              <a href="#" class="btn btn-outline-info btn-block disabled" onClick="simpan()" id="daftarBtn">Daftar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="modal fade bd-example-modal-lg" id="tncmodal" tabindex="-1" role="dialog"
    aria-labelledby="tncmodal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="col">
            <div class="row">
              <div class="heading">
                <h6>Persyaran dan ketentuan</h6>
              </div>
            </div>
            <div class="row">
              <textarea class="form-control" id="tnctext" rows="15" style="font-family: Times New Roman, Times, serif; font-size: 14px; padding-bottom: 10px;" disabled>
Terakhir diperbarui: (01/07/2019)

Harap baca Syarat dan Ketentuan ini ("Ketentuan", "Syarat dan Ketentuan") dengan cermat sebelum menggunakan situs web https://www.gad.co.id yang dioperasikan oleh PT. Global Alih Daya ("kami", "kami", atau "milik kami").

Akses Anda ke dan penggunaan Layanan dikondisikan pada penerimaan dan kepatuhan Anda dengan Ketentuan ini. Ketentuan ini berlaku untuk semua pengunjung, pengguna dan orang lain yang mengakses atau menggunakan Layanan.

Dengan mengakses atau menggunakan Layanan, Anda setuju untuk terikat oleh Ketentuan ini. Jika Anda tidak setuju dengan bagian mana pun dari ketentuan ini maka Anda tidak dapat mengakses Layanan.

Tautan ke Situs Web Lain

Layanan kami dapat berisi tautan ke situs web pihak ketiga atau layanan yang tidak dimiliki atau dikendalikan oleh PT. Global Alih Daya.

PT. Global Alih Daya tidak memiliki kendali atas, dan tidak bertanggung jawab atas, konten, kebijakan privasi, atau praktik situs web atau layanan pihak ketiga mana pun. Anda selanjutnya mengakui dan setuju bahwa PT. Global Alih Daya tidak akan bertanggung jawab atau berkewajiban, secara langsung atau tidak langsung, untuk setiap kerusakan atau kerugian yang disebabkan atau diduga disebabkan oleh atau sehubungan dengan penggunaan atau kepercayaan pada konten, barang atau layanan yang tersedia di atau melalui situs web tersebut atau layanan.

Perubahan

Kami berhak, atas kebijakan kami sendiri, untuk mengubah atau mengganti Ketentuan ini kapan saja. Jika revisi adalah materi, kami akan mencoba memberikan pemberitahuan setidaknya 30 hari sebelum ketentuan baru berlaku. Apa yang merupakan perubahan material akan ditentukan atas kebijakan kami sendiri.

Hubungi kami

Jika Anda memiliki pertanyaan tentang Ketentuan ini, silakan hubungi kami.
              </textarea>
              <div class="custom-control custom-checkbox" style="padding-top: 15px; padding-bottom: 15px;">
                <input type="checkbox" class="custom-control-input" id="customCheck1" onClick="enableBTNReg()">
                <label class="custom-control-label" for="customCheck1">Setuju dengan syarat dan ketentuan kami.</label>
              </div>
              <a href="<?php base_url();?>registrasi" class="btn btn-outline-info btn-block disabled" id="btnAcceptTNC">Daftar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>