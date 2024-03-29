<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="<?php echo base_url('backoffice/dashboard'); ?>">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Page: Projects</a></div>
					<div class="breadcrumb-item"><a href="<?php echo base_url('backoffice/page/project/projects'); ?>">Projects</a></div>
					<div class="breadcrumb-item"><a href="<?php echo base_url('backoffice/page/project/list-project-pictures/' . $project->id); ?>">Project (<?php echo $project->title; ?>)</a></div>
                    <div class="breadcrumb-item active">Add Image</div>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Image</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url('backoffice/page/project/list-project-pictures/store/' . $project->id); ?>" method="post" enctype="multipart/form-data">
                                <div style="padding-top: 20px;"><h6><i class="fa fa-tag"></i> Information</h6></div>
                                <hr>
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Preview</label>
									<div class="col-sm-9">
										<div id="previewImg"></div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Image Gallery <span style="color: #c0372b;">(แนะนำขนาด 1000*500 สามารถเลือกได้มากกว่า 1 รูปภาพ)</span></label>
									<div class="col-sm-9">
										<div class="custom-file input-file-w-30">
											<input type="file" id="img_multi" class="custom-file-input" name="img_multi[]" onchange="previewImageMulti();" multiple>
											<label class="custom-file-label">Choose file (.gif | .jpg | .png)</label>
										</div>
									</div>
								</div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <a href="<?php echo base_url('backoffice/page/project/list-project-pictures/' . $project->id); ?>" class="btn btn-secondary">Close</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function PreviewImage(input, previewImage) {
        if (input.files && input.files[0]) {
            var reader = new FileReader()

            reader.onload = function (e) {
                $('#' + previewImage).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewImageMulti() {
        $('#previewImg').html('')
        let totalFile = document.getElementById("img_multi").files.length

        for (var i = 0; i < totalFile; i++) {
            $('#previewImg').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' style='width: 120px;'><br>");
        }
    }
</script>
