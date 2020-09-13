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
        <?php $booking = $this->db->get_where('tbbooking', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid))->row(); ?>
        <!-- form สำหรับบันทึกรายการตรวจ -->
        <a href="<?php echo base_url('dashboard/record_patienr') ?>"><img src="<?php echo base_url('assets/images/icons/person-with-broken-arm.svg'); ?>" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_medical') ?>"><img src="<?php echo base_url('assets/images/icons/pill.svg'); ?>" width="32px" height="32px" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_lab') ?>"><img src="<?php echo base_url('assets/images/icons/chemistry-flask-with-liquid.svg'); ?>" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_procedure') ?>"><img src="<?php echo base_url('assets/images/icons/drug.svg'); ?>" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_certification') ?>"><img src="<?php echo base_url('assets/images/icons/certification.svg'); ?>" width="32px" height="32px" class="btn btn-info" /></a>
        <a href="<?php echo base_url('dashboard/record_sumary') ?>"><img src="<?php echo base_url('assets/images/icons/lifeline-of-heartbeats-on-a-paper-on-a-clipboard.svg'); ?>" class="btn" /></a>
        <!-- ปิด form สำหรับบันทึกรายการตรวจ -->
        <hr />
        <div class="container">
            <ul class="nav nav-pills" id="myTab" style="float: left;">
                <li class="active"><a href="#tab1" data-toggle="tab"> ใบรับรองแพทย์ สมัครงาน</a></li>
                <li><a href="#tab2" data-toggle="tab"> ใบรับรองแพทย์ ลางาน</a></li>
            </ul>
            <div class="" style="float: right;">
                <a class="btn btn-primary" href="<?php echo base_url('dashboard/record_certification') ?>" style=" width: 90px; ">วันนี้</a>
                <a class="btn" href="<?php echo base_url('dashboard/record_certification_history') ?>" style=" width: 90px; ">ประวัติ</a>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <div id="Person-5" class="box">
                    <div class="box-header">
                        <i class="icon-user icon-large"></i>
                        <h5>Medical Certification</h5>
                        <?php if ($booking->payment == 0) { ?>
                            <a class="btn btn-box-right" href="#JobModal" role="button" class="btn" data-toggle="modal">
                                <i class="icon-plus-sign"></i> Add</a>&nbsp;
                            <a class="btn btn-box-right" href="<?php echo base_url('report/report_job/' . $patientid . '/' . $bookingid) ?>" target="_blank">
                                <i class="icon-print"></i> Print Thai</a>&nbsp;
<!--                            <a class="btn btn-box-right" href="<?php echo base_url('report/report_job_en/' . $patientid . '/' . $bookingid) ?>" target="_blank">
                                <i class="icon-print"></i> Print English</a>-->
                        <?php } ?>
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
                                    <th class="td-actions"><i class="icon-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                date_default_timezone_set('Asia/Bangkok');
                                $job = $this->db->get_where('tbpatient_job', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid, 'Status' => 0));
                                foreach ($job->result() as $jobrow) { 
                                    $jobid = $jobrow->JobID;
                                    ?>
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
                                        <td class="td-actions" style="width: 80px">
                                            <a href="#EditJobModal" role="button" class="btn btn-mini btn-warning" data-toggle="modal" id="selectjob" data-jobid="<?php echo $jobrow->JobID ?>">
                                                <i class="icon-edit"></i> </a>
                                                <a href="<?php echo base_url('patient/patient_jobcerdelete/'.$jobid);  ?>" onclick="return confirm('โปรดยืนยันการทำรายการลบ')"role="button" class="btn btn-mini btn-danger">
                                                <i class="icon-remove"></i> </a>
                                        </td>
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
                        <?php if ($booking->payment == 0) { ?>
                            <a class="btn btn-box-right" href="#SickModal" role="button" class="btn" data-toggle="modal">
                                <i class="icon-plus-sign"></i> Add</a>
                            <a class="btn btn-box-right" href="<?php echo base_url('report/report_sick/' . $patientid . '/' . $bookingid) ?>" target="_blank">
                                <i class="icon-print"></i> Print</a>
                        <?php } ?>
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
                                    <th class="td-actions"><i class="icon-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sick = $this->db->get_where('tbpatient_sick', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid, 'Status' => 0));
                                foreach ($sick->result() as $sickrow) { 
                                    $sickid = $sickrow->SickID;
                                    ?>
                                    <tr>
                                        <td align="center"><?php echo date("d-m-Y", strtotime($sickrow->CREATE)); ?></td>
                                        <td align="center"><?php echo "$sickrow->Dayoff"; ?></td>
                                        <td align="center"><?php echo date("d-m-Y", strtotime($sickrow->Startdate)); ?></td>
                                        <td align="center"><?php echo date("d-m-Y", strtotime($sickrow->Enddate)); ?></td>
                                        <td><?php echo "$sickrow->Recommendation"; ?></td>
                                        <td align="center"><?php echo "$sickrow->Price"; ?></td>
                                        <td align="center" class="td-actions" style="width: 80px">
                                            <a href="#EditSickModal" role="button" class="btn btn-mini btn-warning" data-toggle="modal" id="selectsick" data-sickid="<?php echo $sickrow->SickID ?>" data-dayoff="<?php echo $sickrow->Dayoff ?>" data-startdate="<?php echo $sickrow->Startdate ?>" data-enddate="<?php echo $sickrow->Enddate ?>" data-recommendation="<?php echo $sickrow->Recommendation ?>" data-price="<?php echo $sickrow->Price ?>">
                                                <i class="icon-edit"></i> </a>
                                                <a href="<?php echo base_url('patient/patient_sickcerdelete/'.$sickid);  ?>" onclick="return confirm('โปรดยืนยันการทำรายการลบ')"role="button" class="btn btn-mini btn-danger">
                                                <i class="icon-remove"></i> </a>
                                        </td>
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

<div id="JobModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Medical Certification</h3>
    </div>
    <form action="<?php echo base_url('patient/patient_Job') ?>" method="POST">
        <div class="modal-body">
            <h4>ส่วนที่ 1 ประวัติสุขภาพ</h4>
            <table style="width: 100%;  border: solid; border-width: 1px;">
                <tr>
                    <td align="center" style="width: 5%;">1.</td>
                    <td>โรคประจำตัว</td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="Diseases" value="ไม่มี" checked>ไม่มี
                        </label>
                    </td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="Diseases" value="มี">มี
                        </label>
                    </td>
                    <td style="width: 30%;"><input name="DiseasesDetail" class="input-large" type="text" placeholder="ระบุ"></td>
                </tr>
                <tr>
                    <td align="center" style="width: 5%;">2.</td>
                    <td>อุบัติเหตุ และผ่าตัด</td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="Accident" value="ไม่มี" checked>ไม่มี
                        </label>
                    </td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="Accident" value="มี">มี
                        </label>
                    </td>
                    <td style="width: 30%;"><input name="AccidentDetail" class="input-large" type="text" placeholder="ระบุ"></td>
                </tr>
                <tr>
                    <td align="center" style="width: 5%;">3.</td>
                    <td>เคยเข้ารับการรักษาในโรงพยาบาล</td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="Hospital" value="ไม่มี" checked>ไม่มี
                        </label>
                    </td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="Hospital" value="มี">มี
                        </label>
                    </td>
                    <td style="width: 30%;"><input name="HospitalDetail" class="input-large" type="text" placeholder="ระบุ"></td>
                </tr>
                <tr>
                    <td align="center" style="width: 5%;">4.</td>
                    <td>ประวัติอื่นที่สำคัญ</td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="Others" value="ไม่มี" checked>ไม่มี
                        </label>
                    </td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="Others" value="มี">มี
                        </label>
                    </td>
                    <td style="width: 30%;"><input name="OthersDetail" class="input-large" type="text" placeholder="ระบุ"></td>
                </tr>
            </table>
            <br>
            <h4>ส่วนที่ 2 ของแพทย์</h4>
            <table style="width: 100%;  border: solid; border-width: 1px;">
                <tr>
                    <td style=" padding-left: 12px; ">สภาพร่างกายทั่วไปอยู่ในเกณฑ์ </td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="BodyHealth" value="ปกติ" checked>ปกติ
                        </label>
                    </td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="BodyHealth" value="ผิดปกติ">ผิดปกติ
                        </label>
                    </td>
                    <td style="width: 30%;"><input name="BodyHealthDetail" class="input-large" type="text" placeholder="ระบุ"></td>
                </tr>
                <tr>
                    <td style=" padding-left: 12px; ">อาการแสดงของโรค อื่นๆ</td>
                    <td colspan="3" style="width: 30%;"><input name="OtherSymptoms" style="width: 96%;" type="text" placeholder="ถ้ามีระบุ"></td>
                </tr>
                <tr>
                    <td style=" padding-left: 12px; ">สรุปความเห็นและข้อแนะนำของแพทย์</td>
                    <td colspan="3" style="width: 30%;"><textarea name="Recommendation" rows="2" style="width: 96%;"></textarea></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <input name="Price" class="input-large" type="number" placeholder="ราคา" style="margin-right: 380px; margin-bottom: 0px;"required>
            <button class="btn" data-dismiss="modal" aria-hidden="true">ปิด</button>
            <button class="btn btn-primary" type="submit">บันทึก</button>
        </div>
    </form>
</div>
<div id="EditJobModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Medical Certification</h3>
    </div>
    <form action="<?php echo base_url('patient/patient_UpdateJob') ?>" method="POST">
        <div class="modal-body" id="show_edit_job">

        </div>
    </form>
</div>
<div id="SickModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Medical Certification</h3>
    </div>
    <form action="<?php echo base_url('patient/patient_Sick') ?>" method="POST">
        <div class="modal-body">
            <h4>ความเห็นของแพทย์</h4>
            <table style="width: 100%;">
                <tr>
                    <td align="right" style=" padding-right: 10px; ">สมควรให้พักรักษาตัวเป็นเวลา</td>
                    <td><input name="Dayoff" class="input-large" type="number" placeholder="ระบุ" required></td>
                    <td colspan="2">วัน</td>
                </tr>
                <tr>
                    <td align="right" style=" padding-right: 10px; ">ตั้งแต่วันที่</td>
                    <td><input name="Startdate" class="input-large" type="date" required></td>
                    <td>ถึง</td>
                    <td align="right"><input name="Enddate" class="input-large" type="date" required></td>
                </tr>
                <tr>
                    <td align="right" style=" padding-right: 10px; ">แนะนำของแพทย์</td>
                    <td colspan="3"><textarea name="Recommendation" rows="2" style="width: 65%;"></textarea></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <input name="Price" class="input-large" type="number" placeholder="ราคา" style="margin-right: 380px; margin-bottom: 0px;"required>
            <button class="btn" data-dismiss="modal" aria-hidden="true">ปิด</button>
            <button class="btn btn-primary" type="submit">บันทึก</button>
        </div>
    </form>
</div>
<div id="EditSickModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Medical Certification</h3>
    </div>
    <form action="<?php echo base_url('patient/patient_UpdateSick') ?>" method="POST">
        <div class="modal-body">
            <h4>ความเห็นของแพทย์</h4>
            <table style="width: 100%;">
                <tr>
                    <td align="right" style=" padding-right: 10px; ">สมควรให้พักรักษาตัวเป็นเวลา</td>
                    <td><input name="Dayoff" id="dayoff" class="input-large" type="number" required></td>
                    <td colspan="2">วัน</td>
                </tr>
                <tr>
                    <td align="right" style=" padding-right: 10px; ">ตั้งแต่วันที่</td>
                    <td><input name="Startdate" id="startdate" class="input-large" type="date" required></td>
                    <td>ถึง</td>
                    <td align="right"><input name="Enddate" id="enddate" class="input-large" type="date" required></td>
                </tr>
                <tr>
                    <td align="right" style=" padding-right: 10px; ">แนะนำของแพทย์</td>
                    <td colspan="3"><textarea name="Recommendation" id="recommendation" rows="2" style="width: 65%;"></textarea></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="SickID" id="sickid">
            <input name="Price" class="input-large" type="number" id="price" placeholder="ราคา" style="margin-right: 380px; margin-bottom: 0px;"required>
            <button class="btn" data-dismiss="modal" aria-hidden="true">ปิด</button>
            <button class="btn btn-primary" type="submit">บันทึก</button>
        </div>
    </form>
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