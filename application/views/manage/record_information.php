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
<?php if ($bookingid == "view") { ?>
    <div class="container ">
        <a class="btn btn-primary btn-large" href="<?php echo base_url('dashboard/record_information/') ?>"><b>ข้อมูลทั่วไป</b></a>
        <a class="btn btn-large" href="<?php echo base_url('dashboard/record_health_history/') ?>"><b>ข้อมูลสุขภาพ</b></a>
    </div>
<?php } else { ?>
    <div class="container ">
        <a class="btn btn-primary btn-large" href="<?php echo base_url('dashboard/record_information/') ?>"><b>ข้อมูลทั่วไป</b></a>
        <a class="btn btn-large" href="<?php echo base_url('dashboard/record_health/') ?>"><b>ข้อมูลสุขภาพ</b></a>
    </div>
<?php } ?>
<?php
$checkpatiens = $this->db->query("SELECT * FROM tbpatients WHERE IDCARD = '$patientid'");
$numsx = $checkpatiens->num_rows();
$rowpatient = $checkpatiens->row();
if ($numsx != 1) { ?>
    <section id="my-account-security-form" class="page container">
        <form id="userSecurityForm" class="form-horizontal" action="<?php echo base_url('patient/createPatien') ?>" method="post">
            <div class="container">
                <?php
                $message = $this->session->userdata('message');
                if ($message != '') { ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>สำเร็จ</strong> <?php echo $message; ?>
                    </div>
                <?php
                    $this->session->unset_userdata('message');
                } ?>
                <?php
                $messages = $this->session->userdata('messages');
                if ($messages != '') { ?>
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>คำเตือน</strong> <?php echo $messages; ?>
                    </div>
                <?php
                    $this->session->unset_userdata('messages');
                } ?>
            </div>
            <div class="row">
                <div id="acct-password-row" class="span8">
                    <fieldset>
                        <legend>ข้อมูลผู้ป่วย</legend><br>
                        <?php
                        $profile = $this->db->query("SELECT * FROM tbmembers WHERE IDCARD = '$patientid'");
                        foreach ($profile->result() as $rowprofile) { ?>
                            <div class="control-group ">
                                <label class="control-label">หมายเลขบัตรประชาชน <span class="required">*</span></label>
                                <div class="controls">
                                    <input id="current-pass-control" name="IDCARD" class="span5" id="data1" onkeyup="autoTab2(this, 1)" type="text" value="<?php echo $rowprofile->IDCARD; ?>" autocomplete="false">
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">ชื่อสกุล</label>
                                <div class="controls">
                                    <select name="PATIEN_NAMEPREFIX" style=" width: 110px; " required>
                                        <option value="">กรุณาเลือกคำนามหน้าชื่อ</option>
                                        <option value="นาย">นาย</option>
                                        <option value="น.ส.">น.ส.</option>
                                        <option value="นาง">นาง</option>
                                        <option value="ด.ช.">ด.ช.</option>
                                        <option value="ด.ญ.">ด.ญ.</option>
                                    </select>
                                    <input id="new-pass-verify-control" name="PATIEN_NAME" style=" width: 222px; " type="text" value="<?php echo $rowprofile->CUSTOMERNAME; ?>" autocomplete="false">
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">วันเดือนปีเกิด</label>
                                <div class="controls">
                                    <input id="new-pass-control" name="PATIEN_BDAY" class="span5" type="date" value="<?php echo $rowprofile->BIRTHDAY; ?>" autocomplete="false">

                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">ที่อยู่</label>
                                <div class="controls">
                                    <input id="new-pass-verify-control" name="PATIEN_ADDRESS" class="span5" type="text" value="" autocomplete="false">

                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">อีเมล์</label>
                                <div class="controls">
                                    <input id="new-pass-verify-control" name="PATIEN_EMAIL" class="span5" type="text" value="" autocomplete="false">

                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">เบอร์โทร</label>
                                <div class="controls">
                                    <input id="new-pass-verify-control" name="PATIEN_PHONE" id="data2" onkeyup="autoTab2(this, 2)" class="span5" type="text" value="<?php echo $rowprofile->PHONE; ?>" autocomplete="false">

                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Line ID</label>
                                <div class="controls">
                                    <input id="new-pass-verify-control" name="PATIEN_LINEID" class="span5" type="text" value="<?php echo $rowprofile->LINEID; ?>">
                                </div>
                            </div>
                    </fieldset>
                </div>
                <div id="acct-verify-row" class="span8">
                    <fieldset>
                        <legend>ประวัติทางการแพทย์ </legend>
                        <div class="control-group ">
                            <label class="control-label">โรคประจำตัว</label>
                            <div class="controls">
                                <input id="new-pass-verify-control" name="PATIEN_DISEASE" class="span5" type="text" value="" autocomplete="false">

                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">แพ้ยา</label>
                            <div class="controls">
                                <input id="new-pass-verify-control" name="PATIEN_DRUG_ALLERGY" class="span5" type="text" value="" autocomplete="false">

                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">อาการแพ้ยา</label>
                            <div class="controls">
                                <input id="new-pass-verify-control" name="PATIEN_DRUG_ALLERGY_DETAIL" class="span5" type="text" value="" autocomplete="false">

                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Note</label>
                            <div class="controls">
                                <input id="challenge-answer-control" name="PATIEN_NOTE" class="span5" type="text" value="" autocomplete="false">

                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">ผู้ติดต่อฉุกเฉิน</label>
                            <div class="controls">
                                <input id="new-pass-verify-control" name="PATIEN_EMERGENCY_CONTACT" class="span5" type="text" value="" autocomplete="false">

                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">เบอร์มือถือผู้ติดต่อฉุกเฉิน</label>
                            <div class="controls">
                                <input id="new-pass-verify-control" name="PATIEN_EMERGENCY_PHONE" class="span5 input-element" type="number" value="" autocomplete="false">

                            </div>
                        </div>
                        <?php if ($bookingid != "view") { ?>
                            <div class="control-group ">
                                <div class="controls">
                                    <button id="submit-button" type="submit" class="btn btn-primary right" name="action" onclick="return confirm('ยืนยีนการบึนทกข้อมูล')" value="CONFIRM">บันทึก</button>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    </fieldset>
                </div>
            </div>
        </form>
    </section>
<?php } else { ?>
    <section id="my-account-security-form" class="page container">
        <form id="userSecurityForm" class="form-horizontal" action="<?php echo base_url('patient/updatePatien') ?>" method="post">
            <div class="container">
                <?php
                $message = $this->session->userdata('message');
                if ($message != '') { ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>สำเร็จ</strong> <?php echo $message; ?>
                    </div>
                <?php
                    $this->session->unset_userdata('message');
                } ?>
                <?php
                $messages = $this->session->userdata('messages');
                if ($messages != '') { ?>
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>คำเตือน</strong> <?php echo $messages; ?>
                    </div>
                <?php
                    $this->session->unset_userdata('messages');
                } ?>
            </div>
            <div class="row">
                <div id="acct-password-row" class="span8">
                    <fieldset>
                        <legend>ข้อมูลผู้ป่วย</legend><br>
                        <?php
                        $profile = $this->db->query("SELECT * FROM tbpatients WHERE IDCARD = '$patientid'");
                        foreach ($profile->result() as $rowprofiles) {
                        ?>
                            <div class="control-group ">
                                <label class="control-label">หมายเลขบัตรประชาชน <span class="required">*</span></label>
                                <div class="controls">
                                    <input id="current-pass-control" name="IDCARD" class="span5" id="data1" readonly="" onkeyup="autoTab2(this, 1)" type="text" value="<?php echo $rowprofiles->IDCARD; ?>" autocomplete="false">
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">ชื่อสกุล</label>
                                <div class="controls">
                                    <select name="PATIEN_NAMEPREFIX" style=" width: 110px; " required>
                                        <option value="">คำนำหน้าชื่อ</option>
                                        <option value="นาย" <?php if ($rowprofiles->PATIEN_NAMEPREFIX == 'นาย') {
                                                                echo "selected";
                                                            } ?>>นาย</option>
                                        <option value="น.ส." <?php if ($rowprofiles->PATIEN_NAMEPREFIX == 'น.ส.') {
                                                                    echo "selected";
                                                                } ?>>น.ส.</option>
                                        <option value="นาง" <?php if ($rowprofiles->PATIEN_NAMEPREFIX == 'นาง') {
                                                                echo "selected";
                                                            } ?>>นาง</option>
                                        <option value="ด.ช." <?php if ($rowprofiles->PATIEN_NAMEPREFIX == 'ด.ช.') {
                                                                    echo "selected";
                                                                } ?>>ด.ช.</option>
                                        <option value="ด.ญ." <?php if ($rowprofiles->PATIEN_NAMEPREFIX == 'ด.ญ.') {
                                                                    echo "selected";
                                                                } ?>>ด.ญ.</option>
                                    </select>
                                    <input id="new-pass-verify-control" name="PATIEN_NAME" style=" width: 222px; " type="text" value="<?php echo $rowprofiles->PATIEN_NAME; ?>" autocomplete="false">
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">วันเดือนปีเกิด</label>
                                <div class="controls">
                                    <input id="new-pass-control" name="PATIEN_BDAY" class="span5" type="date" value="<?php echo $rowprofiles->PATIEN_BDAY; ?>" autocomplete="false">
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">ที่อยู่</label>
                                <div class="controls">
                                    <input id="new-pass-verify-control" name="PATIEN_ADDRESS" class="span5" type="text" value="<?php echo $rowprofiles->PATIEN_ADDRESS; ?>" autocomplete="false">
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">อีเมล์</label>
                                <div class="controls">
                                    <input id="new-pass-verify-control" name="PATIEN_EMAIL" class="span5" type="text" value="<?php echo $rowprofiles->PATIEN_EMAIL; ?>" autocomplete="false">
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">เบอร์โทร</label>
                                <div class="controls">
                                    <input id="new-pass-verify-control" name="PATIEN_PHONE" id="data2" onkeyup="autoTab2(this, 2)" class="span5" type="text" value="<?php echo $rowprofiles->PATIEN_PHONE; ?>" autocomplete="false">
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Line ID</label>
                                <div class="controls">
                                    <input id="new-pass-verify-control" name="PATIEN_LINEID" class="span5" type="text" value="<?php echo $rowprofiles->PATIEN_LINEID; ?>" autocomplete="false">
                                </div>
                            </div>

                    </fieldset>
                </div>
                <div id="acct-verify-row" class="span8">
                    <fieldset>
                        <legend>ประวัติทางการแพทย์ </legend>
                        <div class="control-group ">
                            <label class="control-label">โรคประจำตัว</label>
                            <div class="controls">
                                <input id="new-pass-verify-control" name="PATIEN_DISEASE" class="span5" type="text" value="<?php echo $rowprofiles->PATIEN_DISEASE; ?>" autocomplete="false">
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">แพ้ยา</label>
                            <div class="controls">
                                <input id="new-pass-verify-control" name="PATIEN_DRUG_ALLERGY" class="span5" type="text" value="<?php echo $rowprofiles->PATIEN_DRUG_ALLERGY; ?>" autocomplete="false">
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">อาการแพ้ยา</label>
                            <div class="controls">
                                <input id="new-pass-verify-control" name="PATIEN_DRUG_ALLERGY_DETAIL" class="span5" type="text" value="<?php echo $rowprofiles->PATIEN_DRUG_ALLERGY_DETAIL; ?>" autocomplete="false">
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Note</label>
                            <div class="controls">
                                <input id="challenge-answer-control" name="PATIEN_NOTE" class="span5" type="text" value="<?php echo $rowprofiles->PATIEN_NOTE; ?>" autocomplete="false">
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">ผู้ติดต่อฉุกเฉิน</label>
                            <div class="controls">
                                <input id="new-pass-verify-control" name="PATIEN_EMERGENCY_CONTACT" class="span5" type="text" value="<?php echo $rowprofiles->PATIEN_EMERGENCY_CONTACT; ?>" autocomplete="false">
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">เบอร์มือถือผู้ติดต่อฉุกเฉิน</label>
                            <div class="controls">
                                <input id="new-pass-verify-control" name="PATIEN_EMERGENCY_PHONE" class="span5 input-element" type="number" value="<?php echo $rowprofiles->PATIEN_EMERGENCY_PHONE; ?>" autocomplete="false">
                            </div>
                        </div>
                        <?php if ($bookingid != "view") { ?>
                            <div class="control-group ">
                                <div class="controls">
                                    <button id="submit-button" type="submit" class="btn btn-warning right" onclick="return confirm('ยืนยันการบันทึกข้อมูล')" name="action" value="CONFIRM">อัปเดตข้อมูลคนไข้</button>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    </fieldset>
                </div>
            </div>
        </form>
    </section>
<?php } ?>
<br>
<!-- สำคัญปิดส่วนหัวไฟล์ patientprofilehead.php -->
</div> <!-- <div class="box" style="background-color: #F0F0F0"> -->
</div> <!-- <div class="box-content box-table"> -->