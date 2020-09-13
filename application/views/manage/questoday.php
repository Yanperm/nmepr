<style>
    body .modal {
        width: 40%;
        left: 31%;
        margin-left: auto;
        margin-right: auto;
    }

    #tablequeue {
        border-collapse: collapse;
        width: 100%;
    }

    #tablequeue td {
        padding: 8px;
        text-align: center;
        background-color: #f2f2f2;
    }

    #tablequeue th {
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #343a40;
        color: white;
    }
</style>
<div class="">
    <div class="box well well-shadow">
        <div class="box-header">
            <i class="icon-bar-chart"></i>
            <h5>คิวที่ถูกเรียกตรวจ</h5>
            <a class="btn btn-box-right btn-light" href="<?php echo base_url('member/resetStatus') ?>">
                <i class="icon-refresh"></i> Reset All
            </a> &nbsp;
            <a class="btn btn-box-right btn-light"  onclick="playAudio()" >
                <i class="icon-bell"></i> เรียกคิวช่องบริการ 1
            </a>
        </div>
<audio id="myAudio">
  <source src="<?php echo base_url('assets/เชิญคิวถัดไปที่ช่องบริการ หนึ่ง ค่ะ.mp3') ?>" type="audio/mpeg">
</audio>
<script>
var x = document.getElementById("myAudio"); 

function playAudio() { 
  x.play(); 
} 

function pauseAudio() { 
  x.pause(); 
} 
</script>
        <div class="box-content">
            <div class="content">
                <table class="table table-striped table-bordered border border-info" style="margin-top: 0px;">
                    <thead>
                        <tr>
                            <th class="label text-error">
                                <center>
                                    <h2>กำลังเรียกคิว</h2>
                                </center>
                            </th>
                            <th class="label text-error">
                                <center>
                                    <h2>ช่องบริการ</h2>
                                </center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        date_default_timezone_set('Asia/Bangkok');
                        $y = date("Y");
                        $day = date("$y-m-d");
                        $CLINIC = $this->session->userdata('CLINICID');
                        $Onboard = $this->db->query("SELECT QUES,BOOKTIME FROM tbbooking WHERE CLINICID = '$CLINIC' and BOOKDATE = '$day' and TYPE = 0  and SHOWS = 2 ORDER BY QBER asc LIMIT 1");
                        foreach ($Onboard->result() as $row) { ?>
                            <tr>
                                <td class="label-inverse text-primary">
                                    <center>
                                        <h2><?php echo $row->QUES; ?></h2>
                                    </center>
                                </td>
                                <td class="label-inverse text-primary">
                                    <center>
                                        <h2>1</h2>
                                    </center>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php
                        $ys = date("Y");
                        $days = date("$ys-m-d");
                        $CLINICs = $this->session->userdata('CLINICID');
                        $Onboards = $this->db->query("SELECT QUES,BOOKTIME FROM tbbooking WHERE CLINICID = '$CLINICs' and BOOKDATE = '$days' and TYPE = 1 and SHOWS = 2 ORDER BY QBER asc LIMIT 1");
                        foreach ($Onboards->result() as $rows) { ?>
                            <tr>
                                <td class="label-inverse text-warning">
                                    <center>
                                        <h2><?php echo $rows->QUES; ?></h2>
                                    </center>
                                </td>
                                <td class="label-inverse text-warning">
                                    <center>
                                        <h2>2</h2>
                                    </center>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        setInterval(function() {
            $("#reload").load("<?php echo base_url('dashboard/onboard') ?>");
        }, 1000);
    });
