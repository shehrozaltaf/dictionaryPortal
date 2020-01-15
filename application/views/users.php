<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">

        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Users</h3>
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Users
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-4 col-12 d-block d-md-none"><a
                        class="btn btn-warning btn-min-width float-md-right box-shadow-4 mr-1 mb-1"
                        href="<?php echo base_url() ?>"><i class="ft-mail"></i> Users</a>

            </div>
        </div>

        <div class="content-body">
            <section id="ordering">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Users
                                    <button type="button" class="btn bg-gradient-x-blue-cyan white addbtn">
                                        <i class="ft-plus"></i> Add New
                                    </button>
                                </h4>

                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="dt_colVis_buttons"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table id="my_table_pro"
                                               class="table table-striped table-bordered show-child-rows">
                                            <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $SNo = 0;
                                            if (isset($user) && $user != '') {
                                                foreach ($user as $userdata) {
                                                    $SNo++; ?>
                                                    <tr>
                                                        <td><?php echo $SNo ?></td>
                                                        <td><?php echo $userdata->userName ?></td>
                                                        <td><?php echo $userdata->email ?></td>
                                                        <td data-id="<?php echo $userdata->idUser ?>">
                                                            <a href="javascript:void(0)" onclick="getEdit(this)"><i
                                                                        class="ft-edit"></i> Edit </a>|
                                                            <a href="javascript:void(0)" onclick="getDelete(this)">
                                                                <i class="ft-trash-2"></i>
                                                                Delete </a>
                                                        </td>
                                                    </tr>

                                                <?php }
                                            } ?>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->

<!-- Modal -->
<div class="modal fade text-left" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel8">Add User</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="username">Name: </label>
                    <input type="text" class="form-control username" id="username">
                </div>

                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" class="form-control email" id="email">
                </div>

                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" class="form-control password" id="password">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger mybtn" onclick="addData()">Add
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel8">Edit User</h4>

                <input type="hidden" id="edit_idUser" name="edit_idUser">
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="edit_userName">Name: </label>
                    <input type="text" class="form-control edit_userName" id="edit_userName">
                </div>

                <div class="form-group">
                    <label for="edit_email">Email: </label>
                    <input type="text" class="form-control edit_email" id="edit_email">
                </div>

                <div class="form-group">
                    <label for="edit_password">Password: </label>
                    <input type="text" class="form-control edit_password" id="edit_password">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="editData()">Edit
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel8">Delete User</h4>
                <input type="hidden" id="delete_idUser" name="delete_idUser">
            </div>
            <div class="modal-body">
                <p>Are you sure, you want to delete this</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="deletePage()">Delete
                </button>
            </div>
        </div>
    </div>
</div>

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url(); ?>assets/vendors/js/tables/datatable/datatables.min.js"
        type="text/javascript"></script>
<!-- END: Page Vendor JS-->

