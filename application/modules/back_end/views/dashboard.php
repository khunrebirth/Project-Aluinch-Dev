<!-- CSS Libraries -->
<link rel="stylesheet"
	  href="<?php echo base_url('resources/back_end/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet"
	  href="<?php echo base_url('resources/back_end/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('resources/back_end/node_modules/prismjs/themes/prism.css'); ?> ">

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>

		<?php if ($this->session->flashdata('success')) { ?>
			<div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
		<?php } ?>
		<?php if ($this->session->flashdata('error')) { ?>
			<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
		<?php } ?>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-user"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Admin</h4>
						</div>
						<div class="card-body">
							<?php echo $user_total; ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4>Recent Activity Logs (<?php echo $log_total; ?>)</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped" id="ssmDataTable">
								<thead>
								<tr>
									<th>#</th>
									<th>Username</th>
									<th>Event</th>
									<th>Detail</th>
									<th>IP</th>
									<th>Created at</th>
								</tr>
								</thead>
								<tbody>
								<?php
									if (count($logs) > 0) {
										$counter = 1;
										foreach ($logs as $log) { ?>
											<tr>
												<td><?php echo $counter; ?></td>
												<td><?php echo $log['username']; ?></td>
												<td><?php echo $log['event']; ?></td>
												<td><?php echo $log['detail']; ?></td>
												<td><?php echo $log['ip']; ?></td>
												<td><?php echo $log['created_at']; ?></td>
											</tr>
									<?php }
								} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- JS Libraies -->
<script src="<?php echo base_url('resources/back_end/node_modules/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/back_end/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/back_end/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js'); ?>"></script>

<!-- Page Specific JS File -->
<script src="<?php echo base_url('resources/back_end/assets/js/page/modules-datatables.js'); ?>"></script>

<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="<?php echo base_url('resources/back_end/assets/js/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/back_end/assets/js/vfs_fonts.js'); ?>"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
