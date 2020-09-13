<div class="container">
    <div class="content">
        <?php if ($bookingid == "view") { ?>
            <!-- form สำหรับบันทึกรายการตรวจ -->
            <a href="<?php echo base_url('dashboard/record_patienr_history') ?>"><img src="<?php echo base_url('assets/images/icons/person-with-broken-arm.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_medical_history') ?>"><img src="<?php echo base_url('assets/images/icons/pill.svg'); ?>" width="32px" height="32px" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_lab_history') ?>"><img src="<?php echo base_url('assets/images/icons/chemistry-flask-with-liquid.svg'); ?>" class="btn btn-info" /></a>
            <a href="<?php echo base_url('dashboard/record_procedure_history') ?>"><img src="<?php echo base_url('assets/images/icons/drug.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_certification_history') ?>"><img src="<?php echo base_url('assets/images/icons/certification.svg'); ?>" width="32px" height="32px" class="btn" /></a>
            <!-- ปิด form สำหรับบันทึกรายการตรวจ -->
            <hr>
            <div class="container">
                <div class="" style="float: right;">
                    <a class="btn btn-primary" href="<?php echo base_url('dashboard/record_lab_history') ?>" style=" width: 90px; ">ประวัติ</a>
                </div>
            </div>
        <?php } else { ?>
            <!-- form สำหรับบันทึกรายการตรวจ -->
            <a href="<?php echo base_url('dashboard/record_patienr') ?>"><img src="<?php echo base_url('assets/images/icons/person-with-broken-arm.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_medical') ?>"><img src="<?php echo base_url('assets/images/icons/pill.svg'); ?>" width="32px" height="32px" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_lab') ?>"><img src="<?php echo base_url('assets/images/icons/chemistry-flask-with-liquid.svg'); ?>" class="btn btn-info" /></a>
            <a href="<?php echo base_url('dashboard/record_procedure') ?>"><img src="<?php echo base_url('assets/images/icons/drug.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_certification') ?>"><img src="<?php echo base_url('assets/images/icons/certification.svg'); ?>" width="32px" height="32px" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_sumary') ?>"><img src="<?php echo base_url('assets/images/icons/lifeline-of-heartbeats-on-a-paper-on-a-clipboard.svg'); ?>" class="btn" /></a>
            <!-- ปิด form สำหรับบันทึกรายการตรวจ -->
            <hr>
            <div class="container">
                <div class="" style="float: right;">
                    <a class="btn" href="<?php echo base_url('dashboard/record_lab') ?>" style=" width: 90px; ">วันนี้</a>
                    <a class="btn btn-primary" href="<?php echo base_url('dashboard/record_lab_history') ?>" style=" width: 90px; ">ประวัติ</a>
                </div>
            </div>
        <?php } ?>
        <br>
        <section>
            <div id="Person-5" class="box">
                <div class="box-header">
                    <i class="icon-user icon-large"></i>
                    <h5>Lab Record</h5>
                </div>
                <div class="box-content box-table">
                    <table border="1" class="table-bordered table-striped" style="width: 100%">
                        <thead>
                            <tr class="active">
                                <th align="center">วันที่</th>
                                <th>Visit Number</th>
                                <th>รายการแล็บ</th>
                                <th>Department</th>
                                <th>Company</th>
                                <th>ราคา</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            date_default_timezone_set('Asia/Bangkok');
                            $labs = $this->db->get_where('tbpatient_lab', array('IDCARD' => $patientid, 'Status' => 1));
                            foreach ($labs->result() as $labrows) {
                                $hisid = $labrows->LBID;
                            ?>
                                <tr>
                                    <td align="center"><?php echo date("d-m-Y", strtotime($labrows->CREATE)); ?></td>
                                    <td><?php echo $labrows->BOOKINGID; ?></td>
                                    <td><?php echo $labrows->PH1 ?></td>
                                    <td><?php echo $labrows->PH2 ?></td>
                                    <td><?php echo $labrows->PH3 ?></td>
                                    <td><?php echo $labrows->PH4 ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- สำคัญปิดส่วนหัวไฟล์ patientprofilehead.php -->
</div> <!-- <div class="box" style="background-color: #F0F0F0"> -->
</div> <!-- <div class="box-content box-table"> -->