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
                            <h4>Add Product Group</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle">Add</h5>
                                    </div>
                                    <form  action="<?php echo base_url('back_end/group_product/store') ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="hidden" value="" id="id">
                                                <input type="text" class="form-control" name="title" id="title" required="required">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" >Save changes</button>
                                            <a  href="<?php echo base_url('backoffice/page/product/group') ?> " class="btn btn-secondary" >Close</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->



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
