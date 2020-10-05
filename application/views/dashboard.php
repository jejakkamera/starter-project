<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">
		<!-- ============================================================== -->
		<!-- Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
		<div class="row page-titles">
		</div>

		<!-- ============================================================== -->
		<!-- End Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->
		<!-- Row -->

		<div class="row">
			<!-- Column -->

			<!-- Column -->
			<!-- Column -->
			<div class="col-lg-12 col-xlg-12 ">
				<div class="card">
					<div class="card-header">
						Informasi
					</div>
					<div class="card-block">
					
							<?= $data_informasi_text->text ?>
				
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class='col-lg-6 col-xlg-6 mb-4'>

				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<?php foreach ($data_informasi_gambar as $key => $value) {?>
						<li data-target="#carouselExampleIndicators" data-slide-to="0"  class=" <?php if($key == 0) echo 'active' ?>"></li>
						<?php };?>
					</ol>
					<div class="carousel-inner" role="listbox">
					<?php $no = 1; ?>
					<?php foreach ($data_informasi_gambar as $key => $value) {?>
						<div class="carousel-item <?php if($key == 0) echo 'active' ?> ">
							<img class="d-block img-fluid" src="<?= base_url().'/assets/informasi/'.$value['file'] ?>" alt="First slide">
						</div>
						<?php $no++; };?>
                        
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>

			</div>

			<div class='col-lg-6 col-xlg-6'>

				<div class="card">
					<div class="card-header">
						Informasi File
					</div>
					<div class="card-block">
					
                        <ul>
                            <?php foreach ($data_informasi_file as $key) {?>
                                <li> <a href="<?= base_url().'/assets/informasi/'.$key['file'] ?>"><?= $key['file'] ?></a> </li>
                            <?php } ?>
                        </ul>
				
					</div>
				</div>

			</div>
		</div>

		<!-- Column -->
	</div>
</div>
<!-- Row -->
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right sidebar -->
<!-- ============================================================== -->
<!-- .right-sidebar -->
