<?php
date_default_timezone_set('Asia/Bangkok');
$query = $this->db->get_where('tbclinicinfo', array('CLINICID' =>  $this->session->userdata('CLINICID')))->row();
?>
<!DOCTYPE html>
<html ng-app="">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Electronic Patient Records</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="layout" content="main" />
    <link rel="shortcut icon" href="">
    <link href="<?php echo base_url() ?>assets/css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/css/flag-icon.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/fontawesome/css/all.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/js/jquery/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap/Chart.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap/utils.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.jqueryui.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.jqueryui.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                jQueryUI: true
            });
        });

        function scrollOnPageLoad() {
            // to top right away
            if (window.location.hash)
                scroll(0, 0);
            // void some browsers issue
            setTimeout(scroll(0, 0), 1);
            var hashLink = window.location.hash;
            if ($(hashLink).length) {
                $(function() {
                    // *only* if we have anchor on the url
                    // smooth scroll to the anchor id
                    $('html, body').animate({
                        scrollTop: $(window.location.hash).offset().top - 77
                    }, 2000);
                });
            }
        }

        scrollOnPageLoad();
    </script>

    <style>
        body-container {
            animation: transitionIn 1000s;
        }

        @keyframes transitionIn {
            from {
                opacity: 0;
                transform: translateY(-30);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar-inner {
            background-color: #F3F7F7 !important;
            background-image: -webkit-linear-gradient(top, #21618C 0%, #21618C 100%) !important;
            background-image: linear-gradient(to bottom, #21618C 0%, #21618C 100%) !important;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#21618C', endColorstr='#21618C', GradientType=0) !important;
            filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
            background-repeat: repeat-x;
            color: #F3F7F7;
            border: none;

        }

        .body-nav.body-nav-horizontal {
            background-color: #F3F7F7 !important;
            background-image: -webkit-linear-gradient(top, #21618C 0%, #21618C 100%) !important;
            background-image: linear-gradient(to bottom, #21618C 0%, #21618C 100%) !important;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#21618C', endColorstr='#21618C', GradientType=0) !important;
            filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
            background-repeat: repeat-x;
            color: #F3F7F7;
            border-bottom: 1px dashed;
        }
    </style>

</head>

<body style="font-family: 'Sarabun', sans-serif;" class="pattern pattern-white-grid">
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <button class="btn btn-navbar" data-toggle="collapse" data-target="#app-nav-top-bar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?php echo base_url('dashboard') ?>" class="brand"><b>Electronic Patient Records</b></i></a>
                <div id="app-nav-top-bar" class="nav-collapse">
                    <ul class="nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-print"></i>
                                <?= $this->lang->line("report"); ?>
                                <b class="caret hidden-phone"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('report/report1') ?>">Report <?= $this->lang->line("report1"); ?></a></li>
                                <li class="hidden"><a href="<?php echo base_url('report/report2') ?>">Report <?= $this->lang->line("report2"); ?></a></li>
                                <li class="hidden"><a href="<?php echo base_url('report/report3') ?>">Report <?= $this->lang->line("report3"); ?></a></li>
                                <li class="hidden"><a href="<?php echo base_url('report/report4') ?>">Report <?= $this->lang->line("report4"); ?></a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav pull-right">
                        <li>
                            <a><span class="badge badge-success"><i class="icon-lock"></i> 256 bit Encryption <i class="icon-cogs"></i> Google Cloud Instance</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-user"></i> <?php echo $query->cif_name; ?>
                                <b class="caret hidden-phone"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a><span class="badge badge-info"><i class="icon-hdd"></i>94 Mb free of 100 MB</span></a></li>
                                <li><a href="<?php echo base_url('dashboard/setting') ?>"><i class="icon-edit"></i> <?= $this->lang->line("updateprofile"); ?></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url('dashboard/change/thailand') ?>"><i class="flag-icon flag-icon-th"></i> TH</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('dashboard/change/english') ?>"><i class="flag-icon flag-icon-gb"></i> EN</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('manage/logout') ?>"><i class="icon-off"></i> <?= $this->lang->line("logout"); ?></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="body-container">
        <div id="body-content">
            <div class="body-nav body-nav-horizontal body-nav-fixed nav-page">
                <div class="container">
                    <ul>
                        <li>
                            <a href="<?php echo base_url('dashboard') ?>">
                                <i class="icon-dashboard icon-large"></i> <?= $this->lang->line("dashboard"); ?>
                            </a>
                        </li>
                        <li class="hidden">
                            <a href="<?php echo base_url('dashboard/appointment') ?>">
                                <i class="icon-user-md icon-large"></i> <?= $this->lang->line("booking"); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('dashboard/booking') ?>">
                                <i class="icon-calendar icon-large"></i> <?= $this->lang->line("manage"); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('dashboard/callques') ?>">
                                <i class="icon-qrcode icon-large"></i> <?= $this->lang->line("onboard"); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('dashboard/waitcheckin') ?>">
                                <i class="icon-map-marker icon-large"></i> <?= $this->lang->line("checkin"); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('dashboard/patiendatabase') ?>">
                                <i class="icon-user icon-large"></i> <?= $this->lang->line("database"); ?>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-hdd icon-large"></i> <?= $this->lang->line("store"); ?>
                            </a>
                            <ul class="dropdown-menu" style="height: 10%;">
                                <!--<a href="<?php echo base_url('dashboard/detailmeal') ?>" class="btn btn-mini">
                                    <div style="margin: 15px; text-align: left !important;">
                                        <h4 class="text-left">รายละเอียดยา</h4>
                                    </div>
                                </a>-->
                                <a href="<?php echo base_url('dashboard/productcategory') ?>" class="btn btn-mini">
                                    <div style="margin: 15px; text-align: left !important;">
                                        <h4 class="text-left">กลุ่มยาหลัก</h4>
                                    </div>
                                </a>
                                <a href="<?php echo base_url('dashboard/subcategory') ?>" class="btn btn-mini" style="margin-top: 2px;">
                                    <div style="margin: 15px;">
                                        <h4 class="text-left">กลุ่มยารอง</h4>
                                    </div>
                                </a>
                                <a href="<?php echo base_url('dashboard/store') ?>" class="btn btn-mini" style="margin-top: 2px;">
                                    <div style="margin: 15px;">
                                        <h4 class="text-left">เพิ่มยาใหม่</h4>
                                    </div>
                                </a>
                                <a href="<?php echo base_url('dashboard/productstore') ?>" class="btn btn-mini" style="margin-top: 2px;">
                                    <div style="margin: 15px;">
                                        <h4 class="text-left">คลังยา</h4>
                                    </div>
                                </a>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-folder-open icon-large"></i>
                                ห้องปฏิบัติการ
                            </a>
                            <ul class="dropdown-menu" style="height: 10%;">
                                <a href="<?php echo base_url('dashboard/labcompany') ?>" class="btn btn-mini">
                                    <div style="margin: 15px;">
                                        <h4>เพิ่มผู้รับตรวจ</h4>
                                    </div>
                                </a>
                                <a href="<?php echo base_url('dashboard/department') ?>" class="btn btn-mini" style="margin-top: 2px;">
                                    <div style="margin: 15px;">
                                        <h4>เพิ่มแผนกส่งตรวจ</h4>
                                    </div>
                                </a>
                                <a href="<?php echo base_url('dashboard/senddepartment') ?>" class="btn btn-mini" style="margin-top: 2px;">
                                    <div style="margin: 15px;">
                                        <h4>เพิ่มรายการส่งตรวจ</h4>
                                    </div>
                                </a>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url('dashboard/procedure') ?>">
                                <i class="icon-list-alt icon-large"></i> <?= $this->lang->line("procedure"); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('dashboard/income_report/') ?>">
                                <i class="icon-file icon-large"></i> <?= $this->lang->line("report"); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('dashboard/setting') ?>">
                                <i class="icon-cogs icon-large"></i> <?= $this->lang->line("setting"); ?>
                            </a>
                        </li>
                        <!--<li>
                            <a href="<?php echo base_url('dashboard/import') ?>">
                                <i class="icon-hdd icon-large"></i> นำเข้าข้อมูล
                            </a>
                        </li>-->
                    </ul>
                </div>
            </div>
            <section class="page container">
                <div class="row">