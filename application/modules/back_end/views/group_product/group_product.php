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
                <div class="breadcrumb-item">Product Group</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List of Product Group</h4>
                            <div class="card-header-action">
                                <a href="<?php echo base_url('backoffice/page/product/group/create'); ?>" class="btn btn-primary" >
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
                                        <th>Created at</th>
                                        <th>Content</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $counter = 1;
                                        foreach ($group_products as $group_product) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo $counter++; ?></td>
                                                <td><?php echo $group_product->title; ?></td>
                                                <td><?php echo $group_product->created_at; ?></td>
                                                <td>
                                                    <a class="btn btn-warning" href="<?php echo base_url('backoffice/page/product/category/show/' .$group_product->id); ?>""><i class="far fa-view"></i> Item</a>
                                                </td>
                                                <td>
                                                    <div class="dropdown d-inline">
                                                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-cog"></i> Manage
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item has-icon" href="<?php echo base_url('backoffice/page/product/group/edit/' .$group_product->id); ?>" ><i class="far fa-edit"></i> Edit</a>
                                                            <a class="dropdown-item has-icon" onclick="deleteGroupProduct('<?php echo base_url('backoffice/page/product/group/destroy/' . $group_product->id); ?>')"><i class="far fa-trash-alt"></i> Delete</a>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="modalAddEditGroupProduct">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Modal Template</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addEditGroupProductForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="hidden" value="" id="id">
                            <input type="text" class="form-control" name="title" id="title" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btnAddGroupProduct">Save changes</button>
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
        $('#modalAddEditGroupProduct form')[0].reset()
    }

    function addGroupProduct() {
        clearForm()
        $('#modalTitle').html('Add')
        $('#id').val('')
        $('#title').val('')
    }

    function editGroupProduct(url) {
        clearForm()

        $.ajax({
            url: url,
            success: function (res) {
                let groupProduct = res.data

                $('#modalAddEditGroupProduct').modal('show')

                $('#modalTitle').html('Edit: ' + groupProduct.title)
                $('#id').val(groupProduct.id).attr('data-link-to-update', url.replace('edit', 'update'))
                $('#title').val(groupProduct.title)
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

    function deleteGroupProduct(url) {
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
        $('#addEditGroupProductForm').on('submit', function (e) {
            e.preventDefault()

            let $data = new FormData($(this)[0]),
                $groupProductId = $('#id').val(),
                url = '',
                method = 'POST'

            // Case: Update
            if ($groupProductId != '') {
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
                    $('#modalAddEditGroupProduct').modal('hide')
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
