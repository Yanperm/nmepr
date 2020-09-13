<div id="Person-5" class="box">
    <div class="nav-pills box-header">
        <i class="icon-user icon-large"></i>
        <h5>รายละเอียดและประวัติการรักษาคนไข้ในคลินิกของท่าน</h5>
    </div>
    <div class="box-content box-table pattern pattern-sandstone">
        <section id="my-account-security-form" class="page container">
            <form id="userSecurityForm" class="form-horizontal" action="dashboard.html" method="post">
                <div class="container">                    
                    <div class="row">
                        <div id="acct-password-row" class="span7">
                            <fieldset>
                                <legend>ประวัติคนไข้</legend><br>
                                <div class="control-group ">
                                    <label class="control-label">หมายเลขบัตรประชาชน <span class="required">*</span></label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <input class="span4" id="appendedInputButton" type="text" autocomplete="off" autofocus="">
                                            <button class="btn btn-info" type="button"><i class="icon-search"></i> ค้นข้อมูลคนไข้</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">ชื่อสกุล</label>
                                    <div class="controls">
                                        <input id="new-pass-control" name="newPassword" class="span4" type="password" value="" autocomplete="off" disabled="">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">ที่อยู่</label>
                                    <div class="controls">
                                        <input id="new-pass-verify-control" name="newPasswordVerification" class="span4" type="password" value="" autocomplete="off" disabled="">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">ข้อมูลติดต่อ</label>
                                    <div class="controls">
                                        <input id="new-pass-verify-control" name="newPasswordVerification" class="span4" type="password" value="" autocomplete="off" disabled="">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">อีเมล์</label>
                                    <div class="controls">
                                        <input id="new-pass-verify-control" name="newPasswordVerification" class="span4" type="password" value="" autocomplete="off" disabled="">

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-verify-row" class="span9">
                            <fieldset>
                                <legend>รายละเอียดการรักษา</legend>
                                <div class="control-group ">
                                    <label class="control-label">รายการรักษา</label>
                                    <div class="controls">                                        
                                        <textarea name="" class="span5" rows="3" cols="20" disabled="">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="challengeQuestion" class="control-label">ยาที่จ่าย</label>
                                    <div class="controls">
                                        <select id="challenge_question_control" class="span5" disabled="">
                                            <option value="">-- เลือกยาสั่งจ่ายให้คนไข้ --</option>
                                            <?php
                                            $i = 1;
                                            $CLINIC = "CL404";
                                            $Dashs = $this->db->query("SELECT * FROM tbncds WHERE CLINICID = '$CLINIC'");
                                            foreach ($Dashs->result() as $rows) {
                                                ?>
                                                <option value="<?php echo $rows->NCDNAME; ?>">
                                                    <?php echo $rows->NCDNAME; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">จำนวน</label>
                                    <div class="controls">
                                        <input id="challenge-answer-control" name="challengeAnswer" class="span5" type="password" value="" autocomplete="false" disabled="">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">ราคารวมทั้งหมด</label>
                                    <div class="controls">
                                        <input id="challenge-answer-verify-control" name="challengeAnswerVerification" class="span5" type="password" value="" autocomplete="false" disabled="">

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <footer id="submit-actions" class="form-actions">
                        <button id="submit-button" type="submit" class="btn btn-success" name="action" value="CONFIRM" disabled="">บันทึกผลการรักษา</button>
                        <button type="submit" class="btn" name="action" value="CANCEL" disabled="">ยกเลิกรายการ</button>
                    </footer>
                </div>
            </form>
        </section>

    </div>
</div>