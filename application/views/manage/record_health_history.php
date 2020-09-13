<style>
    #health {
        border-collapse: collapse;
        width: 100%;
    }

    #health td,
    #health th {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    #health tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    #health th {
        background-color: #9a9a9a;
        color: white;
    }
</style>
<div class="container">
    <div class="row">
        <div class="span6">
            <a class="btn btn-large" href="<?php echo base_url('dashboard/record_information/') ?>"><b>ข้อมูลทั่วไป</b></a>
            <a class="btn btn-primary btn-large" href="<?php echo base_url('dashboard/record_health_history/') ?>"><b>ข้อมูลสุขภาพ</b></a>
        </div>
        <div class="span6 offset4">
            <ul class="nav nav-pills" id="myTab" style="margin-left: 270px; margin-top: 10px;">
                <li class="active"><a href="#tab1" data-toggle="tab"> ประวัติสุขภาพ</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="tab-content">
    <div class="tab-pane active" id="tab1">
        <section class="page container">
            <div class="span15">
                <h4>Body Measurements</h4>
                <table id="health">
                    <tr>
                        <th>วันที่</th>
                        <th>Visit Number</th>
                        <th>น้ำหนัก</th>
                        <th>ส่วนสูง</th>
                        <th>BMI</th>
                        <th>Body Temp</th>
                        <th>BP</th>
                        <th>HR</th>
                        <th>FBS</th>
                    </tr>
                    <?php
                    $PH = $this->db->get_where('tbpatient_health', array('IDCARD' => $patientid));
                    foreach ($PH->result() as $PHrow) {
                    ?>
                        <tr>
                            <td><?php echo date("d/m/Y", strtotime($PHrow->DATE_CREATE)); ?></td>
                            <td><?php echo $PHrow->BOOKINGID ?></td>
                            <td><?php echo $PHrow->Wieght ?></td>
                            <td><?php echo $PHrow->Height ?></td>
                            <td><?php echo $PHrow->BMI ?></td>
                            <td><?php echo $PHrow->BodyTemp ?></td>
                            <td><?php echo $PHrow->BP ?></td>
                            <td><?php echo $PHrow->HR ?></td>
                            <td><?php echo $PHrow->FBS ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </section>
    </div>
</div>
<br>

<!-- สำคัญปิดส่วนหัวไฟล์ patientprofilehead.php -->
</div> <!-- <div class="box" style="background-color: #F0F0F0"> -->
</div> <!-- <div class="box-content box-table"> -->