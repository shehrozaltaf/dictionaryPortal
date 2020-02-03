<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Page</h3>
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Pages
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-4 col-12 d-block d-md-none"><a
                        class="btn btn-warning btn-min-width float-md-right box-shadow-4 mr-1 mb-1"
                        href="<?php echo base_url() ?>"><i class="ft-mail"></i> Pages</a>
            </div>
        </div>
        <div class="content-body">
            <section id="ordering">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pages
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
                                                <th>Page</th>
                                                <th>URL</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $SNo = 0;
                                            if (isset($pages) && $pages != '') {
                                                foreach ($pages as $page) {
                                                    $SNo++; ?>
                                                    <tr>
                                                        <td><?php echo $SNo ?></td>
                                                        <td><?php echo $page->pageName ?></td>
                                                        <td><?php echo $page->pageUrl ?></td>
                                                        <td data-id="<?php echo $page->idPages ?>">
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
                                                <th>Page</th>
                                                <th>URL</th>
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
<div class="modal fade text-left" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_add"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel_add">Add Page</h4>
            </div>
            <div class="modal-body">
                <div class="form-page">
                    <label for="pageName">Page: </label>
                    <input type="text" class="form-control pageName" id="pageName">
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
<div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_edit"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel_edit">Edit Page</h4>

                <input type="hidden" id="edit_idPage" name="edit_idPage">
            </div>
            <div class="modal-body">

                <div class="form-page">
                    <label for="edit_pageName">Page: </label>
                    <input type="text" class="form-control edit_pageName" id="edit_pageName">
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


<div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_delete"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel_delete">Delete Page</h4>
                <input type="hidden" id="delete_idPage" name="delete_idPage">
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
        $('.mysettings').addClass('open');
        $('.page_view').addClass('active');
        $('#my_table_pro').DataTable();
        $('.addbtn').click(function () {
            $('#addModal').modal('show');
        });
    });

    function addData() {
        $('#pageName').css('border', '1px solid #babfc7');
        var data = {};
        data['pageName'] = $('#pageName').val();
        if (data['pageName'] == '' || data['pageName'] == undefined) {
            $('#pageName').css('border', '1px solid red');
            toastMsg('Page', 'Invalid Page Name', 'error');
        } else {
            showloader();
            $('.mybtn').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/Settings/addPageData'); ?>', data, 'POST', function (result) {
                hideloader();
                if (result == 1) {
                    toastMsg('Success', 'Successfully inserted', 'success');
                    $('#addModal').modal('hide');
                    window.location.reload();
                } else if (result == 3) {
                    toastMsg('Page', 'Invalid Page Name', 'error');
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            });
        }
    }

    function getDelete(obj) {
        var id = $(obj).parent('td').attr('data-id');
        $('#delete_idPage').val(id);
        $('#deleteModal').modal('show');
    }

    function deletePage() {
        var data = {};
        data['idPage'] = $('#delete_idPage').val();
        if (data['idPage'] == '' || data['idPage'] == undefined || data['idPage'] == 0) {
            toastMsg('Page', 'Something went wrong', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/Settings/deletePageData')?>', data, 'POST', function (res) {

                if (res == 1) {
                    toastMsg('Page', 'Successfully Deleted', 'success');
                    setTimeout(function () {

                        $('#deleteModal').modal('hide');
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('Page', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('Page', 'Invalid Page', 'error');
                }

            });
        }
    }

    function getEdit(obj) {
        var data = {};
        data['id'] = $(obj).parent('td').attr('data-id');
        if (data['id'] != '' && data['id'] != undefined) {
            CallAjax('<?php echo base_url('index.php/Settings/getPageEdit')?>', data, 'POST', function (result) {
                if (result != '' && JSON.parse(result).length > 0) {
                    var a = JSON.parse(result);
                    try {
                        $('#edit_idPage').val(data['id']);
                        $('#edit_pageName').val(a[0]['pageName']);
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
        $('#edit_pageName').css('border', '1px solid #babfc7');
        var flag = 0;
        var data = {};
        data['idPage'] = $('#edit_idPage').val();
        data['pageName'] = $('#edit_pageName').val();
        if (data['idPage'] == '' || data['idPage'] == undefined || data['idPage'].length < 1) {
            flag = 1;
            return false;
        }
        if (data['pageName'] == '' || data['pageName'] == undefined || data['pageName'].length < 1) {
            $('#edit_pageName').css('border', '1px solid red');
            toastMsg('Page', 'Invalid Page Name', 'error');
            flag = 1;
            return false;
        }
        if (flag === 0) {
            CallAjax('<?php echo base_url('index.php/Settings/editPageData')?>', data, 'POST', function (res) {
                if (res == 1) {
                    toastMsg('Page', 'Successfully Edited', 'success');
                    setTimeout(function () {
                        $('#editModal').modal('hide');
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('Page', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('Page', 'Invalid Page', 'error');
                }
            });
        }
    }
</script>