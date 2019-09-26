<!-- CSS Libraries -->
<link rel="stylesheet" href="<?php echo base_url('resources/back_end/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('resources/back_end/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('resources/back_end/node_modules/prismjs/themes/prism.css'); ?> ">

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Product Group</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('backoffice/dashboard'); ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo base_url('backoffice/page/product/list-products'); ?>">Page: Products</a></div>
                <div class="breadcrumb-item">Products :(Categories-<?php echo $category_products->title; ?>)</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List of Product</h4>
                            <div class="card-header-action">
                                <a href="#modalAddEditProduct" class="btn btn-primary" onclick="addProduct()" data-toggle="modal">
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
                                        <th>Image</th>
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
                                                <td><img alt="image" src="<?php echo base_url('storage/uploads/images/products/' . $product->image); ?>" height="12%"></td>
                                                <td><?php echo $product->group_product_name; ?></td>
                                                <td><?php echo $product->category_product_name; ?></td>
                                                <td><?php echo $product->created_at; ?></td>
                                                <td>
                                                    <div class="dropdown d-inline">
                                                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-cog"></i> Manage
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item has-icon" onclick="editProduct('<?php echo base_url('backoffice/page/product/products/edit/' . $product->id); ?>')"><i class="far fa-edit"></i> Edit</a>
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

    <!-- Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalAddEditProduct">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Modal Template</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addEditProductForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="hidden" value="" id="id">
                            <input type="text" class="form-control" name="title" id="title" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btnAddProduct">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

    function clearForm() {
        $('#modalAddEditProduct form')[0].reset()
    }

    function addProduct() {
        clearForm()
        $('#modalTitle').html('Add')
        $('#id').val('')
        $('#title').val('')
    }

    function editProduct(url) {
        clearForm()

        $.ajax({
            url: url,
            success: function (res) {
                let product = res.data

                $('#modalAddEditProduct').modal('show')

                $('#modalTitle').html('Edit')
                $('#id').val(product.id).attr('data-link-to-update', url.replace('edit', 'update'))
                $('#title').val(product.title)
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

    $(document).ready(function () {
        $('#addEditProductForm').on('submit', function (e) {
            e.preventDefault()

            let $data = new FormData($(this)[0]),
                $productId = $('#id').val(),
                url = '',
                method = 'POST'

            // Case: Update
            if ($productId != '') {
                url = $('#id').attr('data-link-to-update')
            }
            // Case: Insert New
            else {
                url = '<?php echo base_url('backoffice/page/product/group/store'); ?>'
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
                    $('#modalAddEditProduct').modal('hide')
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
