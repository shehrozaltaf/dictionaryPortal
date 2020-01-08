<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">

        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Projects</h3>
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Projects
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-4 col-12 d-block d-md-none"><a
                        class="btn btn-warning btn-min-width float-md-right box-shadow-4 mr-1 mb-1"
                        href="chat-application.html"><i class="ft-mail"></i> Email</a></div>
        </div>

        <div class="content-body">
            <section id="ordering">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Projects</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <!--                                        <li><a data-action="close"><i class="ft-x"></i></a></li>-->
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
                                                <th></th>
                                                <th class="pname">Name</th>
                                                <th>Title</th>
                                                <th>Languages</th>
                                                <th>CRFs</th>
                                                <th>Sites</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>User Emails</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th></th>
                                                <th class="pname">Name</th>
                                                <th>Title</th>
                                                <th>Languages</th>
                                                <th>CRFs</th>
                                                <th>Sites</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>User Emails</th>
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
                    <select id="selectidModule" name="selectidModule" class="form-control" onchange="changeModule()">
                        <option value="0" disabled readonly="readonly" selected>Select Module</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="selectidSection">Select Section: </label>
                    <select id="selectidSection" name="selectidSection" class="form-control">
                        <option value="0" disabled readonly="readonly" selected>Select Section</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="getExcelData()">Get Excel
                    Report
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
        getData();
        $('.myproject').addClass('open');
        $('.myproject_view').addClass('active');
    });

    function getExcelModal() {
        $('#modal_project').modal('show');
    }

    function getExcelData() {
        var selectidModule = $('#selectidSection').val();
        window.location.href = "Project/getExcel/" + selectidModule
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

    function changeModule() {
        var data = {};
        data['idModule'] = $('#selectidModule').val();
        if (data['idModule'] != '' && data['idModule'] != undefined && data['idModule'] != '0' && data['idModule'] != '$1') {
            CallAjax('<?php echo base_url() . 'index.php/Section/getSectionByModule'  ?>', data, 'POST', function (res) {
                var items = '<option value="0" disabled readonly="readonly" selected>Select Section</option>';
                if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        $.each(response, function (i, v) {
                            items += '<option value="' + v.idSection + '">' + v.section_title + '</option>';
                        })
                    } catch (e) {
                    }
                }
                $('#selectidSection').html('').html(items);
            });
        }
    }


    function format(d) {
        var html = '<table id="myinnertable">' +
            '<thead>' +
            '<tr>' +
            '<th>CRF Name</th>' +
            '<th>CRF Title</th>' +
            '<th>CRF Languages</th>' +
            '</tr>' +
            '</thead>' +
            '<tbody>';
        $.each(d.crf, function (i, v) {
            html += '<tr>' +
                '<td>' + v.crf_name + '</td>' +
                '<td>' + v.crf_title + '</td>' +
                '<td>' + v.crf_languages + '</td>' +
                '</tr>';
            /*  html += 'CRF Name: ' + v.crf_name + '------' +
                  'CRF Title: ' + v.crf_title + '------' +
                  'CRF Languages: ' + v.crf_languages;*/
        });
        html += '</tbody></table>';
        return html;
    }

    function getData() {
        var data = {};
        var dt = $('#my_table_pro').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            lengthMenu: [25, 50, 75, 100],
            pageLength: 25,
            iDisplayLength: 25,
            dom: 'Bfrtip',
            ajax: {
                "url": "<?php echo base_url() . 'index.php/Project/getProjects' ?>",
                "method": "GET",
                "data": data
            },
            columns: [
                {
                    "width": "3%",
                    "class": "details-control",
                    "orderable": false,
                    "data": null,
                    "defaultContent": ""
                },
                {"data": "project_name", "class": "pname"},
                {"data": "short_title"},
                {"data": "languages"},
                {"data": "no_of_crf"},
                {"data": "no_of_sites"},
                {"data": "startdate"},
                {"data": "enddate"},
                {"data": "email_of_person"},
                {"data": "action"},
            ],
            order: [
                [0, 'desc']
            ],
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
        });
        // Array to track the ids of the details displayed rows
        // Array to track the ids of the details displayed rows
        var detailRows = [];

        $('#my_table_pro tbody').on('click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row(tr);
            var idx = $.inArray(tr.attr('id'), detailRows);

            if (row.child.isShown()) {
                tr.removeClass('details');
                row.child.hide();

                // Remove from the 'open' array
                detailRows.splice(idx, 1);
            } else {
                tr.addClass('details');
                row.child(format(row.data())).show();

                // Add to the 'open' array
                if (idx === -1) {
                    detailRows.push(tr.attr('id'));
                }
            }
        });

        // On each draw, loop over the `detailRows` array and show any child rows
        dt.on('draw', function () {
            $.each(detailRows, function (i, id) {
                $('#' + id + ' td.details-control').trigger('click');
            });
        });


        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-outline-primary mr-1');

    }
</script>
