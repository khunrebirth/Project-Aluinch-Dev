<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="<?php echo base_url('backoffice/dashboard'); ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Page: Products</a></div>
				<div class="breadcrumb-item"><a href="<?php echo base_url('backoffice/page/product/group'); ?>">Product Groups</a></div>
                <div class="breadcrumb-item active">Edit Product Group: <?php echo $group_products->title ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Product Group</h4>
                        </div>
                        <div class="card-body">
							<form action="<?php echo base_url('back_end/group_product/update/' . $group_products->id); ?>" method="post">
								<div class="form-group">
									<label>* Title</label>
									<input type="text" class="form-control" name="title" value="<?php echo $group_products->title ?>" required>
								</div>
								<div class="text-right">
									<button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-primary" >Save changes</button>
									<a href="<?php echo base_url('backoffice/page/product/group'); ?> " class="btn btn-secondary" >Close</a>
								</div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
