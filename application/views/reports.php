<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Get Reports</h3>
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home </a></li>
                            <li class="breadcrumb-item active">Reports</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="heading-elements-toggle">
                                    <i class="la la-ellipsis-v font-medium-3"></i>
                                </a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse">
                                                <i class="ft-minus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="reload">
                                                <i class="ft-rotate-cw"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="expand">
                                                <i class="ft-maximize"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="form">
                                        <div class="form-body">
                                            <h4 class="form-section">
                                                <i class="ft-flag"></i>Get Reports</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="idProject">Project</label>
                                                        <?php if (isset($projects) && $projects != '') { ?>
                                                            <select id="idProject" name="idProject"
                                                                    onchange="changeProject()"
                                                                    class="form-control">
                                                                <option value="0" selected>
                                                                    Select Project
                                                                </option>
                                                                <?php foreach ($projects as $key => $values) {
                                                                    echo '<option value="' . $values->idProjects . '">' . $values->project_name . '</option>';
                                                                } ?>
                                                            </select>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="crf_id">CRF</label>
                                                        <select id="crf_id" name="crf_id" class="form-control"
                                                                onchange="changeCrf()">
                                                            <option value="0" selected>
                                                                Select CRF
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="idModule">Module</label>
                                                        <select id="idModule" name="idModule" class="form-control"
                                                                onchange="changeModule() ">
                                                            <option value="0" selected>
                                                                Select Module
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="idSection">Section</label>
                                                        <select id="idSection" name="idSection" class="form-control">
                                                            <option value="0" selected>
                                                                Select Section
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group languages">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="action_type">Export Action Type</label>
                                                        <select id="action_type" name="action_type"
                                                                class="form-control">
                                                            <option value="1" selected>Export PDF</option>
                                                            <option value="2">Export XML</option>
                                                            <option value="10">Export XMLs(Sajid)</option>
                                                            <option value="3">Export Strings</option>
                                                            <option value="4">Export Save Draft</option>
                                                            <option value="5">Export Code Book</option>
                                                            <option value="6">Export Excel</option>
                                                            <option value="7">Export DCF File</option>
                                                            <option value="8">Export XML Questions</option>
                                                            <option value="9">Export Contracts</option>
                                                            <option value="11">Export New Save Drafts</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions ">
                                        <button type="button"
                                                class="btn bg-gradient-x-blue-green white"
                                                onclick="getData()">
                                            <i class="la la-file-pdf-o"></i> Export Data
                                        </button>
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
<script>
    $(document).ready(function () {
        $('.myreport').addClass('active');
    });

    function getData() {
        var flag = 0;
        var data = {};
        data['idProjects'] = $('#idProject').val();
        data['crf_id'] = $('#crf_id').val();
        data['idModule'] = $('#idModule').val();
        data['idSection'] = $('#idSection').val();
        data['language'] = $('#language').val();
        data['action_type'] = $('#action_type').val();
        var chkSec = 0;
        var url = '<?php echo base_url('index.php/Reports/') ?>';
        if (data['action_type'] == 1) {
            url += 'getPDF?';
        } else if (data['action_type'] == 2) {
            chkSec = 1;
            url += 'getXml?';
        } else if (data['action_type'] == 3) {
            url += 'getStings?';
        } else if (data['action_type'] == 4) {
            chkSec = 1;
            url += 'getSaveDraftData?';
        } else if (data['action_type'] == 5) {
            url += 'getCodeBook?';
        } else if (data['action_type'] == 6) {
            url += 'getExcel?';
        } else if (data['action_type'] == 7) {
            url += 'getDCF?';
        } else if (data['action_type'] == 8) {
            url += 'getXmlQuestions?';
        } else if (data['action_type'] == 9) {
            url += 'getContractsData?';
        } else if (data['action_type'] == 10) {
            chkSec = 1;
            url += 'getXmlSajid?';
        } else if (data['action_type'] == 11) {
            chkSec = 1;
            url += 'getNewSaveDraft?';
        } else {
            $('#action_type').css('border', '1px solid red');
            toastMsg('Action', 'Invalid Export Type', 'error');
            flag = 1;
            return false;
        }
        if (data['idProjects'] != '' && data['idProjects'] != undefined && data['idProjects'] != null && data['idProjects'] != '0') {
            url += 'project=' + data['idProjects'];
            $('#idProjects').css('border', '1px solid #babfc7');
        } else {
            $('#idProject').css('border', '1px solid red');
            toastMsg('Project', 'Invalid Project', 'error');
            flag = 1;
            return false;
        }
        if (chkSec == 1 && (data['idSection'] == '' || data['idSection'] == '0' || data['idSection'] == undefined || data['idSection'] == null)) {
            $('#idSection').css('border', '1px solid red');
            toastMsg('Section', 'Invalid Section', 'error');
            flag = 1;
            return false;
        } else {
            $('#idSection').css('border', '1px solid #babfc7');
        }

        if (data['crf_id'] != '' && data['crf_id'] != undefined && data['crf_id'] != null) {
            url += '&crf=' + data['crf_id'];
        }
        if (data['idModule'] != '' && data['idModule'] != undefined && data['idModule'] != null) {
            url += '&module=' + data['idModule'];
        }
        if (data['idSection'] != '' && data['idSection'] != undefined && data['idSection'] != null) {
            url += '&section=' + data['idSection'];
        }
        if (data['language'] != '' && data['language'] != undefined && data['language'] != null) {
            url += '&language=' + data['language'];
        }
        if (flag == 0) {
            window.open(url, '_blank');

        } else {
            toastMsg('Error', 'Something went wrong', 'error');
        }
    }

    function changeProject() {
        var data = {};
        data['idProjects'] = $('#idProject').val();
        if (data['idProjects'] != '' && data['idProjects'] != undefined && data['idProjects'] != '0' && data['idProjects'] != '$1') {
            CallAjax('<?php echo base_url() . 'index.php/Crf/getCRFByProject'  ?>', data, 'POST', function (res) {
                var items = '<option value="0"   selected>Select CRF</option>';
                if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        $.each(response, function (i, v) {
                            items += '<option value="' + v.id_crf + '">' + v.crf_name + '</option>';
                        })
                    } catch (e) {
                    }
                }
                $('#crf_id').html('').html(items);
            });
        } else {
            $('#crf_id').html('');
        }
    }

    function changeCrf() {
        var data = {};
        data['idCrf'] = $('#crf_id').val();
        if (data['idCrf'] != '' && data['idCrf'] != undefined && data['idCrf'] != '0' && data['idCrf'] != '$1') {
            CallAjax('<?php echo base_url() . 'index.php/Module/getModuleByCrf'  ?>', data, 'POST', function (res) {
                var items = '<option value="0"  selected>Select Module</option>';
                if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        $.each(response, function (i, v) {
                            items += '<option value="' + v.idModule + '">' + v.module_name_l1 + '</option>';
                        })
                    } catch (e) {
                    }
                }
                $('#idModule').html('').html(items);
            });
            var html_Lang = '<label for="language">Language</label>' +
                '<select id="language" name="language" class="form-control">';
            CallAjax('<?php echo base_url() . 'index.php/CRF/getCrfLanguages'  ?>', data, 'POST', function (res) {
                html_Lang += '<option value="0"  selected>Select Module</option>';
                if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        $.each(response, function (i, v) {
                            if (v.l1 != '' && v.l1 != undefined) {
                                html_Lang += '<option value="l1">' + v.l1 + '</option>';
                            }
                            if (v.l2 != '' && v.l2 != undefined) {
                                html_Lang += '<option value="l2">' + v.l2 + '</option>';
                            }
                            if (v.l3 != '' && v.l3 != undefined) {
                                html_Lang += '<option value="l3">' + v.l3 + '</option>';
                            }
                            if (v.l4 != '' && v.l4 != undefined) {
                                html_Lang += '<option value="l4">' + v.l4 + '</option>';
                            }
                            if (v.l5 != '' && v.l5 != undefined) {
                                html_Lang += '<option value="l5">' + v.l5 + '</option>';
                            }

                        })

                    } catch (e) {
                    }
                }
                html_Lang += '</select>';
                $('.languages').html('').html(html_Lang);
            });
        } else {
            $('#idModule').html('');
            $('.languages').html('');
        }
    }

    function changeModule() {
        var data = {};
        data['idModule'] = $('#idModule').val();
        if (data['idModule'] != '' && data['idModule'] != undefined && data['idModule'] != '0' && data['idModule'] != '$1') {
            CallAjax('<?php echo base_url() . 'index.php/Section/getSectionByModule'  ?>', data, 'POST', function (res) {
                var items = '<option value="0"   selected>Select Section</option>';
                if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        $.each(response, function (i, v) {
                            items += '<option value="' + v.idSection + '">' + v.section_title + '</option>';
                        })
                    } catch (e) {
                    }
                }
                $('#idSection').html('').html(items);
            });
        } else {
            $('#idSection').html('');
        }
    }

</script>