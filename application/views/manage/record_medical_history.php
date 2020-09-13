<div class="container">
    <div class="content">
        <?php if ($bookingid == "view") { ?>
            <!-- form สำหรับบันทึกรายการตรวจ -->
            <a href="<?php echo base_url('dashboard/record_patienr_history') ?>"><img src="<?php echo base_url('assets/images/icons/person-with-broken-arm.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_medical_history') ?>"><img src="<?php echo base_url('assets/images/icons/pill.svg'); ?>" width="32px" height="32px" class="btn btn-info" /></a>
            <a href="<?php echo base_url('dashboard/record_lab_history') ?>"><img src="<?php echo base_url('assets/images/icons/chemistry-flask-with-liquid.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_procedure_history') ?>"><img src="<?php echo base_url('assets/images/icons/drug.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_certification_history') ?>"><img src="<?php echo base_url('assets/images/icons/certification.svg'); ?>" width="32px" height="32px" class="btn" /></a>
            <!-- ปิด form สำหรับบันทึกรายการตรวจ -->
            <hr>
            <div class="container">
                <div class="" style="float: right;">
                    <a class="btn btn-primary" href="<?php echo base_url('dashboard/record_medical_history') ?>" style=" width: 90px; ">ประวัติ</a>
                </div>
            </div>
        <?php } else { ?>
            <!-- form สำหรับบันทึกรายการตรวจ -->
            <a href="<?php echo base_url('dashboard/record_patienr') ?>"><img src="<?php echo base_url('assets/images/icons/person-with-broken-arm.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_medical') ?>"><img src="<?php echo base_url('assets/images/icons/pill.svg'); ?>" width="32px" height="32px" class="btn btn-info" /></a>
            <a href="<?php echo base_url('dashboard/record_lab') ?>"><img src="<?php echo base_url('assets/images/icons/chemistry-flask-with-liquid.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_procedure') ?>"><img src="<?php echo base_url('assets/images/icons/drug.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_certification') ?>"><img src="<?php echo base_url('assets/images/icons/certification.svg'); ?>" width="32px" height="32px" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_sumary') ?>"><img src="<?php echo base_url('assets/images/icons/lifeline-of-heartbeats-on-a-paper-on-a-clipboard.svg'); ?>" class="btn" /></a>
            <!-- ปิด form สำหรับบันทึกรายการตรวจ -->
            <hr>
            <div class="container">
                <div class="" style="float: right;">
                    <a class="btn" href="<?php echo base_url('dashboard/record_medical') ?>" style=" width: 90px; ">วันนี้</a>
                    <a class="btn btn-primary" href="<?php echo base_url('dashboard/record_medical_history') ?>" style=" width: 90px; ">ประวัติ</a>
                </div>
            </div>
        <?php } ?>
        <br>
        <div id="Person-5" class="box">
            <div class="box-header">
                <i class="icon-user icon-large"></i>
                <h5>Medical Record</h5>
            </div>
            <div class="box-content box-table">
                <table border="1" class="table-bordered table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>วันที่</th>
                            <th>Visit Number</th>
                            <th>ชื่อยา</th>
                            <th>ขนาด</th>
                            <th>รูปแบบ</th>
                            <th>ความถี่</th>
                            <th>มื้ออาหาร</th>
                            <th>ระยะเวลา</th>
                            <th>หมายเหตุ</th>
                            <th>จำนวนหน่วย</th>
                            <th>หน่วย</th>
                            <th>ราคา</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        date_default_timezone_set('Asia/Bangkok');
                        $Dash = $this->db->get_where('tbpatient_medical', array('IDCARD' => $patientid, 'Status' => '1'));
                        foreach ($Dash->result() as $row) {
                            $hisid = $row->MEDICALID;
                        ?>
                            <tr>
                                <td align="center"><?php echo date("d-m-Y", strtotime($row->CREATE)); ?></td>
                                <td><?php echo $row->BOOKINGID; ?></td>
                                <td><?php echo $row->PH1; ?></td>
                                <td align="center"><?php echo $row->PH3; ?></td>
                                <td><?php echo $row->PH4; ?></td>
                                <td><?php echo $row->PH5; ?></td>
                                <td><?php echo $row->PH6; ?></td>
                                <td><?php echo $row->Duration; ?></td>
                                <td><?php echo $row->COMMENT; ?></td>
                                <td align="center"><?php echo $row->Number; ?></td>
                                <td><?php echo $row->Unit; ?></td>
                                <td><?php echo $row->PH8; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- สำคัญปิดส่วนหัวไฟล์ patientprofilehead.php -->
</div> <!-- <div class="box" style="background-color: #F0F0F0"> -->
</div> <!-- <div class="box-content box-table"> -->