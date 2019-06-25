<header class="nav-holder make-sticky">
  <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
    <div class="container"><a href="<?php base_url() ?>" class="navbar-brand home"><img
          src="<?=base_url()?>/assets/img/gad-small.png" width="110" height="60" alt="Universal logo"
          class="d-none d-md-inline-block"><img src="<?=base_url()?>/assets/img/gad-small.png" width="65" height="40"
          alt="Universal logo" class="d-inline-block d-md-none"><span class="sr-only">GAD </span></a>
      <button type="button" data-toggle="collapse" data-target="#navigation"
        class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i
          class="fa fa-align-justify"></i></button>
      <div id="navigation" class="navbar-collapse collapse">
        <ul class="nav navbar-nav ml-auto">
          <li class="nav-item"><a href="<?php echo base_url() ?>#toop" class="js-scroll-trigger nav-link" id="beranda_a">Beranda <b
                class="caret"></b></a></li>
          <li class="nav-item"><a href="<?php echo base_url() ?>#about" class="js-scroll-trigger nav-link" id="about_a">Tentang Kami <b
                class="caret"></b></a></li>
          <li class="nav-item"><a href="<?php echo base_url() ?>#service" class="js-scroll-trigger nav-link" id="layanan_a">Layanan <b
                class="caret"></b></a></li>
          <li class="nav-item"><a href="<?php echo base_url() ?>#product" class="js-scroll-trigger nav-link" id="produk_a">Produk <b
                class="caret"></b></a></li>
          <li class="nav-item"><a href="<?php echo base_url() ?>#faq" class="js-scroll-trigger nav-link" id="faq_a">FAQ <b
                class="caret"></b></a></li>

          <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown"
              class="dropdown-toggle text-danger">Gabung Sekarang!<b class="caret"></b></a>
            <ul class="dropdown-menu megamenu">
              <li>
                <div class="row">
                  <div class="col-lg-3"><img src="<?=base_url()?>/assets/img/callcenter1.png" alt=""
                      class="img-fluid d-none d-lg-block"></div>
                  <div class="col-lg-3 col-md-6">
                    <h5>Partner</h5>
                    <ul class="list-unstyled mb-3">
                      <li class="nav-item"><a href="#InboundRegModal" class="nav-link" data-toggle="modal">Karir</a>
                      </li>
                      <!-- <li class="nav-item"><a href="#OutboundRegModal" class="nav-link" data-toggle="modal">Outbound</a>
                      </li> -->
                    </ul>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <h5>Business</h5>
                    <ul class="list-unstyled mb-3">
                      <li class="nav-item"><a href="<?php base_url();?>ujicoba" class="nav-link">Uji Coba Gratis</a>
                      </li>
                      <li class="nav-item"><a href="#" class="nav-link">Harga</a></li>
                    </ul>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <h5>Kontak Kami</h5>
                    <ul class="list-unstyled mb-3">
                      <li class="nav-item"><a href="#" class="nav-link">Link 1</a></li>
                      <li class="nav-item"><a href="#" class="nav-link">Link 2</a></li>
                    </ul>
                  </div>
                  <!-- <div class="col-lg-3 col-md-6">
                          <h5>Layanan</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal">Helpdesk / Service Desk</a></li>
                            <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal">Contact Center Service Solutions</a></li>
                            <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal">Human Capital Management</a></li>
                            <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal">Customer Service Learning Center</a></li>
                            <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal">Learning Center</a></li>
                            <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal">Customer Experience Management</a></li>   
                          </ul>
                        </div>
                        <div class="col-lg-3 col-md-6">
                          <h5>Produk</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal">Produk #1</a></li>
                            <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal">Produk #2</a></li>
                            <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal">Produk #3</a></li> 
                          </ul>
                        </div> -->
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <div id="search" class="collapse clearfix">
        <form role="search" class="navbar-form">
          <div class="input-group">
            <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
              <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button></span>
          </div>
        </form>
      </div>
    </div>
  </div>
</header>
<!-- Navbar End -->