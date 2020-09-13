<div class="container">
    <div class="row">
        <div class="span8">
            <div class="nav-pills box-header">
                <i class="icon-book icon-large"></i>
                <h5>ประวัติการตรวจวินิจฉัย</h5>
            </div>
            <table class="table table-condensed table-striped table-bordered pattern pattern-white-linen">
                <thead>
                    <tr style="background-color: #002752">
                        <th>วินิจฉัย</th>
                        <th>วันที่ทำรายการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $y = date('Y') - 1;
                    $day = date($y . '-m-d');
                    $this->db->order_by('CREATE', 'DESC');
                    $history1 = $this->db->get_where('tbpatient_history', array('IDCARD' => $patientid, 'CREATE >=' => $day),5);
                    foreach ($history1->result() as $rowhis1) { ?>
                        <tr>
                            <td><?php echo $rowhis1->PH3 ?></td>
                            <td><?php echo date("d-m-Y", strtotime($rowhis1->CREATE)); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="span8">
            <div class="nav-pills box-header">
                <i class="icon-user-md icon-large"></i>
                <h5>ยาที่เคยได้รับ</h5>
            </div>
            <table class="table table-condensed table-striped table-bordered pattern pattern-white-linen">
                <thead>
                    <tr>
                        <th>รายการยาปัจจุบัน</th>
                        <th>วันที่ทำการสั่งจ่าย</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $this->db->order_by('CREATE', 'DESC');
                    $history2 = $this->db->get_where('tbpatient_medical', array('IDCARD' => $patientid, 'CREATE >=' => $day),5);
                    foreach ($history2->result() as $rowhis2) { ?>
                        <tr>
                            <td><?php echo $rowhis2->PH1 ?></td>
                            <td><?php echo date("d-m-Y", strtotime($rowhis2->CREATE)); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <br>
</div>

<!-- สำคัญปิดส่วนหัวไฟล์ patientprofilehead.php -->
</div> <!-- <div class="box" style="background-color: #F0F0F0"> -->
</div> <!-- <div class="box-content box-table"> -->