<script type="text/javascript">
    function autoTab2(obj, typeCheck) {
        /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
         หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
         4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
         รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
         หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
         ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
         */
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
<div id="Person-5" class="box">
    <div class="nav-pills box-header">
        <i class="icon-user icon-large"></i>
        <h5>แฟ้มประวัติคนไข้คลินิก</h5>
    </div>
    <div class="box-content box-table">
        <div class="row">
            <div class="span2">
                <div class="" style="margin: 5px;">
                    &nbsp;<dd><img src="<?php echo base_url('assets/images/iconfinder_bear_russian_animal_avatar_4043234.svg') ?>" width="140px" height="140px"></dd>                    
                </div>
            </div>
            <div class="span6">
                <br/>                
                <?php
                $checkpatien = $this->db->query("SELECT * FROM tbpatients WHERE IDCARD = '$id'");
                $rowx = $checkpatien->row();
                $Dash = $this->db->query("SELECT * FROM tbmembers WHERE IDCARD = '$id'");
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
                                    }else{
                                        echo '<span class="label label-warning">ยังไม่ได้ทำประวัติ</span>';
                                    }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                }
                ?>
            </div>
            <div class="span4 offset4">
                <br/>
                <h1><b><i class="icon-info-sign"></i> แพ้ยา: อาการ</b></h1>
                <strong>Sulfa Group:  Severe Rash</strong>      
            </div>
        </div>
        <hr/>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab"><b><i class="icon-info-sign"></i> Summary</b></a></li>
            <li><a href="#tab2" data-toggle="tab"><i class="icon-user"></i> ข้อมูลผู้ป่วย</a></li>
            <li><a href="#tab3" data-toggle="tab"><i class="icon-book"></i> การรักษา</a></li>
            <li><a href="#tab4" data-toggle="tab"><i class="icon-credit-card"></i> ค่าใช้จ่าย</a></li>
        </ul>
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
                                        <th>รายการ</th>
                                        <th>วันที่ทำรายการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> Respiratory Tract Infection</td>
                                        <td>12/08/19</td>
                                    </tr>
                                    <tr>
                                        <td> Gastro-Esophageal Reflux Disease</td>
                                        <td>12/08/19</td>
                                    </tr>
                                    <tr>
                                        <td> Common Cold</td>
                                        <td>12/08/19</td>
                                    </tr>
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
                                    <tr>
                                        <td>Amoxicillin 500 mg</td>
                                        <td>12/08/19</td>
                                    </tr>
                                    <tr>
                                        <td>Cetirizine 10 mg</td>
                                        <td>12/08/19</td>
                                    </tr>
                                    <tr>
                                        <td>Paracetamol 500 mg</td>
                                        <td>12/08/19</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br/>
            </div>
            <div class="tab-pane" id="tab2">
                <section id="my-account-security-form" class="page container">
                    <form id="userSecurityForm" class="form-horizontal" action="<?php echo base_url('patient/createPatien') ?>" method="post">
                        <div class="container">
                            <div class="row">
                                <div id="acct-password-row" class="span7">
                                    <fieldset>
                                        <legend>ข้อมูลผู้ป่วย</legend><br>
                                        <?php
                                        $profile = $this->db->query("SELECT * FROM tbmembers WHERE IDCARD = '$id'");
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

                                        </fieldset>
                                    </div>
                                    <div id="acct-verify-row" class="span9">
                                        <fieldset>
                                            <legend>อาการทางการแพทย์</legend>
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
                                            <?php
                                        }
                                        ?>
                                    </fieldset>
                                </div>
                            </div>
                            <footer id="submit-actions" class="form-actions">
                                <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM">บันทึกเพื่อทำประวัติคนไข้</button>
                                <button type="submit" class="btn" name="action" value="CANCEL">Cancel</button>
                                <hr/>
                                <?php if (isset($message)) { ?>   
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>สำเร็จ!</strong> ทำประวัติคนไข้เรียบร้อยแล้ว.
                                    </div>
                                <?php } ?>
                            </footer>
                        </div>
                    </form>
                </section>
            </div>
            <div class="tab-pane" id="tab3">
                <div class="container">

                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#">รายการหัตถการ</a>
                        </li>
                        <li><a href="#Patient" role="button" data-toggle="modal">1. Patient's Record</a></li>
                        <li><a href="#Medical" role="button" data-toggle="modal">2. Medical Record</a></li>
                        <li><a href="#Lab" role="button" data-toggle="modal">3. Lab Record</a></li>
                        <li><a href="#Procedure" role="button" data-toggle="modal">4. Procedure Record</a></li>
                    </ul>

                    <div id="Person-5" class="box">
                        <div class="box-header">
                            <i class="icon-user icon-large"></i>
                            <h5>Patient's Record</h5>
                        </div>
                        <div class="box-content box-table">
                            <table id="myTable" class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>วันที่</th >
                                        <th>อาการ</th>
                                        <th>ตรวจร่างกาย</th>
                                        <th>วินิจฉัย</th>
                                        <th>การรักษา</th>
                                        <th>ค่ารักษา</th>
                                        <th class="td-actions">Action</th>
                                    </tr>
                                </thead>
                                <tbody>                                
                                    <tr>
                                        <td>11/08/2019</td>
                                        <td>Fever, Sore Throat, runny nose</td>
                                        <td>T 38.2 c,
                                            appears well, 
                                            nasal congestion, 
                                            Pharynx moderately injected, 
                                            tonsils not enlarge, 
                                            Cervical LN not enlarge, 
                                            Otherwise within normal limits 
                                        </td>
                                        <td>Acute pharyngitis (Viral infection)</td>
                                        <td>Supportive Medicine</td>
                                        <td>300</td>
                                        <td class="td-actions">                           
                                            <a href="" class="btn btn-mini btn-danger">
                                                <i class="btn-icon-only icon-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-mini btn-danger">
                                                <i class="btn-icon-only icon-remove"></i>
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
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
                                    <tr>
                                        <td>11/08/2019</td>
                                        <td>Fever, Sore Throat, runny nose</td>                                    
                                        <td>300</td>
                                        <td class="td-actions">                           
                                            <a href="" class="btn btn-mini btn-danger">
                                                <i class="btn-icon-only icon-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-mini btn-danger">
                                                <i class="btn-icon-only icon-remove"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>11/08/2019</td>
                                        <td>Fever, Sore Throat, runny nose</td>                                    
                                        <td>300</td>
                                        <td class="td-actions">                           
                                            <a href="" class="btn btn-mini btn-danger">
                                                <i class="btn-icon-only icon-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-mini btn-danger">
                                                <i class="btn-icon-only icon-remove"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>11/08/2019</td>
                                        <td>Fever, Sore Throat, runny nose</td>                                    
                                        <td>300</td>
                                        <td class="td-actions">                           
                                            <a href="" class="btn btn-mini btn-danger">
                                                <i class="btn-icon-only icon-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-mini btn-danger">
                                                <i class="btn-icon-only icon-remove"></i>
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="Patient" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Patient's Record</h3>
        </div>
        <div class="modal-body">
            <form action="#" method="POST">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">อาการ</label>
                    <div class="controls">
                        <textarea name="" rows="4"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">ตรวจร่างกาย</label>
                    <div class="controls">
                        <textarea name="" rows="4"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">วินิจฉัย</label>
                    <div class="controls">
                        <textarea name="" rows="4"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">การรักษา</label>
                    <div class="controls">
                        <textarea name="" rows="4"></textarea>
                    </div>
                </div>
                <div class="input-prepend input-append">
                    <span class="add-on">฿</span>
                    <input class="span3" type="text">
                    <span class="add-on">.00</span>
                </div>


            </form>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary">Save changes</button>
        </div>
    </div>

    <div id="Medical" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Medical's Record</h3>
        </div>
        <div class="modal-body">
            <p>Patient's Record</p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary">Save changes</button>
        </div>
    </div>

    <div id="Lab" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Lab's Record</h3>
        </div>
        <div class="modal-body">
            <p>Patient's Record</p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary">Save changes</button>
        </div>
    </div>

    <div id="Procedure" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Procedure's Record</h3>
        </div>
        <div class="modal-body">
            <p>Patient's Record</p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary">Save changes</button>
        </div>
    </div>

</div>