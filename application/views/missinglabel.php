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
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                            <li class="breadcrumb-item active">Missing Labels</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="ordering">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Filter</h4>
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
                                    <div class="form-group">
                                        <label for="selectidProjects_clone">Select Project: </label>
                                        <select id="selectidProjects_clone" name="selectidProjects_clone"
                                                class="form-control"
                                                onchange="changeProject('selectidProjects_clone','selectIdCRF_clone')">
                                            <option value="0" disabled readonly="readonly" selected>Select Project
                                            </option>
                                            <?php
                                            if (isset($projects) && $projects != '') {
                                                foreach ($projects as $key => $values) {
                                                    echo '<option value="' . $values->idProjects . '">' . strtoupper($values->short_title) . ': ' . $values->project_name . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="selectIdCRF_clone">Select CRF: </label>
                                        <select id="selectIdCRF_clone" name="selectIdCRF_clone" class="form-control">
                                            <option value="0" disabled readonly="readonly" selected>Select CRF</option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-danger databtn" onclick="getData()">Get Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="ordering">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Questions</h4>
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


<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url(); ?>assets/vendors/js/tables/datatable/datatables.min.js"
        type="text/javascript"></script>
<!-- END: Page Vendor JS-->

<script>
    $(document).ready(function () {
        $('.mysection').addClass('open');
        $('.mysection_missinglabel').addClass('active');
    });

    function changeProject(idProjects, IdCRF) {
        if (idProjects == '' || idProjects == undefined) {
            idProjects = 'selectidProjects';
        }
        if (IdCRF == '' || IdCRF == undefined) {
            IdCRF = 'selectIdCRF';
        }
        var data = {};
        data['idProjects'] = $('#' + idProjects).val();
        if (data['idProjects'] != '' && data['idProjects'] != undefined && data['idProjects'] != '0' && data['idProjects'] != '$1') {
            CallAjax('<?php echo base_url() . 'index.php/Crf/getCRFByProject'  ?>', data, 'POST', function (res) {
                var items = '<option value="0" disabled readonly="readonly" selected>Select CRF</option>';
                if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        $.each(response, function (i, v) {
                            items += '<option value="' + v.id_crf + '"' +
                                ' data-l1="' + v.l1 + '" data-l2="' + v.l2 + '" data-l3="' + v.l3 + '" data-l4="' + v.l4 + '" data-l5="' + v.l5 + '" >' + v.crf_name + '</option>';
                        })
                    } catch (e) {
                    }
                }
                $('#' + IdCRF).html('').html(items);
            });
        }
    }

    function selectCRF(obj) {
        var a = $(obj).children("option:selected");
        var html = "<tr>" +
            "<th width='10%'>Variable Name</th>";
        for (var i = 1; i <= 5; i++) {
            console.log($(a).attr('data-l' + i));
            var l = $(a).attr('data-l' + i);
            if (l != undefined && l != '' && l != null && l != 'null') {
                html += "<th width='20%'>" + l + "</th>";
            }
        }
        html += "</tr>";
    }

    function getData() {
        $('#selectidProjects_clone').css('border', '1px solid #babfc7');
        $('#selectIdCRF_clone').css('border', '1px solid #babfc7');
        var data = {};
        data['Projects'] = $('#selectidProjects_clone').val();
        data['crf'] = $('#selectIdCRF_clone').val();
        if (data['Projects'] == '' || data['Projects'] == undefined) {
            $('#selectidProjects_clone').css('border', '1px solid red');
            toastMsg('Project', 'Invalid Project', 'error');
        }
        if (data['crf'] == '' || data['crf'] == undefined) {
            $('#selectIdCRF_clone').css('border', '1px solid red');
            toastMsg('CRF', 'Invalid CRF', 'error');
        } else {
            showloader();
            $('.databtn').attr('disabled', 'disabled');
            CallAjax("<?php echo base_url() . 'index.php/Section/getMissingLabelData' ?>", data, "POST", function (res) {
                $('#my_table_pro').html(res).DataTable();
                $('.databtn').removeAttr('disabled', 'disabled');
                hideloader();
            });
        }
    }

</script>