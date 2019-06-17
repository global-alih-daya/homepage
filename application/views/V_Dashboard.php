<!DOCTYPE html>
<html dir="ltr" lang="en">

<?=$header;?>

	<body>
		<div id="all">
		
			<!-- Header -->
			
				<?=$navbar;?>
			
				<?=$menu;?>

			
			
			<!-- Start main-content -->
			<div class="main-content">
				<?=$content;?>

				<section>
				<!-- Inbound Modal -->
				<div class="modal fade bd-example-modal-lg" id="InboundRegModal" tabindex="-1" role="dialog" aria-labelledby="InboundRegModal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-12">
						<div class="row">
							<div class="col-md-4 text-center">
							<img src="//placehold.it/450x450" alt="..." class="img-fluid">
							</div>
							<div class="col-md-8">
							<div class="heading">
								<h3>Panggilan Inbound</h3>
							</div>
							<div class="row">
								<strong>Panggilan Inbound </strong><p class="lead">Merupakan panggilan masuk yang dilakukan oleh pelanggan untuk melakukan pengaduan, menanyakan informasi, melaporkan kejanggalan, atau meminta bantuan.</p>
							</div>
							<div class="row">
							<a href="<?php base_url();?>registrasi" class="btn btn-outline-info btn-block">Daftar</a>
							</div>
						</div>
						</div>
					</div>
					</div>
				</div>
				</div>
				</section>

				<section>
				<!-- Outbound Modal -->
				<div class="modal fade bd-example-modal-lg" id="OutboundRegModal" tabindex="-1" role="dialog" aria-labelledby="OutboundRegModal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-12">
						<div class="row">
							<div class="col-md-4 text-center">
							<img src="//placehold.it/450x450" alt="..." class="img-fluid">
							</div>
							<div class="col-md-8">
							<div class="heading">
								<h3>Panggilan Outbound</h3>
							</div>
							<div class="row">
								<strong>Panggilan Outbound </strong><p class="lead">Merupakan panggilan keluar yang dibuat oleh agen untuk suatu usaha penjualan atau layanan secara individual.</p>
							</div>
							<div class="row">
								<a href="<?php base_url();?>registrasi" class="btn btn-outline-info btn-block">Daftar</a>
							</div>
						</div>
						</div>
					</div>
					</div>
				</div>
				</div> 
				</section>
				
			</div>
			
			
				<?=$footer;?>
		</div>
		<?=$javascript;?>
	</body>


</html>
