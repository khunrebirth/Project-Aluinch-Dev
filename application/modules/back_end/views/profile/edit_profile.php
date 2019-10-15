<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('backoffice/dashboard'); ?>">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="#">Setting</a></div>
				<div class="breadcrumb-item"><a href="#">Profile</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Change Password</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url('backoffice/setting/profile/update/' . $profile->id); ?>" method="post">
                                <div style="padding-top: 20px;"><h6><i class="fa fa-tag"></i> Information</h6></div>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">* Password</label>
                                    <div class="col-sm-4">
                                        <input id="txtNewPassword" type="password" class="form-control" name="password" required>
                                    </div>
                                </div>
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">* Confirm Password</label>
									<div class="col-sm-4">
										<input id="txtConfirmPassword" type="password" class="form-control" name="confirm_password" required><span id="divCheckPasswordMatch"></span>
									</div>
								</div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary" id="btnSave" disabled>Save changes</button>
                                    <a href="<?php echo base_url('backoffice/dashboard'); ?>" class="btn btn-secondary">Close</a>
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
    function checkPasswordMatch() {
        var password = $("#txtNewPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();

        if (password != confirmPassword) {
            $("#btnSave").attr('disabled', true)
            $("#divCheckPasswordMatch").html("Passwords do not match!").css('color', '#c0392b');
        } else {
            $("#btnSave").attr('disabled', false)
            $("#divCheckPasswordMatch").html("Passwords match.").css('color', '#27ae60');
        }
    }

    $(document).ready(function () {
        $("#txtConfirmPassword").keyup(checkPasswordMatch);
    });
</script>
