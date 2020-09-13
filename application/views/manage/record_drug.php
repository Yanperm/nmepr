<style>
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

    .table th {
        text-align: center !important;
    }

    .table td {
        text-align: center !important;
    }
</style>
<div class="container">
    <section>
        <div id="Person-5" class="boxx">
            <div class="container">
                <div class="row">
                    <div class="span2">
                        <h4 style="margin-left: 10px;"><i class="icon-user icon-large"></i> ห้องยา</h4>
                    </div>
                    <div class="span4" style="margin-top: 5px;">
                        <button class="btn btn-success" href="">
                            All check
                        </button>
                    </div>
                    <div class="span10" style="margin-top: 5px;">
                        <a href="<?php echo base_url('patient/dispense/' . $patientid . '/' . $bookingid); ?>" class="btn btn-success toolbar_right">
                            รอจ่ายยา
                        </a>
                        <a href="<?php echo base_url('patient/preparation/' . $patientid . '/' . $bookingid); ?>" class="btn btn-success toolbar_right" style="margin-right: 10px;">
                            รอเตรียมยา
                        </a>
                    </div>
                </div>
            </div>
            <br>
            <div class="frame">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>วันที่</th>
                            <th>VN</th>
                            <th>ชื่อยา</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th>บาร์โค้ดตรวจสอบ</th>
                            <th style="width: 26px;"></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        date_default_timezone_set('Asia/Bangkok');
                        $count = 0;
                        $medical = $this->db->get_where('tbpatient_medical', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid));
                        foreach ($medical->result() as $medicalrow) {
                            $count++ ?>
                            <tr>
                                <td><?php echo date("d-m-Y", strtotime($medicalrow->CREATE)); ?></td>
                                <td><?php echo $medicalrow->BOOKINGID; ?></td>
                                <td><?php echo $medicalrow->PH9; ?></td>
                                <td><?php echo $medicalrow->PH8; ?></td>
                                <td><?php echo $medicalrow->Number; ?></td>
                                <td>
                                    <input type="number" name="check_<?php echo $count ?>" id="check_<?php echo $count ?>">
                                </td>
                                <td>
                                    <div id="iconcheck_<?php echo $count ?>" style=" margin-top: 7px; ">
                                    </div>
                                </td>
                                <td>
                                    <script>
                                        $(document).ready(function() {
                                            var check = <?php echo $medicalrow->Barcode; ?>;
                                            var number = <?php echo $count ?>;
                                            var trues = 0;
                                            $('#check_' + number).keyup(function() {
                                                var barcode = $(this).val();
                                                if (barcode == check) {
                                                    $('#iconcheck_' + number).html('<i class="far fa-check-circle" style="font-size:25px;color:#5bb75b;"></i>');
                                                    $('#d_checks_' + number).removeAttr("disabled")
                                                    trues = trues + 1;
                                                } else {
                                                    $('#iconcheck_' + number).html('<i class="far fa-times-circle" style="font-size:25px;color:#da4f49;"></i>');
                                                    // $('#check_' + number).val('');
                                                    $('#d_checks_' + number).attr("disabled", "true")
                                                }
                                            });
                                        });
                                    </script>
                                    <a id="d_checks_<?php echo $count ?>" href="<?php echo base_url('report/report_druglabel/' . $patientid . '/' . $bookingid . '/' . $medicalrow->MEDICALID) ?>" target="_blank" disabled class="btn btn-success">
                                        พิมพ์ฉลากยา
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

<!-- สำคัญปิดส่วนหัวไฟล์ patientprofilehead.php -->
</div> <!-- <div class="box" style="background-color: #F0F0F0"> -->
</div> <!-- <div class="box-content box-table"> -->