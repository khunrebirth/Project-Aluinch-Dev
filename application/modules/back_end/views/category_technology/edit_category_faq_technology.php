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
                                <div style="padding-top: 20px;"><h6><i class="fa fa-tag"></i> Meta Tag</h6></div>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="meta_tag_title"
                                               value="<?php echo $technologies->meta_tag_title; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="meta_tag_description"
                                               value="<?php echo $technologies->meta_tag_description; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Keywords</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="meta_tag_keywords"
                                               value="<?php echo $technologies->meta_tag_keywords; ?>">
                                    </div>
                                </div>
                                <!-- OG & Twitter -->
                                <div style="padding-top: 20px;"><h6><i class="fa fa-tag"></i> Image OG &amp; Twitter</h6></div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-danger">
                                        og:title และ og:description จะถูกดึงจาก meta title และ meta description
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Preview</label>
                                    <div class="col-sm-9">
                                        <img id="previewMetaOgImg" src="<?php echo base_url('storage/uploads/images/technologies/'.$technologies->img_og_twitter); ?>" style="background-color: #fff;" width="18%" onerror="this.onerror=null;this.src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAANlBMVEXz9Pa5vsq2u8jN0dnV2N/o6u7FydPi5Onw8fS+ws3f4ee6v8v29/jY2+Hu7/Ly9PbJztbQ1dxJagBAAAAC60lEQVR4nO3b2ZaCMBREUQbDJOP//2wbEGVIFCHKTa+zH7uVRVmBBJQgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMCpdOzvQQqaq2KmuSrOzQ02lSeRem8rpsQq/ozg72Kj4UkAxEev8awnzs7P1yiIadsfpQXjfZCHhUCzbfmeurdNz6bDRsBWRsB+k0cXxdHjpa0wkTBn3hKnjzRZyEgYk3IeEv2RKWCt1cN9EJ0zjfm7Mq/rAVgUnbLpwnK/zA2tnuQmzJHquuqJq91blJuwmAW8rHbV3q2ITFrOAt7Xz3l2UmrBMlpcHe9fOUhOqRYVhFO/cqtSEy0H6bh/tJ1uhCctqlTB/NSnG9pOt1ISXjxLq825laVFowo9GaRPrF9talJqw3n6macaZ09yi1ISG2cLyriwePwxzi1ITru4s2naxma59TC2KTRjE83FqmQ6yeDaUDS3KTRhMV96h5TTSLD4HQ4uCE9bxePUU5pYL/3mD5o9CcMKgTONc39NNLrV5iK4aNLUoOWHQ38RQtW3nsm6db92i8ISvGBtct+hvwqyzBFxE9DehrcHlQPU1YWNvcNGirwlfNThv0ZOE9eJG1OsGZy36kVBdczU9e7RvAz5b9CFhqfIwSp4XwG+OwUWLPiRUV/33Z4tbGtTvGK635CfUDfb/SO5rt20N9t8m65fLT9g3GD5abDY2qC+lvEg4NjhEvLW4tUFvEj4a7OXq3TzoW8Jpg0PEzfk8SThv8EMeJFw1+O8SHmrQg4QHG/Qg4cEGxSc83KD4hIcblJ6w3L508TXh+vtDEpLw3GwDEpKQhOdznVD2fRr9tdpRw/1HqQndIeEvkXCXUlDC+1NBndsnge/fwyVnp9PGH3p95dm1WMKza4/fI37j+UPXR/c+2X9/hjQI0uO3LsyuMioM9A8Sjy/W1iIhY7Sn2tzpUahdWyXiNDNSxcWtSlCBAAAAAAAAAAAAAAAAAAAAAAAAAAAAwCn+AEXGNosxDBhFAAAAAElFTkSuQmCC';">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><span class="text-danger">*</span> File Upload</label>
                                    <div class="col-sm-9">
                                        <div class="custom-file input-file-w-30">
                                            <input type="file" name="img_og_twitter" class="custom-file-input" onchange="PreviewImage(this, 'previewMetaOgImg');">
                                            <label class="custom-file-label">Choose file (.gif | .jpg | .png)</label>
                                        </div>
                                    </div>
                                </div>
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
