<style>
    body .modal {
        width: 38%;
        left: 32%;
        margin-left: auto;
        margin-right: auto;
    }

    .margin-r10-b5 {
        margin-right: 10px !important;
        margin-bottom: 7px !important;
    }

    .boxx {
        margin-bottom: 20px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }

    .frame {
        border: 1px solid #ddd;
        border-width: 1px;
        padding: 18px;
        background-color: white;
        height: 600px;
    }

    .padding-9-15 {
        padding: 9px 15px;
    }

    .top_line {
        border-top: 1px solid #e5e5e5;
    }

    .green {
        color: #009e00;
        font-size: 17px;
    }

    .toolbar_left {
        float: left;
    }

    .toolbar_right {
        float: right;
    }
</style>

<div class="container">
    <div class="content">
        <?php if ($bookingid == "view") { ?>
            <!-- form สำหรับบันทึกรายการตรวจ -->
            <a href="<?php echo base_url('dashboard/record_patienr_history') ?>"><img src="<?php echo base_url('assets/images/icons/person-with-broken-arm.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_medical_history') ?>"><img src="<?php echo base_url('assets/images/icons/pill.svg'); ?>" width="32px" height="32px" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_lab_history') ?>"><img src="<?php echo base_url('assets/images/icons/chemistry-flask-with-liquid.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_procedure_history') ?>"><img src="<?php echo base_url('assets/images/icons/drug.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_certification_history') ?>"><img src="<?php echo base_url('assets/images/icons/certification.svg'); ?>" width="32px" height="32px" class="btn btn-info" /></a>
            <!-- ปิด form สำหรับบันทึกรายการตรวจ -->
            <hr>
            <div class="container">
                <ul class="nav nav-pills" id="myTab" style="float: left;">
                    <li class="active"><a href="#tab1" data-toggle="tab"> ใบรับรองแพทย์ สมัครงาน</a></li>
                    <li><a href="#tab2" data-toggle="tab"> ใบรับรองแพทย์ ลางาน</a></li>
                </ul>
                <div class="" style="float: right;">
                    <a class="btn btn-primary" href="<?php echo base_url('dashboard/record_certification_history') ?>" style=" width: 90px; ">ประวัติ</a>
                </div>
            </div>
        <?php } else { ?>
            <!-- form สำหรับบันทึกรายการตรวจ -->
            <a href="<?php echo base_url('dashboard/record_patienr') ?>"><img src="<?php echo base_url('assets/images/icons/person-with-broken-arm.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_medical') ?>"><img src="<?php echo base_url('assets/images/icons/pill.svg'); ?>" width="32px" height="32px" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_lab') ?>"><img src="<?php echo base_url('assets/images/icons/chemistry-flask-with-liquid.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_procedure') ?>"><img src="<?php echo base_url('assets/images/icons/drug.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_certification') ?>"><img src="<?php echo base_url('assets/images/icons/certification.svg'); ?>" width="32px" height="32px" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_sumary') ?>"><img src="<?php echo base_url('assets/images/icons/lifeline-of-heartbeats-on-a-paper-on-a-clipboard.svg'); ?>" class="btn btn-info" /></a>
            <!-- ปิด form สำหรับบันทึกรายการตรวจ -->
            <hr>
            <div class="container">
                <ul class="nav nav-pills" id="myTab" style="float: left;">
                    <li class="active"><a href="#tab1" data-toggle="tab"> ใบรับรองแพทย์ สมัครงาน</a></li>
                    <li><a href="#tab2" data-toggle="tab"> ใบรับรองแพทย์ ลางาน</a></li>
                </ul>
                <div class="" style="float: right;">
                    <a class="btn" href="<?php echo base_url('dashboard/record_certification') ?>" style=" width: 90px; ">วันนี้</a>
                    <a class="btn btn-primary" href="<?php echo base_url('dashboard/record_certification_history') ?>" style=" width: 90px; ">ประวัติ</a>
                </div>
            </div>
        <?php } ?>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <div id="Person-5" class="box">
                    <div class="box-header">
                        <i class="icon-user icon-large"></i>
                        <h5>Medical Certification</h5>
                    </div>
                    <div class="box-content box-table">
                        <table border="1" class="table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>วันที่</th>
                                    <th>Diseases</th>
                                    <th>Diseases Detail</th>
                                    <th>Accident</th>
                                    <th>Accident Detail</th>
                                    <th>Hospital</th>
                                    <th>Hospital Detail</th>
                                    <th>Others</th>
                                    <th>Others Detail</th>
                                    <th>Body Health</th>
                                    <th>Body Health Detail</th>
                                    <th>Other Symptoms</th>
                                    <th>Recommendation</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                date_default_timezone_set('Asia/Bangkok');
                                $job = $this->db->get_where('tbpatient_job', array('IDCARD' => $patientid, 'Status' => 1));
                                foreach ($job->result() as $jobrow) { ?>
                                    <tr align="center">
                                        <td><?php echo date("d-m-Y", strtotime($jobrow->CREATE)); ?></td>
                                        <td><?php echo $jobrow->Diseases ?></td>
                                        <td><?php echo $jobrow->DiseasesDetail ?></td>
                                        <td><?php echo $jobrow->Accident ?></td>
                                        <td><?php echo $jobrow->AccidentDetail ?></td>
                                        <td><?php echo $jobrow->Hospital ?></td>
                                        <td><?php echo $jobrow->HospitalDetail ?></td>
                                        <td><?php echo $jobrow->Others ?></td>
                                        <td><?php echo $jobrow->OthersDetail ?></td>
                                        <td><?php echo $jobrow->BodyHealth ?></td>
                                        <td><?php echo $jobrow->BodyHealthDetail ?></td>
                                        <td><?php echo $jobrow->OtherSymptoms ?></td>
                                        <td><?php echo $jobrow->Recommendation ?></td>
                                        <td><?php echo $jobrow->Price ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab2">
                <div id="Person-5" class="box">
                    <div class="box-header">
                        <i class="icon-user icon-large"></i>
                        <h5>Medical Certification</h5>
                    </div>
                    <div class="box-content box-table">
                        <table border="1" class="table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>วันที่</th>
                                    <th>Day off</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Recommendation</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sick = $this->db->get_where('tbpatient_sick', array('IDCARD' => $patientid, 'Status' => 1));
                                foreach ($sick->result() as $sickrow) { ?>
                                    <tr>
                                        <td align="center"><?php echo date("d-m-Y", strtotime($sickrow->CREATE)); ?></td>
                                        <td align="center"><?php echo "$sickrow->Dayoff"; ?></td>
                                        <td align="center"><?php echo date("d-m-Y", strtotime($sickrow->Startdate)); ?></td>
                                        <td align="center"><?php echo date("d-m-Y", strtotime($sickrow->Enddate)); ?></td>
                                        <td><?php echo "$sickrow->Recommendation"; ?></td>
                                        <td align="center"><?php echo "$sickrow->Price"; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- สำคัญปิดส่วนหัวไฟล์ patientprofilehead.php -->
</div> <!-- <div class="box" style="background-color: #F0F0F0"> -->
</div> <!-- <div class="box-content box-table"> -->

<script>
    $(document).ready(function() {
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });

    $(document).ready(function() {
        $(document).on('click', '#selectjob', function() {
            var jobid = $(this).data('jobid');
            $.ajax({
                url: "<?php echo base_url('patient/select_edit_job') ?>",
                type: "POST",
                data: {
                    jobid: jobid
                },
                success: function(data) {
                    $('#show_edit_job').html(data);
                }
            });
        })
    })

    $(document).ready(function() {
        $(document).on('click', '#selectsick', function() {
            var sickid = $(this).data('sickid');
            var dayoff = $(this).data('dayoff');
            var startdate = $(this).data('startdate');
            var enddate = $(this).data('enddate');
            var recommendation = $(this).data('recommendation');
            var price = $(this).data('price');
            $('#sickid').val(sickid);
            $('#dayoff').val(dayoff);
            $('#startdate').val(startdate);
            $('#enddate').val(enddate);
            $('#recommendation').val(recommendation);
            $('#price').val(price);
            $('#model-item').modal('hide');
        })
    })
</script>