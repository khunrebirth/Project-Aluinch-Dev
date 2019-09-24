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
            <h1>Product Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a
                            href="<?php echo base_url('backoffice/dashboard'); ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo base_url('backoffice/page/product/list-products'); ?>">Page:
                        Products</a></div>
                <div class="breadcrumb-item">Product Category</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Category Product</h4>
                            <div class="card-header-action">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle">Modal Template</h5>
                            </div>
                            <form id="addEditCategoryProductForm" href="<?php echo base_url('back_end/category_product/store/'); ?>" method="post">
                                <div class="modal-body">
                                    <div style="padding-top: 20px;"><h6><i class="fa fa-tag"></i> Meta Tag</h6></div>
                                    <hr>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="meta_tag_title"
                                                   id="metaTagTitle">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="meta_tag_description"
                                                   id="metaTagDescription">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Keywords</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="meta_tag_keywords"
                                                   id="metaTagKeywords">
                                        </div>
                                    </div>
                                    <div style="padding-top: 20px;"><h6><i class="fa fa-tag"></i> Information</h6></div>
                                    <hr>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">* Title Category</label>
                                        <input type="hidden" value="" id="id">
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="title" id="title"
                                                   required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">* Group</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="groupProductId" name="group_product_id"
                                                    required="required">
                                                <?php foreach ($group_products as $group_product) { ?>
                                                    <option value="<?php echo $group_product->id; ?>"><?php echo $group_product->title; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Preview</label>
                                        <div class="col-sm-9">
                                            <img src="" alt="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Image Cover</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="file" id="file">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Image Title & Alt</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="image_title_alt"
                                                   id="imageTitleAlt">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="btnAddCategoryProduct">Save
                                        changes
                                    </button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</section>

<!-- Modal -->

</div>


<!-- JS Libraies -->
<script src="<?php echo base_url('resources/back_end/node_modules/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/back_end/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/back_end/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js'); ?>"></script>

<!-- Page Specific JS File -->
<script src="<?php echo base_url('resources/back_end/assets/js/page/modules-datatables.js'); ?>"></script>

<script>
    var grid;

    function reload() {
        setTimeout(function () {
            location.reload()
        }, 1 * 1500)
    }

    function clearForm() {
        $('#modalAddEditCategoryProduct form')[0].reset()
    }

    function addCategoryProduct() {
        clearForm()
        $('#modalTitle').html('Add')
        $('#id').val('')
        $('#title').val('')
        $('#body').val('')
    }

    function editCategoryProduct(url) {
        clearForm()

        $.ajax({
            url: url,
            success: function (res) {
                let categoryProduct = res.data

                $('#modalAddEditCategoryProduct').modal('show')

                $('#modalTitle').html('Edit: ' + categoryProduct.title)
                $('#id').val(categoryProduct.id).attr('data-link-to-update', url.replace('edit', 'update'))
                $('#title').val(categoryProduct.title)
                $('#groupProductId').val(categoryProduct.group_product_id)
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

    function deleteCategoryProduct(url) {
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

        grid = $("#table-1").dataTable()
        console.log(grid)

        $('#addEditCategoryProductForm').on('submit', function (e) {
            e.preventDefault()

            let $data = new FormData($(this)[0]),
                $categoryProductId = $('#id').val(),
                url = '',
                method = 'POST'

            // Case: Update
            if ($categoryProductId != '') {
                url = $('#id').attr('data-link-to-update')
            }
            // Case: Insert New
            else {
                url = '<?php echo base_url('backoffice/page/product/category/store'); ?>'
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
                    $('#modalAddEditCategoryProduct').modal('hide')
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
