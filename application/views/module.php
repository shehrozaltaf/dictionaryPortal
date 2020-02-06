<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">

        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Modules</h3>
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Modules
                            </li>
                        </ol>
                    </div>
                    <?php if (isset($slug) && $slug != '') {
                        $idCRF = $slug;
                    } else {
                        $idCRF = 0;
                    } ?>
                    <input type="hidden" id="idCRF" name="idCRF" value="<?php echo $idCRF; ?>">
                </div>
            </div>
        </div>


        <div class="content-body">
            <section id="collapsible">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="p-1">
                                <h5 class="mb-0 text-uppercase">Module</h5>
                            </div>
                            <div id="htmlCollapse"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->

<!-- Modal -->
<div class="modal fade text-left" id="modal_project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8"
     aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel8">Select Project & CRF</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="selectidProjects">Select Project: </label>
                    <select id="selectidProjects" name="selectidProjects" class="form-control"
                            onchange="changeProject()">
                        <option value="0" disabled readonly="readonly" selected>Select Project</option>
                        <?php
                        foreach ($projects as $key => $values) {
                            echo '<option value="' . $values->idProjects . '">' . strtoupper($values->short_title) . ': ' . $values->project_name . '</option>';
                        }
                        ?>
                    </select>
                </div>


                <div class="form-group">
                    <label for="selectIdCRF">Select CRF: </label>

                    <?php if (isset($projects) && $projects != '') { ?>
                        <select id="selectIdCRF" name="selectIdCRF" class="form-control">
                            <option value="0" disabled readonly="readonly" selected>Select CRF</option>
                        </select>
                    <?php } else {
                        echo '<input type="hidden" id="selectIdCRF" name="selectIdCRF" value="' . $idCRF . '">';
                    } ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="getData()">Get Project Data
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Delete Modal -->
<div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8_delete"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel8_delete">Delete Section</h4>
                <input type="hidden" id="idDelete" name="idDelete">
            </div>
            <div class="modal-body">
                <p>Are you sure, you want to delete this?</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="deleteData()">Delete
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
        $('.mymodule').addClass('open');
        $('.module_view').addClass('active');
        var idCRF = $('#idCRF').val();
        if (idCRF != '' && idCRF != undefined && idCRF != 0 && idCRF != '$1') {
            getData();
        } else {
            $('#modal_project').modal('show');
        }

    });

    function getDelete(obj) {
        var id = $(obj).attr('data-id');
        $('#idDelete').val(id);
        $('#deleteModal').modal('show');
    }

    function deleteData() {
        var data = {};
        data['idDelete'] = $('#idDelete').val();
        if (data['idDelete'] == '' || data['idDelete'] == undefined || data['idLanguage'] == 0) {
            toastMsg('Module', 'Something went wrong', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/Module/deleteModule')?>', data, 'POST', function (res) {
                if (res == 1) {
                    toastMsg('Module', 'Successfully Deleted', 'success');
                    $('#deleteModal').modal('hide');
                    var crf = $('#selectIdCRF').val();
                    setTimeout(function () {
                        // window.location.reload();
                        window.location.href = '<?php echo base_url() ?>index.php/module/' + crf;
                    }, 500);
                } else if (res == 2) {
                    toastMsg('Module', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('Module', 'Invalid Section', 'error');
                }
            });
        }
    }

    function changeProject() {
        var data = {};
        data['idProjects'] = $('#selectidProjects').val();
        if (data['idProjects'] != '' && data['idProjects'] != undefined && data['idProjects'] != '0' && data['idProjects'] != '$1') {
            CallAjax('<?php echo base_url() . 'index.php/Crf/getCRFByProject'  ?>', data, 'POST', function (res) {
                var items = '<option value="0" disabled readonly="readonly" selected>Select CRF</option>';
                if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        $.each(response, function (i, v) {
                            items += '<option value="' + v.id_crf + '">' + v.crf_name + '</option>';
                        })
                    } catch (e) {
                    }
                }
                $('#selectIdCRF').html('').html(items);
            });
        }
    }

    function mymodule(idModule) {
        var data = {};
        data['idModule'] = idModule;
        var html = '';
        var optionhtml = '';
        CallAjax('<?php echo base_url() . 'index.php/Section/getSectionByModule' ?>', data, 'POST', function (res) {
            html += '<table id="my_table_dt" class="table table-striped table-bordered dataTable">' +
                '<thead>' +
                '<tr>' +
                '<th width="10%">Variable</th> ' +
                '<th width="90%">Label</th> ' +
                '</tr>' +
                '</thead><tbody>';
            if (res != '' && JSON.parse(res).length > 0) {
                var response = JSON.parse(res);
                try {
                    $.each(response, function (i, v) {
                        var l2 = '';
                        if (v.section_title_l2 != '' && v.section_title_l2 != undefined) {
                            l2 = '<br>' + v.section_title_l2;
                        }
                        var l3 = '';
                        if (v.section_title_l3 != '' && v.section_title_l3 != undefined) {
                            l3 = '<br>' + v.section_title_l3;
                        }
                        var l4 = '';
                        if (v.section_title_l4 != '' && v.section_title_l4 != undefined) {
                            l4 = '<br>' + v.section_title_l4;
                        }
                        var l5 = '';
                        if (v.section_title_l5 != '' && v.section_title_l5 != undefined) {
                            l5 = '<br>' + v.section_title_l5;
                        }
                        html += '<tr>' +
                            '<td>' + v.section_var_name + '</td>' +
                            '<td class="Urdu">' + v.section_title_l1 + l2 + l3 + l4 + l5 + '</td>' +
                            '</tr>';
                    })
                } catch (e) {
                }
            } else {
                console.log(2);
            }
            html += '</tbody><tfoot>' +
                '<tr>' +
                '<th>Variable</th> ' +
                '<th>Label</th> ' +
                '</tr>' +
                '</tfoot>' +
                '</table>';
            $('.mytable_' + idModule).html(html);
        });
    }

    function getData() {
        $('#selectidProjects').css('border', '1px solid #babfc7');
        $('#selectIdCRF').css('border', '1px solid #babfc7');
        var data = {};
        data['idProjects'] = $('#selectidProjects').val();
        data['idCRF'] = $('#selectIdCRF').val();
        var flag = 0;
        if (data['idCRF'] == '' || data['idCRF'] == undefined) {
            $('#selectIdCRF').css('border', '1px solid red');
            toastMsg('CRF', 'Invalid CRF', 'error');
            flag = 1;
            return false;
        }
        if (flag == 0) {
            CallAjax('<?php echo base_url() . 'index.php/Module/getData' ?>', data, 'POST', function (res) {
                if (res != '' && JSON.parse(res).length > 0) {

                    var response = JSON.parse(res);
                    try {
                        var html = '<div id="collapse1" class="card-collapse">';
                        html += '<div class="card collapse-icon accordion-icon-rotate left">';
                        html += '<div class="card mb-0">';
                        var a = 0;
                        var expend = '';
                        var show = '';


                        $.each(response, function (i, v) {
                            a++;
                            /*if (a == 1) {
                                expend = 'aria-expanded="true"';
                                show = 'show';
                            } else {
                                expend = 'aria-expanded="false"';
                                show = '';
                            }*/
                            expend = 'aria-expanded="false"';
                            show = '';
                            html += '<div class="card ">';
                            html += '<div class="card-header" id="headingA' + a + '">' +
                                '<h5 class="mb-0">' +
                                '<button class="btn btn-link collapsed" data-toggle="collapse"' +
                                ' data-target="#collapseA' + a + '" ' + expend +
                                ' aria-controls="collapseA' + a + '" onclick="mymodule(' + v.idModule + ')" data-idModule="' + v.idModule + '">'
                                + (v.module_name_l1 != '' && v.module_name_l1 != undefined ? v.module_name_l1 : 'Module ' + a) +
                                '</button>' +
                                '<a href="<?php echo base_url() ?>index.php/edit_module/' + v.idModule + '"><span class="la la-edit"></span></a>' +
                                '<a href="javascript:void(0)" onclick="getDelete(this)" data-id="' + v.idModule + '"><span class="la la-trash"></span></a>' +
                                '</h5>' +
                                '</div>' +
                                ' <div id="collapseA' + a + '" class="collapse ' + show + '" aria-labelledby="headingA' + a + '">' +
                                '<div class="card-body">' +
                                '<div class="media-list media-bordered">' +
                                '<div class="media">' +
                                '<a class="media-left align-self-center" href="#">Language 1</a>' +
                                '<div class="media-body">' +
                                '   <h5 class="media-heading">' + v.module_name_l1 + '</h5>' + v.module_desc_l1 +
                                '</div>' +
                                '</div>';
                            if (v.module_name_l2 != '' && v.module_name_l2 != undefined) {
                                html += '<div class="media">' +
                                    '<a class="media-left align-self-center" href="#">Language 2</a>' +
                                    '<div class="media-body">' +
                                    '   <h5 class="media-heading">' + v.module_name_l2 + '</h5>' + v.module_desc_l2 +
                                    '</div>' +
                                    '</div>'
                            }
                            if (v.module_name_l3 != '' && v.module_name_l3 != undefined) {
                                html += '<div class="media">' +
                                    '<a class="media-left align-self-center" href="#">Language 3</a>' +
                                    '<div class="media-body">' +
                                    '   <h5 class="media-heading">' + v.module_name_l3 + '</h5>' + v.module_desc_l3 +
                                    '</div>' +
                                    '</div>';
                            }
                            if (v.module_name_l4 != '' && v.module_name_l4 != undefined) {
                                html += '<div class="media">' +
                                    '<a class="media-left align-self-center" href="#">Language 4</a>' +
                                    '<div class="media-body">' +
                                    '   <h5 class="media-heading">' + v.module_name_l4 + '</h5>' + v.module_desc_l4 +
                                    '</div>' +
                                    '</div>';
                            }
                            if (v.module_name_l5 != '' && v.module_name_l5 != undefined) {
                                html += '<div class="media">' +
                                    'Language 5' +
                                    '<div class="media-body">' +
                                    '   <h5 class="media-heading">' + v.module_name_l5 + '</h5>' + v.module_desc_l5 +
                                    '</div>' +
                                    '</div>';
                            }


                            html += '<div class="btn-group col-sm-12">' +
                                '<a class="btn btn-danger white"  href="<?php echo base_url('index.php/add_section') ?>" ' +
                                'id="dropdownMenuButton' + v.idModule + '"  >' +
                                'Add Section</a>' +
                                '</div>' +
                                '<div class="mytable_' + v.idModule + '"></div>';

                            html += '</div>' +
                                '</div>' +
                                '</div>';
                            html += '</div>';
                        });

                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        $('#htmlCollapse').html('').html(html);
                    } catch (e) {
                    }

                    $('#modal_project').modal('hide');
                } else {
                    toastMsg('Warning', 'No Modules found for this CRF. Please add module.', 'warning');
                }
            });
        } else {
            toastMsg('Error', 'Something went wrong', 'error');
        }
    }
</script>