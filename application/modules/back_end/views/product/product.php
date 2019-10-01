<!-- CSS Libraries -->
<link rel="stylesheet" href="<?php echo base_url('resources/back_end/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('resources/back_end/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('resources/back_end/node_modules/prismjs/themes/prism.css'); ?> ">

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?php echo base_url('backoffice/dashboard'); ?>">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="<?php echo base_url('backoffice/page/product/list-products'); ?>">Page: Products</a></div>
				<div class="breadcrumb-item"><a href="<?php echo base_url('backoffice/page/product/group'); ?>">Product Groups</a></div>
				<div class="breadcrumb-item"><a href="<?php echo base_url('backoffice/page/product/category/show/' . $group_products->id); ?>">Product Categories</a></div>
				<div class="breadcrumb-item active">Products :(Categories-<?php echo $category_products->title; ?>)</div>
			</div>
		</div>
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>List of Product :(Categories-<?php echo $category_products->title; ?>)</h4>
							<div class="card-header-action">
								<a href="<?php echo base_url('backoffice/page/product/products/create/' . $group_products->id . '/' . $category_products->id); ?>" class="btn btn-primary">
									<i class="fas fa-plus"></i> Add
								</a>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="table-1">
									<thead>
									<tr>
										<th class="text-center">#</th>
										<th>Title</th>
										<th>Desc(en)</th>
										<th>Desc(th)</th>
										<th>Product Group</th>
										<th>Product Category</th>
										<th>Created at</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
									<?php
										$counter = 1;
										foreach ($products as $product) { ?>
											<tr>
												<td class="text-center"><?php echo $counter++; ?></td>
												<td><?php echo $product->title; ?></td>
												<td><?php echo $product->description_en; ?></td>
												<td><?php echo $product->description_th; ?></td>
												<td><?php echo $product->group_product_name; ?></td>
												<td><?php echo $product->category_product_name; ?></td>
												<td><?php echo $product->created_at; ?></td>
												<td>
													<div class="dropdown d-inline">
														<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="fas fa-cog"></i> Manage
														</button>
														<div class="dropdown-menu">
															<a class="dropdown-item has-icon" href="<?php echo base_url('backoffice/page/product/products/edit/' . $product->id); ?>"><i class="far fa-edit"></i> Edit</a>
															<a class="dropdown-item has-icon" onclick="deleteProduct('<?php echo base_url('backoffice/page/product/products/destroy/' . $product->id); ?>')"><i class="far fa-trash-alt"></i> Delete</a>
														</div>
													</div>
												</td>
											</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
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

<script>
	function reload() {
		setTimeout(function () {
			location.reload()
		}, 1 * 1500)
	}

	function deleteProduct(url) {
		swal({
			title: 'Are you sure ?',
			icon: 'warning',
			button: true,
			dangerMode: true
		})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						type: 'POST',
						url: url,
						success: function (res) {
							swal({
								title: 'Success',
								icon: 'success',
								button: 'Great!'
							})

							reload()
						},
						error: function (res) {
							swal({
								title: 'Oops...',
								text: 'Fail',
								icon: 'error',
								timer: '1500'
							})
						}
					})
				} else {
					swal('Cancel')
				}
			})
	}
</script>
