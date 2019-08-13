<!-- CSS Libraries -->
<link rel="stylesheet" href="<?php echo base_url('resources/back-end/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('resources/back-end/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('resources/back-end/node_modules/prismjs/themes/prism.css'); ?> ">

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manage Item: Services Type 2</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Manage Service Type 2</a></div>
                <div class="breadcrumb-item">Service Type 2</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List of Services</h4>
                            <div class="card-header-action">
                                <a href="#modalAddEditService2" class="btn btn-primary" onclick="addService2()" data-toggle="modal">
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
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $counter = 1;
                                        foreach ($services2 as $service2) {
                                            echo '<tr>';
                                            echo '<td class="text-center">' . $counter++ . '</td>';
                                            echo '<td>' . $service2->title . '</td>';
                                            echo '<td>' . '<img alt="image" src=' . base_url('storage/images/services/' . $service2->image) . ' width="100">' . '</td>';
                                            echo '<td>
                                                        <a class="btn btn-warning" onclick="editService2(' . "'" . base_url("backoffice/manage-item/services2/edit/$service2->id") . "'" . ')"><i class="fas fa-edit"></i> Edit</a>
                                                        <a class="btn btn-danger" onclick="deleteService2(' . "'" . base_url("backoffice/manage-item/services2/destroy/$service2->id") . "'" . ')"><i class="fas fa-trash-alt"></i> Delete</a>
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


    <!-- Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalAddEditService2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Modal Template</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addEditServiceForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="hidden" value="" id="id">
                            <input type="text" class="form-control" name="title" id="title" required="required">
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <div class="text-center mb-3">
                                <img id="imgService2" src="" class="rounded" width="200px">
                            </div>
                            <input type="file" class="form-control" name="file" id="file" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btnAddService2">Save changes</button>
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
        $('#modalAddEditService2 form')[0].reset()
    }

    function addService2() {
        clearForm()
        $('#modalTitle').html('Add')
        $('#id').val('')
        $('#title').val('')
        $('#image').val('')
        $('#file').val('').attr('required', 'required')
        $('#imgService2').attr('src', '')
    }

    function editService2(url) {
        clearForm()

        $.ajax({
            url: url,
            success: function (res) {
                let service = res.data

                $('#modalAddEditService2').modal('show')

                $('#modalTitle').html('Edit')
                $('#id').val(service.id).attr('data-link-to-update', url.replace('edit', 'update'))
                $('#title').val(service.title)
                $('#image').val(service.image)
                $('#imgService2').attr('src', "<?php echo base_url('storage/images/services/'); ?>" + service.image)
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

    function deleteService2(url) {
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
        $('#addEditServiceForm').on('submit', function (e) {
            e.preventDefault()

            let $data = new FormData($(this)[0]),
                $serviceId = $('#id').val(),
                url = '',
                method = 'POST',
                fileData = ''

            // Case: Update
            if ($serviceId != '') {
                url = $('#id').attr('data-link-to-update')
                fileData = $("#file").prop("files")[0]
                $data.append('file', fileData)
            }
            // Case: Insert New
            else {
                url = '<?php echo base_url('backoffice/manage-item/services2/store'); ?>'
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
                    $('#modalAddEditService2').modal('hide')
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
