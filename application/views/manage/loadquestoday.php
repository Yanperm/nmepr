<div id="Person-5" class="box well well-shadow">
    <div class="box-header">
        <i class="icon-user icon-large"></i>
        <h5>เรียกคิวตรวจ Onboarding</h5>
    </div>
  
    <table class="table table-striped table-condensed table-bordered">
        <thead>
            <tr class="bg-dark text-white">
                <th class="bg-secondary text-white text-center">บัตรคิว</th>
                <th class="bg-secondary text-white text-center">วันที่ต้องการตรวจ</th>
                <th class="bg-secondary text-white text-center">เวลาตรวจที่เลือก</th>
                <th class="bg-secondary text-white text-center">ชื่อสกุลคนไข้ที่จองคิวตรวจ</th>
                <th class="bg-secondary text-white text-center">สาเหตุที่มาพบแพทย์</th>
                <th class="bg-secondary text-white text-center">เช็คอินทาง</th>
                <th class="bg-secondary text-white text-center">สถานะการจองคิว</th>
            </tr>
        </thead>
        <tbody>
            <?php
            date_default_timezone_set('Asia/Bangkok');
            $y = date("Y");
            $day = date("$y-m-d");
            $CLINIC = $this->session->userdata("CLINICID");
            $Dash = $this->db->query("SELECT tbbooking.QUES,tbbooking.CALLED,tbbooking.TYPE,tbbooking.SHOWS,tbbooking.STATUS,tbbooking.BOOKINGID,tbbooking.BOOKDATE,tbbooking.ACCEPT,tbbooking.BOOKTIME,tbbooking.CHECKIN_BY,tbmembers.CUSTOMERNAME FROM tbbooking INNER JOIN tbmembers ON tbmembers.IDCARD = tbbooking.IDCARD OR tbmembers.MEMBERIDCARD = tbbooking.MEMBERIDCARD WHERE tbbooking.BOOKDATE = '$day' and tbbooking.CLINICID = '$CLINIC' ORDER BY tbbooking.QBER asc");
            foreach ($Dash->result() as $row) {
                $id = $row->BOOKINGID;
                ?>
                <tr class="bg-dark text-white">
                    <td class="bg-secondary text-white text-center"><b><?php echo $row->QUES; ?></b></td>
                    <td class="mdb-color text-white text-center"><?php echo $row->BOOKDATE; ?></td>
                    <td class="mdb-color text-white text-center"><?php echo $row->BOOKTIME; ?></td>
                    <td class="mdb-color text-white text-center"><?php echo $row->CUSTOMERNAME; ?></td>
                    <td class="mdb-color text-white text-center"><?php echo $row->DETAIL; ?></td>                    
                    <td class="mdb-color text-white text-center"><?php echo $row->CHECKIN_BY; ?></td>
                    <td class="mdb-color text-white text-center">
                        <?php
                        if ($row->STATUS != 2) {


                            if ($row->ACCEPT != 1) {
                                ?>
                                <a href="<?php echo base_url('manage/acceptBooking/' . $id) ?>" class="btn btn-danger text-white"><i class="fa fa-warning"></i> ยังไม่ยืนยัน</a>
                                <?php
                            } else {
                                ?>
                                <?php
                                if ($row->SHOWS == 0) {
                                    if ($row->CALLED == 0) {
                                        if ($row->TYPE == 0) {
                                            ?>
                                            <a href="<?php echo base_url('member/resetStatusAgainTypeA/' . $id) ?>" class="btn btn-success btn-sm btn-block text-white"><i class="fa fa-bell-o"></i> เรียกคิว</a>
                                        <?php } else if ($row->TYPE == 1) {
                                            ?>
                                            <a href="<?php echo base_url('member/resetStatusAgainTypeB/' . $id) ?>" class="btn btn-success btn-sm btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกคิว</a>
                                            <?php
                                        }
                                    } else if ($row->CALLED == 1) {
                                        if ($row->TYPE == 0) {
                                            ?>
                                            <a href="<?php echo base_url('member/resetStatusAgainTypeA/' . $id) ?>" class="btn btn-warning btn-sm btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกซ้ำ</a>
                                        <?php } else if ($row->TYPE == 1) {
                                            ?>
                                            <a href="<?php echo base_url('member/resetStatusAgainTypeB/' . $id) ?>" class="btn btn-warning btn-sm btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกซ้ำ</a>
                                            <?php
                                        }
                                    }
                                } else if ($row->SHOWS == 2) {
                                    if ($row->CALLED == 0) {
                                        if ($row->TYPE == 0) {
                                            ?>
                                            <a href="<?php echo base_url('member/resetStatusAgainTypeA/' . $id) ?>" class="btn btn-success btn-sm btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกคิว</a>
                                        <?php } else if ($row->TYPE == 1) {
                                            ?>
                                            <a href="<?php echo base_url('member/resetStatusAgainTypeB/' . $id) ?>" class="btn btn-success btn-sm btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกคิว</a>
                                            <?php
                                        }
                                    } else if ($row->CALLED == 1) {
                                        if ($row->TYPE == 0) {
                                            ?>
                                            <a href="<?php echo base_url('member/resetStatusAgainTypeA/' . $id) ?>" class="btn btn-warning btn-sm btn-block  text-white" ><i class="fa fa-bell-o"></i> เรียกซ้ำ</a>
                                        <?php } else if ($row->TYPE == 1) {
                                            ?>
                                            <a href="<?php echo base_url('member/resetStatusAgainTypeB/' . $id) ?>" class="btn btn-warning btn-sm btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกซ้ำ</a>
                                            <?php
                                        }
                                    }
                                } else if ($row->SHOWS == 3) {
                                    if ($row->CALLED == 0) {
                                        if ($row->TYPE == 0) {
                                            ?>
                                            <a href="<?php echo base_url('member/resetStatusAgainTypeA/' . $id) ?>" class="btn btn-success btn-sm btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกคิว</a>
                                        <?php } else if ($row->TYPE == 1) {
                                            ?>
                                            <a href="<?php echo base_url('member/resetStatusAgainTypeB/' . $id) ?>" class="btn btn-success btn-sm btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกคิว</a>
                                            <?php
                                        }
                                    } else if ($row->CALLED == 1) {
                                        if ($row->TYPE == 0) {
                                            ?>
                                            <a href="<?php echo base_url('member/resetStatusAgainTypeA/' . $id) ?>" class="btn btn-warning btn-sm btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกซ้ำ</a>
                                        <?php } else if ($row->TYPE == 1) {
                                            ?>
                                            <a href="<?php echo base_url('member/resetStatusAgainTypeB/' . $id) ?>" class="btn btn-warning btn-sm btn-block  text-white"><i class="fa fa-bell-o"></i> เรียกซ้ำ</a>
                                            <?php
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                } else {
                    ?>           
                <div class="btn-group-sm" role="group" aria-label="ลบคิวเพื่อให้คนอื่นจองต่อ">
                    <button type="button" class="btn btn-secondary"><i class="fa fa-remove"></i> ยกเลิกคิวแล้ว</button>
                    <a href="<?php echo base_url('manage/deletequetoday/' . $id) ?>" class="btn btn-warning text-white" onclick="return confirm('โปรดยืนยันการลบคิว')"><i class="fa fa-remove"></i> Drop</a>
                </div>

                <?php
            }
        }
        ?>
        </tbody>        
    </table>
</div>