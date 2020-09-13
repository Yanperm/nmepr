<section class="nav-page" pageVTourUrl="guide/tour/form-tour.html" pageVGuideUrl="guide/form-guide.html">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Check In<br /><small> คิวอนุมัติการจองพร้อมยืนยันการเข้าตรวจแล้ว</small></h3>
                </header>
            </div>

        </div>
    </div>
</section>
<div id="Person-5" class="box">
    <div class="box-header">
        <i class="icon-user icon-large"></i>
        <h5>รายการข้อมูล</h5>
        <a class="btn btn-box-right" href="<?php echo base_url('admin/checkinall') ?>">
            <i class="icon-check"></i> Check In All
        </a>
    </div>
    <div class="box-content box-table">
        <table class="table table-condensed">
            <thead>
                <tr class="bg-dark text-white">
                    <th class="text-center">บัตรคิว</th>
                    <th class="text-center">วันที่ต้องการตรวจ</th>
                    <th class="text-center">เวลาตรวจที่เลือก</th>
                    <th class="text-center">ชื่อสกุลคนไข้ที่จองคิวตรวจ</th>
                    <th class="text-center">เบอร์โทร</th>
                    <th class="text-center">จัดการคิวจอง</th>
                </tr>
            </thead>
            <tbody>
                <?php
                date_default_timezone_set('Asia/Bangkok');
                $y = date("Y");
                $day = date("$y-m-d");
                $CLINIC = $this->session->userdata('CLINICID');
                $Dash = $this->db->query("SELECT tbbooking.QUES,tbbooking.IDCARD,tbbooking.CHECKIN,tbmembers.CUSTOMERNAME,tbmembers.PHONE,tbbooking.CALLED,tbbooking.TYPE,tbbooking.SHOWS,tbbooking.STATUS,tbbooking.BOOKINGID,tbbooking.BOOKDATE,tbbooking.ACCEPT,tbbooking.BOOKTIME,tbbooking.CHECKIN_BY,tbmembers.CUSTOMERNAME FROM tbbooking INNER JOIN tbmembers ON tbmembers.IDCARD = tbbooking.IDCARD WHERE tbbooking.BOOKDATE = '$day' and tbbooking.CLINICID = '$CLINIC' ORDER BY tbbooking.QBER asc");
                foreach ($Dash->result() as $row) {
                    $id = $row->BOOKINGID;
                ?>
                    <tr>
                        <td class="bg-dark text-white text-center">
                            <b><?php echo $row->QUES; ?></b>
                        </td>
                        <td class="bg-dark text-white text-center"><?php echo $row->BOOKDATE; ?></td>
                        <td class="bg-dark text-white text-center">
                            <?php echo $row->BOOKTIME; ?>
                        </td>
                        <td class="bg-dark text-white text-center"><?php echo $row->CUSTOMERNAME; ?></td>
                        <td class="bg-dark text-white text-center"><?php echo $row->PHONE; ?></td>
                        <td class="bg-dark text-white text-center">
                            <?php
                            if ($row->ACCEPT != 1) { ?>
                                <a href="<?php echo base_url('manage/acceptBooking/' . $id) ?>" class="btn btn-secondary btn-mini"><i class="icon-exclamation-sign"></i> รอยืนยันการจอง</a>
                                <a href="<?php echo base_url('manage/deletebooking/' . $id) ?>" class="btn btn-danger btn-mini"><i class="icon-trash"></i> Drop</a>
                            <?php } else { ?>
                                <?php
                                if ($row->CHECKIN == 0) { ?>
                                    <a href="<?php echo base_url('manage/adminCheckin/' . $id) ?>" class="btn btn-primary btn-mini"><i class="fa fa-check-circle"></i> เช็คอินให้</a>
                                <?php } else {
                                    echo '<button class="btn btn-success btn-mini"><i class="icon-ok"></i> เช็คอินแล้ว</button>';
                                } ?>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>