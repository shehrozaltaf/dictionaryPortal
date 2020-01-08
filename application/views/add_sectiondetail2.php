<!--<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">-->
<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--<link rel="stylesheet" type="text/css" href="--><?php //echo base_url() ?><!--assets/css/pages/email-application.css">-->
<!--<script src="--><?php //echo base_url() ?><!--assets/js/scripts/pages/email-application.js" type="text/javascript"></script>-->
<div class="app-content content">

    <div class="content-wrapper">


        <div class="content-wrapper-before"></div>

        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Section Data</h3>
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home </a></li>
                            <li class="breadcrumb-item"><a
                                    href="<?php echo base_url('index.php/section') ?>">Section</a></li>
                            <li class="breadcrumb-item active">Add Question/Fields</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-detached content-left">
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
                                            <li>
                                                <a data-action="close">
                                                    <i class="ft-x"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="form">
                                            <div class="form-body">

                                                <?php if (isset($getProjectSlug) && $getProjectSlug != '') {
                                                    $projectSlug = $getProjectSlug;
                                                } else {
                                                    $projectSlug = 0;
                                                }
                                                /* echo '<pre>';
                                                 print_r($result);
                                                 echo '</pre>';*/
                                                if (isset($result[0]) && $result[0] != '') {
                                                    $getdata = $result[0];
                                                } else {
                                                    $getdata = '';
                                                }


                                                if (isset($getdata->variable_module) && $getdata->variable_module != '') {
                                                    $Module_variable = $getdata->variable_module;
                                                } else {
                                                    $Module_variable = 0;
                                                }
                                                if (isset($getdata->section_var_name) && $getdata->section_var_name != '') {
                                                    $section_variable = $getdata->section_var_name;
                                                } else {
                                                    $section_variable = 0;
                                                }

                                                if (isset($getdata->variable_name) && $getdata->variable_name != '') {
                                                    $lastvariable_name = substr($getdata->variable_name, 2);
                                                } else {
                                                    $lastvariable_name = 0;
                                                }
                                                $totallanguages = 0;
                                                $l1 = 'English';
                                                $l2 = '';
                                                $l3 = '';
                                                $l4 = '';
                                                $l5 = '';

                                                if (isset($getdata->l1) && $getdata->l1 != '') {
                                                    $l1 = $getdata->l1;
                                                    echo '<input type="hidden" id="l1" name="l1" value="' . $getdata->l1 . '">';
                                                    $totallanguages++;
                                                }
                                                if (isset($getdata->l2) && $getdata->l2 != '') {
                                                    $l2 = $getdata->l2;
                                                    echo '<input type="hidden" id="l2" name="l2" value="' . $getdata->l2 . '">';
                                                    $totallanguages++;
                                                }
                                                if (isset($getdata->l3) && $getdata->l3 != '') {
                                                    $l3 = $getdata->l3;
                                                    echo '<input type="hidden" id="l3" name="l3" value="' . $getdata->l3 . '">';
                                                    $totallanguages++;
                                                }
                                                if (isset($getdata->l4) && $getdata->l4 != '') {
                                                    $l4 = $getdata->l4;
                                                    echo '<input type="hidden" id="l4" name="l4" value="' . $getdata->l4 . '">';
                                                    $totallanguages++;
                                                }
                                                if (isset($getdata->l5) && $getdata->l5 != '') {
                                                    $l5 = $getdata->l5;
                                                    echo '<input type="hidden" id="l5" name="l5" value="' . $getdata->l5 . '">';
                                                    $totallanguages++;
                                                }
                                                ?>


                                                <input type="hidden" id="module_variable" name="module_variable"
                                                       value="<?php echo $Module_variable ?>">
                                                <input type="hidden" id="section_variable" name="section_variable"
                                                       value="<?php echo $section_variable ?>">
                                                <input type="hidden" id="lastvariable_name" name="lastvariable_name"
                                                       value="<?php echo((int)$lastvariable_name) ?>">

                                                <input type="hidden" id="totallanguages" name="totallanguages"
                                                       value="<?php echo((int)$totallanguages) ?>">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="project_name">Project</label>
                                                            <input type="text" readonly disabled id="project_name"
                                                                   class="form-control"
                                                                   value="<?php echo(isset($getdata->project_name) && $getdata->project_name != '' ? $getdata->project_name : '0') ?>"
                                                                   placeholder="Project" name="project_name">
                                                            <input type="hidden" id="idProjects" name="idProjects"
                                                                   value="<?php echo(isset($getdata->idProjects) && $getdata->idProjects != '' ? $getdata->idProjects : '0') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="crf_name">CRF</label>
                                                            <input type="text" id="crf_name" class="form-control"
                                                                   readonly
                                                                   disabled
                                                                   value="<?php echo(isset($getdata->crf_name) && $getdata->crf_name != '' ? $getdata->crf_name : '0') ?>"
                                                                   placeholder="CRF" name="crf_name">
                                                            <input type="hidden" id="id_crf" name="id_crf"
                                                                   value="<?php echo(isset($getdata->id_crf) && $getdata->id_crf != '' ? $getdata->id_crf : '0') ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="module_name_l1">Module</label>
                                                            <input type="text" id="module_name_l1" class="form-control"
                                                                   readonly disabled
                                                                   value="<?php echo(isset($getdata->module_name_l1) && $getdata->module_name_l1 != '' ? $getdata->module_name_l1 : '0') ?>"
                                                                   placeholder="Module" name="module_name_l1">
                                                            <input type="hidden" id="idModule" name="idModule"
                                                                   value="<?php echo(isset($getdata->idModule) && $getdata->idModule != '' ? $getdata->idModule : '0') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="section_title">Section</label>
                                                            <input type="text" id="section_title" class="form-control"
                                                                   readonly disabled
                                                                   value="<?php echo(isset($getdata->section_title) && $getdata->section_title != '' ? $getdata->section_title : '0') ?>"
                                                                   placeholder="Section" name="section_title">

                                                            <input type="hidden" id="idSection" name="idSection"
                                                                   value="<?php echo(isset($getdata->idSection) && $getdata->idSection != '' ? $getdata->idSection : '0') ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="dropdiv"></div>
                                                <div class="row droppable">
                                                    <div class="col-md-12 ">
                                                        <ul id="sortable" class="list-group ">
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!--<div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div id="droppable" class="h-75 droppable">
                                                                <label for="drophere">DROP HERE</label>
                                                                <textarea disabled readonly
                                                                          class="form-control text-center "
                                                                          name="drophere"
                                                                          id="drophere" rows="5">DROP HERE</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary mybtn" onclick="addDetailSection()">
                                            <i class="la la-check-square-o"></i> Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="sidebar-detached sidebar-right sidebar-sticky">
            <div class="sidebar">
                <div class="sidebar-content card d-none d-lg-block">
                    <div class="card-body">
                        <div class="category-title pb-1">
                            <h6>Options</h6>
                        </div>
                        <div class="sidebaroptions">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div style="height: 100px;"></div>

