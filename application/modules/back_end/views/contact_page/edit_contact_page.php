<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add Product Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a
                            href="<?php echo base_url('backoffice/dashboard'); ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Page: Contact</a></div>
                <div class="breadcrumb-item">Edit Contact</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo base_url('back_end/contact_page/update/1'); ?>" method="post"
                                  enctype="multipart/form-data">
                                <div style="padding-top: 20px;"><h6><i class="fa fa-tag"></i> Meta Tag</h6></div>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="meta_tag_title"
                                               value="<?php echo $contact_page->meta_tag_title; ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="meta_tag_description"
                                               value="<?php echo $contact_page->meta_tag_description; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Keywords</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="meta_tag_keywords"
                                               value="<?php echo $contact_page->meta_tag_keywords; ?>">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button onclick="return confirm('Are you sure?');" type="submit"
                                            class="btn btn-primary">Save changes
                                    </button>
                                    <a href="#" class="btn btn-secondary">Close</a>
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
</script>
