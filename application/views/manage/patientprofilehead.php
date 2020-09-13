<div class="box" style="background-color: #F0F0F0">
    <div class="nav-pills box-header">
        <i class="icon-user icon-large"></i>
        <h5>แฟ้มประวัติคนไข้คลินิก</h5>
    </div>
    <div class="box-content box-table">
        <div class="row">
            <div class="span2">
                <div class="" style="margin: 5px;">
                    &nbsp;<dd><img src="<?php echo base_url('assets/images/607414.svg') ?>" width="140px" height="140px"></dd>
                </div>
            </div>
            <div class="span6">
                <br />
                <?php
                $patient = $this->db->get_where('tbpatients', array('IDCARD' => $patientid));
                $pa = $patient->num_rows();
                $rowpa = $patient->row();
                $member = $this->db->get_where('tbmembers', array('IDCARD' => $patientid))->row();
                ?>
                <table class="table-condensed">
                    <tbody>
                        <?php if ($pa > 0) { ?>
                            <tr>
                                <td align="right"><b>หมายเลขบัตรประชาชน</b></td>
                                <td><b><?php echo $rowpa->IDCARD; ?></b></td>
                            </tr>
                            <tr>
                                <td align="right"><b>ชื่อสกุลคนไข้</b></td>
                                <td><?php echo "$rowpa->PATIEN_NAMEPREFIX"; ?><?php echo "$rowpa->PATIEN_NAME"; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>วันเกิด</b></td>
                                <td><?php echo $rowpa->PATIEN_BDAY; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>วันที่เป็นสมาชิก</b></td>
                                <td><?php echo $member->CREATE_DATE; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>ประวัติ</b></td>
                                <td>
                                    <span class="label label-success">ทำประวัติแล้ว</span>
                                </td>
                            </tr>
                            <tr>
                                <td align="right"><b>Visit Number</b></td>
                                <td><?php if ($bookingid != "view") {
                                        echo $bookingid;
                                    } ?></td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td align="right"><b>หมายเลขบัตรประชาชน</b></td>
                                <td><b><?php echo $member->IDCARD; ?></b></td>
                            </tr>
                            <tr>
                                <td align="right"><b>ชื่อสกุลคนไข้</b></td>
                                <td><?php echo "$member->CUSTOMERNAME"; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>วันเกิด</b></td>
                                <td><?php echo $member->BIRTHDAY; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>วันที่เป็นสมาชิก</b></td>
                                <td><?php echo $member->CREATE_DATE; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>ประวัติ</b></td>
                                <td>
                                    <span class="label label-warning">ยังไม่ได้ทำประวัติ</span>
                                </td>
                            </tr>
                            <tr>
                                <td align="right"><b>Visit Number</b></td>
                                <td><?php if ($bookingid != "view") {
                                        echo $bookingid;
                                    } ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="span4 offset4" style="border: 1px solid #F02A0F; margin-top: 20px; margin-right: 20px; border-radius: 5px;">
                <br />
                <div style="margin: 5px; margin-left: 50px;" align="left">
                    <font color="red">
                        <h1><b><i class="icon-info-sign"></i> แพ้ยา</b></h1>
                        <?php if ($pa > 0) {
                            echo $rowpa->PATIEN_DRUG_ALLERGY;
                            echo $rowpa->PATIEN_DRUG_ALLERGY_DETAIL;
                            echo "<br>";
                            echo "<b>โรคประจำตัว</b> :" . $rowpa->PATIEN_DISEASE;
                        } ?>
                    </font>
                </div>
                <br />
            </div>
        </div>
        <hr />
        <div class="container">
            <ul class="nav nav-tabs">
                <?php if ($bookingid == "view") { ?>
                    <li <?php if ($page == 1) {
                            echo 'class="active"';
                        } ?>><a href="<?php echo base_url('dashboard/record_historys/' . $patientid . '/' . $bookingid) ?>"><b><i class="icon-info-sign"></i> รายการตรวจวินัจฉัย</b></a></li>
                    <li <?php if ($page == 2) {
                            echo 'class="active"';
                        } ?>><a href="<?php echo base_url('dashboard/record_information/') ?>"><i class="icon-user"></i> ข้อมูลผู้ป่วย</a></li>
                    <li <?php if ($page == 3) {
                            echo 'class="active"';
                        } ?>><a href="<?php echo base_url('dashboard/record_patienr_history/') ?>"><i class="icon-book"></i> การรักษา</a>
                    </li>
                <?php } else { ?>
                    <li <?php if ($page == 1) {
                            echo 'class="active"';
                        } ?>><a href="<?php echo base_url('dashboard/record_historys/' . $patientid . '/' . $bookingid) ?>"><b><i class="icon-info-sign"></i> รายการตรวจวินัจฉัย</b></a></li>
                    <li <?php if ($page == 2) {
                            echo 'class="active"';
                        } ?>><a href="<?php echo base_url('dashboard/record_information/') ?>"><i class="icon-user"></i> ข้อมูลผู้ป่วย</a></li>
                    <?php if($this->session->userdata('Level') != '3'){ ?>
                    <li <?php if ($page == 3) {
                            echo 'class="active"';
                        } ?>><a href="<?php echo base_url('dashboard/record_patienr/') ?>"><i class="icon-book"></i> การรักษา</a>
                    </li>
                    <?php }?>
                    <li <?php if ($page == 4) {
                            echo 'class="active"';
                        } ?>><a href="<?php echo base_url('dashboard/record_drug/' . $patientid . '/' . $bookingid) ?>"><i class="icon-folder-open"></i> ห้องยา</a></li>
                    <li <?php if ($page == 5) {
                            echo 'class="active"';
                        } ?>><a href="<?php echo base_url('dashboard/record_cost/' . $patientid . '/' . $bookingid) ?>"><i class="icon-credit-card"></i> ค่าใช้จ่าย</a></li>
                <?php } ?>
            </ul>
        </div>