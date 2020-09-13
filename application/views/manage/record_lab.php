<style>
    body .modal {
        width: 40%;
        left: 30%;
        margin-left: auto;
        margin-right: auto;
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
        <a href="<?php echo base_url('dashboard/record_lab') ?>"><img src="<?php echo base_url('assets/images/icons/chemistry-flask-with-liquid.svg'); ?>" class="btn btn-info" /></a>
        <a href="<?php echo base_url('dashboard/record_procedure') ?>"><img src="<?php echo base_url('assets/images/icons/drug.svg'); ?>" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_certification') ?>"><img src="<?php echo base_url('assets/images/icons/certification.svg'); ?>" width="32px" height="32px" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_sumary') ?>"><img src="<?php echo base_url('assets/images/icons/lifeline-of-heartbeats-on-a-paper-on-a-clipboard.svg'); ?>" class="btn" /></a>
        <!-- ปิด form สำหรับบันทึกรายการตรวจ -->
        <hr />
        <div class="container">
            <div class="" style="float: right;">
                <a class="btn btn-primary" href="<?php echo base_url('dashboard/record_lab') ?>" style=" width: 90px; ">วันนี้</a>
                <a class="btn " href="<?php echo base_url('dashboard/record_lab_history') ?>" style=" width: 90px; ">ประวัติ</a>
            </div>
        </div>
        <br>
        <section>
            <div id="Person-5" class="box">
                <div class="box-header">
                    <i class="icon-user icon-large"></i>
                    <h5>Lab Record</h5>
                    <?php if ($booking->payment == 0) { ?>
                        <a class="btn btn-box-right" href="#LabModal" role="button" class="btn" data-toggle="modal">
                            <i class="icon-plus-sign"></i> Add
                        </a>
                        <a class="btn btn-box-right" href="<?php echo base_url('report/report_lab/' . $patientid . '/' . $bookingid) ?>" target="_blank">
                            <i class="icon-print"></i> Print</a>
                    <?php } ?>
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
                                <th><i class="icon-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            date_default_timezone_set('Asia/Bangkok');
                            $labs = $this->db->get_where('tbpatient_lab', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid, 'Status' => 0));
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
                                    <td class="td-actions" style="width: 100px" align="center">
                                        <a href="<?php echo base_url('patient/patient_labdelete/' . $hisid) ?>" class="btn btn-mini btn-danger" onclick="return confirm('ยืนยันการลบข้อมูล')">
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

<div id="LabModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Lab Record</h3>
    </div>
    <form action="<?php echo base_url('patient/patient_lab') ?>" method="POST">
        <div class="modal-body">
            <div class="form-group" id="filter_col3" data-column="3">
                <select name="" class="form-control column_filter toolbar_left" id="col3_filter">
                    <option value="">เลือกผู้รับตรวจ</option>
                    <?php
                    $com = $this->db->get_where('tblabscompany', array('CLINICID' => $this->session->userdata('CLINICID')));
                    foreach ($com->result() as $rowcom) {
                    ?>
                        <option value="<?php echo $rowcom->LabCName; ?>"><?php echo $rowcom->LabCName; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group" id="filter_col2" data-column="2">
                <select name="" class="form-control column_filter toolbar_right" id="col2_filter">
                    <option value="">เลือกแผนกส่งตรวจ</option>
                </select>
            </div>
            <table border="1" id="example" class="table-bordered" style="width: 100%">
                <thead>
                    <tr>
                        <th><input type="checkbox" onClick="toggle(this)" /> CheckAll</th>
                        <th>Test Name</th>
                        <th>Department</th>
                        <th>Company</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $number = 0;
                    $this->db->select('*');
                    $this->db->from('tbsenddepartment');
                    $this->db->join('tbdepartment', 'tbdepartment.DepID = tbsenddepartment.DepID');
                    $this->db->join('tblabscompany', 'tblabscompany.LabCID = tbsenddepartment.LabCID');
                    $this->db->where('tbsenddepartment.CLINICID', $this->session->userdata('CLINICID'));
                    $labdep = $this->db->get();
                    foreach ($labdep->result() as $labdeplow) { ?>
                        <tr>
                            <td align="center">
                                <input type="checkbox" name="foo[]" value="<?php echo $number ?>" />
                            </td>
                            <td><?php echo $labdeplow->STESTNAME; ?></td>
                            <input type="hidden" name="PH1<?php echo $number ?>" value="<?php echo $labdeplow->STESTNAME; ?>">
                            <td><?php echo $labdeplow->DepName; ?></td>
                            <input type="hidden" name="PH2<?php echo $number ?>" value="<?php echo $labdeplow->DepName; ?>">
                            <td><?php echo $labdeplow->LabCName; ?></td>
                            <input type="hidden" name="PH3<?php echo $number ?>" value="<?php echo $labdeplow->LabCName; ?>">
                            <td><?php echo $labdeplow->PriceSale; ?></td>
                            <input type="hidden" name="PH4<?php echo $number ?>" value="<?php echo $labdeplow->PriceSale; ?>">
                        </tr>
                    <?php ++$number;
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

<script>
    function toggle(source) {
        checkboxes = document.getElementsByName('foo[]');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    function filterColumn(i) {
        $('#example').DataTable().column(i).search(
            $('#col' + i + '_filter').val()
        ).draw();
    }
    $('select.column_filter').on('change', function() {
        filterColumn($(this).parents('div').attr('data-column'));
    });
    $(document).ready(function() {
        $('#example').DataTable({
            "lengthChange": false
        });
    });

    $('#col3_filter').change(function() {
        var col3_filter = $('#col3_filter').val();
        if (col3_filter != '') {
            $.ajax({
                url: "<?php echo base_url('senddepartment/fetch_department'); ?>",
                type: "POST",
                data: {
                    LabCName: col3_filter
                },
                success: function(data) {
                    $('#col2_filter').html(data);
                }
            });
        } else {
            $('#col2_filter').html('<option value="">เลือกแผนกส่งตรวจ</option>');
        }
    });
</script>