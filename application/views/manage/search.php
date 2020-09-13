<div class="container">
    </br>
    <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
            <form class="form-signin" action="<?php echo base_url('member/booking') ?>" method="POST">
                <div class="text-center"> 
                    <h1 class="h3 font-weight-normal text-light">รายการคิวและเวลาที่ว่าง</h1>
                    <a href="<?php echo base_url() ?>" class="btn btn-success btn-lg"><i class="fa fa-backward"></i> กลับไปเลือกวันตรวจใหม่</a>
                </div>
            </form>
            <br/>
        </div>
        <div class="col-sm"></div>
    </div>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Warning!</strong> หากคิวจองประเภท A เต็มแล้วให้จองคิวเสริมประเภท B แล้วรอตรวจได้เลยเนื่องจากกรณีคิว A ตรวจเสร็จเร็วคิว B จะได้แทรกตรวจเลย.
    </div>
    <table class="table table-light table-striped rounded">        
        <thead class="thead-dark">
            <tr>
                <th colspan="5" class="text-center">
                    <b class="text-white"><?php
                        $cli = $this->db->query("select CLINICNAME from tbclinic WHERE CLINICID = '$CID'");
                        $showclinic = $cli->row();
                        echo $showclinic->CLINICNAME;
                        ?></b> 
                    วันที่ <b class="text-white"><?php
                        echo $choosex = date('Y-m-d', strtotime($DATEBOOK));
                        ?> </b> 

                </th>
            </tr>
            <tr>
                <th class="text-center">เวลาที่</th>
                <th class="text-center">บัตรคิว</th>
                <th class="text-center">จองคิว</th>
            </tr>
        </thead>
        <tbody>
            <?php
            date_default_timezone_set('Asia/Bangkok');
            $clinicclose = $this->db->query("SELECT * FROM tbclose WHERE CLINICID = '$CID' and CLOSEDATE = '$DATEBOOK'");
            if ($clinicclose->num_rows() != 1) {
                ?>

                <?php
                $date = date('w', strtotime($choosex));
                $a = 1;
                $b = 1;
                $clinicshowtime = $this->db->query("SELECT * FROM tbclinic WHERE CLINICID = '$CID'");
                $showrow = $clinicshowtime->row();
                if ($date == 0) {
                    
                    $open = $showrow->TIME_OPEN;
                    $close = $showrow->TIME_CLOSE;
                    $begin = new DateTime($open);
                    $end = new DateTime($close);
                    $interval = DateInterval::createFromDateString($showrow->QUETIME . 'min');
                    $times = new DatePeriod($begin, $interval, $end);
                    
                } else if ($date == 1) {
                    $open = $showrow->TIME1;
                    $close = $showrow->CLOSE1;
                    $begin = new DateTime($open);
                    $end = new DateTime($close);
                    $interval = DateInterval::createFromDateString($showrow->QUETIME . 'min');
                    $times = new DatePeriod($begin, $interval, $end);
                } else if ($date == 2) {
                    $open = $showrow->TIME2;
                    $close = $showrow->CLOSE2;
                    $begin = new DateTime($open);
                    $end = new DateTime($close);
                    $interval = DateInterval::createFromDateString($showrow->QUETIME . 'min');
                    $times = new DatePeriod($begin, $interval, $end);
                } else if ($date == 3) {
                    $open = $showrow->TIME3;
                    $close = $showrow->CLOSE3;
                    $begin = new DateTime($open);
                    $end = new DateTime($close);
                    $interval = DateInterval::createFromDateString($showrow->QUETIME . 'min');
                    $times = new DatePeriod($begin, $interval, $end);
                } else if ($date == 4) {
                    $open = $showrow->TIME4;
                    $close = $showrow->CLOSE4;
                    $begin = new DateTime($open);
                    $end = new DateTime($close);
                    $interval = DateInterval::createFromDateString($showrow->QUETIME . 'min');
                    $times = new DatePeriod($begin, $interval, $end);
                } else if ($date == 5) {
                    $open = $showrow->TIME5;
                    $close = $showrow->CLOSE5;
                    $begin = new DateTime($open);
                    $end = new DateTime($close);
                    $interval = DateInterval::createFromDateString($showrow->QUETIME . 'min');
                    $times = new DatePeriod($begin, $interval, $end);
                } else if ($date == 6) {
                    $open = $showrow->TIME6;
                    $close = $showrow->CLOSE6;
                    $begin = new DateTime($open);
                    $end = new DateTime($close);
                    $interval = DateInterval::createFromDateString($showrow->QUETIME . 'min');
                    $times = new DatePeriod($begin, $interval, $end);
                }

                foreach ($times as $time) {
                    $QA = 'A' . $a++;
                    $QBER = $b++;
                    ?>
                    <tr>
                        <td class="text-center border-secondary border-bottom">
                            <?php
                            $showtime = $time->format('H:i') . '-' . $time->add($interval)->format('H:i');
                            echo "<h5>" . $showtime . "</h5>";
                            ?>
                        </td>
                        <td class="text-center bg-light text-danger border" style="border-color: #cccccc;">
                            <?php
                            echo "<h4>" . $QA . "</h4>";
                            ?>
                        </td>
                        <td class="text-center">
                            <?php
                            if ($date == '0') {
                                $checkque = $this->db->query("SELECT BOOKTIME FROM tbbooking WHERE BOOKTIME = '$showtime' and CLINICID = '$CID' and BOOKDATE = '$DATEBOOK'");
                                $check = $checkque->row();
                                if ($showtime == isset($check->BOOKTIME)) {
                                    ?>
                                    <button ng-model="button" class="btn btn-success btn-block btn-lg disabled"><i class="fa fa-check-circle"></i> ถูกจอง</button>
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?php echo base_url('member/confirmbooking/' . $CID . "/" . $showtime . "/" . $DATEBOOK . "/" . $QA . "/" . $QBER) ?>" class="btn btn-secondary btn-block btn-lg"><i class="fa fa-check-square"></i> จองคิว</a>
                                    <?php
                                }
                            } else if ($date == '1') {
                                $checkque = $this->db->query("SELECT BOOKTIME FROM tbbooking WHERE BOOKTIME = '$showtime' and CLINICID = '$CID' and BOOKDATE = '$DATEBOOK'");
                                $check = $checkque->row();
                                if ($showtime == isset($check->BOOKTIME)) {
                                    ?>
                                    <button ng-model="button" class="btn btn-success btn-block btn-lg disabled"><i class="fa fa-check-circle"></i> ถูกจอง</button>
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?php echo base_url('member/confirmbooking/' . $CID . "/" . $showtime . "/" . $DATEBOOK . "/" . $QA . "/" . $QBER) ?>" class="btn btn-secondary btn-block btn-lg"><i class="fa fa-check-square"></i> จองคิว</a>
                                    <?php
                                }
                            } else if ($date == '2') {
                                $checkque = $this->db->query("SELECT BOOKTIME FROM tbbooking WHERE BOOKTIME = '$showtime' and CLINICID = '$CID' and BOOKDATE = '$DATEBOOK'");
                                $check = $checkque->row();
                                if ($showtime == isset($check->BOOKTIME)) {
                                    ?>
                                    <button ng-model="button" class="btn btn-success btn-block btn-lg disabled"><i class="fa fa-check-circle"></i> ถูกจอง</button>
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?php echo base_url('member/confirmbooking/' . $CID . "/" . $showtime . "/" . $DATEBOOK . "/" . $QA . "/" . $QBER) ?>" class="btn btn-secondary btn-block btn-lg"><i class="fa fa-check-square"></i> จองคิว</a>
                                    <?php
                                }
                            } else if ($date == '3') {
                                $checkque = $this->db->query("SELECT BOOKTIME FROM tbbooking WHERE BOOKTIME = '$showtime' and CLINICID = '$CID' and BOOKDATE = '$DATEBOOK'");
                                $check = $checkque->row();
                                if ($showtime == isset($check->BOOKTIME)) {
                                    ?>
                                    <button ng-model="button" class="btn btn-success btn-block btn-lg disabled"><i class="fa fa-check-circle"></i> ถูกจอง</button>
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?php echo base_url('member/confirmbooking/' . $CID . "/" . $showtime . "/" . $DATEBOOK . "/" . $QA . "/" . $QBER) ?>" class="btn btn-secondary btn-block btn-lg"><i class="fa fa-check-square"></i> จองคิว</a>
                                    <?php
                                }
                            } else if ($date == '4') {
                                $checkque = $this->db->query("SELECT BOOKTIME FROM tbbooking WHERE BOOKTIME = '$showtime' and CLINICID = '$CID' and BOOKDATE = '$DATEBOOK'");
                                $check = $checkque->row();
                                if ($showtime == isset($check->BOOKTIME)) {
                                    ?>
                                    <button ng-model="button" class="btn btn-success btn-block btn-lg disabled"><i class="fa fa-check-circle"></i> ถูกจอง</button>
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?php echo base_url('member/confirmbooking/' . $CID . "/" . $showtime . "/" . $DATEBOOK . "/" . $QA . "/" . $QBER) ?>" class="btn btn-secondary btn-block btn-lg"><i class="fa fa-check-square"></i> จองคิว</a>
                                    <?php
                                }
                            } else if ($date == '5') {
                                $checkque = $this->db->query("SELECT BOOKTIME FROM tbbooking WHERE BOOKTIME = '$showtime' and CLINICID = '$CID' and BOOKDATE = '$DATEBOOK'");
                                $check = $checkque->row();
                                if ($showtime == isset($check->BOOKTIME)) {
                                    ?>
                                    <button ng-model="button" class="btn btn-success btn-block btn-lg disabled"><i class="fa fa-check-circle"></i> ถูกจอง</button>
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?php echo base_url('member/confirmbooking/' . $CID . "/" . $showtime . "/" . $DATEBOOK . "/" . $QA . "/" . $QBER) ?>" class="btn btn-secondary btn-block btn-lg"><i class="fa fa-check-square"></i> จองคิว</a>
                                    <?php
                                }
                            } else if ($date == '6') {
                                $checkque = $this->db->query("SELECT BOOKTIME FROM tbbooking WHERE BOOKTIME = '$showtime' and CLINICID = '$CID' and BOOKDATE = '$DATEBOOK'");
                                $check = $checkque->row();
                                if ($showtime == isset($check->BOOKTIME)) {
                                    ?>
                                    <button ng-model="button" class="btn btn-success btn-block btn-lg disabled"><i class="fa fa-check-circle"></i> ถูกจอง</button>
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?php echo base_url('member/confirmbooking/' . $CID . "/" . $showtime . "/" . $DATEBOOK . "/" . $QA . "/" . $QBER) ?>" class="btn blue-grey lighten-1 btn-block btn-lg"><i class="fa fa-check-square"></i> จองคิว</a>
                                    <?php
                                }
                            }
                            ?>

                        </td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td class="text-center border-secondary border-bottom"><b>คิวเสริม</b></td>
                    <td class="text-center bg-light text-danger border" style="border-color: #cccccc;">
                        <?php
                        $wch = $this->db->query("SELECT * FROM tbbooking WHERE BOOKDATE = '$DATEBOOK' and CLINICID = '$CID' and TYPE = 1");
                        $num = $wch->num_rows();
                        $count = $this->db->query("SELECT * FROM tbbooking WHERE BOOKDATE = '$DATEBOOK' and CLINICID = '$CID' and TYPE = 1");
                        $WA = $num + 1;
                        $nums = $count->num_rows();
                        $QBER = 50 + $nums + 1;
                        echo "<h4>" . 'B' . $WA . "</h4>";
                        ?>
                    </td>
                    <td class="text-center"><a href="<?php echo base_url('member/confirmbookingWalkin/' . $CID . "/" . $DATEBOOK . "/" . 'B' . $WA . "/" . $QBER) ?>" class="btn btn-lg btn-block btn-danger"><i class="fa fa-check-square"></i> จองคิว</a></td>
                </tr>
                <?php
            } else {
                ?>
                <tr>
                    <td colspan="3" class="text-center text-danger">
                        <h4>ขออภัยไม่สามารถ นัดหมอ ในวันนี้ได้ เนื่องจากเป็นวันหยุด ของทางคลินิก</h4>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <center><a href="<?php echo base_url() ?>" class="btn btn-success btn-lg"><i class="fa fa-backward"></i> กลับไปเลือกวันตรวจใหม่</a>    </center>
    <br/>
</div>
<div class="jumbotron-fluid container border-top-0 border-info">
    <div class="text-center">
        <h5 class="display-4 text-light">บริการฟรีสำหรับคนไข้</h5> 
        <a class="btn btn-lg btn-outline-info rounded-pill border-info" href="<?php echo base_url('app/register') ?>" role="button">ลงทะเบียนขอใช้งาน &raquo;</a>
    </div>    
</div>
<br/>
