<style>
    td.details-control {
        background: url('https://datatables.net/examples/resources/details_open.png') no-repeat center center;
        cursor: pointer;
    }

    tr.details td.details-control {
        background: url('https://datatables.net/examples/resources/details_close.png') no-repeat center center;
    }

    #myinnertable td {
        border: 1px solid;
    }

    .btn-link {
        color: #d51313;
    }
</style>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">

        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Sections</h3>
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Sections
                            </li>
                        </ol>
                    </div>
                    <?php if (isset($slug) && $slug != '') {
                        $idModule = $slug;
                    } else {
                        $idModule = 0;
                    } ?>
                    <input type="hidden" id="idSection" name="idSection" value="<?php echo $idModule; ?>">
                </div>
            </div>
        </div>


        <div class="content-body">
            <section id="collapsible">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="p-1">
                                <h5 class="mb-0 text-uppercase">Section</h5>
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
                <h4 class="modal-title white" id="myModalLabel8">Select Project, CRF & Module</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="selectidProjects">Select Project: </label>
                    <select id="selectidProjects" name="selectidProjects" class="form-control"
                            onchange="changeProject()">
                        <option value="0" disabled readonly="readonly" selected>Select Project</option>
                        <?php
                        foreach ($projects as $key => $values) {
                            echo '<option value="' . $values->idProjects . '">' . $values->project_name . '</option>';
                        }
                        ?>
                    </select>
                </div>


                <div class="form-group">
                    <label for="selectIdCRF">Select CRF: </label>
                    <select id="selectIdCRF" name="selectIdCRF" class="form-control" onchange="changeCrf()">
                        <option value="0" disabled readonly="readonly" selected>Select CRF</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="selectidModule">Select Module: </label>
                    <?php if (isset($projects) && $projects != '') { ?>
                        <select id="selectidModule" name="selectidModule" class="form-control">
                            <option value="0" disabled readonly="readonly" selected>Select Module</option>
                        </select>
                    <?php } else {
                        echo '<input type="hidden" id="selectidModule" name="selectidModule" value="' . $idModule . '">';
                    } ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="getData()">Get Data
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
        $('.mysection').addClass('open');
        $('.section_view').addClass('active');
        var idSection = $('#idSection').val();
        if (idSection != '' && idSection != undefined && idSection != 0 && idSection != '$1') {
            getData();
        } else {
            $('#modal_project').modal('show');
        }
    });

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

    function changeCrf() {
        var data = {};
        data['idCrf'] = $('#selectIdCRF').val();
        if (data['idCrf'] != '' && data['idCrf'] != undefined && data['idCrf'] != '0' && data['idCrf'] != '$1') {
            CallAjax('<?php echo base_url() . 'index.php/Module/getModuleByCrf'  ?>', data, 'POST', function (res) {
                var items = '<option value="0" disabled readonly="readonly" selected>Select Module</option>';
                if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        $.each(response, function (i, v) {
                            items += '<option value="' + v.idModule + '">' + v.module_name_l1 + '</option>';
                        })
                    } catch (e) {
                    }
                }
                $('#selectidModule').html('').html(items);
            });
        }
    }

    function getData() {
        $('#selectidProjects').css('border', '1px solid #babfc7');
        $('#selectIdCRF').css('border', '1px solid #babfc7');
        $('#selectidModule').css('border', '1px solid #babfc7');
        var data = {};
        data['idProjects'] = $('#selectidProjects').val();
        data['idCRF'] = $('#selectIdCRF').val();
        data['idModule'] = $('#selectidModule').val();
        var flag = 0;

        if (data['idProjects'] == '' || data['idProjects'] == undefined) {
            $('#selectidProjects').css('border', '1px solid red');
            toastMsg('Project', 'Invalid Project', 'error');
            flag = 1;
            return false;
        }

        if (data['idCRF'] == '' || data['idCRF'] == undefined) {
            $('#selectIdCRF').css('border', '1px solid red');
            toastMsg('CRF', 'Invalid CRF', 'error');
            flag = 1;
            return false;
        }

        if (data['idModule'] == '' || data['idModule'] == undefined) {
            $('#selectidModule').css('border', '1px solid red');
            toastMsg('Module', 'Invalid Module', 'error');
            flag = 1;
            return false;
        }

        if (flag == 0) {
            CallAjax('<?php echo base_url() . 'index.php/Section/getData' ?>', data, 'POST', function (res) {
                if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        var html = '<div id="collapse1" class="card-collapse">';
                        html += '<div class="card collapse-icon accordion-icon-rotate left">';
                        html += '<div class="card mb-0">';
                        var a = 0;
                        var expend = '';
                        var show = '';

                        var openid = '0';
                        $.each(response, function (i, v) {
                            a++;
                            /*  if (a == 1) {
                                  expend = 'aria-expanded="true"';
                                  show = 'show';
                                  openid = v.idSection;
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
                                ' aria-controls="collapseA' + a + '" onclick="mysection(' + v.idSection + ')" data-idSection="' + v.idSection + '">'
                                + (v.section_title_l1 != '' && v.section_title_l1 != undefined ? v.section_title_l1 : 'Section ' + a) +
                                '</button>' +
                                '</h5>' +
                                '</div>' +
                                ' <div id="collapseA' + a + '" class="collapse ' + show + '" aria-labelledby="headingA' + a + '">' +
                                '<div class="card-body">' +
                                '<div class="media-list media-bordered">' +
                                '<div class="media">' +
                                '<a class="media-left align-self-center" href="#">Language 1</a>' +
                                '<div class="media-body">' +
                                '   <h5 class="media-heading">' + v.section_title_l1 + '</h5>' + v.section_desc_l1 +
                                '</div>' +
                                '</div>';
                            if (v.section_title_l2 != '' && v.section_title_l2 != undefined) {
                                html += '<div class="media">' +
                                    '<a class="media-left align-self-center" href="#">Language 2</a>' +
                                    '<div class="media-body">' +
                                    '   <h5 class="media-heading Urdu">' + v.section_title_l2 + '</h5>' + v.section_desc_l2 +
                                    '</div>' +
                                    '</div>'
                            }
                            if (v.section_title_l3 != '' && v.section_title_l3 != undefined) {
                                html += '<div class="media">' +
                                    '<a class="media-left align-self-center" href="#">Language 3</a>' +
                                    '<div class="media-body">' +
                                    '   <h5 class="media-heading">' + v.section_title_l3 + '</h5>' + v.section_desc_l3 +
                                    '</div>' +
                                    '</div>';
                            }
                            if (v.section_title_l4 != '' && v.section_title_l4 != undefined) {
                                html += '<div class="media">' +
                                    '<a class="media-left align-self-center" href="#">Language 4</a>' +
                                    '<div class="media-body">' +
                                    '   <h5 class="media-heading">' + v.section_title_l4 + '</h5>' + v.section_desc_l4 +
                                    '</div>' +
                                    '</div>';
                            }
                            if (v.section_title_l5 != '' && v.section_title_l5 != undefined) {
                                html += '<div class="media">' +
                                    'Language 5' +
                                    '<div class="media-body">' +
                                    '   <h5 class="media-heading">' + v.section_title_l5 + '</h5>' + v.section_desc_l5 +
                                    '</div>' +
                                    '</div>';
                            }
                            html += '<div class="btn-group col-sm-12">' +
                                '<a class="btn btn-danger white"  href="<?php echo base_url('index.php/add_sectiondetail?section=') ?>' + v.idSection + '" ' +
                                'id="dropdownMenuButton' + v.idSection + '"  >' +
                                'Add Section Data</a>' +
                                '</div>' +
                                '<div class="mytable_' + v.idSection + '"></div>' +
                                '</div>' +
                                '</div>' +
                                '</div>';

                            html += '</div>';

                        });

                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        $('#htmlCollapse').html('').html(html);
                        mysection(openid);
                    } catch (e) {
                    }
                    $('#modal_project').modal('hide');

                }


            });
        } else {
            toastMsg('Error', 'Something went wrong', 'error');
        }
    }

    function mysection(idSection) {
        var data = {};
        data['idSection'] = idSection;
        var html = '';
        var optionhtml = '';
        CallAjax('<?php echo base_url() . 'index.php/Section/getSectionDetail' ?>', data, 'POST', function (res) {


            html += '<table id="my_table_dt" class="table table-striped table-bordered dataTable">' +
                '<thead>' +
                '<tr>' +
                '<th>Variable</th> ' +
                '<th>Label</th> ' +
                '<th>Options</th> ' +
                '<th>Others</th> ' +
                '</tr>' +
                '</thead><tbody>';
            if (res != '' && JSON.parse(res).length > 0) {
                var response = JSON.parse(res);
                try {
                    $.each(response, function (i, v) {
                        var l2 = '';
                        if (v.label_l2 != '' && v.label_l2 != undefined) {
                            l2 = '<br>' + v.label_l2;
                        }
                        var l3 = '';
                        if (v.label_l3 != '' && v.label_l3 != undefined) {
                            l3 = '<br>' + v.label_l3;
                        }
                        var l4 = '';
                        if (v.label_l4 != '' && v.label_l4 != undefined) {
                            l4 = '<br>' + v.label_l4;
                        }
                        var l5 = '';
                        if (v.label_l5 != '' && v.label_l5 != undefined) {
                            l5 = '<br>' + v.label_l5;
                        }
                        html += '<tr>' +
                            '<td>' + v.variable_name + '</td>' +
                            '<td class="Urdu">' + v.label_l1 + l2 + l3 + l4 + l5 + '</td>';


                        /*Options Start*/
                        optionhtml = '';
                        optionhtml += '<td>';
                        $.each(v.myrow_options, function (kk, vv) {
                            var ol2 = '';
                            if (vv.label_l2 != '' && vv.label_l2 != undefined && vv.label_l2 != 'NaN') {
                                ol2 = '<br>' + vv.label_l2;
                            }
                            var ol3 = '';
                            if (vv.label_l3 != '' && vv.label_l3 != undefined && vv.label_l3 != 'NaN') {
                                ol3 = '<br>' + vv.label_l3;
                            }
                            var ol4 = '';
                            if (vv.label_l4 != '' && vv.label_l4 != undefined && vv.label_l4 != 'NaN') {
                                ol4 = '<br>' + vv.label_l4;
                            }
                            var ol5 = '';
                            if (vv.label_l5 != '' && vv.label_l5 != undefined && vv.label_l5 != 'NaN') {
                                ol5 = '<br>' + vv.label_l5;
                            }
                            optionhtml += '<div><span><small>' + vv.variable_name + ': </small>' + vv.label_l1 + ol2 + ol3 + ol4 + ol5 + '</span>' +
                                '<span style=" float: right; ">' + vv.option_value + '</span></div>';
                        });
                        optionhtml += '</td>';
                        html += optionhtml;
                        /*Options End*/


                        html += '<td>';
                        html += '<small>Type</small>: ' + v.nature + '';
                        if (v.skipQuestion != '' && v.skipQuestion != undefined) {
                            html += '<small>, Skip</small>: ' + v.skipQuestion + '';
                        }
                        if (v.MinVal != '' && v.MinVal != undefined) {
                            html += '<small>, Min</small>: ' + v.MinVal + '';
                        }
                        if (v.MaxVal != '' && v.MaxVal != undefined) {
                            html += '<small>, Max</small>: ' + v.MaxVal + '';
                        }
                        html += '</td>' +
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
                '<th>Options</th> ' +
                '<th>Others</th> ' +
                '</tr>' +
                '</tfoot>' +
                '</table>';
            $('.mytable_' + idSection).html(html);
        });
    }
</script>