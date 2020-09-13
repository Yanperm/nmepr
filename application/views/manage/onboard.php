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
        date_default_timezone_set('Asia/Bangkok');
        $y = date("Y");
        $day = date("$y-m-d");
        $CLINIC = $this->session->userdata("CLINICID");
        $Dash = $this->db->query("SELECT tbbooking.dispense,tbbooking.payment,tbbooking.QUES,tbbooking.DETAIL,tbbooking.IDCARD,tbbooking.CHECKIN,tbmembers.CUSTOMERNAME,tbmembers.PHONE,tbbooking.CALLED,tbbooking.TYPE,tbbooking.SHOWS,tbbooking.STATUS,tbbooking.BOOKINGID,tbbooking.BOOKDATE,tbbooking.ACCEPT,tbbooking.BOOKTIME,tbbooking.CHECKIN_BY,tbmembers.CUSTOMERNAME FROM tbbooking INNER JOIN tbmembers ON tbmembers.IDCARD = tbbooking.IDCARD OR tbmembers.MEMBERIDCARD = tbbooking.MEMBERIDCARD WHERE tbbooking.BOOKDATE = '$day' and tbbooking.CLINICID = '$CLINIC' ORDER BY tbbooking.QBER asc");
        foreach ($Dash->result() as $row) {
            $idc = $row->BOOKINGID;
            $id = $row->IDCARD;
        ?>
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
                }
    ?>
    </tbody>
</table>
