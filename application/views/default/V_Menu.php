
<header class="nav-holder make-sticky">
        <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
          <div class="container"><a href="<?php base_url() ?>" class="navbar-brand home"><img src="<?php echo base_url('assets/img/gad-small.png')?>" width="110" height="60" alt="Universal logo" class="d-none d-md-inline-block"><img src="<?php echo base_url('assets/img/gad-small.png')?>"  width="65" height="40" alt="Universal logo" class="d-inline-block d-md-none"><span class="sr-only">GAD </span></a>
            <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <div id="navigation" class="navbar-collapse collapse">
              <ul class="nav navbar-nav ml-auto">
                <?=generate_navlink($path_page,'#toop','Beranda');?>
                <?=generate_navlink($path_page,'#about','Tentang Kami');?>
                <?=generate_navlink($path_page,'#service','Layanan');?>
                <?=generate_navlink($path_page,'#product','Produk');?>
                <?=generate_navlink($path_page,'#faq','FAQ');?>
               
                <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" class="dropdown-toggle text-danger">Gabung Sekarang!<b class="caret"></b></a>
                  <ul class="dropdown-menu megamenu">
                    <li>
                      <div class="row">
                        <div class="col-lg-6"><img src="<?php echo base_url('assets/img/callcenter1.png')?>" alt="" class="img-fluid d-none d-lg-block" width="500"></div>
                        <div class="col-lg-3 col-md-6">
                          <h5>Partner</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#InboundRegModal" class="nav-link" data-toggle="modal">Inbound</a></li>
                            <li class="nav-item"><a href="#OutboundRegModal" class="nav-link" data-toggle="modal">Outbound</a></li>
                          </ul>
                        </div>
                        <div class="col-lg-3 col-md-6">
                          <h5>Business</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="<?php base_url();?>ujicoba" class="nav-link">Uji Coba Gratis</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Harga</a></li>
                          </ul>
                        </div>
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