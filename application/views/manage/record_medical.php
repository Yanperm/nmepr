<style>
    body .modal {
        width: 75%;
        left: 12%;
        margin-left: auto;
        margin-right: auto;
    }

    .modeledit {
        width: 27% !important;
        left: 36% !important;
        margin-left: auto;
        margin-right: auto;
    }

    .toolbar_right {
        float: right;
    }
</style>

<!-- ตาราง -->
<div class="container">
    <div class="content">
        <?php $booking = $this->db->get_where('tbbooking', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid))->row(); ?>
        <!-- form สำหรับบันทึกรายการตรวจ -->
        <a href="<?php echo base_url('dashboard/record_patienr') ?>"><img src="<?php echo base_url('assets/images/icons/person-with-broken-arm.svg'); ?>" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_medical') ?>"><img src="<?php echo base_url('assets/images/icons/pill.svg'); ?>" width="32px" height="32px" class="btn btn-info" /></a>
        <a href="<?php echo base_url('dashboard/record_lab') ?>"><img src="<?php echo base_url('assets/images/icons/chemistry-flask-with-liquid.svg'); ?>" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_procedure') ?>"><img src="<?php echo base_url('assets/images/icons/drug.svg'); ?>" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_certification') ?>"><img src="<?php echo base_url('assets/images/icons/certification.svg'); ?>" width="32px" height="32px" class="btn" /></a>
        <a href="<?php echo base_url('dashboard/record_sumary') ?>"><img src="<?php echo base_url('assets/images/icons/lifeline-of-heartbeats-on-a-paper-on-a-clipboard.svg'); ?>" class="btn" /></a>
        <!-- ปิด form สำหรับบันทึกรายการตรวจ -->
        <hr />
        <div class="container">
            <div class="" style="float: right;">
                <a class="btn btn-primary" href="<?php echo base_url('dashboard/record_medical') ?>" style=" width: 90px; ">วันนี้</a>
                <a class="btn" href="<?php echo base_url('dashboard/record_medical_history') ?>" style=" width: 90px; ">ประวัติ</a>
            </div>
        </div>
        <br>
        <div id="Person-5" class="box">
            <div class="box-header">
                <i class="icon-user icon-large"></i>
                <h5>Medical Record</h5>
                <?php if ($booking->payment == 0) { ?>
                    <a class="btn btn-box-right" href="#MedicalModal" role="button" class="btn" data-toggle="modal">
                        <i class="icon-plus-sign"></i> Add</a>
                    <a class="btn btn-box-right" href="<?php echo base_url('report/report_druglabel/' . $patientid . '/' . $bookingid . '/all') ?>" target="_blank">
                        <i class="icon-print"></i> พิมพ์ฉลากยา</a>
                    <a class="btn btn-box-right" href="<?php echo base_url('report/report_prescription/' . $patientid . '/' . $bookingid) ?>" target="_blank">
                        <i class="icon-print"></i> พิมพ์ใบสั่งยา</a>
                <?php } ?>
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
                            <th>หมายเหตุ</th>
                            <th>จำนวนหน่วย</th>
                            <th>หน่วย</th>
                            <th>ราคา</th>
                            <th class="td-actions"><i class="icon-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        date_default_timezone_set('Asia/Bangkok');
                        $Dash = $this->db->get_where('tbpatient_medical', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid, 'Status' => '0'));
                        foreach ($Dash->result() as $row) {
                            $hisid = $row->MEDICALID;
                        ?>
                            <tr>
                                <td align="center"><?php echo date("d-m-Y", strtotime($row->CREATE)); ?></td>
                                <td><?php echo $row->BOOKINGID; ?></td>
                                <td><?php echo $row->PH9; ?></td>
                                <td align="center"><?php echo $row->PH3; ?></td>
                                <td><?php echo $row->PH4; ?></td>
                                <td><?php echo $row->PH5; ?></td>
                                <td><?php echo $row->PH6; ?></td>
                                <td><?php echo $row->COMMENT; ?></td>
                                <td align="center"><?php echo $row->Number; ?></td>
                                <td><?php echo $row->Unit; ?></td>
                                <td><?php echo $row->Number*$row->PH8; ?></td>
                                <td class="td-actions" style="width: 150px" align="center">
                                    <a href="#EditMedicalModal" role="button" class="btn btn-mini btn-warning" data-toggle="modal" id="selectsmedicals" data-imedpregcat="<?php echo $row->PregCat ?>" data-imedunit="<?php echo $row->Unit ?>" data-imednumber="<?php echo $row->Number ?>" data-imedid="<?php echo $row->MEDICALID ?>" data-imedicalbrandname="<?php echo $row->PH1 ?>" data-imedicalname="<?php echo $row->PH9 ?>" data-imedicalindication="<?php echo $row->PH2 ?>" data-imedicalcountunit="<?php echo $row->PH3 ?>" data-imedicalcallingunit="<?php echo $row->PH4 ?>" data-imedicalfrequency="<?php echo $row->PH5 ?>" data-imedicalmeal="<?php echo $row->PH6 ?>" data-imedicalsuggestion="<?php echo $row->PH7 ?>" data-imedicalcomment="<?php echo $row->COMMENT ?>" data-imedicalprice="<?php echo $row->Number*$row->PH8 ?>">
                                        <i class="icon-edit"></i> Edit</a>
                                    <a href="<?php echo base_url('patient/patient_medicaldelete/' . $hisid) ?>" class="btn btn-mini btn-danger" onclick="return confirm('ยืนยันการลบข้อมูล')">
                                        <i class="icon-remove"></i> Remove
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- เพิ่ม -->
<div id="MedicalModal" class="modal modal-lg hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Medical Record</h3>
    </div>
    <div class="modal-body">
        <div class="span12">
            <div class="form-group" id="filter_col5" data-column="5">
                <select name="" class="form-control column_filter toolbar_right" id="col5_filter">
                    <option value="">เลือกกลุ่มยารอง</option>
                </select>
            </div>
            <div class="form-group" id="filter_col6" data-column="6">
                <select name="" class="form-control column_filter toolbar_right" id="col6_filter">
                    <option value="">กลุ่มยาหลัก</option>
                    <?php
                    $cat = $this->db->get_where('tbproductcategory', array('CLINICID' => $this->session->userdata('CLINICID')));
                    foreach ($cat->result() as $catrow) {
                    ?>
                        <option value="<?php echo $catrow->CategoryName; ?>"><?php echo $catrow->CategoryName; ?></option>
                    <?php } ?>
                </select>
            </div>
            <script>
                $('#col6_filter').change(function() {
                    var col6_filter = $('#col6_filter').val();
                    if (col6_filter != '') {
                        $.ajax({
                            url: "<?php echo base_url('product/fetch_subcategory'); ?>",
                            type: "POST",
                            data: {
                                CategoryName: col6_filter
                            },
                            success: function(data) {
                                $('#col5_filter').html(data);
                            }
                        });
                    } else {
                        $('#col5_filter').html('<option value="">เลือกกลุ่มยารอง</option>');
                    }
                });

                $(document).ready(function() {
                    $('#TableMedical').DataTable({
                        "lengthChange": false
                    });
                });

                function filterColumn(i) {
                    $('#TableMedical').DataTable().column(i).search(
                        $('#col' + i + '_filter').val()
                    ).draw();
                }
                $('select.column_filter').on('change', function() {
                    filterColumn($(this).parents('div').attr('data-column'));
                });
            </script>
            <table border="1" id="TableMedical" class="table-condensed table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th>เลือกยา</th>
                        <th>รหัสยา</th>
                        <th>ชื่อการค้า</th>
                        <th>ชื่อสามัญ</th>
                        <th>Barcode</th>
                        <th>กลุ่มยารอง</th>
                        <th>กลุ่มยาหลัก</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $procedure = $this->db->get_where('tbproducts', array('CLINICID' => $this->session->userdata('CLINICID')));
                    foreach ($procedure->result() as $procedurerow) {
                    ?>
                        <tr>
                            <td align="center">
                                <button class="btn btn-mini btn-info" id="selectsmedical" data-medicalpregcat="<?php echo $procedurerow->PregCat ?>" data-medicalbarcode="<?php echo $procedurerow->Barcode ?>" data-medicalpayday="<?php echo $procedurerow->Duration ?>" data-medicalnumber="1" data-medicalunit="<?php echo $procedurerow->Unit ?>" data-medicalid="<?php echo $procedurerow->ProductID ?>" data-medicalname="<?php echo $procedurerow->CommonName ?>" data-medicalprice="<?php echo $procedurerow->PriceSale ?>" data-medicaldigit="<?php echo $procedurerow->Digit ?>" data-medicalsamaryamount="<?php echo $procedurerow->SamaryAmount ?>" data-medicalbrandname="<?php echo $procedurerow->BrandName ?>" data-medicalindication="<?php echo $procedurerow->Indication ?>" data-medicalcountunit="<?php echo $procedurerow->CountUnit ?>" data-medicalcallingunit="<?php echo $procedurerow->CallingUnit ?>" data-medicalfrequency="<?php echo $procedurerow->Frequency ?>" data-medicalmeal="<?php echo $procedurerow->Meal ?>" data-medicalsuggestion="<?php echo $procedurerow->Suggestion ?>">
                                    เลือกยา
                                </button>
                            </td>
                            <td><?php echo $procedurerow->ProID; ?></td>
                            <td><?php echo $procedurerow->BrandName; ?></td> 
                            <td><?php echo $procedurerow->CommonName; ?></td>                                                       
                            <td><?php echo $procedurerow->Barcode; ?></td>
                            <td>
                                <?php
                                $sub = $this->db->get_where('tbsubcategory', array('SubID' => $procedurerow->SubID));
                                $subrow = $sub->row();
                                echo $subrow->SubName;
                                ?>
                            </td>
                            <td>
                                <?php
                                $Category = $this->db->get_where('tbproductcategory', array('CategoryID' => $procedurerow->CategoryID));
                                $Categoryrow = $Category->row();
                                echo $Categoryrow->CategoryName;
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="span6">
            <form action="<?php echo base_url('patient/patient_medical') ?>" method="POST">
                <fieldset>
                    <div class="control-group ">
                        <input type="hidden" class="span7" name="IDCARD" value="<?php echo $patientid; ?>">
                        <label class="control-label">ชื่อการค้า <span class="required">*</span></label>
                        <div class="controls">
                            <input name="PH9" class="span6" id="medicalbrandname" readonly type="text" value="" autocomplete="false" required="">
                        </div>
                        
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ชื่อสามัญ <span class="required">*</span></label>
                        <div class="controls">
                            <input name="PH1" class="span6" id="medicalname" readonly type="text" value="" autocomplete="false" required="">
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ข้อบ่งใช้ <span class="required">*</span></label>
                        <div class="controls">
                            <input name="PH2" class="span6" id="medicalindication" type="text" value="" autocomplete="false" required="">
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ครั้งละ <span class="required">*</span></label>
                        <div class="controls">
                            <select name="PH3" class="span2" id="medicalcountunit" required="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="1/2">1/2</option>
                                <option value="1 1/2">1 1/2</option>
                                <option value="2.5">2.5</option>
                                <option value="5">5</option>
                                <option value="ใช้ทา">ใช้ทา</option>
                                <option value="ใช้หยอด">ใช้หยอด</option>
                                <option value="ใช้เหน็บ">ใช้เหน็บ</option>
                                <option value="ใช้สอด">ใช้สอด</option>
                                <option value="ใช้พ่น">ใช้พ่น</option>
                                <option value="ใช้ฉีด">ใช้ฉีด</option>
                            </select>
                            <select name="PH4" class="span4" id="medicalcallingunit" required="">
                                <option value="ไม่ระบุ">ไม่ระบุ</option>
                                <option value="เม็ด">เม็ด</option>
                                <option value="แคปซูล">แคปซูล</option>
                                <option value="ช้อนชา">ช้อนชา</option>
                                <option value="ช้อนโต๊ะ">ช้อนโต๊ะ</option>
                                <option value="ซีซี">ซีซี</option>
                                <option value="มิลลิลิตร">มิลลิลิตร</option>
                                <option value="หยด">หยด</option>
                                <option value="ซอง">ซอง</option>
                                <option value="หลอด">หลอด</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ความถี่ <span class="required">*</span></label>
                        <div class="controls">
                            <select name="PH5" class="span2" id="medicalfrequency" required="">
                                <option value="ไม่ระบุ">ไม่ระบุ</option>
                                <option value="วันละ 1 ครั้ง">วันละ 1 ครั้ง</option>
                                <option value="วันละ 2 ครั้ง">วันละ 2 ครั้ง</option>
                                <option value="วันละ 3 ครั้ง">วันละ 3 ครั้ง</option>
                                <option value="วันละ 4 ครั้ง">วันละ 4 ครั้ง</option>
                                <option value="ในตอนเช้า">ในตอนเช้า</option>
                                <option value="ในตอนเที่ยง">ในตอนเที่ยง</option>
                                <option value="ในตอนเย็น">ในตอนเย็น</option>
                                <option value="ก่อนนอน">ก่อนนอน</option>
                                <option value="ในตอนเช้า-เย็น">ในตอนเช้า-เย็น</option>
                                <option value="ในตอนเช้า-เที่ยง-เย็น">ในตอนเช้า-เที่ยง-เย็น</option>
                                <option value="ในตอนเช้า-เที่ยง-เย็น-ก่อนนอน">ในตอนเช้า-เที่ยง-เย็น-ก่อนนอน</option>
                                <option value="ทุกๆ 1 ชั่วโมง">ทุกๆ 1 ชั่วโมง</option>
                                <option value="ทุกๆ 2 ชั่วโมง">ทุกๆ 2 ชั่วโมง</option>
                                <option value="ทุกๆ 4 ชั่วโมง">ทุกๆ 4 ชั่วโมง</option>
                                <option value="ทุกๆ 6 ชั่วโมง">ทุกๆ 6 ชั่วโมง</option>
                                <option value="ทุกๆ 8 ชั่วโมง">ทุกๆ 8 ชั่วโมง</option>
                                <option value="ทุกๆ 12 ชั่วโมง">ทุกๆ 12 ชั่วโมง</option>
                            </select>

                            <select name="PH6" class="span4" id="medicalmeal" required="">
                                <option value="ไม่ระบุ">ไม่ระบุ</option>
                                <option value="หลังอาหารเช้า">หลังอาหารเช้า</option>
                                <option value="หลังอาหารเช้า-เย็น">หลังอาหารเช้า-เย็น</option>
                                <option value="หลังอาหารเช้า-เที่ยง-เย็น">หลังอาหารเช้า-เที่ยง-เย็น</option>
                                <option value="หลังอาหารเช้า-เที่ยง-เย็น-ก่อนนอน">หลังอาหารเช้า-เที่ยง-เย็น-ก่อนนอน</option>
                                <option value="ก่อนอาหารเช้า">ก่อนอาหารเช้า</option>
                                <option value="ก่อนอาหารเช้า-เย็น">ก่อนอาหารเช้า-เย็น</option>
                                <option value="ก่อนอาหารเช้า-เที่ยง-เย็น">ก่อนอาหารเช้า-เที่ยง-เย็น</option>
                                <option value="ก่อนอาหารเช้า-เที่ยง-เย็น-ก่อนนอน">ก่อนอาหารเช้า-เที่ยง-เย็น-ก่อนนอน</option>
                                <option value="พร้อมอาหารเช้า">พร้อมอาหารเช้า</option>
                                <option value="พร้อมอาหารเช้า-เย็น">พร้อมอาหารเช้า-เย็น</option>
                                <option value="พร้อมอาหารเช้า-เที่ยง-เย็น">พร้อมอาหารเช้า-เที่ยง-เย็น</option>
                                <option value="พร้อมอาหารเช้า-เที่ยง-เย็น-ก่อนนอน">พร้อมอาหารเช้า-เที่ยง-เย็น-ก่อนนอน</option>
                                <option value="ตอนท้องว่าง">ตอนท้องว่าง</option>
                                <option value="เมื่อมีอาการ">เมื่อมีอาการ</option>
                                <option value="ก่อนนอน">ก่อนนอน</option>
                                <option value="ก่อนอาหารเย็น">ก่อนอาหารเย็น</option>
                                <option value="หลังอาหารเย็น">หลังอาหารเย็น</option>
                            </select>
                        </div>

                        <div class="controls">

                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ข้อแนะนำ <span class="required">*</span></label>
                        <div class="controls">
                            <select name="PH7" class="span6" id="medicalsuggestion" required="">
                                <option value="">ข้อแนะนำ</option>
                                <option value="ไม่ระบุ">ไม่ระบุ</option>
                                <option value="รับประทานหลังอาหารทันที">รับประทานหลังอาหารทันที</option>
                                <option value="รับประทานต่อเนื่องจนกว่ายาจะหมด">รับประทานต่อเนื่องจนกว่ายาจะหมด</option>
                                <option value="รับประทานยานี้แล้วอาจทำให้ง่วงซึม">รับประทานยานี้แล้วอาจทำให้ง่วงซึม</option>
                                <option value="บริเวณที่เป็น">บริเวณที่เป็น</option>
                                <option value="ทั้งสองข้าง">ทั้งสองข้าง</option>
                                <option value="ข้างซ้าย">ข้างซ้าย</option>
                                <option value="ข้างขวา">ข้างขวา</option>
                                <option value="ทันที">ทันที</option>
                                <option value="รับประทานก่อนอาหาร 30 นาที">รับประทานก่อนอาหาร 30 นาที</option>
                                <option value="รับประทานก่อนอาหาร 1 ชั่วโมง">รับประทานก่อนอาหาร 1 ชั่วโมง</option>
                                <option value="รับประทานก่อนอาหาร 2 ชั่วโมง">รับประทานก่อนอาหาร 2 ชั่วโมง</option>
                                <option value="ใช้สวนทวาร">ใช้สวนทวาร</option>
                                <option value="ทานตอนท้องว่าง">ทานตอนท้องว่าง</option>
                                <option value="ละลายน้ำ ครึ่ง แก้วแล้วดื่มให้หมด">ละลายน้ำ ครึ่ง แก้วแล้วดื่มให้หมด</option>
                                <option value="ละลายน้ำ 1 แก้วแล้วดื่มให้หมด">ละลายน้ำ 1 แก้วแล้วดื่มให้หมด</option>
                                <option value="ละลายน้ำ 1 แก้วแล้วดื่มให้หมด">หยอดหูเป็นเวลา 15 นาที</option>
                                <option value="ทานเม็ดแรกทันที ภายใน 24  ชั่วโมง หลังมีเพศสัมพันธ์ ทานเม็ดที่สอง  หลังจากเม็ดแรก 12 ชั่วโมง">ทานเม็ดแรกทันที ภายใน 24  ชั่วโมง หลังมีเพศสัมพันธ์ ทานเม็ดที่สอง  หลังจากเม็ดแรก 12 ชั่วโมง</option>
                                <option value="ไม่ควรรับประทานพร้อมกับดื่มนม">ไม่ควรรับประทานพร้อมกับดื่มนม</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">หมายเหตุ <span class="required">*</span></label>
                        <input name="COMMENT" type="text" class="span6" id="medicalcomment" value="">
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ระยะเวลา <span class="required">*</span></label>
                        <input name="PAYDAY" type="number" step="1" min="5" value="5" class="span4" id="medicalpayday" value="">
                        <input name="" type="text" value="วัน" class="span2" readonly>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">จำนวนหน่วย <span class="required">*</span></label>
                        <div class="controls">
                            <input name="Number" type="number" class="span4" id="medicalnumber">
                            <input name="Unit" type="text" class="span2" id="medicalunit" readonly>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ราคา <span class="required">*</span></label>
                        <input name="PH8" class="span6" id="medicalprice" readonly type="number" value="" required="">
                    </div>
                    <div class="control-group " style="float: left;margin-top: 20px;">
                        <label class="control-label">Preg Cat</label>
                    </div>
                    <div id="medicalpregcat" class="control-group " style="float: left; margin-left: 20px;">
                    </div>
                </fieldset>
                <input type="hidden" name="PregCat" id="hmedicalpregcat">
                <input type="hidden" name="Barcode" id="medicalbarcode">
                <button class="btn btn-primary" type="submit">ยืนยัน</button>
            </form>
        </div>
    </div>
    <div class="modal-footer">
    </div>
</div>
<!-- แก้ไข -->
<div id="EditMedicalModal" class="modal modal-lg hide fade modeledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Edit Medical Record</h3>
    </div>
    <div class="modal-body">
        <div class="span6">
            <form action="<?php echo base_url('patient/patient_updatemedical') ?>" method="POST">
                <fieldset>

                    <div class="control-group ">
                        <input type="hidden" class="span7" name="MEDICALID" id="imedid" value="">
                        <input type="hidden" class="span7" name="IDCARD" value="<?php echo $patientid; ?>">
                        <label class="control-label">ชื่อการค้า <span class="required">*</span></label>
                        <div class="controls">
                            <input name="PH1" class="span6" id="imedicalbrandname" readonly type="text" value="" autocomplete="false" required="">
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ชื่อสามัญ <span class="required">*</span></label>
                        <div class="controls">
                            <input name="PH9" class="span6" id="imedicalname" readonly type="text" value="" autocomplete="false" required="">
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ข้อบ่งใช้ <span class="required">*</span></label>
                        <div class="controls">
                            <input name="PH2" class="span6" id="imedicalindication" type="text" value="" autocomplete="false" required="">
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ครั้งละ <span class="required">*</span></label>
                        <div class="controls">
                        <select name="PH3" class="span2" id="medicalcountunit" required="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="1/2">1/2</option>
                                <option value="1 1/2">1 1/2</option>
                                <option value="2.5">2.5</option>
                                <option value="5">5</option>
                                <option value="ใช้ทา">ใช้ทา</option>
                                <option value="ใช้หยอด">ใช้หยอด</option>
                                <option value="ใช้เหน็บ">ใช้เหน็บ</option>
                                <option value="ใช้สอด">ใช้สอด</option>
                                <option value="ใช้พ่น">ใช้พ่น</option>
                                <option value="ใช้ฉีด">ใช้ฉีด</option>
                            </select>
                            <select name="PH4" class="span4" id="medicalcallingunit" required="">
                                <option value="ไม่ระบุ">ไม่ระบุ</option>
                                <option value="เม็ด">เม็ด</option>
                                <option value="แคปซูล">แคปซูล</option>
                                <option value="ช้อนชา">ช้อนชา</option>
                                <option value="ช้อนโต๊ะ">ช้อนโต๊ะ</option>
                                <option value="ซีซี">ซีซี</option>
                                <option value="มิลลิลิตร">มิลลิลิตร</option>
                                <option value="หยด">หยด</option>
                                <option value="ซอง">ซอง</option>
                                <option value="หลอด">หลอด</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ความถี่ <span class="required">*</span></label>
                        <div class="controls">
                        <select name="PH5" class="span2" id="medicalfrequency" required="">
                                <option value="ไม่ระบุ">ไม่ระบุ</option>
                                <option value="วันละ 1 ครั้ง">วันละ 1 ครั้ง</option>
                                <option value="วันละ 2 ครั้ง">วันละ 2 ครั้ง</option>
                                <option value="วันละ 3 ครั้ง">วันละ 3 ครั้ง</option>
                                <option value="วันละ 4 ครั้ง">วันละ 4 ครั้ง</option>
                                <option value="ในตอนเช้า">ในตอนเช้า</option>
                                <option value="ในตอนเที่ยง">ในตอนเที่ยง</option>
                                <option value="ในตอนเย็น">ในตอนเย็น</option>
                                <option value="ก่อนนอน">ก่อนนอน</option>
                                <option value="ในตอนเช้า-เย็น">ในตอนเช้า-เย็น</option>
                                <option value="ในตอนเช้า-เที่ยง-เย็น">ในตอนเช้า-เที่ยง-เย็น</option>
                                <option value="ในตอนเช้า-เที่ยง-เย็น-ก่อนนอน">ในตอนเช้า-เที่ยง-เย็น-ก่อนนอน</option>
                                <option value="ทุกๆ 1 ชั่วโมง">ทุกๆ 1 ชั่วโมง</option>
                                <option value="ทุกๆ 2 ชั่วโมง">ทุกๆ 2 ชั่วโมง</option>
                                <option value="ทุกๆ 4 ชั่วโมง">ทุกๆ 4 ชั่วโมง</option>
                                <option value="ทุกๆ 6 ชั่วโมง">ทุกๆ 6 ชั่วโมง</option>
                                <option value="ทุกๆ 8 ชั่วโมง">ทุกๆ 8 ชั่วโมง</option>
                                <option value="ทุกๆ 12 ชั่วโมง">ทุกๆ 12 ชั่วโมง</option>
                            </select>

                            <select name="PH6" class="span4" id="medicalmeal" required="">
                                <option value="ไม่ระบุ">ไม่ระบุ</option>
                                <option value="หลังอาหารเช้า">หลังอาหารเช้า</option>
                                <option value="หลังอาหารเช้า-เย็น">หลังอาหารเช้า-เย็น</option>
                                <option value="หลังอาหารเช้า-เที่ยง-เย็น">หลังอาหารเช้า-เที่ยง-เย็น</option>
                                <option value="หลังอาหารเช้า-เที่ยง-เย็น-ก่อนนอน">หลังอาหารเช้า-เที่ยง-เย็น-ก่อนนอน</option>
                                <option value="ก่อนอาหารเช้า">ก่อนอาหารเช้า</option>
                                <option value="ก่อนอาหารเช้า-เย็น">ก่อนอาหารเช้า-เย็น</option>
                                <option value="ก่อนอาหารเช้า-เที่ยง-เย็น">ก่อนอาหารเช้า-เที่ยง-เย็น</option>
                                <option value="ก่อนอาหารเช้า-เที่ยง-เย็น-ก่อนนอน">ก่อนอาหารเช้า-เที่ยง-เย็น-ก่อนนอน</option>
                                <option value="พร้อมอาหารเช้า">พร้อมอาหารเช้า</option>
                                <option value="พร้อมอาหารเช้า-เย็น">พร้อมอาหารเช้า-เย็น</option>
                                <option value="พร้อมอาหารเช้า-เที่ยง-เย็น">พร้อมอาหารเช้า-เที่ยง-เย็น</option>
                                <option value="พร้อมอาหารเช้า-เที่ยง-เย็น-ก่อนนอน">พร้อมอาหารเช้า-เที่ยง-เย็น-ก่อนนอน</option>
                                <option value="ตอนท้องว่าง">ตอนท้องว่าง</option>
                                <option value="เมื่อมีอาการ">เมื่อมีอาการ</option>
                                <option value="ก่อนนอน">ก่อนนอน</option>
                                <option value="ก่อนอาหารเย็น">ก่อนอาหารเย็น</option>
                                <option value="หลังอาหารเย็น">หลังอาหารเย็น</option>
                            </select>
                        </div>

                        <div class="controls">

                        </div>
                    </div>
                    <div class="control-group ">
                        <div class="control-group ">
                            <label class="control-label">ข้อแนะนำ <span class="required">*</span></label>
                            <div class="controls">
                            <select name="PH7" class="span6" id="medicalsuggestion" required="">
                                <option value="">ข้อแนะนำ</option>
                                <option value="ไม่ระบุ">ไม่ระบุ</option>
                                <option value="รับประทานหลังอาหารทันที">รับประทานหลังอาหารทันที</option>
                                <option value="รับประทานต่อเนื่องจนกว่ายาจะหมด">รับประทานต่อเนื่องจนกว่ายาจะหมด</option>
                                <option value="รับประทานยานี้แล้วอาจทำให้ง่วงซึม">รับประทานยานี้แล้วอาจทำให้ง่วงซึม</option>
                                <option value="บริเวณที่เป็น">บริเวณที่เป็น</option>
                                <option value="ทั้งสองข้าง">ทั้งสองข้าง</option>
                                <option value="ข้างซ้าย">ข้างซ้าย</option>
                                <option value="ข้างขวา">ข้างขวา</option>
                                <option value="ทันที">ทันที</option>
                                <option value="รับประทานก่อนอาหาร 30 นาที">รับประทานก่อนอาหาร 30 นาที</option>
                                <option value="รับประทานก่อนอาหาร 1 ชั่วโมง">รับประทานก่อนอาหาร 1 ชั่วโมง</option>
                                <option value="รับประทานก่อนอาหาร 2 ชั่วโมง">รับประทานก่อนอาหาร 2 ชั่วโมง</option>
                                <option value="ใช้สวนทวาร">ใช้สวนทวาร</option>
                                <option value="ทานตอนท้องว่าง">ทานตอนท้องว่าง</option>
                                <option value="ละลายน้ำ ครึ่ง แก้วแล้วดื่มให้หมด">ละลายน้ำ ครึ่ง แก้วแล้วดื่มให้หมด</option>
                                <option value="ละลายน้ำ 1 แก้วแล้วดื่มให้หมด">ละลายน้ำ 1 แก้วแล้วดื่มให้หมด</option>
                                <option value="ละลายน้ำ 1 แก้วแล้วดื่มให้หมด">หยอดหูเป็นเวลา 15 นาที</option>
                                <option value="ทานเม็ดแรกทันที ภายใน 24  ชั่วโมง หลังมีเพศสัมพันธ์ ทานเม็ดที่สอง  หลังจากเม็ดแรก 12 ชั่วโมง">ทานเม็ดแรกทันที ภายใน 24  ชั่วโมง หลังมีเพศสัมพันธ์ ทานเม็ดที่สอง  หลังจากเม็ดแรก 12 ชั่วโมง</option>
                                <option value="ไม่ควรรับประทานพร้อมกับดื่มนม">ไม่ควรรับประทานพร้อมกับดื่มนม</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">หมายเหตุ <span class="required">*</span></label>
                        <input name="COMMENT" type="text" class="span6" id="imedicalcomment" value="">
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ระยะเวลา <span class="required">*</span></label>
                        <input name="PAYDAY" type="number" step="1" min="5" value="5" class="span4" id="imedicalpayday" value="">
                        <input name="" type="text" value="วัน" class="span2" readonly>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">จำนวนหน่วย <span class="required">*</span></label>
                        <div class="controls">
                            <input name="Number" type="number" class="span4" id="imednumber">
                            <input name="Unit" type="text" class="span2" id="imedunit" readonly>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ราคา <span class="required">*</span></label>
                        <input name="PH8" class="span6" id="imedicalprice" readonly type="number" value="" required="">
                    </div>
                    <div class="control-group " style="float: left;margin-top: 20px;">
                        <label class="control-label">Preg Cat</label>
                    </div>
                    <div id="imedpregcat" class="control-group " style="float: left; margin-left: 20px;">
                    </div>
                </fieldset>
                <button class="btn btn-block btn-large btn-warning" type="submit"><i class="icon-reorder"></i> ปรับปรุงรายการยาคนไข้</button>
            </form>

        </div>
    </div>
    <div class="modal-footer">
    </div>
</div>

<!-- สำคัญปิดส่วนหัวไฟล์ patientprofilehead.php -->
</div> <!-- <div class="box" style="background-color: #F0F0F0"> -->
</div> <!-- <div class="box-content box-table"> -->

<script>
    $(document).ready(function() {
        $(document).on('click', '#selectsmedical', function() {
            var medicalid = $(this).data('medicalid');
            var medicalnumber = $(this).data('medicalnumber');
            var medicalunit = $(this).data('medicalunit');
            var medicalpregcat = $(this).data('medicalpregcat');
            var medicalname = $(this).data('medicalname');
            var medicalprice = $(this).data('medicalprice');
            var medicaldigit = $(this).data('medicaldigit');
            var medicalpayday = $(this).data('medicalpayday');
            var medicalsamaryamount = $(this).data('medicalsamaryamount');
            var medicalbrandname = $(this).data('medicalbrandname');
            var medicalindication = $(this).data('medicalindication');
            var medicalcountunit = $(this).data('medicalcountunit');
            var medicalcallingunit = $(this).data('medicalcallingunit');
            var medicalfrequency = $(this).data('medicalfrequency');
            var medicalmeal = $(this).data('medicalmeal');
            var medicalsuggestion = $(this).data('medicalsuggestion');
            var medicalbarcode = $(this).data('medicalbarcode');
            $('#medicalid').val(medicalid);
            $('#medicalnumber').val(medicalnumber);
            $('#medicalunit').val(medicalunit);
            if (medicalpregcat == "A") {
                $('#medicalpregcat').html('<h2 style=" padding-left: 10px; padding-right: 10px; background-color: #00b050; color: white; padding-bottom: 5px;">A</h2>');
            } else if (medicalpregcat == "B") {
                $('#medicalpregcat').html('<h2 style=" padding-left: 10px; padding-right: 10px; background-color: #92D050; color: white; padding-bottom: 5px;">B</h2>');
            } else if (medicalpregcat == "C") {
                $('#medicalpregcat').html('<h2 style=" padding-left: 10px; padding-right: 10px; background-color: #FFC000; color: white; padding-bottom: 5px;">C</h2>');
            } else if (medicalpregcat == "D") {
                $('#medicalpregcat').html('<h2 style=" padding-left: 10px; padding-right: 10px; background-color: #C00000; color: white; padding-bottom: 5px;">D</h2>');
            } else if (medicalpregcat == "X") {
                $('#medicalpregcat').html('<h2 style=" padding-left: 10px; padding-right: 10px; background-color: #000000; color: white; padding-bottom: 5px;">X</h2>');
            } else {
                $('#medicalpregcat').html('');
            }
            $('#hmedicalpregcat').val(medicalpregcat);
            $('#medicalname').val(medicalname);
            $('#medicalprice').val(medicalprice);
            $('#medicaldigit').val(medicaldigit);
            $('#medicalsamaryamount').val(medicalsamaryamount);
            $('#medicalbrandname').val(medicalbrandname);
            $('#medicalpayday').val(medicalpayday);
            $('#medicalindication').val(medicalindication);
            $('#medicalcountunit').val(medicalcountunit);
            $('#medicalcallingunit').val(medicalcallingunit);
            $('#medicalfrequency').val(medicalfrequency);
            $('#medicalmeal').val(medicalmeal);
            $('#medicalsuggestion').val(medicalsuggestion);
            $('#medicalbarcode').val(medicalbarcode);
            $('#model-item').modal('hide');
        })
    })

    $(document).ready(function() {
        $(document).on('click', '#selectsmedicals', function() {
            var imedid = $(this).data('imedid');
            var imednumber = $(this).data('imednumber');
            var imedunit = $(this).data('imedunit');
            var imedpregcat = $(this).data('imedpregcat');
            var imedicalname = $(this).data('imedicalname');
            var imedicalprice = $(this).data('imedicalprice');
            var imedicaldigit = $(this).data('imedicaldigit');
            var imedicalpayday = $(this).data('imedicalpayday');
            var imedicalsamaryamount = $(this).data('imedicalsamaryamount');
            var imedicalbrandname = $(this).data('imedicalbrandname');
            var imedicalindication = $(this).data('imedicalindication');
            var imedicalcountunit = $(this).data('imedicalcountunit');
            var imedicalcallingunit = $(this).data('imedicalcallingunit');
            var imedicalfrequency = $(this).data('imedicalfrequency');
            var imedicalmeal = $(this).data('imedicalmeal');
            var imedicalsuggestion = $(this).data('imedicalsuggestion');
            var imedicalcomment = $(this).data('imedicalcomment');
            $('#imedid').val(imedid);
            $('#imednumber').val(imednumber);
            $('#imedunit').val(imedunit);
            if (imedpregcat == "A") {
                $('#imedpregcat').html('<h2 style=" padding-left: 10px; padding-right: 10px; background-color: #00b050; color: white; padding-bottom: 5px;">A</h2>');
            } else if (imedpregcat == "B") {
                $('#imedpregcat').html('<h2 style=" padding-left: 10px; padding-right: 10px; background-color: #92D050; color: white; padding-bottom: 5px;">B</h2>');
            } else if (imedpregcat == "C") {
                $('#imedpregcat').html('<h2 style=" padding-left: 10px; padding-right: 10px; background-color: #FFC000; color: white; padding-bottom: 5px;">C</h2>');
            } else if (imedpregcat == "D") {
                $('#imedpregcat').html('<h2 style=" padding-left: 10px; padding-right: 10px; background-color: #C00000; color: white; padding-bottom: 5px;">D</h2>');
            } else if (imedpregcat == "X") {
                $('#imedpregcat').html('<h2 style=" padding-left: 10px; padding-right: 10px; background-color: #000000; color: white; padding-bottom: 5px;">X</h2>');
            } else {
                $('#imedpregcat').html('');
            }
            $('#imedicalname').val(imedicalname);
            $('#imedicalprice').val(imedicalprice);
            $('#imedicaldigit').val(imedicaldigit);
            $('#imedicalsamaryamount').val(imedicalsamaryamount);
            $('#imedicalpayday').val(imedicalpayday);
            $('#imedicalbrandname').val(imedicalbrandname);
            $('#imedicalindication').val(imedicalindication);
            $('#imedicalcountunit').val(imedicalcountunit);
            $('#imedicalcallingunit').val(imedicalcallingunit);
            $('#imedicalfrequency').val(imedicalfrequency);
            $('#imedicalmeal').val(imedicalmeal);
            $('#imedicalsuggestion').val(imedicalsuggestion);
            $('#imedicalcomment').val(imedicalcomment);
            $('#model-item').modal('hide');
        })
    })
</script>