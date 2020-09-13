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
        overflow: auto;
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
<?php
$this->db->select('*');
$this->db->from('tbbooking');
$this->db->join('tbpatients', 'tbpatients.IDCARD = tbbooking.IDCARD', 'left');
$this->db->where('tbbooking.BOOKINGID', $bookingid);
$rowpb = $this->db->get()->row();
?>
<div class="container">
    <section>
        <div id="Person-5" class="boxx">
            <div class="box-header">
                <i class="icon-user icon-large"></i>
                <h5>ค่าใช้จ่าย</h5>
                <a class="btn btn-box-right" href="">
                    <i class="icon-plus-sign"></i> New
                </a>
                <a class="btn btn-box-right" href="<?php echo base_url('report/report_payment/' . $patientid . '/' . $bookingid); ?>" target="_blank">
                    <i class="icon-print"></i> ใบเสร็จรับเงิน
                </a>
                <a class="btn btn-box-right" href="<?php echo base_url('report/report_invoice/' . $patientid . '/' . $bookingid); ?>" target="_blank">
                    <i class="icon-print"></i> ใบกำกับภาษีแบบย่อ
                </a>
            </div>
            <br>
            <div class="row">
                <div class="span10 frame">
                    <div class="accordion" id="accordion2">
                        <div class="top_line">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green" data-toggle="collapse" data-parent="#accordion2" href="#collapse1">
                                    ค่าตรวจรักษาทั่วไปของผู้ประกอบวิชาชีพ
                                </a>
                            </div>
                            <div id="collapse1" class="accordion-body collapse in">
                                <div class="row padding-9-15">
                                    <div class="span9">
                                        <label class="toolbar_left">ค่าตรวจวินิจฉัยทางการแพทย์</label>
                                        <?php
$sum = 0;
$history = $this->db->query("SELECT SUM(PH5) AS sums FROM tbpatient_history WHERE BOOKINGID = '$bookingid' ");
$historyrow = $history->row();
$sum = $sum + $historyrow->sums;
$ci_check = $historyrow->sums;
?>
                                        <label class="toolbar_right"><b><?php echo number_format($historyrow->sums, 0, '.', ','); ?> THB</b></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="top_line">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green" data-toggle="collapse" data-parent="#accordion2" href="#collapse2">
                                    ค่ายาและเวชภัณฑ์
                                </a>
                            </div>
                            <div id="collapse2" class="accordion-body collapse in">
                                <div class="row padding-9-15">
                                    <?php
$ci_drug = 0;
$medical = $this->db->get_where('tbpatient_medical', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid));
foreach ($medical->result() as $medicalrow) {
    $summedical = $medicalrow->PH8 * $medicalrow->Number;
    ?>
                                        <div class="span9">
                                            <label class="toolbar_left"><?php echo "$medicalrow->PH9 $medicalrow->Number $medicalrow->Unit"; ?></label>
                                            <label class="toolbar_right"><b><?php echo number_format($summedical, 0, '.', ','); ?> THB</b></label>
                                        </div>
                                    <?php
$sum = $sum + $summedical;
    $ci_drug = $ci_drug + $summedical;
}?>
                                </div>
                            </div>
                        </div>
                        <div class="top_line">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green" data-toggle="collapse" data-parent="#accordion2" href="#collapse3">
                                    ค่าตรวจวินิจฉัยทางห้องปฏิบัตการ
                                </a>
                            </div>
                            <div id="collapse3" class="accordion-body collapse in">
                                <div class="row padding-9-15">
                                    <div class="span9">
                                        <label class="toolbar_left">ค่าตรวจวินิจฉัยทางเทคนิคการแพทย์</label>
                                        <?php
$lab = $this->db->query("SELECT SUM(PH4) AS sums FROM tbpatient_lab WHERE BOOKINGID = '$bookingid' ");
$labrow = $lab->row();
$sum = $sum + $labrow->sums;
$ci_lab = $labrow->sums;
?>
                                        <label class="toolbar_right"><b><?php echo number_format($labrow->sums, 0, '.', ','); ?> THB</b></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="top_line">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green" data-toggle="collapse" data-parent="#accordion2" href="#collapse4">
                                    ค่าการทำหัตถการของผู้ประกอบวิชาชีพ
                                </a>
                            </div>
                            <div id="collapse4" class="accordion-body collapse in">
                                <div class="row padding-9-15">
                                    <div class="span9">
                                        <label class="toolbar_left">ค่าการทำหัตถการและค่าปฏิบัติการอื่นๆ</label>
                                        <?php
