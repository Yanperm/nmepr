<div class="container">
    <div class="content">
        <?php $booking = $this->db->get_where('tbbooking', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid))->row(); ?>
        <!-- form สำหรับบันทึกรายการตรวจ -->
        <a href="<?php echo base_url('dashboard/record_patienr') ?>"><img src="<?php echo base_url('assets/images/icons/person-with-broken-arm.svg'); ?>" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_medical') ?>"><img src="<?php echo base_url('assets/images/icons/pill.svg'); ?>" width="32px" height="32px" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_lab') ?>"><img src="<?php echo base_url('assets/images/icons/chemistry-flask-with-liquid.svg'); ?>" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_procedure') ?>"><img src="<?php echo base_url('assets/images/icons/drug.svg'); ?>" class="btn btn-info" /></a>
        <a href="<?php echo base_url('dashboard/record_certification') ?>"><img src="<?php echo base_url('assets/images/icons/certification.svg'); ?>" width="32px" height="32px" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_sumary') ?>"><img src="<?php echo base_url('assets/images/icons/lifeline-of-heartbeats-on-a-paper-on-a-clipboard.svg'); ?>" class="btn" /></a>
        <!-- ปิด form สำหรับบันทึกรายการตรวจ -->
        <hr />
        <div class="container">
            <div class="" style="float: right;">
                <a class="btn btn-primary" href="<?php echo base_url('dashboard/record_procedure') ?>" style=" width: 90px; ">วันนี้</a>
                <a class="btn " href="<?php echo base_url('dashboard/record_procedure_history') ?>" style=" width: 90px; ">ประวัติ</a>
            </div>
        </div>
        <br>
        <section>
            <div id="Person-5" class="box">
                <div class="box-header">
                    <i class="icon-user icon-large"></i>
                    <h5>Procedure Record</h5>
                    <?php if ($booking->payment == 0) { ?>
                        <a class="btn btn-box-right" href="#ProcedureModal" role="button" class="btn" data-toggle="modal">
                            <i class="icon-plus-sign"></i> Add</a>
                    <?php } ?>
                </div>
                <div class="box-content box-table">
                    <table border="1" class="table-bordered table-striped" style="width: 100%">
                        <thead>
                            <tr>
                                <th>วันที่</th>
                                <th>Visit Number</th>
                                <th>รายการหัตถการ</th>
                                <th>ราคา</th>
                                <th><i class="icon-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            date_default_timezone_set('Asia/Bangkok');
                            $procedures = $this->db->get_where('tbpatient_procedure', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid, 'Status' => 0));
                            foreach ($procedures->result() as $procedurerows) {
                                $hisid = $procedurerows->PROID;
                            ?>
                                <tr>
                                    <td align="center"><?php echo date("d-m-Y", strtotime($procedurerows->CREATE)); ?></td>
                                    <td><?php echo $procedurerows->BOOKINGID ?></td>
                                    <td><?php echo $procedurerows->PH2 ?></td>
                                    <td><?php echo $procedurerows->PH3 ?></td>
                                    <td class="td-actions" style="width: 100px" align="center">
                                        <a href="<?php echo base_url('patient/patient_proceduredelete/' . $hisid) ?>" class="btn btn-mini btn-danger" onclick="return confirm('ยืนยันการลบข้อมูล')">
                                            <i class="icon-remove"></i> Remove
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

<div id="ProcedureModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">รายการหัตถการในคลินิก</h3>
    </div>
    <form action="<?php echo base_url('patient/patient_procedure') ?>" method="POST">
        <div class="modal-body">
            <script language="JavaScript">
                function toggle(source) {
                    checkboxes = document.getElementsByName('foo[]');
                    for (var i = 0, n = checkboxes.length; i < n; i++) {
                        checkboxes[i].checked = source.checked;
                    }
                }
                $(document).ready(function() {
                    $('#example').DataTable({
                        "lengthChange": false
                    });
                });
            </script>
            <table border="1" id="example" class="table-bordered table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th><input type="checkbox" onClick="toggle(this)" /> CheckAll</th>
                        <th>รายการหัตถการ</th>
                        <th>ราคา</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $number = 0;
                    $procedure = $this->db->get_where('tbProcedure', array('CLINICID' => $this->session->userdata('CLINICID')));
                    foreach ($procedure->result() as $procedurerow) { ?>
                        <tr>
                            <td align="center"><input type="checkbox" name="foo[]" value="<?php echo $number ?>" /></td>
                            <td><?php echo $procedurerow->ProcedureName ?></td>
                            <td><?php echo $procedurerow->ProcedurePrice ?></td>
                            <input type="hidden" name="IDCARD<?php echo $number ?>" value="<?php echo $patientid; ?>">
                            <input type="hidden" name="ProcedureID<?php echo $number ?>" value="<?php echo $procedurerow->ProcedureID ?>">
                            <input type="hidden" name="ProcedureName<?php echo $number ?>" value="<?php echo $procedurerow->ProcedureName ?>">
                            <input type="hidden" name="ProcedurePrice<?php echo $number ?>" value="<?php echo $procedurerow->ProcedurePrice ?>">
                        </tr>
                    <?php $number++;
                    } ?>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">ปิด</button>
            <button class="btn btn-primary" type="submit">บันทึก</button>
        </div>
    </form>
</div>

<!-- สำคัญปิดส่วนหัวไฟล์ patientprofilehead.php -->
</div> <!-- <div class="box" style="background-color: #F0F0F0"> -->
</div> <!-- <div class="box-content box-table"> -->