<script>
    $(document).ready(function () {
        $('.myusers').addClass('active');
        $('#my_table_pro').DataTable();
        $('.addbtn').click(function () {
            $('#addModal').modal('show');
        });
    });

    function addData() {
        $('#username').css('border', '1px solid #babfc7');
        $('#email').css('border', '1px solid #babfc7');
        $('#password').css('border', '1px solid #babfc7');
        var data = {};
        data['userName'] = $('#username').val();
        data['email'] = $('#email').val();
        data['password'] = $('#password').val();
        var flag = 0;

        if (data['userName'] == '' || data['userName'] == undefined) {
            toastMsg('User Name', 'Invalid User Name', 'error');
            $('#username').css('border', '1px solid red');
            flag = 1;
            return false;
        }

        if (data['email'] == '' || data['email'] == undefined) {
            toastMsg('Email', 'Invalid Email', 'error');
            $('#email').css('border', '1px solid red');
            flag = 1;
            return false;
        }

        if (data['password'] == '' || data['password'] == undefined) {
            toastMsg('Password', 'Invalid Password', 'error');
            $('#password').css('border', '1px solid red');
            flag = 1;
            return false;
        }

        if (flag == 0) {
            showloader();
            $('.mybtn').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/Users/addData'); ?>', data, 'POST', function (result) {
                hideloader();
                if (result == 1) {
                    toastMsg('Success', 'Successfully inserted', 'success');
                    $('#addModal').modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500)
                } else if (result == 3) {
                    toastMsg('users', 'Invalid Username Or Email Or Password', 'error');
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            });
        }
    }

    function getDelete(obj) {
        var id = $(obj).parent('td').attr('data-id');
        $('#delete_idUser').val(id);
        $('#deleteModal').modal('show');
    }

    function deletePage() {
        var data = {};
        data['idUser'] = $('#delete_idUser').val();
        if (data['idUser'] == '' || data['idUser'] == undefined || data['idUser'] == 0) {
            toastMsg('User', 'Something went wrong', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/Users/deleteData')?>', data, 'POST', function (res) {
                if (res == 1) {
                    toastMsg('User', 'Successfully Deleted', 'success');
                    setTimeout(function () {
                        $('#deleteModal').modal('hide');
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('User', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('User', 'Invalid Language', 'error');
                }

            });
        }
    }

    function getEdit(obj) {
        var data = {};
        data['id'] = $(obj).parent('td').attr('data-id');
        if (data['id'] != '' && data['id'] != undefined) {
            CallAjax('<?php echo base_url('index.php/Users/getEdit')?>', data, 'POST', function (result) {
                if (result != '' && JSON.parse(result).length > 0) {
                    var a = JSON.parse(result);
                    try {
                        $('#edit_idUser').val(data['id']);
                        $('#edit_userName').val(a[0]['username']);
                        $('#edit_email').val(a[0]['email']);
                        $('#edit_password').val(a[0]['password']);
                    } catch (e) {
                    }
                    $('#editModal').modal('show');
                } else {
                    alert(1);
                }
            });
        }
    }

    function editData() {
        $('#edit_userName').css('border', '1px solid #babfc7');
        $('#edit_email').css('border', '1px solid #babfc7');
        $('#edit_password').css('border', '1px solid #babfc7');
        var flag = 0;
        var data = {};
        data['idUser'] = $('#edit_idUser').val();
        data['userName'] = $('#edit_userName').val();
        data['email'] = $('#edit_email').val();
        data['password'] = $('#edit_password').val();

        if (data['idUser'] == '' || data['idUser'] == undefined) {
            toastMsg('User', 'Invalid ID User', 'error');
            flag = 1;
            return false;
        }

        if (data['userName'] == '' || data['userName'] == undefined) {
            toastMsg('User Name', 'Invalid User Name', 'error');
            $('#edit_userName').css('border', '1px solid red');
            flag = 1;
            return false;
        }

        if (data['email'] == '' || data['email'] == undefined) {
            toastMsg('Email', 'Invalid Email', 'error');
            $('#edit_email').css('border', '1px solid red');
            flag = 1;
            return false;
        }

        if (data['password'] == '' || data['password'] == undefined) {
            toastMsg('Password', 'Invalid Password', 'error');
            $('#edit_password').css('border', '1px solid red');
            flag = 1;
            return false;
        }

        if (flag === 0) {
            CallAjax('<?php echo base_url('index.php/Users/editData')?>', data, 'POST', function (res) {
                if (res == 1) {
                    toastMsg('User', 'Successfully Edited', 'success');
                    setTimeout(function () {
                        $('#editModal').modal('hide');
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('Language', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('Language', 'Invalid Language', 'error');
                } else if (res == 4) {
                    toastMsg('User', 'Invalid ID User', 'error');
                } else if (res == 5) {
                    toastMsg('User Name', 'Invalid User Name', 'error');
                } else if (res == 6) {
                    toastMsg('Email', 'Invalid Email', 'error');
                } else if (res == 7) {
                    toastMsg('Password', 'Invalid Password', 'error');
                }
            });
        }
    }

</script>