<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">

        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Language</h3>
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Language
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-4 col-12 d-block d-md-none"><a
                        class="btn btn-warning btn-min-width float-md-right box-shadow-4 mr-1 mb-1"
                        href="<?php echo base_url() ?>"><i class="ft-mail"></i> Language</a>

            </div>
        </div>

        <div class="content-body">
            <section id="ordering">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Language
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
                                                <th>Language</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $SNo = 0;
                                            if (isset($language) && $language != '') {
                                                foreach ($language as $lang) {
                                                    $SNo++; ?>
                                                    <tr>
                                                        <td><?php echo $SNo ?></td>
                                                        <td><?php echo $lang->languageName ?></td>
                                                        <td data-id="<?php echo $lang->idLanguage ?>">
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
                                                <th>Language</th>
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
                <h4 class="modal-title white" id="myModalLabel8">Add Language</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="languageName">Language: </label>
                    <input type="text" class="form-control languageName" id="languageName">
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
                <h4 class="modal-title white" id="myModalLabel8">Edit Language</h4>

                <input type="hidden" id="edit_idLanguage" name="edit_idLanguage">
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="edit_languageName">Language: </label>
                    <input type="text" class="form-control edit_languageName" id="edit_languageName">
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
                <h4 class="modal-title white" id="myModalLabel8">Delete Language</h4>
                <input type="hidden" id="delete_idLanguage" name="delete_idLanguage">
            </div>
            <div class="modal-body">
                <p>Are you sure, you want to delete this?</p>

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
        $('.mylangauge').addClass('active');
        $('#my_table_pro').DataTable();
        $('.addbtn').click(function () {
            $('#addModal').modal('show');
        });

    });

    function addData() {
        $('#languageName').css('border', '1px solid #babfc7');
        var data = {};
        data['languageName'] = $('#languageName').val();
        if (data['languageName'] == '' || data['languageName'] == undefined) {
            $('#languageName').css('border', '1px solid red');
            toastMsg('Language', 'Invalid Language Name', 'error');
        } else {
            showloader();
            $('.mybtn').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/Language/addData'); ?>', data, 'POST', function (result) {
                hideloader();
                if (result == 1) {
                    toastMsg('Success', 'Successfully inserted', 'success');
                    $('#addModal').modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500)
                } else if (result == 3) {
                    toastMsg('Language', 'Invalid Language Name', 'error');
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            });
        }
    }

    function getDelete(obj) {
        var id = $(obj).parent('td').attr('data-id');
        $('#delete_idLanguage').val(id);
        $('#deleteModal').modal('show');
    }

    function deletePage() {
        var data = {};
        data['idLanguage'] = $('#delete_idLanguage').val();
        if (data['idLanguage'] == '' || data['idLanguage'] == undefined || data['idLanguage'] == 0) {
            toastMsg('Language', 'Something went wrong', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/Language/deleteData')?>', data, 'POST', function (res) {

                if (res == 1) {
                    toastMsg('Language', 'Successfully Deleted', 'success');
                    setTimeout(function () {

                        $('#deleteModal').modal('hide');
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('Language', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('Language', 'Invalid Language', 'error');
                }

            });
        }
    }

    function getEdit(obj) {
        var data = {};
        data['id'] = $(obj).parent('td').attr('data-id');
        if (data['id'] != '' && data['id'] != undefined) {
            CallAjax('<?php echo base_url('index.php/Language/getEdit')?>', data, 'POST', function (result) {
                if (result != '' && JSON.parse(result).length > 0) {
                    var a = JSON.parse(result);
                    try {
                        $('#edit_idLanguage').val(data['id']);
                        $('#edit_languageName').val(a[0]['languageName']);
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
        $('#edit_languageName').css('border', '1px solid #babfc7');
        var flag = 0;
        var data = {};
        data['idLanguage'] = $('#edit_idLanguage').val();
        data['languageName'] = $('#edit_languageName').val();
        if (data['idLanguage'] == '' || data['idLanguage'] == undefined || data['idLanguage'].length < 1) {
            flag = 1;
            return false;
        }
        if (data['languageName'] == '' || data['languageName'] == undefined || data['languageName'].length < 1) {
            $('#edit_languageName').css('border', '1px solid red');
            toastMsg('Language', 'Invalid Language Name', 'error');
            flag = 1;
            return false;
        }
        if (flag === 0) {
            CallAjax('<?php echo base_url('index.php/Language/editData')?>', data, 'POST', function (res) {
                if (res == 1) {
                    toastMsg('Language', 'Successfully Edited', 'success');
                    setTimeout(function () {
                        $('#editModal').modal('hide');
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('Language', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('Language', 'Invalid Language', 'error');
                }
            });
        }
    }
</script>
