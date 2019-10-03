<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="<?php echo base_url('backoffice/dashboard'); ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Page: Technologies</a></div>
				<div class="breadcrumb-item"><a href="<?php echo base_url('backoffice/page/technology/category'); ?>">Category technology</a></div>
                <div class="breadcrumb-item active">Edit Category Technology: <?php echo $technologies->title ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Category Technology</h4>
                        </div>
                        <div class="card-body">
							<form action="<?php echo base_url('backoffice/page/technology/category/update/' . $technologies->id); ?>" method="post">
                                <div style="padding-top: 20px;"><h6><i class="fa fa-tag"></i> Information</h6></div>
                                <hr>
                                <div class="form-group">
									<label>* Title</label>
									<input type="text" class="form-control" name="title" value="<?php echo $technologies->title ?>" required>
								</div>
								<div class="text-right">
									<button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-primary" >Save changes</button>
									<a href="<?php echo base_url('backoffice/page/technology/category'); ?> " class="btn btn-secondary" >Close</a>
								</div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
