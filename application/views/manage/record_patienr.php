<style>
    .modal-body_edit {
        overflow-y: auto;
        padding: 15px;
    }

    .modal.fade_edit.in {
        top: 35%;
    }
</style>
<div class="container">
    <div class="content">
        <?php $booking = $this->db->get_where('tbbooking', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid))->row(); ?>
        <!-- form สำหรับบันทึกรายการตรวจ -->
        <a href="<?php echo base_url('dashboard/record_patienr') ?>"><img src="<?php echo base_url('assets/images/icons/person-with-broken-arm.svg'); ?>" class="btn btn-info" /></a>
        <a href="<?php echo base_url('dashboard/record_medical') ?>"><img src="<?php echo base_url('assets/images/icons/pill.svg'); ?>" width="32px" height="32px" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_lab') ?>"><img src="<?php echo base_url('assets/images/icons/chemistry-flask-with-liquid.svg'); ?>" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_procedure') ?>"><img src="<?php echo base_url('assets/images/icons/drug.svg'); ?>" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_certification') ?>"><img src="<?php echo base_url('assets/images/icons/certification.svg'); ?>" width="32px" height="32px" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_sumary') ?>"><img src="<?php echo base_url('assets/images/icons/lifeline-of-heartbeats-on-a-paper-on-a-clipboard.svg'); ?>" class="btn" /></a>
        <!-- ปิด form สำหรับบันทึกรายการตรวจ -->
        <hr>
        <div class="container">
            <div class="" style="float: right;">
                <a class="btn btn-primary" href="<?php echo base_url('dashboard/record_patienr') ?>" style=" width: 90px; ">วันนี้</a>
                <a class="btn" href="<?php echo base_url('dashboard/record_patienr_history') ?>" style=" width: 90px; ">ประวัติ</a>
            </div>
        </div>
        <br>
        <div id="Person-5" class="box">
            <div class="box-header">
                <i class="icon-user icon-large"></i>
                <h5>Patient's Record</h5>
                <?php if ($booking->payment == 0) { ?>
                    <?php
                    $his = $this->db->get_where('tbpatient_history', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid));
                    $rowhis = $his->row();
                    $num = $his->num_rows();
                    if ($num == 1) { ?>
                        <a class="btn btn-box-right" id="record" href="#EditModal" role="button" class="btn" data-toggle="modal" data-ph1="<?php echo $rowhis->PH1 ?>" data-ph2="<?php echo $rowhis->PH2 ?>" data-ph3="<?php echo $rowhis->PH3 ?>" data-ph4="<?php echo $rowhis->PH4 ?>" data-ph5="<?php echo $rowhis->PH5 ?>">
                            <i class="icon-edit"></i> EDIT
                        </a>
                    <?php } else { ?>
                        <a class="btn btn-box-right" href="#MyModal" role="button" class="btn" data-toggle="modal">
                            <i class="icon-plus-sign"></i> ADD
                        </a>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="box-content box-table">
                <table class="table-bordered table-condensed" border="1" style="width: 100%">
                    <thead>
                        <tr>
                            <th>วันที่</th>
                            <th>Visit Number</th>
                            <th>อาการ</th>
                            <th>ตรวจร่างกาย</th>
                            <th>วินิจฉัย</th>
                            <th>การรักษา</th>
                            <th>ค่ารักษา</th>
                            <th align="center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $x = 1;
                        date_default_timezone_set('Asia/Bangkok');
                        $history = $this->db->get_where('tbpatient_history', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid, 'Status' => 0));
                        foreach ($history->result() as $rowhis) {
                            $hisid = $rowhis->PHID;
                        ?>
                            <tr>
                                <td align="center"><b><?php echo date("d-m-Y", strtotime($rowhis->CREATE)); ?></b></td>
                                <td align="center"><?php echo $rowhis->BOOKINGID; ?></td>
                                <td><?php echo $rowhis->PH1; ?></td>
                                <td><?php echo $rowhis->PH2; ?></td>
                                <td><?php echo $rowhis->PH3; ?></td>
                                <td><?php echo $rowhis->PH4; ?></td>
                                <td><?php echo $rowhis->PH5; ?></td>
                                <td class="td-actions">
                                    <a href="<?php echo base_url('patient/patient_delete/' . $hisid) ?>" class="btn-block btn btn-mini btn-danger" onclick="return confirm('แน่ใจหรือแม่ที่จะลบ ?')">
                                        <i class="btn-icon-only icon-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="MyModal" class="modal hide fade_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url('patient/record_patienr') ?>" method="POST">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Patient Record</h3>
        </div>
        <div class="modal-body_edit">
            <div class="control-group">
                <label class="control-label" for="inputEmail">อาการ</label>
                <div class="controls">
                    <input type="hidden" class="span7" name="IDCARD" value="<?php echo $patientid; ?>">
                    <textarea name="PH1" class="span7" rows="4"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">ตรวจร่างกาย</label>
                <div class="controls">
                    <textarea name="PH2" class="span7" rows="4"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">วินิจฉัย</label>
                <div class="controls">
                    <textarea name="PH3" class="span7" rows="4"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">การรักษา</label>
                <div class="controls">
                    <textarea name="PH4" class="span7" rows="4"></textarea>
                </div>
            </div>
            <div class="input-prepend input-append">
                <label class="control-label" for="inputEmail">ค่าตรวจ</label>
                <input class="span7" name="PH5" type="number">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">ปิด</button>
            <button class="btn btn-primary" type="submit">บันทึก</button>
        </div>
    </form>
</div>
<div id="EditModal" class="modal hide fade_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url('patient/updatePatienHistory') ?>" method="POST">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Edit Patient Record</h3>
        </div>
        <div class="modal-body_edit">
            <div class="control-group">
                <label class="control-label" for="inputEmail">อาการ</label>
                <div class="controls">
                    <input type="hidden" class="span7" name="IDCARD" value="<?php echo $patientid; ?>">
                    <textarea name="PH1" class="span7" id="ph1" rows="4"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">ตรวจร่างกาย</label>
                <div class="controls">
                    <textarea name="PH2" class="span7" id="ph2" rows="4"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">วินิจฉัย</label>
                <div class="controls">
                    <textarea name="PH3" class="span7" id="ph3" rows="4"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">การรักษา</label>
                <div class="controls">
                    <textarea name="PH4" class="span7" id="ph4" rows="4"></textarea>
                </div>
            </div>
            <div class="input-prepend input-append">
                <label class="control-label" for="inputEmail">ค่าตรวจ</label>
                <input class="span7" name="PH5" id="ph5" type="number">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-circle"></i> ปิด</button>
            <button class="btn btn-warning" type="submit"><i class="icon-edit"></i> แก้ไขข้อมูล</button>
        </div>
    </form>
</div>

<!-- สำคัญปิดส่วนหัวไฟล์ patientprofilehead.php -->
</div> <!-- <div class="box" style="background-color: #F0F0F0"> -->
</div> <!-- <div class="box-content box-table"> -->

<script>
    $(document).ready(function() {
        $(document).on('click', '#record', function() {
            var ph1 = $(this).data('ph1');
            var ph2 = $(this).data('ph2');
            var ph3 = $(this).data('ph3');
            var ph4 = $(this).data('ph4');
            var ph5 = $(this).data('ph5');
            $('#ph1').val(ph1);
            $('#ph2').val(ph2);
            $('#ph3').val(ph3);
            $('#ph4').val(ph4);
            $('#ph5').val(ph5);
            $('#model-item').modal('hide');
        })
    })
</script>