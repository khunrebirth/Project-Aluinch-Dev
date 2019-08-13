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
                <div class="breadcrumb-item">Clients</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List of Client Categories</h4>
                            <div class="card-header-action">
                                <a href="#modalAddEditClientCategory" class="btn btn-primary" onclick="addClientCategory()" data-toggle="modal">
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
                                        foreach ($client_categories as $client_category) {
                                            echo '<tr>';
                                            echo '<td class="text-center">' . $counter++ . '</td>';
                                            echo '<td>' . $client_category->title . '</td>';
                                            echo '<td></td>';
                                            echo '<td>
                                                        <a class="btn btn-warning" onclick="editClientCategory(' . "'" . base_url("backoffice/manage-item/clients/edit_client_category/$client_category->id") . "'" . ')"><i class="fas fa-edit"></i> Edit</a>
                                                        <a class="btn btn-danger" onclick="deleteClientCategory(' . "'" . base_url("backoffice/manage-item/clients/destroy_client_category/$client_category->id") . "'" . ')"><i class="fas fa-trash-alt"></i> Delete</a>
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
                            <h4>List of Clients</h4>
                            <div class="card-header-action">
                                <a href="#modalAddEditClient" class="btn btn-primary" onclick="addClient()"
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
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $counter = 1;
                                    foreach ($clients as $client) {
                                        echo '<tr>';
                                        echo '<td class="text-center">' . $counter++ . '</td>';
                                        echo '<td>' . '<img alt="image" src=' . base_url('storage/images/clients/' . $client->image) . ' width="80">' . '</td>';
                                        echo '<td>' . $client->category_title . '</td>';
                                        echo '<td>
                                                        <a class="btn btn-warning" onclick="editClient(' . "'" . base_url("backoffice/manage-item/clients/edit/$client->id") . "'" . ')"><i class="fas fa-edit"></i> Edit</a>
                                                        <a class="btn btn-danger" onclick="deleteClient(' . "'" . base_url("backoffice/manage-item/clients/destroy/$client->id") . "'" . ')"><i class="fas fa-trash-alt"></i> Delete</a>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="modalAddEditClientCategory">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleClientCategory">Modal Template</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addEditClientCategoryForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="hidden" value="" id="idClientCategory">
                            <input type="text" class="form-control" name="title" id="titleClientCategory" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btnAddClientCategory">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Client -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalAddEditClient">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleClient">Modal Template</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addEditClientForm">
                    <div class="modal-body">
<!--                        <div class="form-group">-->
<!--                            <label>Title</label>-->
                            <input type="hidden" value="" id="idClient">
<!--                            <input type="text" class="form-control" name="title" id="title" required="required">-->
<!--                        </div>-->
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category" id="category">
                            <?php
                                foreach ($client_categories as $client_category) {
                                    echo '<option value = "' . $client_category->id . '">' . $client_category->title . '</option >';
                                }
                             ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <div class="text-center mb-3">
                                <img id="imgClient" src="" class="rounded" width="200px">
                            </div>
                            <input type="file" class="form-control" name="file" id="file" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btnAddClient">Save changes</button>
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
        $('#modalAddEditClientCategory form')[0].reset()
        $('#modalAddEditClient form')[0].reset()
    }

    function addClientCategory() {
        clearForm()
        $('#modalTitleClientCategory').html('Add')
        $('#idClientCategory').val('')
        $('#titleClientCategory').val('')
    }

    function addClient() {
        clearForm()
        $('#modalTitleClient').html('Add')
        $('#idClient').val('')
        // $('#titleClient').val('')
        $('#file').val('').attr('required', 'required')
        $('#imgClient').attr('src', '')
    }

    function editClientCategory(url) {
        clearForm()

        $.ajax({
            url: url,
            success: function (res) {
                let clientCategory = res.data

                $('#modalAddEditClientCategory').modal('show')

                $('#modalTitleClientCategory').html('Edit')
                $('#idClientCategory').val(clientCategory.id).attr('data-link-to-update', url.replace('edit', 'update'))
                $('#titleClientCategory').val(clientCategory.title)
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

    function editClient(url) {
        clearForm()

        $.ajax({
            url: url,
            success: function (res) {
                let client = res.data

                $('#modalAddEditClient').modal('show')

                $('#modalTitleClient').html('Edit')
                $('#idClient').val(client.id).attr('data-link-to-update', url.replace('edit', 'update'))
                // $('#titleClient').val(client.title)
                $('#category').val(client.category_id)
                $('#imgClient').attr('src', "<?php echo base_url('storage/images/clients/'); ?>" + client.image)
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

    function deleteClientCategory(url) {
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

    function deleteClient(url) {
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
        $('#addEditClientCategoryForm').on('submit', function (e) {
            e.preventDefault()

            let $data = new FormData($(this)[0]),
                $clientCategoryId = $('#idClientCategory').val(),
                url = '',
                method = 'POST'

            // Case: Update
            if ($clientCategoryId != '') {
                url = $('#idClientCategory').attr('data-link-to-update')
            }
            // Case: Insert New
            else {
                url = '<?php echo base_url('backoffice/manage-item/clients/store_client_category'); ?>'
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
                    $('#modalAddEditClientCategory').modal('hide')
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

        $('#addEditClientForm').on('submit', function (e) {
            e.preventDefault()

            let $data = new FormData($(this)[0]),
                $clientId = $('#idClient').val(),
                url = '',
                method = 'POST',
                fileData = ''

            // Case: Update
            if ($clientId != '') {
                url = $('#idClient').attr('data-link-to-update')
                fileData = $("#file").prop("files")[0]
                $data.append('file', fileData)
            }
            // Case: Insert New
            else {
                url = '<?php echo base_url('backoffice/manage-item/clients/store'); ?>'
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
                    $('#modalAddEditClient').modal('hide')
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
