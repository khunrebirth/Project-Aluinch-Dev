<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="<?php echo base_url('backoffice/dashboard'); ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item"><a href="#">Page: Technologies</a></div>
                <div class="breadcrumb-item"><a href="<?php echo base_url('backoffice/page/technology/category'); ?>">Category technology</a></div>
                <div class="breadcrumb-item ">Technology</div>
                <?php if ($category_technology->id < 3) { ?>
                <div class="breadcrumb-item active ">Add Technology: (Category-<?php echo $category_technology->title ?>)</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Technology</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url('backoffice/page/technology/technology_videos/store'); ?>" method="post" enctype="multipart/form-data">
                                <div style="padding-top: 20px;"><h6><i class="fa fa-tag"></i> Information</h6></div>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">* Title </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Body</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="summernote" name="body"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Src</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="src"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Short Src</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="short_src"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Image Cover</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="img_cover">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Image Cover Alt</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="img_title_alt">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" value="<?php echo $category_technology->id; ?>" name="category_technology_id">
                                        <input type="text" class="form-control" value="<?php echo $category_technology->title; ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <a href="<?php echo base_url('backoffice/page/technology/technology_videos/show/' . $category_technology->id); ?>"
                                       class="btn btn-secondary">Close</a>
                                </div>
                            </form>
                            <?php } else { ?>
                            <div class="breadcrumb-item active ">Add Question: (Category-<?php echo $category_technology->title ?>)
                            </div>
                        </div>
                    </div>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Add Question</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php echo base_url('backoffice/page/technology/technology_videos/store'); ?>"
                                              method="post"
                                              enctype="multipart/form-data">
                                            <div style="padding-top: 20px;"><h6><i class="fa fa-tag"></i> Information
                                                </h6></div>
                                            <hr>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">* Question </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="ask" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">* Answer</label>
                                                <div class="col-sm-9">
                                                    <textarea type="text" class="form-control" name="ans"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Category</label>
                                                <div class="col-sm-9">
                                                    <input type="hidden" value="<?php echo $category_technology->id; ?>"
                                                           name="category_technology_id">
                                                    <input type="text" class="form-control"
                                                           value="<?php echo $category_technology->title; ?>"
                                                           disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                <a href="<?php echo base_url('backoffice/page/technology/technology_videos/show/' . $category_technology->id); ?>"
                                                   class="btn btn-secondary">Close</a>
                                            </div>
                                        </form>
                                        <?php } ?>
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