<footer class="footer fixed-bottom footer-dark navbar-border navbar-shadow">
    <div class="text-sm-center mb-0 px-2">
        <div class="toolPalette float-md-left  ">
            <h3 class="font-small-3 white  d-md-inline-block">Select Type:</h3>
            <ul class="d-md-inline-block font-medium-2  " id="sortable-1">
                <li class=" d-md-inline-block" onclick="selectType(this)" data-type="Label">
                    <a class="Label" rel="Label" draggable="true">Title</a>
                    <span class="primary lighten-1"> | </span>
                </li>
                <li class=" d-md-inline-block" onclick="selectType(this)" data-type="Input">
                    <a class="Input" rel="Input" draggable="true">Input</a>
                    <span class="primary lighten-1"> | </span>
                </li>
                <li class=" d-md-inline-block" onclick="selectType(this)" data-type="SelectBox">
                    <a class="SelectBox" rel="SelectBox" draggable="true">Select Box</a>
                    <span class="primary lighten-1"> | </span>
                </li>
                <li class=" d-md-inline-block" onclick="selectType(this)" data-type="Radio">
                    <a class="Radio" rel="Radio" draggable="true">Radio</a>
                    <span class="primary lighten-1"> | </span>
                </li>
                <li class=" d-md-inline-block" onclick="selectType(this)" data-type="CheckBox">
                    <a class="CheckBox" rel="CheckBox" draggable="true">Check Box</a>
                    <span class="primary lighten-1"> | </span>
                </li>
                <li class=" d-md-inline-block" onclick="selectType(this)" data-type="TextArea">
                    <a class="TextArea" rel="TextArea" draggable="true">TextArea</a>
                </li>
            </ul>
        </div>
    </div>
