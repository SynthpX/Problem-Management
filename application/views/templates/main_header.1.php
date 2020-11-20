<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stagb Admin Template</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link href="<?php echo base_url('assets/dist/semantic.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/ionicons/css/ionicons.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/pacejs/pace.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/datedropper/datedropper.min.css'); ?>" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet" />
    
    <!--jquery-->
    <script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
    <!--JS-->
    <script data-pace-options='{ "ajax": false }' src="<?php echo base_url('assets/plugins/pacejs/pace.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.semanticui.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
</head>

<body>
    <div id="contextWrap">
        <!--sidebar-->
        <div class="ui sidebar vertical left menu overlay  borderless visible sidemenu inverted  grey" style="-webkit-transition-duration: 0.1s; transition-duration: 0.1s;" data-color="grey">
            <a class="item logo" href="#">
                <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="stagblogo" /><img src="<?php echo base_url('assets/img/thumblogo.png'); ?>" alt="stagblogo" class="displaynone" />
            </a>
            <div class="ui accordion inverted">
                <div class="ui divider"></div>
                    <a class="item" href="<?php echo base_url('/manage/dashboard'); ?>">
                        <i class="ion-speedometer icon"></i> <span class="colhidden">DASHBOARD</span>
                    </a>
                <div class="ui divider"></div>
                    <a class="item" href="<?php echo base_url('/manage/incident'); ?>">
                        <i class="archive icon"></i> <span class="colhidden">DATA INCIDENT LOG</span>
                    </a>
                <div class="ui divider"></div>
                    <a class="item" href="<?php echo base_url('/manage/problem_log'); ?>">
                        <i class="archive icon"></i> <span class="colhidden">DATA PROBLEM LOG</span>
                    </a>
                <div class="ui divider"></div>
                    <a class="item" href="<?php echo base_url('/manage/problem_reg'); ?>">
                        <i class="archive icon"></i> <span class="colhidden">DATA PROBLEM REG</span>
                    </a>
                <div class="ui divider"></div>
                    <a class="item" href="<?php echo base_url('/manage/known_error'); ?>">
                        <i class="archive icon"></i> <span class="colhidden">DATA KNOWN ERROR</span>
                    </a>
                <div class="ui divider"></div>
                <a class="title item">
                    <i class="ion-person-stalker titleIcon icon"></i> AKUN <i class="dropdown icon"></i>
                </a>
                <div class="content">
                    <a class="item" href="<?php echo base_url('/manage/user'); ?>">
                        MANAGE AKUN
                    </a>
                    <a class="item" href="<?php echo base_url('/manage/login/logout'); ?>">
                        LOGOUT
                    </a>
                </div>
                <div class="ui divider"></div>
            </div>
        </div>
        <!--sidebar-->
        <div class="pusher">
            <!--navbar-->
            <div class="navslide navwrap">
                <div class="ui menu icon borderless grid" data-color="inverted white">
                    <a class="item labeled openbtn">
                        <i class="ion-navicon-round big icon"></i>
                    </a>
                    <a class="right menuitem labeled expandit" onclick="toggleFullScreen(document.body)">
                        <i class="ion-arrow-expand big icon"></i>
                    </a>
                    <div class="right menu colhidden">
                        <div class="ui dropdown item">
                            <img class="ui mini circular image" src="<?php echo base_url('assets/img/logout.png'); ?>" alt="label-image" />
                            <div class="menu">
                                <a class="item" href="<?php echo base_url('/manage/login/logout'); ?>">Sign Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--navbar-->
            <!--maincontent-->