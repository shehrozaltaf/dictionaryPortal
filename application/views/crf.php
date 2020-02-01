<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">CRFs</h3>
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                            </li>
                            <li class="breadcrumb-item active">CRFs
                            </li>
                        </ol>
                    </div>
                    <?php if (isset($slug) && $slug != '') {
                        $idProjects = $slug;
                    } else {
                        $idProjects = 0;
                    } ?>
                    <input type="hidden" id="idProjects" name="idProjects" value="<?php echo $idProjects; ?>">
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="ordering">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">CRFs</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="dt_colVis_buttons"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table id="my_table_crf"
                                               class="table table-striped table-bordered show-child-rows">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Title</th>
                                                <th>Languages</th>
                                                <th>No Of Modules</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Title</th>
                                                <th>Languages</th>
                                                <th>No Of Modules</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
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
     aria-hidden="true"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel8">Select Project</h4>
            </div>
            <div class="modal-body">
                <label for="selectidProjects">Select Project: </label>
                <div class="form-group">
                    <?php if (isset($projects) && $projects != '') { ?>
                        <select id="selectidProjects" name="selectidProjects" class="form-control">
                            <option value="0" disabled readonly="readonly" selected>Select Project</option>
                            <?php
                            foreach ($projects as $key => $values) {
                                echo '<option value="' . $values->idProjects . '">' . strtoupper($values->short_title) . ': ' . $values->project_name . '</option>';
                            }
                            ?>
                        </select>
                    <?php } else {
                        echo '<input type="hidden" id="selectidProjects" name="selectidProjects" value="' . $idProjects . '">';
                    } ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="getData()">Get Project Data
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
        $('.mycrf').addClass('open');
        $('.crf_view').addClass('active');
        var idProjects = $('#idProjects').val();
        if (idProjects != '' && idProjects != undefined && idProjects != 0 && idProjects != '$1') {
            getData();
        } else {
            $('#modal_project').modal('show');
        }
    });
    function format(d) {
        var html = '<div id="collapse1" class="card-collapse">';
        html += '<div class="card collapse-icon accordion-icon-rotate left">';
        html += '<div class="card mb-0">';
        var a = 0;
        var expend = '';
        var show = '';
        $.each(d.module, function (i, v) {
            a++;
            if (a == 1) {
                expend = 'aria-expanded="true"';
                show = 'show';
            } else {
                expend = 'aria-expanded="false"';
                show = '';
            }
            html += '<div class="card ">';
            html += '<div class="card-header" id="headingA' + a + '">' +
                '<h5 class="mb-0">' +
                '<button class="btn btn-link collapsed" data-toggle="collapse"' +
                ' data-target="#collapseA' + a + '" ' + expend +
                ' aria-controls="collapseA' + a + '"> Module ' + a +
                '</button>' +
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
            html += '</div>' +
                '</div>' +
                '</div>';
            html += '</div>';
        });
        html += '</div>';
        html += '</div>';
        html += '</div>';
        return html;
    }

    function getData() {
        var data = {};
        data['idProjects'] = $('#selectidProjects').val();
        var dt = $('#my_table_crf').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            lengthMenu: [25, 50, 75, 100],
            pageLength: 25,
            iDisplayLength: 25,
            dom: 'Bfrtip',
            ajax: {
                "url": "<?php echo base_url() . 'index.php/Crf/getCRFs' ?>",
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
                {"data": "crf_name"},
                {"data": "crf_title"},
                {"data": "languages"},
                {"data": "no_of_modules"},
                {"data": "startdate"},
                {"data": "enddate"},
                {"data": "action" }
            ],
            order: [
                [1, 'desc']
            ],
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
        });
        var detailRows = [];
        $('#my_table_crf tbody').on('click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row(tr);
            var idx = $.inArray(tr.attr('id'), detailRows);

            if (row.child.isShown()) {
                tr.removeClass('details');
                row.child.hide();
                detailRows.splice(idx, 1);
            } else {
                tr.addClass('details');
                row.child(format(row.data())).show();
                if (idx === -1) {
                    detailRows.push(tr.attr('id'));
                }
            }
        });
        dt.on('draw', function () {
            $.each(detailRows, function (i, id) {
                $('#' + id + ' td.details-control').trigger('click');
            });
        });
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-outline-primary mr-1');
    }
</script>