</footer>


<script src="<?php echo base_url(); ?>assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js"
        type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts/forms/extended/form-inputmask.min.js"
        type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts/pages/content-sidebar.min.js" type="text/javascript"></script>

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url(); ?>assets/vendors/js/forms/repeater/jquery.repeater.min.js"
        type="text/javascript"></script>


<script>
    function selectType(obj) {
        var type = $(obj).attr('data-type');
        var module_variable = $('#module_variable').val();
        var section_variable = $('#section_variable').val();
        var lastvariable_name = $('#lastvariable_name').val();
        lastvariable_name = parseInt(lastvariable_name) + 1;
        $('#lastvariable_name').val(lastvariable_name);
        var varname = module_variable + section_variable + lastvariable_name;
        if (lastvariable_name.toString().length == 1) {
            varname = module_variable + section_variable + 0 + lastvariable_name;
        }
        var html = '';
        var htmloptions = '';
        var totallanguages = $('#totallanguages').val();
        var l1 = $('#l1').val();
        var l2 = $('#l2').val();
        var l3 = $('#l3').val();
        var l4 = $('#l4').val();
        var l5 = $('#l5').val();

        html += '<div class="row form-row">';
        html += '<div class="col-md-12">' +
            '<div class="form-group"><label for="sec_var">Variable</label>' +
            '<input type="text" id="sec_var" name="sec_var" class="form-control vaiablevalue  input-sm"' +
            '  placeholder="Variable" value="' + varname + '">' +
            '</div>' +
            '</div>';

        if (type == 'Input' || type == 'TextArea') {
            for (var i = 1; i <= totallanguages; i++) {
                html += '<div class="col-md-12">' +
                    '<div class="form-group ">' +
                    '<label for="sec_input' + i + '">' + type + ' Title L' + i + ' (' + $('#l' + i).val() + ')</label>' +
                    '<input type="text" id="sec_input' + i + '" name="sec_input" class="form-control sec_input input-sm  naturetype"' +
                    'data-key="' + type + '" required placeholder="Title">' +
                    '</div>' +
                    '</div>';
            }

        } else if (type == 'Label') {
            for (var i = 1; i <= totallanguages; i++) {
                html += '<div class="col-md-12">' +
                    '<div class="form-group ">' +
                    '<label for="sec_input' + i + '">' + type + ' Title L' + i + ' (' + $('#l' + i).val() + ')</label>' +
                    '<input type="text" id="sec_input' + i + '" name="sec_input" class="form-control sec_input input-sm  naturetype"' +
                    'data-key="Label" required placeholder="Title">' +
                    '</div>' +
                    '</div>';
            }
        } else if (type == 'SelectBox' || type == 'Radio' || type == 'CheckBox') {
            for (var i = 1; i <= totallanguages; i++) {
                html += '<div class="col-md-12">' +
                    '<div class="form-group ">' +
                    '<label for="sec_input' + i + '">' + type + ' Title L' + i + ' (' + $('#l' + i).val() + ')</label>' +
                    '<input type="text" id="sec_input' + i + '" name="sec_input" class="form-control sec_input input-sm  naturetype"' +
                    'data-key="' + type + '" required placeholder="Title">' +
                    '</div>' +
                    '</div>';
            }
            html += '<hr>' +
                '<div class="form-group col-12 mb-2 file-repeater">' +
                '<div data-repeater-list="repeater-group">' +
                '<label for="options_list">Options</label>' +
                '<button type="button" data-repeater-create class="btn primary"  >' +
                '<i class="ft-plus"></i> Add Options</button>' +

                '<div class="input-group mb-1 col-md-12 border border-light " id="options_list" data-repeater-item>' +

                '<div class="col-md-12 col">' +
                '<span class="input-group-append float-right" id="button-addon2">' +
                '<i class="ft-x" data-repeater-delete  ></i>' +
                '</span>' +
                '<div class="form-group">' +
                '<input type="text" id="option_var" name="option_var" class="form-control  input-sm option_var"' +
                'data-key="OptionVar"  placeholder="Option Variable Name" value="' + varname + 'A">' +
                '</div>' +
                '</div>';
            for (var z = 1; z <= totallanguages; z++) {
                html += '<div class="col-md-12 col">' +
                    '<div class="form-group">' +
                    '<input type="text" id="option_title" name="option_title" class="form-control  input-sm option_title"' +
                    'data-key="OptionTitle"  placeholder="Option Title L' + z + ' (' + $('#l' + z).val() + ')" >' +
                    '</div>' +
                    '</div>';
            }
            html += '<div class="col-md-12 col">' +
                '<div class="form-group"> ' +
                '<input type="text" id="option_value" name="option_value" class="form-control  input-sm option_value"' +
                'data-key="OptionValue"  placeholder="Option Value" >' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<hr>';
        }

        if (type != 'Label') {
            html += '<hr><div class="col-md-6">' +
                '<div class="form-group"><label for="min_val">Min Length</label>' +
                '<input type="text" id="min_val" name="min_val" class="form-control  input-sm min_val"' +
                'data-key="Input"  placeholder="Min" >' +
                '</div>' +
                '</div> ' +
                '<div class="col-md-6">' +
                '<div class="form-group"><label for="max_val">Max Length</label>' +
                '<input type="text" id="max_val" name="max_val" class="form-control   input-sm max_val" ' +
                'data-key="Input"  placeholder="Max" >' +
                '</div>' +
                '</div> ' +
                '<div class="col-md-12">' +
                '<div class="mb-2">' +
                '<div class="form-check form-check-inline"> ' +
                '<input class="form-check-input" type="checkbox" id="Required" name="otheroptions" value="Required"> ' +
                '<label class="form-check-label" for="Required">Required</label> ' +
                '</div>' +
                '<div class="form-check form-check-inline"> ' +
                '<input class="form-check-input" type="checkbox" id="ReadOnly" name="otheroptions" value="ReadOnly"> ' +
                '<label class="form-check-label" for="ReadOnly">ReadOnly</label> ' +
                '</div>' +
                '</div>' +
                '</div>';
            html += '<div class="col-md-12">' +
                '<div class="form-group"><label for="skipQuestion">Skip Question</label>' +
                '<input type="text" id="skipQuestion" name="skipQuestion" class="form-control skipQuestion  input-sm"' +
                '  placeholder="Skip Question" >' +
                '</div>' +
                '</div>';
        }
        html += '</div><hr>' +
            '<div class="form-actions"> ' +
            '<button type="submit" class="btn btn-success" onclick="addType(this)"> ' +
            '<i class="la la-check"></i> Save ' +
            '</button> ' +
            '<button type="button" class="btn btn-danger mr-1"> ' +
            '<i class="ft-x"></i> Cancel ' +
            '</button> ' +
            '</div><hr>';
        $('.sidebaroptions').html(html);
        addrow()
    }

    function addType(obj) {
        var flag = 0;
        var inp = {};
        var html = '';
        html += '<li class="list-group-item bg-teal bg-accent-3 black formlists">';

        $(".form-row").each(function (ii, vv) {
            inp['variable'] = $(this).find('.vaiablevalue').val();
            if (inp['variable'] == '' || inp['variable'] == undefined) {
                $(this).find('.vaiablevalue').css('border', '1px solid red');
                toastMsg('Variable Name', 'Invalid Variable Name', 'error');
                flag = 1;
                return false;
            } else {
                html += '<span class="text-justify font-medium-2 variableval">' + inp['variable'] + '</span>';
                $(this).find('.vaiablevalue').css('border', '1px solid #babfc7');
            }

            inp['nature'] = $(this).find('.naturetype').attr('data-key');
            if (inp['nature'] == '' || inp['nature'] == undefined) {
                $(this).find('.naturetype').css('border', '1px solid red');
                toastMsg('Invalid Type', 'Invalid Input Type', 'error');
                flag = 1;
                return false;
            } else {
                html += '<span class="badge badge-info float-right font-small-3 natureval">' + inp['nature'] + '</span>';
                $(this).find('.naturetype').css('border', '1px solid #babfc7');
            }

            $($(this).find('.sec_input')).each(function (i, v) {
                if ($(this).attr('required') == 'required' && $(this).val() != '' && $(this).val() != undefined) {
                    inp['L' + (i + 1)] = $(this).val();
                    html += '<input type="hidden" class="hiddenvalues_inputs" name="hiddenLanguage_L' + (i + 1) + '" id="hiddenLanguage_L' + (i + 1) + '"' +
                        ' value="' + inp['L' + (i + 1)] + '"> ';
                    $(this).css('border', '1px solid #babfc7');
                } else {
                    $(this).css('border', '1px solid red');
                    toastMsg('Input Name', 'Invalid Input Name', 'error');
                    flag = 1;
                    return false;
                }
            });
            if (inp['L1'] != '' || inp['L1'] != undefined) {
                html += ' <span class="  font-medium-1">' + inp['L1'] + '</span>';
            }

            html += '<br>';
            inp['min_val'] = $(this).find('.min_val').val();
            if (inp['min_val'] != '' && inp['min_val'] != undefined) {
                html += '<div class="badge badge-secondary"><' +
                    'a href="javascript:void(0);">Min: ' + inp['min_val'] + '</a>' +
                    '<input type="hidden" class="min_val" value="' + inp['min_val'] + '">' +
                    '</div> ';
            }

            inp['max_val'] = $(this).find('.max_val').val();
            if (inp['max_val'] != '' && inp['max_val'] != undefined) {
                html += '<div class="badge badge-secondary"><' +
                    'a href="javascript:void(0);">Max: ' + inp['max_val'] + '</a>' +
                    '<input type="hidden" class="max_val" value="' + inp['max_val'] + '">' +
                    '</div> ';
            }

            inp['skipQuestion'] = $(this).find('.skipQuestion').val();
            if (inp['skipQuestion'] != '' && inp['skipQuestion'] != undefined) {
                html += '<div class="badge badge-secondary"><' +
                    'a href="javascript:void(0);">Skip Question: ' + inp['skipQuestion'] + '</a>' +
                    '<input type="hidden" class="skipQuestion" value="' + inp['skipQuestion'] + '">' +
                    '</div> ';
            }


        });


        var options_list = new Array();
        $("div[id=options_list]").each(function () {
            html += '<div class="options_list_hidden" style="display: none">';
            var options = [];
            if ($(this).find('.option_var').val() == '' || $(this).find('.option_var').val() == undefined) {
                $(this).find('.option_var').css('border', '1px solid red');
                toastMsg('Option Variable', 'Invalid Option Variable', 'error');
                flag = 1;
                return false;
            } else {
                options.push($(this).find('.option_var').val());
                html += '<input type="hidden" class="option_var" value="' + $(this).find('.option_var').val() + '">';
            }

            $($(this).find('.option_title')).each(function (y, z) {
                if ($(this).val() == '' || $(this).val() == undefined) {
                    $(this).css('border', '1px solid red');
                    toastMsg('Option Title', 'Invalid Option Title', 'error');
                    flag = 1;
                    return false;
                } else {
                    options.push($(this).val());
                    html += '<input type="hidden" class="option_title" value="' + $(this).val() + '">';
                }
            });

            if ($(this).find('.option_value').val() == '' || $(this).find('.option_value').val() == undefined) {
                $(this).find('.option_value').css('border', '1px solid red');
                toastMsg('Option Value', 'Invalid Option Value', 'error');
                flag = 1;
                return false;
            } else {
                options.push($(this).find('.option_value').val());
                html += '<input type="hidden" class="option_value" value="' + $(this).find('.option_value').val() + '">';
            }
            html += '</div>';
            options_list.push(options);
        });


        $('input[name=otheroptions]:checked').each(function (i) {
            inp[$(this).val()] = $(this).val();
            html += ' <div class="badge badge-secondary">' +
                '<a href="javascript:void(0);">' + inp[$(this).val()] + '</a>' +
                '<input type="hidden" class="' + inp[$(this).val()] + '" value="' + inp[$(this).val()] + '">' +
                ' </div>';
        });
        html += '</li>';
        if (flag == 0) {
            $('#sortable').append(html);
            $('.sidebaroptions').html('');
        }
    }

    function addDetailSection() {
        var flag = 0;
        var data = {};
        data['idSection'] = $('#idSection').val();
        if (data['idSection'] == '' || data['idSection'] == undefined) {
            $('#section_title').css('border', '1px solid red');
            toastMsg('Section', 'Invalid ID Section', 'error');
            flag = 1;
        } else {
            $('#section_title').css('border', '1px solid #babfc7');
        }

        data['idModule'] = $('#idModule').val();
        if (data['idModule'] == '' || data['idModule'] == undefined) {
            $('#module_name_l1').css('border', '1px solid red');
            toastMsg('Module', 'Invalid ID Module', 'error');
            flag = 1;
        } else {
            $('#module_name_l1').css('border', '1px solid #babfc7');
        }

        data['id_crf'] = $('#id_crf').val();
        if (data['id_crf'] == '' || data['id_crf'] == undefined) {
            $('#crf_name').css('border', '1px solid red');
            toastMsg('CRF', 'Invalid ID CRF', 'error');
            flag = 1;
        } else {
            $('#crf_name').css('border', '1px solid #babfc7');
        }

        data['idProjects'] = $('#idProjects').val();
        if (data['idProjects'] == '' || data['idProjects'] == undefined) {
            $('#project_name').css('border', '1px solid red');
            toastMsg('Project', 'Invalid Project', 'error');
            flag = 1;
        } else {
            $('#project_name').css('border', '1px solid #babfc7');
        }
        types = [];
        $(".formlists").each(function (ii, vv) {
            inp = {};
            inp['variable'] = $(this).find('.variableval').html();
            if (inp['variable'] == '' || inp['variable'] == undefined) {
                $(this).find('.vaiablevalue').css('border', '1px solid red');
                toastMsg('Variable Name', 'Invalid Variable Name', 'error');
                flag = 1;
                return false;
            } else {
                $(this).find('.vaiablevalue').css('border', '1px solid #babfc7');
            }

            inp['min_val'] = $(this).find('.min_val').val();
            inp['max_val'] = $(this).find('.max_val').val();
            inp['skipQuestion'] = $(this).find('.skipQuestion').val();

            var option_l = [];
            $($(this).find('.options_list_hidden')).each(function (i, v) {
                var options = {};
                options['option_var'] = $(this).find('.option_var').val();
                $($(this).find('.option_title')).each(function (y, z) {
                    options['option_title_' + y] = $(this).val();
                });
                options['option_value'] = $(this).find('.option_value').val();
                option_l.push(options);
            });
            inp['options'] = option_l;

            inp['readonly'] = $(this).find('.ReadOnly').val();
            inp['required'] = $(this).find('.Required').val();
            inp['nature'] = $(this).find('.natureval').html();
            if (inp['nature'] == '' || inp['nature'] == undefined) {
                $(this).find('.vaiablevalue').css('border', '1px solid red');
                toastMsg('Invalid Type', 'Invalid Input Type', 'error');
                flag = 1;
                return false;
            } else {
                $(this).find('.vaiablevalue').css('border', '1px solid #babfc7');
            }


            $($(this).find('.hiddenvalues_inputs')).each(function (i, v) {
                if ($(this).val() != '' && $(this).val() != undefined) {
                    inp['L' + (i + 1)] = $(this).val();
                    $(this).css('border', '1px solid #babfc7');
                } else {
                    $(this).css('border', '1px solid red');
                    toastMsg('Input Name', 'Invalid Input Name', 'error');
                    flag = 1;
                }
            });
            types.push(inp);
            data['data'] = types;
        });

        if (flag == 0) {
            $('.mybtn').attr('disabled','disabled');
            showloader();
            CallAjax('<?php echo base_url('index.php/Section/add_sectiondetail_data') ?>', data, 'POST', function (result) {     hideloader();
                if (result == 1) {
                    toastMsg('Success', 'Successfully inserted', 'success');
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            });
        } else {
            toastMsg('Error', 'Something went wrong', 'error');
        }

    }


    $(document).ready(function () {
        $('.mysection').addClass('open');
        $('.section_add').addClass('active');
        // addrow();
        $("#sortable").sortable();

        /*$("#sortable-1 li").draggable({
            helper: "clone"
        });
        $(".droppable").droppable({
            drop: function (event, ui) {
                alert(1);
            }
        });*/

    });

    function addrow() {
        $(".file-repeater").repeater({
            show: function () {
                $(this).slideDown();
            }, hide: function (e) {
                $(this).slideUp(e)
            }
        })
    }


</script>
