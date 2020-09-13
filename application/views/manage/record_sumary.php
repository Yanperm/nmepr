<div class="container">
    <div class="content">
        <div class="span8">
            <?php $booking = $this->db->get_where('tbbooking', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid))->row(); ?>
            <!-- form สำหรับบันทึกรายการตรวจ -->
            <a href="<?php echo base_url('dashboard/record_patienr') ?>"><img src="<?php echo base_url('assets/images/icons/person-with-broken-arm.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_medical') ?>"><img src="<?php echo base_url('assets/images/icons/pill.svg'); ?>" width="32px" height="32px" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_lab') ?>"><img src="<?php echo base_url('assets/images/icons/chemistry-flask-with-liquid.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_procedure') ?>"><img src="<?php echo base_url('assets/images/icons/drug.svg'); ?>" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_certification') ?>"><img src="<?php echo base_url('assets/images/icons/certification.svg'); ?>" width="32px" height="32px" class="btn" /></a>
            <a href="<?php echo base_url('dashboard/record_sumary') ?>"><img src="<?php echo base_url('assets/images/icons/lifeline-of-heartbeats-on-a-paper-on-a-clipboard.svg'); ?>" class="btn btn-info" /></a>
            <!-- ปิด form สำหรับบันทึกรายการตรวจ -->
        </div>
        <div class="span1 offset6">
            <?php if ($booking->payment == 0) { ?>
                <?php $count = $this->db->get_where('tbpatients', array('IDCARD' => $patientid))->num_rows();
                if ($count > 0) { ?>
                    <a href="<?php echo base_url('patient/finish_case/' . $patientid . '/' . $bookingid); ?>" onclick="return confirm('คุณต้องการสิ้นสุดการตรวจผู้ป่วยรายนี้ใช่หรือไม่')" class="btn btn-success">Finish</a>
                <?php  } else { ?>
                    <button class="btn btn-success" onclick="return confirm('กรุณาทำประวัติข้อมูลตนป่วยก่อน')">Finish</button>
                <?php } ?>
            <?php } else { ?>
                <button class="btn btn-success" disabled>Finish</button>
            <?php } ?>
        </div>
        <br /><br /><br />
        <section>
            <div id="Person-5" class="box">
                <div class="box-header">
                    <i class="icon-user icon-large"></i>
                    <h5>Confirmation</h5>
                </div>
                <div class="box-content box-table">
                    <table border="1" class="table-bordered table-striped" style="width: 100%">
                        <thead>
                            <tr>
                                <th align="center">วันที่</th>
                                <th>รายการ</th>
                                <th align="center">ราคา</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3">History Record</td>
                            </tr>
                            <?php
                            date_default_timezone_set('Asia/Bangkok');
                            $historys = $this->db->get_where('tbpatient_history', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid));
                            foreach ($historys->result() as $rowhiss) {
                                $date = $rowhiss->CREATE;
                            ?>
                                <tr>
                                    <td align="center"><?php echo date("d-m-Y", strtotime($rowhiss->CREATE)); ?></td>
                                    <td><?php echo $rowhiss->PH3; ?></td>
                                    <td align="right"><?php echo $rowhiss->PH5; ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3">Medical Record</td>
                            </tr>
                            <?php
                            $historysx = $this->db->get_where('tbpatient_medical', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid));
                            foreach ($historysx->result() as $rowhissx) { ?>
                                <tr>
                                    <td align="center"><?php echo date("d-m-Y", strtotime($rowhissx->CREATE)); ?></td>
                                    <td><?php echo "$rowhissx->PH1 $rowhissx->Number $rowhissx->Unit"; ?></td>
                                    <td align="right"><?php echo $rowhissx->PH8; ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3">Lab Record</td>
                            </tr>
                            <?php
                            $historysxsa = $this->db->get_where('tbpatient_lab', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid));
                            foreach ($historysxsa->result() as $rowhissxsa) { ?>
                                <tr>
                                    <td align="center"><?php echo date("d-m-Y", strtotime($rowhissxsa->CREATE)); ?></td>
                                    <td><?php echo $rowhissxsa->PH1; ?></td>
                                    <td align="right"><?php echo $rowhissxsa->PH4; ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3">Procedure Record</td>
                            </tr>
                            <?php
                            $historysxsax = $this->db->get_where('tbpatient_procedure', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid));
                            foreach ($historysxsax->result() as $rowhissxsax) { ?>
                                <tr>
                                    <td align="center"><?php echo date("d-m-Y", strtotime($rowhissxsax->CREATE)); ?></td>
                                    <td><?php echo $rowhissxsax->PH2; ?></td>
                                    <td align="right"><?php echo $rowhissxsax->PH3; ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3">Medical Certificate</td>
                            </tr>
                            <?php
                            $job = $this->db->get_where('tbpatient_job', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid));
                            foreach ($job->result() as $jobrow) { ?>
                                <tr>
                                    <td align="center"><?php echo date("d-m-Y", strtotime($jobrow->CREATE)); ?></td>
                                    <td>ค่าใบรับรองแพทย์ สำหรับสมัครงาน</td>
                                    <td align="right"><?php echo $jobrow->Price; ?></td>
                                </tr>
                            <?php } ?>
                            <?php
                            $sick = $this->db->get_where('tbpatient_sick', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid));
                            foreach ($sick->result() as $sickrow) { ?>
                                <tr>
                                    <td align="center"><?php echo date("d-m-Y", strtotime($sickrow->CREATE)); ?></td>
                                    <td>ค่าใบรับรองแพทย์ สำหรับลาป่วย</td>
                                    <td align="right"><?php echo $sickrow->Price; ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3">ส่วนลด</td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <input type="text" name=""/>
                                </td>
                            </tr>
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