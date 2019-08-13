<!-- CSS Libraries -->
<link rel="stylesheet" href="<?php echo base_url('resources/back-end/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('resources/back-end/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('resources/back-end/node_modules/prismjs/themes/prism.css'); ?> ">

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manage Item: Clients</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Manage Item</a></div>
                <div class="breadcrumb-item">Blogs</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List of Blog Categories</h4>
                            <div class="card-header-action">
                                <a href="#modalAddEditBlogCategory" class="btn btn-primary" onclick="addBlogCategory()" data-toggle="modal">
                                    <i class="fas fa-plus"></i> Add News
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
                                        <th></th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $counter = 1;
                                        foreach ($blog_categories as $blog_category) {
                                            echo '<tr>';
                                            echo '<td class="text-center">' . $counter++ . '</td>';
                                            echo '<td>' . $blog_category->title . '</td>';
                                            echo '<td></td>';
                                            echo '<td>
                                                        <a class="btn btn-warning" onclick="editBlogCategory(' . "'" . base_url("backoffice/manage-item/blogs/edit_blog_category/$blog_category->id") . "'" . ')"><i class="fas fa-edit"></i> Edit</a>
                                                        <a class="btn btn-danger" onclick="deleteBlogCategory(' . "'" . base_url("backoffice/manage-item/blogs/destroy_blog_category/$blog_category->id") . "'" . ')"><i class="fas fa-trash-alt"></i> Delete</a>
                                                    </td>';
                                            echo '</tr>';
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List of Blogs</h4>
                            <div class="card-header-action">
                                <a href="#modalAddEditBlog" class="btn btn-primary" onclick="addBlog()"
                                   data-toggle="modal">
                                    <i class="fas fa-plus"></i> Add News
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $counter = 1;
                                    foreach ($blogs as $blog) {
                                        echo '<tr>';
                                        echo '<td class="text-center">' . $counter++ . '</td>';
                                        echo '<td>' . '<img alt="image" src=' . base_url('storage/images/blogs/' . $blog->image) . ' width="200">' . '</td>';
                                        echo '<td>' . $blog->title . '</td>';
                                        echo '<td>' . $blog->body . '</td>';
                                        echo '<td>' . $blog->blog_title . '</td>';
                                        echo '<td>
                                                        <a class="btn btn-warning" onclick="editBlog(' . "'" . base_url("backoffice/manage-item/blogs/edit/$blog->id") . "'" . ')"><i class="fas fa-edit"></i> Edit</a>
                                                        <a class="btn btn-danger" onclick="deleteBlog(' . "'" . base_url("backoffice/manage-item/blogs/destroy/$blog->id") . "'" . ')"><i class="fas fa-trash-alt"></i> Delete</a>
                                                    </td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Category -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalAddEditBlogCategory">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleBlogCategory">Modal Template</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addEditBlogCategoryForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="hidden" value="" id="idBlogCategory">
                            <input type="text" class="form-control" name="title" id="titleBlogCategory" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btnAddBlogCategory">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Blog -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalAddEditBlog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleClient">Modal Template</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addEditBlogForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>File</label>
                            <div class="text-center mb-3">
                                <img id="imgClient" src="" class="rounded" width="200px">
                            </div>
                            <input type="file" class="form-control" name="file" id="file" required="required">
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="hidden" value="" id="idBlog">
                            <input type="text" class="form-control" name="title" id="titleBlog" required="required">
                        </div>
                        <div class="form-group">
                            <label>Textarea</label>
                            <textarea class="form-control" name="body" id="bodyBlog" rows="4" cols="50"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category" id="category">
                            <?php
                                foreach ($blog_categories as $blog_category) {
                                    echo '<option value = "' . $blog_category->id . '">' . $blog_category->title . '</option >';
                                }
                             ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btnAddBlog">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- JS Libraies -->
<script src="<?php echo base_url('resources/back-end/node_modules/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/back-end/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/back-end/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js'); ?>"></script>

<!-- Page Specific JS File -->
<script src="<?php echo base_url('resources/back-end/assets/js/page/modules-datatables.js'); ?>"></script>

<script>

    function reload() {
        setTimeout(function () {
            location.reload()
        }, 1 * 1500)
    }

    function clearForm() {
        $('#modalAddEditBlogCategory form')[0].reset()
        $('#modalAddEditBlog form')[0].reset()
    }

    function addBlogCategory() {
        clearForm()
        $('#modalTitleBlogCategory').html('Add')
        $('#idBlogCategory').val('')
        $('#titleBlogCategory').val('')
    }

    function addBlog() {
        clearForm()
        $('#modalTitleClient').html('Add')
        $('#idBlog').val('')
        // $('#titleClient').val('')
        $('#file').val('').attr('required', 'required')
        $('#imgClient').attr('src', '')
    }

    function editBlogCategory(url) {
        clearForm()

        $.ajax({
            url: url,
            success: function (res) {
                let blogCategory = res.data

                $('#modalAddEditBlogCategory').modal('show')

                $('#modalTitleBlogCategory').html('Edit')
                $('#idBlogCategory').val(blogCategory.id).attr('data-link-to-update', url.replace('edit', 'update'))
                $('#titleBlogCategory').val(blogCategory.title)
            },
            error: function (res) {
                swal({
                    title: 'Oops...',
                    text: 'fail',
                    icon: 'error',
                    timer: '1500'
                })
            }
        })
    }

    function editBlog(url) {
        clearForm()

        $.ajax({
            url: url,
            success: function (res) {
                let blog = res.data

                $('#modalAddEditBlog').modal('show')

                $('#modalTitleBlog').html('Edit')
                $('#idBlog').val(blog.id).attr('data-link-to-update', url.replace('edit', 'update'))
                $('#titleBlog').val(blog.title)
                $('#bodyBlog').val(blog.body)
                $('#category').val(blog.category_id)
                $('#imgClient').attr('src', "<?php echo base_url('storage/images/blogs/'); ?>" + blog.image)
                $('#file').removeAttr('required')
            },
            error: function (res) {
                swal({
                    title: 'Oops...',
                    text: 'fail',
                    icon: 'error',
                    timer: '1500'
                })
            }
        })
    }

    function deleteBlogCategory(url) {
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

    function deleteBlog(url) {
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


    $(document).ready(function () {
        $('#addEditBlogCategoryForm').on('submit', function (e) {
            e.preventDefault()

            let $data = new FormData($(this)[0]),
                $blogCategoryId = $('#idBlogCategory').val(),
                url = '',
                method = 'POST'

            // Case: Update
            if ($blogCategoryId != '') {
                url = $('#idBlogCategory').attr('data-link-to-update')
            }
            // Case: Insert New
            else {
                url = '<?php echo base_url('backoffice/manage-item/blogs/store_blog_category'); ?>'
            }

            $.ajax({
                type: method,
                url: url,
                data: $data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (res) {
                    $('#modalAddEditBlogCategory').modal('hide')
                    swal({
                        title: 'Success',
                        icon: 'success',
                        button: "Great!"
                    })

                    reload()
                },
                error: function (res) {
                    swal({
                        title: 'Oops...',
                        text: 'fail',
                        icon: 'error',
                        timer: '1500'
                    })
                }
            })
        })

        $('#addEditBlogForm').on('submit', function (e) {
            e.preventDefault()

            let $data = new FormData($(this)[0]),
                $blogId = $('#idBlog').val(),
                url = '',
                method = 'POST',
                fileData = ''

            // Case: Update
            if ($blogId != '') {
                url = $('#idBlog').attr('data-link-to-update')
                fileData = $("#file").prop("files")[0]
                $data.append('file', fileData)
            }
            // Case: Insert New
            else {
                url = '<?php echo base_url('backoffice/manage-item/blogs/store'); ?>'
            }

            $.ajax({
                type: method,
                url: url,
                data: $data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (res) {
                    $('#modalAddEditBlog').modal('hide')
                    swal({
                        title: 'Success',
                        icon: 'success',
                        button: "Great!"
                    })

                    reload()
                },
                error: function (res) {
                    swal({
                        title: 'Oops...',
                        text: 'fail',
                        icon: 'error',
                        timer: '1500'
                    })
                }
            })
        })
    })
</script>
