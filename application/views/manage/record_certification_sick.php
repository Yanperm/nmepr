<style>
    body .modal {
        width: 38%;
        left: 32%;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<div class="container">
    <div class="content">
        <!-- form สำหรับบันทึกรายการตรวจ -->
        <a href="<?php echo base_url('dashboard/record_patienr') ?>"><img src="<?php echo base_url('assets/images/icons/person-with-broken-arm.svg'); ?>" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_medical') ?>"><img src="<?php echo base_url('assets/images/icons/pill.svg'); ?>" width="32px" height="32px" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_lab') ?>"><img src="<?php echo base_url('assets/images/icons/chemistry-flask-with-liquid.svg'); ?>" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_procedure') ?>"><img src="<?php echo base_url('assets/images/icons/drug.svg'); ?>" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_certification_job') ?>"><img src="<?php echo base_url('assets/images/icons/certification.svg'); ?>" width="32px" height="32px" class="btn btn-info" /></a>
        <a href="<?php echo base_url('dashboard/record_sumary') ?>"><img src="<?php echo base_url('assets/images/icons/lifeline-of-heartbeats-on-a-paper-on-a-clipboard.svg'); ?>" class="btn" /></a>
        <!-- ปิด form สำหรับบันทึกรายการตรวจ -->
        <hr />
        <div class="container">
            <ul class="nav nav-pills">
                <li><a href="<?php echo base_url('dashboard/record_certification_job') ?>"> ใบรับรองแพทย์ สมัครงาน</a></li>
                <li class="active"><a href="<?php echo base_url('dashboard/record_certification_sick') ?>"> ใบรับรองแพทย์ ลาป่วย</a></li>
            </ul>
        </div>
        <div id="Person-5" class="box">
            <div class="box-header">
                <i class="icon-user icon-large"></i>
                <h5>Medical Certification</h5>
                <a class="btn btn-box-right" href="#SickModal" role="button" class="btn" data-toggle="modal">
                    <i class="icon-plus-sign"></i> Add</a>
                <a class="btn btn-box-right" href="">
                    <i class="icon-print"></i> Print</a>
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
                        $sick = $this->db->get_where('tbpatient_sick', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid));
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
                                        <i class="icon-edit"></i> Edit</a>
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
        <input name="Price" class="input-large" type="number" placeholder="ราคา" style="margin-right: 380px; margin-bottom: 0px;">
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
            <input name="Price" class="input-large" type="number" id="price" placeholder="ราคา" style="margin-right: 380px; margin-bottom: 0px;">
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