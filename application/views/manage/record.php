<script type="text/javascript">
    function autoTab2(obj, typeCheck) {
        if (typeCheck == 1) {
            var pattern = new String("_-____-_____-_-__"); // กำหนดรูปแบบในนี้
            var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
        } else {
            var pattern = new String("__-____-____"); // กำหนดรูปแบบในนี้
            var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
        }
        var returnText = new String("");
        var obj_l = obj.value.length;
        var obj_l2 = obj_l - 1;
        for (i = 0; i < pattern.length; i++) {
            if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
                returnText += obj.value + pattern_ex;
                obj.value = returnText;
            }
        }
        if (obj_l >= pattern.length) {
            obj.value = obj.value.substr(0, pattern.length);
        }
    }
</script>
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
                <br/>
                <?php
                $day = date("Y-m-d");
                $bookingid = $this->session->userdata('bookingid');
                $patientid = $this->session->userdata('patientid');
                $checkpatien = $this->db->query("SELECT * FROM tbpatients WHERE IDCARD = '$patientid'");
                $rowx = $checkpatien->row();
                $num = $checkpatien->num_rows();
                $Dash = $this->db->query("SELECT * FROM tbmembers WHERE IDCARD = '$patientid'");
                foreach ($Dash->result() as $row) {
                    ?>
                    <table class="table-condensed">
                        <tbody>
                            <tr>
                                <td align="right"><b>หมายเลขบัตรประชาชน</b></td>
                                <td><b><?php echo $row->IDCARD; ?></b></td>
                            </tr>
                            <tr>
                                <td align="right"><b>ชื่อสกุลคนไข้</b></td>
                                <td><?php echo $row->CUSTOMERNAME; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>วันเกิด</b></td>
                                <td><?php echo $row->BIRTHDAY; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>วันที่เป็นสมาชิก</b></td>
                                <td><?php echo $row->CREATE_DATE; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>ประวัติ</b></td>
                                <td>
                                    <?php
                                    if ($checkpatien->num_rows() > 0) {
                                        echo '<span class="label label-success">ทำประวัติแล้ว</span>';
                                    } else {
                                        echo '<span class="label label-warning">ยังไม่ได้ทำประวัติ</span>';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td align="right"><b>Visit Number</b></td>
                                <td><?php echo $this->session->userdata('bookingid') ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                }
                ?>
            </div>
            <div class="span4 offset4" style="border: 1px solid #F02A0F; margin-top: 20px; margin-right: 20px; border-radius: 5px;">
                <br/>
                <div style="margin: 5px; margin-left: 50px;" align="left">
                    <font color="red">
                    <h1>
                        <b>
                            <i class="icon-info-sign"></i> แพ้ยา
                        </b>
                    </h1>
                    <?php
                    if ($num >= 1) {
                        echo $rowx->PATIEN_DRUG_ALLERGY;
                    } else {
                        
                    }
                    ?>

                    <?php
                    if ($num >= 1) {
                        echo $rowx->PATIEN_DRUG_ALLERGY_DETAIL;
                    } else {
                        
                    }
                    ?>
                    <br/>                    
                    <?php
                    if ($num >= 1) {
                        echo "<b>โรคประจำตัว</b> :" . $rowx->PATIEN_DISEASE;
                    } else {
                        
                    }
                    ?>

                    </font>
                </div>
                <br/>
            </div>

        </div>
        <hr/>
        <script>
            $(document).ready(function () {
                $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
                    localStorage.setItem('activeTab', $(e.target).attr('href'));
                });
                var activeTab = localStorage.getItem('activeTab');
                if (activeTab) {
                    $('#myTab a[href="' + activeTab + '"]').tab('show');
                }
            });</script>
        <div class="container">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#tab1" data-toggle="tab"><b><i class="icon-info-sign"></i> รายการตรวจวินัจฉัย</b></a></li>
                <li><a href="#tab2" data-toggle="tab"><i class="icon-user"></i> ข้อมูลผู้ป่วย</a></li>
                <li><a href="#tab3" data-toggle="tab"><i class="icon-book"></i> การรักษา</a></li>
                <li><a href="#tab5" data-toggle="tab"><i class="icon-folder-open"></i> ห้องยา</a></li>
                <li><a href="#tab4" data-toggle="tab"><i class="icon-credit-card"></i> ค่าใช้จ่าย</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <div class="container">
                    <div class="row">
                        <div class="span8">
                            <div class="nav-pills box-header">
                                <i class="icon-book icon-large"></i>
                                <h5>รายการตรวจล่าสุด</h5>
                            </div>
                            <table class="table table-condensed table-striped table-bordered pattern pattern-white-linen">
                                <thead>
                                    <tr style="background-color: #002752">
                                        <th>วินัจฉัย</th>
                                        <th>วันที่ทำรายการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $history1 = $this->db->get_where('tbpatient_history', array('IDCARD' => $patientid));
                                    foreach ($history1->result() as $rowhis1) {
                                        ?>
                                        <tr>
                                            <td><?php echo $rowhis1->PH3 ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($rowhis1->CREATE)); ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="span8">
                            <div class="nav-pills box-header">
                                <i class="icon-user-md icon-large"></i>
                                <h5>ยาปัจจุบัน</h5>
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
                                    $history2 = $this->db->get_where('tbpatient_medical', array('IDCARD' => $patientid));
                                    foreach ($history2->result() as $rowhis2) {
                                        ?>
                                        <tr>
                                            <td><?php echo $rowhis2->PH1 ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($rowhis2->CREATE)); ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br/>
            </div>
            <div class="tab-pane" id="tab2">
                <?php
                $checkpatiens = $this->db->query("SELECT * FROM tbpatients WHERE IDCARD = '$patientid'");
                $numsx = $checkpatiens->num_rows();
                $rowpatient = $checkpatiens->row();
                if ($numsx != 1) {
                    ?>
                    <!-- Profile -->
                    <section id="my-account-security-form" class="page container">
                        <form id="userSecurityForm" class="form-horizontal" action="<?php echo base_url('patient/createPatien') ?>" method="post">
                            <div class="container">
                                <?php if (isset($message)) { ?>
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>สำเร็จ</strong> <?php echo $message; ?>
                                    </div>
                                <?php } ?>
                                <?php if (isset($messages)) { ?>
                                    <div class="alert alert-warning">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>คำเตือน</strong> <?php echo $messages; ?>
                                    </div>
                                <?php } ?>
                                <a class="btn btn-large" href="#myModal" role="button" data-toggle="modal">ข้อมูลสุขภาพ</a>
                                <hr/>
                                <form class="form-inline">
                                    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h3 id="myModalLabel">ข้อมูลสุขภาพ</h3>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="span4">
                                                    <fieldset>
                                                        <legend>Body Measurements</legend>
                                                        <input type="text" name="Wieght" class="span2 input-small" ng-model="weight" placeholder="น้ำหนัก" required="">
                                                        <input type="text" name="Height" class="span2 input-small" ng-model="height" placeholder="ส่วนสูง" required="">
                                                        <input type="text" name="BMI" class="span2 input-small" value="{{weight / (height / 100 * height / 100) | number : 2}}" readonly="" placeholder="BMI">
                                                        <input type="text" name="BodyTemp" class="span2 input-small" placeholder="อุณภูมิร่างกาย" required="">

                                                    </fieldset>
                                                </div>
                                                <div class="span3">
                                                    <fieldset>
                                                        <legend>Vitals</legend>                                            
                                                        <input type="text" name="BP" class="span3 input-small" placeholder="ความดัน" required="">
                                                        <input type="text" name="HR" class="span3 input-small" placeholder="อัตราการเต้นของหัวใจ" required="">
                                                        <input type="text" name="FBS" class="span3 input-small" placeholder="ระดับน้ำตาลในเลือด" required="">
                                                    </fieldset>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">ปิดหน้านี้</button>
                                            <button class="btn btn-primary" type="submit">บันทึก</button>
                                        </div>
                                </form>     
                            </div>
                            <div class="row">                                   
                                <div id="acct-password-row" class="span7">
                                    <fieldset>
                                        <legend>ข้อมูลผู้ป่วย</legend><br>
                                        <?php
                                        $profile = $this->db->query("SELECT * FROM tbmembers WHERE IDCARD = '$patientid'");
                                        foreach ($profile->result() as $rowprofile) {
                                            ?>
                                            <div class="control-group ">
                                                <label class="control-label">หมายเลขบัตรประชาชน <span class="required">*</span></label>
                                                <div class="controls">
                                                    <input id="current-pass-control" name="IDCARD" class="span4" id="data1" onkeyup="autoTab2(this, 1)" type="text" value="<?php echo $rowprofile->IDCARD; ?>" autocomplete="false">

                                                </div>
                                            </div>
                                            <div class="control-group ">
                                                <label class="control-label">ชื่อสกุล</label>
                                                <div class="controls">
                                                    <input id="new-pass-verify-control" name="PATIEN_NAME" class="span4" type="text" value="<?php echo $rowprofile->CUSTOMERNAME; ?>" autocomplete="false">

                                                </div>
                                            </div>
                                            <div class="control-group ">
                                                <label class="control-label">วันเดือนปีเกิด</label>
                                                <div class="controls">
                                                    <input id="new-pass-control" name="PATIEN_BDAY" class="span4" type="text" value="<?php echo $rowprofile->BIRTHDAY; ?>" autocomplete="false">

                                                </div>
                                            </div>
                                            <div class="control-group ">
                                                <label class="control-label">ที่อยู่</label>
                                                <div class="controls">
                                                    <input id="new-pass-verify-control" name="PATIEN_ADDRESS" class="span4" type="text" value="" autocomplete="false">

                                                </div>
                                            </div>
                                            <div class="control-group ">
                                                <label class="control-label">อีเมล์</label>
                                                <div class="controls">
                                                    <input id="new-pass-verify-control" name="PATIEN_EMAIL" class="span4" type="text" value="" autocomplete="false">

                                                </div>
                                            </div>
                                            <div class="control-group ">
                                                <label class="control-label">เบอร์โทร</label>
                                                <div class="controls">
                                                    <input id="new-pass-verify-control" name="PATIEN_PHONE" id="data2" onkeyup="autoTab2(this, 2)" class="span4" type="text" value="<?php echo $rowprofile->PHONE; ?>" autocomplete="false">

                                                </div>
                                            </div>
                                            <div class="control-group ">
                                                <label class="control-label">Line ID</label>
                                                <div class="controls">
                                                    <input id="new-pass-verify-control" name="PATIEN_LINEID"  class="span4" type="text" value="<?php echo $rowprofile->LINEID; ?>">
                                                </div>
                                            </div>

                                        </fieldset>
                                    </div>
                                    <div id="acct-verify-row" class="span9">
                                        <fieldset>
                                            <legend>ประวัติทางการแพทย์ </legend>
                                            <div class="control-group ">
                                                <label class="control-label">โรคประจำตัว</label>
                                                <div class="controls">
                                                    <input id="new-pass-verify-control" name="PATIEN_DISEASE" class="span4" type="text" value="" autocomplete="false">

                                                </div>
                                            </div>
                                            <div class="control-group ">
                                                <label class="control-label">แพ้ยา</label>
                                                <div class="controls">
                                                    <input id="new-pass-verify-control" name="PATIEN_DRUG_ALLERGY" class="span4" type="text" value="" autocomplete="false">

                                                </div>
                                            </div>
                                            <div class="control-group ">
                                                <label class="control-label">อาการแพ้ยา</label>
                                                <div class="controls">
                                                    <input id="new-pass-verify-control" name="PATIEN_DRUG_ALLERGY_DETAIL" class="span4" type="text" value="" autocomplete="false">

                                                </div>
                                            </div>
                                            <div class="control-group ">
                                                <label class="control-label">Note</label>
                                                <div class="controls">
                                                    <input id="challenge-answer-control" name="PATIEN_NOTE" class="span4" type="text" value="" autocomplete="false">

                                                </div>
                                            </div>
                                            <div class="control-group ">
                                                <label class="control-label">ผู้ติดต่อฉุกเฉิน</label>
                                                <div class="controls">
                                                    <input id="new-pass-verify-control" name="PATIEN_EMERGENCY_CONTACT" class="span4" type="text" value="" autocomplete="false">

                                                </div>
                                            </div>
                                            <div class="control-group ">
                                                <label class="control-label">เบอร์มือถือผู้ติดต่อฉุกเฉิน</label>
                                                <div class="controls">
                                                    <input id="new-pass-verify-control" name="PATIEN_EMERGENCY_PHONE" class="span4 input-element" type="number" value="" autocomplete="false">

                                                </div>
                                            </div>
                                            <div class="control-group ">
                                                <div class="controls">
                                                    <button id="submit-button" type="submit" class="btn btn-primary right" name="action" onclick="return confirm('ยืนยีนการบึนทกข้อมูล')" value="CONFIRM">บันทึก</button>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </fieldset>
                                </div>
                            </div>

                            </div>
                        </form>
                    </section>
                    <!-- End Profile -->
                    <?php
                } else {
                    ?>
                    <section id="my-account-security-form" class="page container">
                        <form id="userSecurityForm" class="form-horizontal" action="<?php echo base_url('patient/updatePatien') ?>" method="post">
                            <div class="container">
                                <?php if (isset($message)) { ?>
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>สำเร็จ</strong> <?php echo $message; ?>
                                    </div>
                                <?php } ?>
                                <?php if (isset($messages)) { ?>
                                    <div class="alert alert-warning">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>คำเตือน</strong> <?php echo $messages; ?>
                                    </div>
                                <?php } ?>
                                
                                <div class="row">
                                    <div id="acct-password-row" class="span7">
                                        <fieldset>
                                            <legend>ข้อมูลผู้ป่วย</legend><br>
                                            <?php
                                            $profile = $this->db->query("SELECT * FROM tbpatients WHERE IDCARD = '$patientid'");
                                            foreach ($profile->result() as $rowprofiles) {
                                                ?>
                                                <div class="control-group ">
                                                    <label class="control-label">หมายเลขบัตรประชาชน <span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input id="current-pass-control" name="IDCARD" class="span4" id="data1" readonly="" onkeyup="autoTab2(this, 1)" type="text" value="<?php echo $rowprofiles->IDCARD; ?>" autocomplete="false">

                                                    </div>
                                                </div>
                                                <div class="control-group ">
                                                    <label class="control-label">ชื่อสกุล</label>
                                                    <div class="controls">
                                                        <input id="new-pass-verify-control" name="PATIEN_NAME" class="span4" type="text" value="<?php echo $rowprofiles->PATIEN_NAME; ?>" autocomplete="false">

                                                    </div>
                                                </div>
                                                <div class="control-group ">
                                                    <label class="control-label">วันเดือนปีเกิด</label>
                                                    <div class="controls">
                                                        <input id="new-pass-control" name="PATIEN_BDAY" class="span4" type="text" value="<?php echo $rowprofiles->PATIEN_BDAY; ?>" autocomplete="false">

                                                    </div>
                                                </div>
                                                <div class="control-group ">
                                                    <label class="control-label">ที่อยู่</label>
                                                    <div class="controls">
                                                        <input id="new-pass-verify-control" name="PATIEN_ADDRESS" class="span4" type="text" value="<?php echo $rowprofiles->PATIEN_ADDRESS; ?>" autocomplete="false">

                                                    </div>
                                                </div>
                                                <div class="control-group ">
                                                    <label class="control-label">อีเมล์</label>
                                                    <div class="controls">
                                                        <input id="new-pass-verify-control" name="PATIEN_EMAIL" class="span4" type="text" value="<?php echo $rowprofiles->PATIEN_EMAIL; ?>" autocomplete="false">

                                                    </div>
                                                </div>
                                                <div class="control-group ">
                                                    <label class="control-label">เบอร์โทร</label>
                                                    <div class="controls">
                                                        <input id="new-pass-verify-control" name="PATIEN_PHONE" id="data2" onkeyup="autoTab2(this, 2)" class="span4" type="text" value="<?php echo $rowprofiles->PATIEN_PHONE; ?>" autocomplete="false">

                                                    </div>
                                                </div>
                                                <div class="control-group ">
                                                    <label class="control-label">Line ID</label>
                                                    <div class="controls">
                                                        <input id="new-pass-verify-control" name="PATIEN_LINEID" class="span4" type="text" value="<?php echo $rowprofiles->PATIEN_LINEID; ?>" autocomplete="false">

                                                    </div>
                                                </div>

                                            </fieldset>
                                        </div>
                                        <div id="acct-verify-row" class="span9">
                                            <fieldset>
                                                <legend>ประวัติทางการแพทย์ </legend>
                                                <div class="control-group ">
                                                    <label class="control-label">โรคประจำตัว</label>
                                                    <div class="controls">
                                                        <input id="new-pass-verify-control" name="PATIEN_DISEASE" class="span4" type="text" value="<?php echo $rowprofiles->PATIEN_DISEASE; ?>" autocomplete="false">

                                                    </div>
                                                </div>
                                                <div class="control-group ">
                                                    <label class="control-label">แพ้ยา</label>
                                                    <div class="controls">
                                                        <input id="new-pass-verify-control" name="PATIEN_DRUG_ALLERGY" class="span4" type="text" value="<?php echo $rowprofiles->PATIEN_DRUG_ALLERGY; ?>" autocomplete="false">

                                                    </div>
                                                </div>
                                                <div class="control-group ">
                                                    <label class="control-label">อาการแพ้ยา</label>
                                                    <div class="controls">
                                                        <input id="new-pass-verify-control" name="PATIEN_DRUG_ALLERGY_DETAIL" class="span4" type="text" value="<?php echo $rowprofiles->PATIEN_DRUG_ALLERGY_DETAIL; ?>" autocomplete="false">

                                                    </div>
                                                </div>
                                                <div class="control-group ">
                                                    <label class="control-label">Note</label>
                                                    <div class="controls">
                                                        <input id="challenge-answer-control" name="PATIEN_NOTE" class="span4" type="text" value="<?php echo $rowprofiles->PATIEN_NOTE; ?>" autocomplete="false">

                                                    </div>
                                                </div>
                                                <div class="control-group ">
                                                    <label class="control-label">ผู้ติดต่อฉุกเฉิน</label>
                                                    <div class="controls">
                                                        <input id="new-pass-verify-control" name="PATIEN_EMERGENCY_CONTACT" class="span4" type="text" value="<?php echo $rowprofiles->PATIEN_EMERGENCY_CONTACT; ?>" autocomplete="false">

                                                    </div>
                                                </div>
                                                <div class="control-group ">
                                                    <label class="control-label">เบอร์มือถือผู้ติดต่อฉุกเฉิน</label>
                                                    <div class="controls">
                                                        <input id="new-pass-verify-control" name="PATIEN_EMERGENCY_PHONE" class="span4 input-element" type="number" value="<?php echo $rowprofiles->PATIEN_EMERGENCY_PHONE; ?>" autocomplete="false">

                                                    </div>
                                                </div>
                                                <div class="control-group ">
                                                    <div class="controls">
                                                        <button id="submit-button" type="submit" class="btn btn-warning right" onclick="return confirm('ยืนยันการบันทึกข้อมูล')" name="action" value="CONFIRM">อัปเดตข้อมูลคนไข้</button>
                                                    </div>
                                                </div>

                                                <?php
                                            }
                                            ?>
                                        </fieldset>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </section>
                    <?php
                }
                ?>
            </div>
            <div class="tab-pane" id="tab3">
                <div class="container">
                    <div class="content">
                        <div class="span8">

                            <!-- form สำหรับบันทึกรายการตรวจ -->
                            <a href="<?php echo base_url('dashboard/record_history') ?>"><img src="<?php echo base_url('assets/images/icons/person-with-broken-arm.svg'); ?>" class="btn btn-info"/></a>
                            <a href="<?php echo base_url('dashboard/record_medical') ?>"><img src="<?php echo base_url('assets/images/icons/pill.svg'); ?>" width="32px" height="32px" class="btn"/></a>
                            <a href="<?php echo base_url('dashboard/record_lab') ?>"><img src="<?php echo base_url('assets/images/icons/chemistry-flask-with-liquid.svg'); ?>" class="btn"/></a>
                            <a href="<?php echo base_url('dashboard/record_procedure') ?>"><img src="<?php echo base_url('assets/images/icons/drug.svg'); ?>" class="btn"/></a>
                            <a href="<?php echo base_url('dashboard/record_certification_job') ?>"><img src="<?php echo base_url('assets/images/icons/certification.svg'); ?>" width="32px" height="32px" class="btn"/></a>
                            <a href="<?php echo base_url('dashboard/record_sumary') ?>"><img src="<?php echo base_url('assets/images/icons/lifeline-of-heartbeats-on-a-paper-on-a-clipboard.svg'); ?>" class="btn"/></a>
                            <!-- ปิด form สำหรับบันทึกรายการตรวจ -->
                        </div>
                        <div class="span1 offset6">
                            <a href="<?php echo base_url('dashboard/callques'); ?>" class="btn btn-success">Finish</a>
                        </div>
                        <br/><br/><br/>
                        <div id="MyModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <form action="<?php echo base_url('patient/patient_history') ?>" method="POST">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3 id="myModalLabel">Patient Record</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail">อาการ</label>
                                        <div class="controls">
                                            <input type="hidden" class="span7" name="IDCARD" value="<?php echo $patientid; ?>">
                                            <textarea name="PH1" class="span7" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail">ตรวจร่างกาย</label>
                                        <div class="controls">
                                            <textarea name="PH2"class="span7" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail">วินิจฉัย</label>
                                        <div class="controls">
                                            <textarea name="PH3"class="span7" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail">การรักษา</label>
                                        <div class="controls">
                                            <textarea name="PH4"class="span7" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="input-prepend input-append">
                                        <label class="control-label" for="inputEmail">ค่าตรวจ</label>
                                        <input class="span7" name="PH5" type="number">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">ปิด</button>
                                    <button class="btn btn-primary" type="submit">บันทึก</button>
                                </div>
                            </form>
                        </div>
                        <script>
                            $(document).ready(function () {
                                $(document).on('click', '#record', function () {
                                    var ph1 = $(this).data('ph1');
                                    var ph2 = $(this).data('ph2');
                                    var ph3 = $(this).data('ph3');
                                    var ph4 = $(this).data('ph4');
                                    var ph5 = $(this).data('ph5');
                                    $('#ph1').val(ph1);
                                    $('#ph2').val(ph2);
                                    $('#ph3').val(ph3);
                                    $('#ph4').val(ph4);
                                    $('#ph5').val(ph5);
                                    $('#model-item').modal('hide');
                                })
                            })

                        </script>
                        <div id="EditModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <form action="<?php echo base_url('patient/updatePatienHistory') ?>" method="POST">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3 id="myModalLabel">Edit Patient Record</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail">อาการ</label>
                                        <div class="controls">
                                            <input type="hidden" class="span7" name="IDCARD" value="<?php echo $patientid; ?>">
                                            <textarea name="PH1" class="span7" id="ph1" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail">ตรวจร่างกาย</label>
                                        <div class="controls">
                                            <textarea name="PH2"class="span7" id="ph2" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail">วินิจฉัย</label>
                                        <div class="controls">
                                            <textarea name="PH3"class="span7" id="ph3" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail">การรักษา</label>
                                        <div class="controls">
                                            <textarea name="PH4"class="span7" id="ph4" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="input-prepend input-append">
                                        <label class="control-label" for="inputEmail">ค่าตรวจ</label>
                                        <input class="span7" name="PH5" id="ph5" type="number">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-circle"></i> ปิด</button>
                                    <button class="btn btn-warning" type="submit"><i class="icon-edit"></i> แก้ไขข้อมูล</button>
                                </div>
                            </form>
                        </div>

                        <div id="Person-5" class="box">
                            <div class="box-header">
                                <i class="icon-user icon-large"></i>
                                <h5>Patient's Record</h5>
                                <?php
                                $his = $this->db->get_where('tbpatient_history', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid, 'CREATE' => $day));
                                $rowhis = $his->row();
                                $num = $his->num_rows();
                                if ($num == 1) {
                                    ?>
                                    <a class="btn btn-box-right" id="record" href="#EditModal" role="button" class="btn" data-toggle="modal"
                                       data-ph1="<?php echo $rowhis->PH1 ?>"
                                       data-ph2="<?php echo $rowhis->PH2 ?>"
                                       data-ph3="<?php echo $rowhis->PH3 ?>"
                                       data-ph4="<?php echo $rowhis->PH4 ?>"
                                       data-ph5="<?php echo $rowhis->PH5 ?>"
                                       >
                                        <i class="icon-edit"></i> EDIT
                                    </a>
                                    <?php
                                } else {
                                    ?>
                                    <a class="btn btn-box-right" href="#MyModal" role="button" class="btn" data-toggle="modal">
                                        <i class="icon-plus-sign"></i> ADD
                                    </a>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="box-content box-table">
                                <table class="table-bordered table-condensed" border="1" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>วันที่</th>
                                            <th>Visit Number</th>
                                            <th>อาการ</th>
                                            <th>ตรวจร่างกาย</th>
                                            <th>วินิจฉัย</th>
                                            <th>การรักษา</th>
                                            <th>ค่ารักษา</th>
                                            <th align="center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $x = 1;

                                        $history = $this->db->get_where('tbpatient_history', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid, 'CREATE' => $day));
                                        foreach ($history->result() as $rowhis) {
                                            $hisid = $rowhis->PHID;
                                            ?>
                                            <tr>
                                                <td align="center"><b><?php echo date("d-m-Y", strtotime($rowhis->CREATE)); ?></b></td>
                                                <td align="center"><?php echo $rowhis->BOOKINGID; ?></td>
                                                <td><?php echo $rowhis->PH1; ?></td>
                                                <td><?php echo $rowhis->PH2; ?></td>
                                                <td><?php echo $rowhis->PH3; ?></td>
                                                <td><?php echo $rowhis->PH4; ?></td>
                                                <td><?php echo $rowhis->PH5; ?></td>
                                                <td class="td-actions">
                                                    <a href="<?php echo base_url('patient/patient_delete/' . $hisid) ?>" class="btn-block btn btn-mini btn-danger" onclick="return confirm('แน่ใจหรือแม่ที่จะลบ ?')">
                                                        <i class="btn-icon-only icon-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab4">
                <div class="container">
                    <div id="Person-5" class="box">
                        <div class="box-header">
                            <i class="icon-user icon-large"></i>
                            <h5>Payment Detail</h5>
                        </div>
                        <div class="box-content box-table">
                            <table id="myTable" class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>วันที่</th >
                                        <th>รายการหัตถการ</th>
                                        <th>ราคา</th>
                                        <th class="td-actions">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>