$procedure = $this->db->query("SELECT SUM(PH3) AS sums FROM tbpatient_procedure WHERE BOOKINGID = '$bookingid' ");
$procedurerow = $procedure->row();
$sum = $sum + $procedurerow->sums;
$ci_procedure = $procedurerow->sums;
?>
                                        <label class="toolbar_right"><b><?php echo number_format($procedurerow->sums, 0, '.', ','); ?> THB</b></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="top_line">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green" data-toggle="collapse" data-parent="#accordion2" href="#collapse5">
                                    ค่าใบรับรองแพทย์
                                </a>
                            </div>
                            <div id="collapse5" class="accordion-body collapse in">
                                <div class="row padding-9-15">
                                    <?php
$job = $this->db->query("SELECT SUM(Price) AS sums FROM tbpatient_job WHERE BOOKINGID = '$bookingid' ");
$jobrow = $job->row();
$sum = $sum + $jobrow->sums;
?>
                                    <?php if ($jobrow->sums != '') {?>
                                        <div class="span9">
                                            <label class="toolbar_left">ค่าใบรับรองแพทย์ เพื่อสมัครงาน</label>
                                            <label class="toolbar_right"><b><?php echo number_format($jobrow->sums, 0, '.', ','); ?> THB</b></label>
                                        </div>
                                    <?php }?>
                                    <?php
$sick = $this->db->query("SELECT SUM(Price) AS sums FROM tbpatient_sick WHERE BOOKINGID = '$bookingid' ");
$sickrow = $sick->row();
$sum = $sum + $sickrow->sums;
?>
                                    <?php if ($sickrow->sums != '') {?>
                                        <div class="span9">
                                            <label class="toolbar_left">ค่าใบรับรองแพทย์ เพื่อลางาน</label>
                                            <label class="toolbar_right"><b><?php echo number_format($sickrow->sums, 0, '.', ','); ?> THB</b></label>
                                        </div>
                                    <?php }?>
                                    <?php $ci_certificate = $jobrow->sums + $sickrow->sums;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span5 frame">
                    <div align="center">
                        <h1>รวม <?php echo number_format($sum, 0, '.', ','); ?> THB</h1>
                    </div>
                    <div align="center">
                        <form action="<?php echo base_url('patient/make_payment/'); ?>" method="post">
                            <input type="hidden" name="ci_queue" value="<?php echo $rowpb->QUES ?>">
                            <input type="hidden" name="ci_order" value="<?php echo $rowpb->QBER ?>">
                            <input type="hidden" name="ci_date" value="<?php echo $rowpb->BOOKDATE ?>">
                            <input type="hidden" name="ci_nameprefix" value="<?php echo $rowpb->PATIEN_NAMEPREFIX ?>">
                            <input type="hidden" name="ci_name" value="<?php echo $rowpb->PATIEN_NAME ?>">
                            <input type="hidden" name="ci_check" value="<?php echo $ci_check ?>">
                            <input type="hidden" name="ci_drug" value="<?php echo $ci_drug ?>">
                            <input type="hidden" name="ci_lab" value="<?php echo $ci_lab ?>">
                            <input type="hidden" name="ci_procedure" value="<?php echo $ci_procedure ?>">
                            <input type="hidden" name="ci_certificate" value="<?php echo $ci_certificate ?>">

                            <input type="hidden" name="patientid" value="<?php echo $patientid ?>">
                            <input type="hidden" name="bookingid" value="<?php echo $bookingid ?>">
                            <button type="submit" class="btn btn-large btn-danger" formtarget="_blank" style="width: 200px; margin-top: 440px;">
                                <h2>ชำระเงิน</h2>
                            </button>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- สำคัญปิดส่วนหัวไฟล์ patientprofilehead.php -->
</div> <!-- <div class="box" style="background-color: #F0F0F0"> -->
</div> <!-- <div class="box-content box-table"> -->