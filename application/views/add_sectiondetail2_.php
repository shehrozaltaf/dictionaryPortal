<!--<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">-->
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
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
                            <li class="breadcrumb-item active">Add Section Data</li>
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
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
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
                                                </div>


                                                <!-- <div class="row">
                                                     <div class="form-group col-12 mb-2 file-repeater">
                                                         <div data-repeater-list="repeater-group">
                                                             <label for="list_of_languagess">Languages</label>
                                                             <button type="button" data-repeater-create class="btn primary">
                                                                 <i class="ft-plus"></i> Add
                                                             </button>
                                                             <div class="input-group mb-1" data-repeater-item>
                                                                 <input type="text" placeholder="Languages"
                                                                        class="form-control" id="list_of_languagess"
                                                                        name="list_of_languagess">
                                                                 <span class="input-group-append" id="button-addon2">
                                                                         <button class="btn btn-danger" type="button"
                                                                                 data-repeater-delete>
                                                                             <i class="ft-x"></i>
                                                                         </button>
                                                                 </span>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>-->

                                                <!--<div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="question">Question Type</label>
                                                            <select id="question" name="question"
                                                                    class="form-control" onchange="changetype()">
                                                                <option value="0" disabled
                                                                        readonly="readonly" selected>
                                                                    Select Type
                                                                </option>
                                                                <option value="label">Label</option>
                                                                <option value="input">Input</option>
                                                                <option value="select box">Select Box</option>
                                                                <option value="radio">Radio</option>
                                                                <option value="checkbox">Check Box</option>
                                                                <option value="textarea">Textarea</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>-->


                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary" onclick="addDetailSection()">
                                            <i class="la la-check-square-o"></i> Save
                                        </button>
                                        <button type="button" class="btn btn-danger mr-1">
                                            <i class="ft-x"></i> Cancel
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
                            <h6>Drag Options</h6>
                        </div>
                        <div>
                            <ul id="sortable-1" class="list-group ">
                                <li class="list-group-item bg-blue-grey white"
                                    data-key="Label">Label
                                </li>
                                <li class="list-group-item bg-blue-grey white"
                                    data-key="Input">Input
                                </li>
                                <li class="list-group-item bg-blue-grey white"
                                    data-key="Selectbox">Select Box
                                </li>
                                <li class="list-group-item bg-blue-grey white"
                                    data-key="Radio">Radio
                                </li>
                                <li class="list-group-item bg-blue-grey white"
                                    data-key="Checkbox">Check Box
                                </li>
                                <li class="list-group-item bg-blue-grey white"
                                    data-key="Textarea">Textarea
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

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
        types=[];
        $(".form-row").each(function (ii,vv) {
            inp = {};
            inp['variable'] = $(this).find('.vaiablevalue').val();
            if (inp['variable'] == '' || inp['variable'] == undefined) {
                $(this).find('.vaiablevalue').css('border', '1px solid red');
                toastMsg('Variable Name', 'Invalid Variable Name', 'error');
                flag = 1;
                return false;
            } else {
                $(this).find('.vaiablevalue').css('border', '1px solid #babfc7');
            }

            inp['nature'] = $(this).find('.vaiablevalue').attr('data-key');
            if (inp['nature'] == '' || inp['nature'] == undefined) {
                $(this).find('.vaiablevalue').css('border', '1px solid red');
                toastMsg('Invalid Type', 'Invalid Input Type', 'error');
                flag = 1;
                return false;
            } else {
                $(this).find('.vaiablevalue').css('border', '1px solid #babfc7');
            }

            $($(this).find('.sec_input')).each(function (i, v) {
                if ($(this).attr('required') == 'required' && $(this).val() != '' && $(this).val() != undefined) {
                    inp['L' + (i + 1)] = $(this).val();
                    $(this).css('border', '1px solid #babfc7');
                } else {
                    $(this).css('border', '1px solid red');
                    toastMsg('Input Name', 'Invalid Input Name', 'error');
                    flag = 1;
                    return false;
                }
            });
            types.push(inp);
            data['data']=types;
        });

        if (flag == 0) {
            CallAjax('<?php echo base_url('index.php/Section/add_sectiondetail_data') ?>', data, 'POST', function (result) {
                if (result == 1) {
                    toastMsg('Success', 'Successfully inserted', 'success');
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            });
        } else {
            toastMsg('Error', 'Something went wrong', 'error');
        }
        console.log(data);
    }


    $(document).ready(function () {
        $('.mysection').addClass('open');
        $('.section_add').addClass('active');
        addrow();
        $(function () {
            $("#sortable-1 li").draggable({
                helper: "clone"
            });

            $(".droppable").droppable({
                drop: function (event, ui) {
                    var draggable = $(ui.draggable).attr('data-key');
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
                    html += '<div class="col-md-3">' +
                        '<div class="form-group"><label for="sec_var">Variable</label>' +
                        '<input type="text" id="sec_var" name="sec_var" class="form-control vaiablevalue"' +
                        'data-key="' + draggable + '"  placeholder="Variable"' +
                        ' value="' + varname + '">' +
                        '</div>' +
                        '</div>';
                    if (draggable == 'Input') {
                        for (var i = 1; i <= totallanguages; i++) {
                            html += '<div class="col-md-3">' +
                                '<div class="form-group">' +
                                '<label for="sec_input' + i + '">Input Title L' + i + ' (' + $('#l' + i).val() + ')</label>' +
                                '<input type="text" id="sec_input' + i + '" name="sec_input" class="form-control sec_input "' +
                                'data-key="input" required placeholder="Input Title">' +
                                '</div>' +
                                '</div>';
                        }
                        html += '</div><hr>';
                        $('.dropdiv').append(html);
                    } else if (draggable == 'Label') {
                        for (var j = 1; j <= totallanguages; j++) {
                            html += '<div class="col-md-3">' +
                                '<div class="form-group">' +
                                '<label for="sec_input' + i + '">Label Title L' + j + ' (' + $('#l' + j).val() + ')</label>' +
                                '<input type="text" id="sec_input' + i + '" name="sec_input" class="form-control sec_input"' +
                                'data-key="label" placeholder="Label Title">' +
                                '</div>' +
                                '</div>';
                        }
                        html += '</div><hr>';
                        $('.dropdiv').append(html);
                    } else if (draggable == 'Textarea') {
                        for (var k = 1; k <= totallanguages; k++) {
                            html += '<div class="col-md-3">' +
                                '<div class="form-group">' +
                                '<label for="sec_input' + i + '">Textarea Title L' + k + ' (' + $('#l' + k).val() + ')</label>' +
                                '<input type="text" id="sec_input' + i + '" name="sec_input" class="form-control sec_input"' +
                                'data-key="textarea" placeholder="Textarea Title">' +
                                '</div>' +
                                '</div>';
                        }
                        html += '</div><hr>';
                        $('.dropdiv').append(html);
                    } else if (draggable == 'Radio') {
                        htmloptions = '';
                        htmloptions += '<div class="row"><div class="col-md-4">' +
                            '<div class="form-group"><label for="section_title">Variable Option</label>' +
                            '<input type="text" id="sec_input' + 1 + '" name="sec_input" class="form-control" placeholder="Variable"' +
                            ' value="' + varname + '">' +
                            '</div>' +
                            '</div>';

                        for (var l = 1; l <= totallanguages; l++) {
                            html += '<div class="col-md-4">' +
                                '<div class="form-group"><label for="section_title">Radio Title L' + l + ' (' + $('#l' + l).val() + ')</label>' +
                                '<input type="text" id="sec_input' + l + '" name="sec_input' + l + '" class="form-control" placeholder="Textarea Title">' +
                                '</div>' +
                                '</div>';


                            htmloptions += '<div class="col-md-4">' +
                                '<div class="form-group"><label for="section_title">Radio Title L' + l + ' (' + $('#l' + l).val() + ')</label>' +
                                '<input type="text" id="sec_input' + l + '" name="sec_input' + l + '" class="form-control" placeholder="Textarea Title">' +
                                '</div>' +
                                '</div>';
                        }
                        htmloptions += '</div>';

                        html += '</div>';
                        html += htmloptions;
                        html += '<hr>';
                        $('.dropdiv').append(html);
                    } else if (draggable == 'Checkbox') {
                        for (var p = 1; p <= totallanguages; p++) {
                            html += '<div class="col-md-3">' +
                                '<div class="form-group"><label for="section_title">Checkbox Title L' + p + ' (' + $('#l' + p).val() + ')</label>' +
                                '<input type="text" id="sec_input' + p + '" name="sec_input" class="form-control" placeholder="Checkbox Title">' +
                                '</div>' +
                                '</div>';
                        }
                        html += '</div><hr>';
                        $('.dropdiv').append(html);
                    } else if (draggable == 'Selectbox') {
                        htmloptions = '';
                        htmloptions += '<div class="row "  data-repeater-list="car">' +
                            '<div class="col-md-3 "  data-repeater-item>' +
                            '<div class="form-group " ' +
                            '<label for="section_title">Option Variable</label>' +
                            '<input type="text" id="sec_input' + i + '" name="sec_input" class="form-control" placeholder="Variable"' +
                            ' value="' + varname + 'A">' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-md-3"  >' +
                            '<div class="form-group"><label for="section_title">Option Value</label>' +
                            '<input type="text" id="sec_input' + i + '" name="sec_input" class="form-control" placeholder="Variable" >' +
                            '</div>' +
                            '</div>';

                        for (var q = 1; q <= totallanguages; q++) {
                            html += '<div class="col-md-3">' +
                                '<div class="form-group"><label for="section_title">Selectbox Title L' + q + ' (' + $('#l' + q).val() + ')</label>' +
                                '<input type="text" id="sec_input' + 1 + '" name="sec_input" class="form-control" placeholder="Selectbox Title">' +
                                '</div>' +
                                '</div>';
                            htmloptions += '<div class="col-md-3"  >' +
                                '<div class="form-group"><label for="section_title">Option Title L' + q + ' (' + $('#l' + q).val() + ')</label>' +
                                '<input type="text" id="sec_input' +1 + '" name="sec_input" class="form-control" placeholder="Textarea Title">' +
                                '</div>' +
                                '</div>';
                        }
                        htmloptions += '</div> ';

                        html += '<button type="button" data-repeater-create class="btn primary file-repeater" onclick="addrow()"> ' +
                            '<i class="ft-plus"></i> Add Option </button>' +
                            '</div>';
                        html += htmloptions;
                        html += '<hr>';
                        $('.dropdiv').append(html);
                    }

                }
            });
        });

    });

    function addrow() {
        $(".file-repeater").repeater({
            show: function () {
                $(this).slideDown();
                console.log('2');
            }, hide: function (e) {
                $(this).slideUp(e)
            }
        })
    }


</script>