</script>
<div class="">
    <div class="box well well-shadow">
        <div class="box-header">
            <i class="icon-user-md"></i>
            <h5>รายการคิวคิวตรวจประจำวัน</h5>
            <a class="btn btn-box-right" href="#addqueue" role="button" data-toggle="modal">
                <i class="fas fa-plus"></i> เพิ่มคิว
            </a>
        </div>
        <div class="box-content" id="reload">
            <table class="table-striped table-condensed" style="width: 90%;">
                <thead>
                    <tr>
                        <th>บัตรคิว</th>
                        <th>เวลาตรวจที่เลือก</th>
                        <th>ชื่อ-สกุลคนไข้</th>
                        <th>สาเหตุที่มาพบแพทย์</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>สถานะ</th>
                        <th>เรียกคิว</th>
                        <th>ชำระเงิน</th>
                        <th>ห้องยา</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $y = date("Y");
                    $day = date("$y-m-d");
                    $CLINIC = $this->session->userdata("CLINICID");
                    $Dash = $this->db->query("SELECT tbbooking.dispense,tbbooking.payment,tbbooking.QUES,tbbooking.DETAIL,tbbooking.IDCARD,tbbooking.CHECKIN,tbmembers.CUSTOMERNAME,tbmembers.PHONE,tbbooking.CALLED,tbbooking.TYPE,tbbooking.SHOWS,tbbooking.STATUS,tbbooking.BOOKINGID,tbbooking.BOOKDATE,tbbooking.ACCEPT,tbbooking.BOOKTIME,tbbooking.CHECKIN_BY,tbmembers.CUSTOMERNAME FROM tbbooking INNER JOIN tbmembers ON tbmembers.IDCARD = tbbooking.IDCARD OR tbmembers.MEMBERIDCARD = tbbooking.MEMBERIDCARD WHERE tbbooking.BOOKDATE = '$day' and tbbooking.CLINICID = '$CLINIC' ORDER BY tbbooking.QBER asc");
                    foreach ($Dash->result() as $row) {
                        $idc = $row->BOOKINGID;
                        $id = $row->IDCARD; ?>
                        <tr style="border-bottom: 1pt solid #cccccc">
                            <td align='center'><b><?php echo $row->QUES; ?></b></td>
                            <td align='center'><?php echo $row->BOOKTIME; ?></td>
                            <td class="mdb-color text-white text-center"><a href="<?php echo base_url('dashboard/record_historys/' . $id . '/' . $idc); ?>"><b><?php echo $row->CUSTOMERNAME; ?></b></a></td>
                            <td class="mdb-color text-white text-center"><?php echo $row->DETAIL; ?></td>
                            <td class="mdb-color text-white text-center"><?php echo $row->PHONE; ?></td>
                            <td class="mdb-color text-white text-center">
                                <?php
                                if ($row->payment == 0) {
                                    if ($row->STATUS != 2) {
                                        if ($row->CHECKIN != 1) {
                                            echo '<font color=red><b>รอเช็คอิน</b></font>';
                                        } else {
                                            echo '<font color=green><b>เช็คอินแล้ว</b></font>';
                                        }
                                    } else {
                                        echo '<font color=red><b>รอยืนยัน</b></font>';
                                    }
                                } else {
                                    echo '<font color=blue><b>ตรวจแล้ว</b></font>';
                                } ?>
                            </td>
                            <td class="mdb-color text-white text-center">
                                <?php
                                if ($row->STATUS != 2) {
                                    if ($row->CHECKIN != 1) {
                                ?>
                                        <button class="btn disabled text-white"><i class="fa fa-warning"></i> ยังไม่เช็คอิน</button>
                                    <?php
                                    } else {
                                    ?>
                                        <?php
                                        if ($row->SHOWS == 0) {
                                            if ($row->CALLED == 0) {
                                                if ($row->TYPE == 0) {
                                        ?>
                                                    <a href="<?php echo base_url('member/resetStatusAgainTypeA/' . $idc) ?>" class="btn btn-primary btn-mini btn-block text-white"><i class="fa fa-bell-o"></i> เรียกคิว</a>
                                                <?php } else if ($row->TYPE == 1) {
                                                ?>
                                                    <a href="<?php echo base_url('member/resetStatusAgainTypeB/' . $idc) ?>" class="btn btn-primary btn-mini btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกคิว</a>
                                                <?php
                                                }
                                            } else if ($row->CALLED == 1) {
                                                if ($row->TYPE == 0) {
                                                ?>
                                                    <a href="<?php echo base_url('member/resetStatusAgainTypeA/' . $idc) ?>" class="btn btn-warning btn-mini btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกซ้ำ</a>
                                                <?php } else if ($row->TYPE == 1) {
                                                ?>
                                                    <a href="<?php echo base_url('member/resetStatusAgainTypeB/' . $idc) ?>" class="btn btn-warning btn-mini btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกซ้ำ</a>
                                                <?php
                                                }
                                            }
                                        } else if ($row->SHOWS == 2) {
                                            if ($row->CALLED == 0) {
                                                if ($row->TYPE == 0) {
                                                ?>
                                                    <a href="<?php echo base_url('member/resetStatusAgainTypeA/' . $idc) ?>" class="btn btn-primary btn-mini btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกคิว</a>
                                                <?php } else if ($row->TYPE == 1) {
                                                ?>
                                                    <a href="<?php echo base_url('member/resetStatusAgainTypeB/' . $idc) ?>" class="btn btn-primary btn-mini btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกคิว</a>
                                                <?php
                                                }
                                            } else if ($row->CALLED == 1) {
                                                if ($row->TYPE == 0) {
                                                ?>
                                                    <a href="<?php echo base_url('member/resetStatusAgainTypeA/' . $idc) ?>" class="btn btn-warning btn-mini btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกซ้ำ</a>
                                                <?php } else if ($row->TYPE == 1) {
                                                ?>
                                                    <a href="<?php echo base_url('member/resetStatusAgainTypeB/' . $idc) ?>" class="btn btn-warning btn-mini btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกซ้ำ</a>
                                                <?php
                                                }
                                            }
                                        } else if ($row->SHOWS == 3) {
                                            if ($row->CALLED == 0) {
                                                if ($row->TYPE == 0) {
                                                ?>
                                                    <a href="<?php echo base_url('member/resetStatusAgainTypeA/' . $idc) ?>" class="btn btn-primary btn-mini btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกคิว</a>
                                                <?php } else if ($row->TYPE == 1) {
                                                ?>
                                                    <a href="<?php echo base_url('member/resetStatusAgainTypeB/' . $idc) ?>" class="btn btn-primary btn-mini btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกคิว</a>
                                                <?php
                                                }
                                            } else if ($row->CALLED == 1) {
                                                if ($row->TYPE == 0) {
                                                ?>
                                                    <a href="<?php echo base_url('member/resetStatusAgainTypeA/' . $idc) ?>" class="btn btn-warning btn-mini btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกซ้ำ</a>
                                                <?php } else if ($row->TYPE == 1) {
                                                ?>
                                                    <a href="<?php echo base_url('member/resetStatusAgainTypeB/' . $idc) ?>" class="btn btn-warning btn-mini btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกซ้ำ</a>
                                    <?php
                                                }
                                            }
                                        }
                                    }
                                    ?>
                            </td>
                            <td>
                                <?php if ($row->payment == 0) {
                                        echo '<button class="btn btn-mini btn-block text-white disabled">รอชำระเงิน</button>';
                                    } elseif ($row->payment == 1) { ?>
                                    <a href="<?php echo base_url('dashboard/record_cost/' . $id . '/' . $idc); ?>" class="btn btn-primary btn-mini btn-block text-white">รอชำระเงิน</a>
                                <?php } else {
                                        echo '<button class="btn btn-warning btn-mini btn-block text-white">ชำระเงินแล้ว</button>';
                                    }  ?>
                            </td>
                            <td>
                                <?php if ($row->dispense == 0) {
                                        echo '<button class="btn btn-mini btn-block text-white disabled">ไม่มียา</button>';
                                    } elseif ($row->dispense == 1) { ?>
                                    <a href="<?php echo base_url('dashboard/record_drug/' . $id . '/' . $idc); ?>" class="btn btn-primary btn-mini btn-block text-white">มียา</a>
                                <?php } elseif ($row->dispense == 2) { ?>
                                    <a href="<?php echo base_url('dashboard/record_drug/' . $id . '/' . $idc); ?>" class="btn btn-success btn-mini btn-block text-white">รอรับยา</a>
                                <?php } else {
                                        echo '<button class="btn btn-warning btn-mini btn-block text-white">รับยาแล้ว</button>';
                                    } ?>
                            </td>
                        </tr>
                        <?php
                                } else {
                                    if ($row->TYPE == 0) {
                        ?>
                            <div class="btn-group-sm" role="group" aria-label="ลบคิวเพื่อให้คนอื่นจองต่อ">
                                <button type="button" class="btn btn-secondary"><i class="fa fa-remove"></i> ยกเลิกคิวแล้ว</button>
                                <a href="<?php echo base_url('manage/deletequetoday/' . $idc) ?>" class="btn btn-warning text-white" onclick="return confirm('โปรดยืนยันการลบคิว')"><i class="fa fa-remove"></i> Drop</a>
                            </div>

                        <?php } else if ($row->TYPE == 1) {
                        ?>
                            <button type="button" class="btn btn-block btn-danger"><i class="fa fa-remove"></i> ยกเลิกคิวแล้ว</button>
                <?php
                                    }
                                }
                            } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="addqueue" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Add Queue</h3>
    </div>
    <form action="<?php echo base_url('manage/addqueue') ?>" method="post">
        <div class="modal-body">
            <div class="row-fluid">
                <div class="span10">
                    <table id="tablequeue">
                        <tr>
                            <th>เวลาที่</th>
                            <th>บัตรคิว</th>
                            <th>จองคิว</th>
                        </tr>
                        <?php
                        $clinicclose = $this->db->get_where('tbclose', array('CLINICID' => $CLINIC, 'CLOSEDATE' => $day));
                        if ($clinicclose->num_rows() <= 0) { ?>
                            <?php
                            $date = date('w');
                            $a = 1;
                            $b = 1;
                            $number = 1;
                            $showrow = $this->db->get_where('tbclinic', array('CLINICID' => $CLINIC))->row();
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
                                $showtime = $time->format('H:i') . '-' . $time->add($interval)->format('H:i');
                                $check = $this->db->get_where('tbbooking', array('CLINICID' => $CLINIC, 'BOOKDATE' => $day, 'BOOKTIME' => $showtime))->row();
                                if (!isset($check->BOOKTIME)) {
                                    if ($showtime > date('H:i')) { ?>
                                        <tr>
                                            <td>
                                                <?php echo "<h5>" . $showtime . "</h5>"; ?>
                                            </td>
                                            <td style="background-color: #f8f9fa; color: #ff0000;">
                                                <?php echo "<h4>" . $QA . "</h4>"; ?>
                                            </td>
                                            <td>
                                                <label class="btn btn-large btn-success">
                                                    <input type="radio" name="number" value="<?php echo $number ?>" style=" margin-right: 5px; margin-bottom: 5px;">จองคิว
                                                    <input type="hidden" name="BOOKTIME<?php echo $number ?>" value="<?php echo $showtime ?>">
                                                    <input type="hidden" name="QUES<?php echo $number ?>" value="<?php echo $QA ?>">
                                                    <input type="hidden" name="QBER<?php echo $number ?>" value="<?php echo $QBER ?>">
                                                </label>
                                            </td>
                                        </tr>
                                    <?php ++$number;
                                    } ?>

                                <?php } ?>
                            <?php } ?>
                            <tr>
                                <td><b>คิวเสริม</b></td>
                                <td style="background-color: #f8f9fa; color: #ff0000;">
                                    <?php
                                    $wch = $this->db->query("SELECT * FROM tbbooking WHERE BOOKDATE = '$day' and CLINICID = '$CLINIC' and TYPE = 1");
                                    $num = $wch->num_rows();
                                    $WA = $num + 1;
                                    $nums = $wch->num_rows();
                                    $QBER = 50 + $nums + 1;
                                    echo "<h4>" . 'B' . $WA . "</h4>";
                                    ?>
                                </td>
                                <td>
                                    <label class="btn btn-large btn-danger">
                                        <input type="radio" name="number" value="B" style=" margin-right: 5px; margin-bottom: 5px;" required>จองคิว
                                        <input type="hidden" name="BOOKTIME" value="รอเรียกจากเคาเตอร์">
                                        <input type="hidden" name="QUES" value="<?php echo "B$WA" ?>">
                                        <input type="hidden" name="QBER" value="<?php echo $QBER ?>">
                                    </label>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="span6" style="position: sticky; top: 0;">
                    <input type="number" name="IDCARD" placeholder="กรอกเลขบัตรประชาชน หรือเลข Passport" class="input-block-level" required>
                    <input type="text" name="CUSTOMERNAME" placeholder="ชื่อสกุลคนไข้ใช้บริการที่คลินิก" class="input-block-level" required>
                    <input type="number" name="PHONE" placeholder="เบอร์โทรสำหรับติดต่อ" class="input-block-level" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?php if ($clinicclose->num_rows() <= 0) { ?>
                <input type="submit" value="บันทึก" class="btn btn-large btn-success">
            <?php } ?>
        </div>
    </form>
</div>