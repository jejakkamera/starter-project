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

			<div class="col-lg-12 col-xlg-12">


				<div class="card">
					<div class="card-header">
						Data Informasi Text
					</div>
					<div class="card-block">
						<h4 class="card-title">Data Informasi Text</h4>
						<form action="<?= $action_text ?>" method="post">
							<textarea name="input_text">
                                 <?= $data_text->text ?>
                             </textarea>
							<button type="submit" class='btn btn-primary my-3'>simpan</button>
						</form>
					</div>
				</div>


			</div>
		</div>

		<div class="row">
			<div class='col-lg-6 col-xlg-6'>

				<div class="card">
					<div class="card-header">
						Data Informasi Gambar
					</div>
					<div class="card-block">
						<h4 class="card-title">Data Informasi Gambar</h4>
						<?php echo form_open_multipart( $action_gambar );?>
							<div class="form-group">
								<label for="file">Gambar</label>
								<input type="file" class="form-control" id="file" name="file" placeholder="Password">
							</div>
                            <button type="submit" class='btn btn-primary my-3'>simpan</button>
                        </form>

                        <h4>File Tersimpan</h4>

                        <ul>
                            <?php foreach ($data_gambar as $key) {?>
                                <li> <a target="_blank" href="<?= base_url().'assets/informasi/'.$key['file'] ?>"><?= $key['file'] ?></a> <a class='ml-3' style="color: blue;" href="<?= base_url().'/admin/informasi/hapus_gambar/'.$key['id']?>"><i class="fa fa-trash"></i>Hapus</a>  </li>
                            <?php } ?>
                        </ul>
					</div>
				</div>

			</div>



			<div class='col-lg-6 col-xlg-6'>

				<div class="card">
					<div class="card-header">
						Data Informasi File
					</div>
					<div class="card-block">
						<h4 class="card-title">Data Informasi File</h4>

						<?php echo form_open_multipart( $action_file );?>
							<div class="form-group">
								<label for="file">File</label>
								<input type="file" class="form-control" id="file" name="file" placeholder="Password">
							</div>
                            <button type="submit" class='btn btn-primary my-3'>simpan</button>
                        </form>
                        <h4>File Yang Tersimpan</h4>
                        <ul>
                            <?php foreach ($data_file as $key) {?>
                                <li> <a href="<?= base_url().'/assets/informasi/'.$key['file'] ?>"><?= $key['file'] ?></a> <a class='ml-3' style="color: blue;" href="<?= base_url().'/admin/informasi/hapus_file/'.$key['id']?>"><i class="fa fa-trash"></i>Hapus</a>  </li>
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
<script src="<?php echo base_url(); ?>asset/adminthem/assets/plugins/icheck/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>asset/adminthem/assets/plugins/icheck/icheck.init.js"></script>
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

<script>
	CKEDITOR.replace('input_text');

</script>
