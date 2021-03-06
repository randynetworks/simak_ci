 <!-- Footer -->
 <footer class="sticky-footer bg-white">
 	<div class="container my-auto">
 		<div class="copyright text-center my-auto">
 			<span>Copyright &copy; Politeknik Piksi Ganehsa 2004 - <?= date('Y') ?></span>
 		</div>
 	</div>
 </footer>
 <!-- End of Footer -->

 </div>
 <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
 	<i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 	<div class="modal-dialog" role="document">
 		<div class="modal-content">
 			<div class="modal-header">
 				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
 				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
 					<span aria-hidden="true">×</span>
 				</button>
 			</div>
 			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
 			<div class="modal-footer">
 				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
 				<a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
 			</div>
 		</div>
 	</div>
 </div>

 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>


 <!-- include summernote css/js -->
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
 <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>

 <script type="text/javascript">
	 $(document).ready(function() {
		 $('#summernote').summernote();
	 });
	 $('[data-toggle="datepicker"]').datepicker({
		 format: 'yyyy-mm-dd',
		 autoclose: true,
		 todayHighlight: true,
	 });
	 $('[data-toggle="datepicker1"]').datepicker({
		 format: 'yyyy-mm-dd',

		 autoclose: true,
		 todayHighlight: true,
	 });
	 $('[data-toggle="datepicker2"]').datepicker({
		 format: 'yyyy-mm-dd',

		 autoclose: true,
		 todayHighlight: true,
	 });
	 $('[data-toggle="datepicker3"]').datepicker({
		 format: 'yyyy-mm-dd',

		 autoclose: true,
		 todayHighlight: true,
	 });
	 $('[data-toggle="datepicker4"]').datepicker({
		 format: 'yyyy-mm-dd',

		 autoclose: true,
		 todayHighlight: true,
	 });
	 $('[data-toggle="datepicker5"]').datepicker({
		 format: 'yyyy-mm-dd',

		 autoclose: true,
		 todayHighlight: true,
	 });
 </script>


 </body>

 </html>
