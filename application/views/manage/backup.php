<!-- form สำหรับบันทึกรายการตรวจ -->

                        <script>
                            $(function ()
                            {
                                $("#wizard").steps({
                                    headerTag: "h2",
                                    bodyTag: "section",
                                    transitionEffect: "slideLeft",
                                    stepsOrientation: "vertical"
                                });
                            });</script>
                        <div id="wizard">
                            <h2>Patient Record </h2>
                            <section>
                                <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                <label class="control-label" for="inputEmail">ค่ารักษา</label>
                                                <input class="span7" name="PH5" type="number">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">ปิด</button>
                                            <button class="btn btn-primary" type="submit">บันทึก</button>
                                        </div>
                                    </form>
                                </div>

                                <div id="Person-5" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Patient's Record</h5>

                                        <a class="btn btn-box-right" href="#myModal" role="button" class="btn" data-toggle="modal">
                                            <i class="icon-plus-sign"></i> Add
                                        </a>

                                    </div>
                                    <div class="box-content box-table">
                                        <table class="table table-bordered table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>วันที่</th>
                                                    <th>VN</th>
                                                    <th>อาการ</th>
                                                    <th>ตรวจร่างกาย</th>
                                                    <th>วินิจฉัย</th>
                                                    <th>การรักษา</th>
                                                    <th>ค่ารักษา</th>
                                                    <th class="td-actions">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $x = 1;
                                                date_default_timezone_set('Asia/Bangkok');
                                                $history = $this->db->get_where('tbpatient_history', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid, 'CREATE' => $day));
                                                foreach ($history->result() as $rowhis) {
                                                    $hisid = $rowhis->PHID;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo date("d-m-Y", strtotime($rowhis->CREATE)); ?></td>
                                                        <td><?php echo $rowhis->BOOKINGID; ?></td>
                                                        <td><?php echo $rowhis->PH1; ?></td>
                                                        <td><?php echo $rowhis->PH2; ?></td>
                                                        <td><?php echo $rowhis->PH3; ?></td>
                                                        <td><?php echo $rowhis->PH4; ?></td>
                                                        <td><?php echo $rowhis->PH5; ?></td>
                                                        <td class="td-actions">
                                                            <a href="<?php echo base_url('patient/patient_delete/' . $hisid) ?>" class="btn btn-mini btn-danger">
                                                                <i class="btn-icon-only icon-remove"></i>
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
                            </section>

                            <h2>Medical Record </h2>
                            <section>
                                <style>
                                    .modal-dialog {
                                        width: 800px;
                                    }
                                    .modal-header {
                                        background-color: #21618C;
                                        padding:16px 16px;
                                        color:#FFF;
                                        border-bottom:2px dashed #21618C;
                                    }
                                    .modal-lg {
                                        max-width: 100%;
                                    }
                                </style>
                                <div id="MedicalModal" class="modal modal-lg hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <form action="<?php echo base_url('patient/patient_medical') ?>" method="POST">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h3 id="myModalLabel">Medical Record</h3>
                                        </div>
                                        <div class="modal-body">

                                            <div id="acct-verify-row" class="span7">
                                                <fieldset>                                                    
                                                    <div class="control-group ">
                                                        <input type="hidden" class="span7" name="IDCARD" value="<?php echo $patientid; ?>">
                                                        <label class="control-label">ชื่อการค้า <span class="required">*</span></label>
                                                        <div class="controls">
                                                            <select name="PH1" class="span5">
                                                                <?php
                                                                $medical = $this->db->get_where('tbproducts', array('CLINICID' => $this->session->userdata('CLINICID')));
                                                                foreach ($medical->result() as $merow) {
                                                                    $price = $merow->PriceSale
                                                                    ?>
                                                                    ?>                                                                    
                                                                    <option value="<?php echo $merow->CommonName ?>"><?php echo $merow->CommonName ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>                                                            

                                                        </div>
                                                    </div>
                                                    <div class="control-group ">
                                                        <label class="control-label">ข้อบ่งใช้ <span class="required">*</span></label>
                                                        <div class="controls">
                                                            <input name="PH2" class="span5" type="text" value="" autocomplete="false" required="">
                                                            <input name="PH8" class="span5" type="hidden" value="<?php echo $price; ?>" >
                                                        </div>
                                                    </div>
                                                    <div class="control-group ">
                                                        <label class="control-label">ครั้งละ <span class="required">*</span></label>
                                                        <div class="controls">
                                                            <select name="PH3" class="span2" required="">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="1/2">1/2</option>
                                                                <option value="1 1/2">1 1/2</option>
                                                                <option value="2.5">2.5</option>
                                                                <option value="5">5</option>
                                                                <option value="ใช้ทา">ใช้ทา</option>
                                                                <option value="ใช้หยอด">ใช้หยอด</option>
                                                                <option value="ใช้เหน็บ">ใช้เหน็บ</option>
                                                                <option value="ใช้สอด">ใช้สอด</option>
                                                                <option value="ใช้พ่น">ใช้พ่น</option>
                                                            </select>
                                                            <select name="PH4" class="span2" required="">
                                                                <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                                <option value="เม็ด">เม็ด</option>
                                                                <option value="แคปซูล">แคปซูล</option>
                                                                <option value="ช้อนชา">ช้อนชา</option>
                                                                <option value="ช้อนโต๊ะ">ช้อนโต๊ะ</option>
                                                                <option value="ซีซี">ซีซี</option>
                                                                <option value="มิลลิลิตร">มิลลิลิตร</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group ">
                                                        <label class="control-label">ความถี่ <span class="required">*</span></label>
                                                        <div class="controls">
                                                            <select name="PH5" class="span5" required="">
                                                                <option value="วันละ 1 ครั้ง">วันละ 1 ครั้ง</option>
                                                                <option value="วันละ 2 ครั้ง">วันละ 2 ครั้ง</option>
                                                                <option value="วันละ 3 ครั้ง">วันละ 3 ครั้ง</option>
                                                                <option value="วันละ 4 ครั้ง">วันละ 4 ครั้ง</option>
                                                                <option value="ในตอนเช้า">ในตอนเช้า</option>
                                                                <option value="ในตอนเที่ยง">ในตอนเที่ยง</option>
                                                                <option value="ในตอนเย็น">ในตอนเย็น</option>
                                                                <option value="ก่อนนอน">ก่อนนอน</option>
                                                                <option value="ทุก ๆ 1 ชั่วโมง">ทุก ๆ 1 ชั่วโมง</option>
                                                                <option value="ทุก ๆ 2 ชั่วโมง">ทุก ๆ 2 ชั่วโมง</option>
                                                                <option value="ทุก ๆ 4 ชั่วโมง">ทุก ๆ 4 ชั่วโมง</option>
                                                                <option value="ทุก ๆ 6 ชั่วโมง">ทุก ๆ 6 ชั่วโมง</option>
                                                                <option value="ทุก ๆ 8 ชั่วโมง">ทุก ๆ 8 ชั่วโมง</option>
                                                                <option value="ทุก ๆ 12 ชั่วโมง">ทุก ๆ 12 ชั่วโมง</option>
                                                            </select>                                
                                                        </div>
                                                    </div>
                                                    <div class="control-group ">
                                                        <label class="control-label">มื้ออาหาร <span class="required">*</span></label>
                                                        <div class="controls">
                                                            <select name="PH6" class="span5" required="">
                                                                <option value="หลังอาหารเช้า">หลังอาหารเช้า</option>
                                                                <option value="หลังอาหารเช้า เย็น">หลังอาหารเช้า เย็น</option>
                                                                <option value="หลังอาหารเช้า กลางวัน เย็น">หลังอาหารเช้า กลางวัน เย็น</option>
                                                                <option value="ก่อนอาหาร เช้า">ก่อนอาหาร เช้า</option>
                                                                <option value="ก่อนอาหาร เช้า เย็น">ก่อนอาหาร เช้า เย็น</option>
                                                                <option value="ก่อนอาหาร เช้า เที่ยง เย็น">ก่อนอาหาร เช้า เที่ยง เย็น</option>
                                                                <option value="พร้อมอาหาร เช้า">พร้อมอาหาร เช้า</option>
                                                                <option value="พร้อมอาหาร เช้า เย็น">พร้อมอาหาร เช้า เย็น</option>
                                                                <option value="พร้อมอาหาร เช้า กลางวัน เย็น">พร้อมอาหาร เช้า กลางวัน เย็น</option>
                                                                <option value="ตอนท้องว่าง">ตอนท้องว่าง</option>
                                                                <option value="เมื่อมีอาการ">เมื่อมีอาการ</option>                                    
                                                            </select>                                
                                                        </div>
                                                    </div>
                                                    <div class="control-group ">
                                                        <label class="control-label">ข้อแนะนำ <span class="required">*</span></label>
                                                        <div class="controls">
                                                            <select name="PH7" class="span5" required="">
                                                                <option value="รับประทานหลังอาหารทันที">รับประทานหลังอาหารทันที</option>
                                                                <option value="รับประทานยานี้ต่อเนื่องกันทุกวันจนกว่ายาจะหมด">รับประทานยานี้ต่อเนื่องกันทุกวันจนกว่ายาจะหมด</option>
                                                                <option value="รับประทานยานี้แล้วอาจทำให้ง่วงซึม">รับประทานยานี้แล้วอาจทำให้ง่วงซึม</option>
                                                                <option value="บริเวณที่เป็น">บริเวณที่เป็น</option>
                                                                <option value="ทั้งสองข้าง">ทั้งสองข้าง</option>
                                                                <option value="ข้างซ้าย">ข้างซ้าย</option>
                                                                <option value="ข้างขวา">ข้างขวา</option>
                                                                <option value="ทันที">ทันที</option>
                                                            </select>                                
                                                        </div>                                                   
                                                </fieldset>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit">ยืนยัน</button>
                                        </div>
                                    </form>
                                </div>

                                <div id="Person-5" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Medical Record</h5>
                                        <a class="btn btn-box-right" href="#MedicalModal" role="button" class="btn" data-toggle="modal">
                                            <i class="icon-plus-sign"></i> Add
                                        </a>                                       
                                        <a class="btn btn-box-right" href="">
                                            <i class="icon-print"></i> พิมพ์ฉลากยา
                                        </a>
                                    </div>
                                    <div class="box-content box-table">
                                        <table class="table table-condensed table-striped table-bordered">
                                            <thead>
                                                <tr>                                                   
                                                    <th>วันที่</th>                                                    
                                                    <th>ชื่อยา</th>
                                                    <th>ขนาด</th>
                                                    <th>รูปแบบ</th>
                                                    <th>ความถี่</th>
                                                    <th>มื้ออาหาร</th>                                                        
                                                    <th class="td-actions"><i class="icon-cog"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $Dash = $this->db->get_where('tbpatient_medical', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid, 'CREATE' => $day));
                                                foreach ($Dash->result() as $row) {
                                                    $hisid = $row->MEDICALID;
                                                    ?>
                                                    <tr>                                                        
                                                        <td>
                                                            <?php
                                                            echo date("d-m-Y", strtotime($row->CREATE));
                                                            ?>
                                                        </td>                                                        
                                                        <td><?php echo $row->PH1; ?></td>
                                                        <td><?php echo $row->PH3; ?></td>
                                                        <td><?php echo $row->PH4; ?></td>
                                                        <td><?php echo $row->PH5; ?></td>
                                                        <td><?php echo $row->PH6; ?></td>                                                           
                                                        <td class="td-actions">
                                                            <a href="<?php echo base_url('patient/patient_medicaldelete/' . $hisid) ?>" class="btn btn-mini btn-danger">
                                                                <i class="btn-icon-only icon-remove"></i>
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
                            </section>

                            <h2>Lab Record</h2>
                            <section>
                                <div id="LabModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <form action="<?php echo base_url('patient/patient_lab') ?>" method="POST">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h3 id="myModalLabel">รายการแล็ปในคลินิก</h3>
                                        </div>
                                        <div class="modal-body table-responsive">                                            
                                            <table id="table1" border="1" class="table-bordered table-striped" style="width: 100%">
                                                <thead>
                                                    <tr class="active">
                                                        <th>เลือกรายการ</th>
                                                        <th>รายการแล็ป</th>
                                                        <th>ราคา</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $lab = $this->db->get_where('tblabs', array('CLINICID' => $this->session->userdata('CLINICID')));
                                                    foreach ($lab->result() as $labrow) {
                                                        ?>
                                                        <tr>                                                    
                                                            <td align="center">
                                                                <button class="btn btn-info" id="select"
                                                                        data-labid="<?php echo $labrow->LabID ?>"
                                                                        data-labname="<?php echo $labrow->LabName ?>"
                                                                        data-labprice="<?php echo $labrow->LabPrice ?>">                                                                    
                                                                    Select
                                                                </button>
                                                            </td>
                                                            <td><?php echo $labrow->LabName ?></td>
                                                            <td><?php echo $labrow->LabPrice ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>  

                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="IDCARD" value="<?php echo $patientid; ?>">
                                            <input type="hidden" name="LabID" id="labid"/>
                                            <input type="hidden" name="LabName" id="labname"/>
                                            <input type="hidden" name="LabPrice" id="labprice"/>   

                                        </div>
                                    </form>
                                </div>


                                <div id="Person-5" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Lab Record</h5>
                                        <a class="btn btn-box-right" href="#LabModal" role="button" class="btn" data-toggle="modal">
                                            <i class="icon-plus-sign"></i> Add
                                        </a>                                       
                                    </div>
                                    <div class="box-content box-table">
                                        <table border="1" class="table-bordered table-striped" style="width: 100%">
                                            <thead>
                                                <tr class="active">
                                                    <th align="center">วันที่</th>                                                    
                                                    <th>รายการแล็ป</th>
                                                    <th>ราคา</th>
                                                    <th><i class="icon-cog"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $labs = $this->db->get_where('tbpatient_lab', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid, 'CREATE' => $day));
                                                foreach ($labs->result() as $labrows) {
                                                    $hisid = $labrows->LBID;
                                                    ?>
                                                    <tr>
                                                        <td align="center"><?php echo date("d-m-Y", strtotime($labrows->CREATE)); ?></td>                                                        
                                                        <td><?php echo $labrows->PH2 ?></td>
                                                        <td><?php echo $labrows->PH3 ?></td>
                                                        <td class="td-actions">
                                                            <a href="<?php echo base_url('patient/patient_labdelete/' . $hisid) ?>" class="btn btn-mini btn-danger">
                                                                <i class="btn-icon-only icon-remove"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table> 

                                    </div>
                                </div>
                            </section>

                            <h2>Procedure Record</h2>
                            <section>

                                <div id="ProcedureModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <form action="<?php echo base_url('patient/patient_procedure') ?>" method="POST">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h3 id="myModalLabel">รายการหัตถการในคลินิก</h3>
                                        </div>
                                        <div class="modal-body">
                                            <table border="1" id="table2" class="table-bordered table-striped" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>เลือกรายการ</th>
                                                        <th>รายการหัตถการ</th>
                                                        <th>ราคา</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $procedure = $this->db->get_where('tbProcedure', array('CLINICID' => $this->session->userdata('CLINICID')));
                                                    foreach ($procedure->result() as $procedurerow) {
                                                        ?>
                                                        <tr>                                                   
                                                            <td align="center">
                                                                <button class="btn btn-info" id="selects"
                                                                        data-procedureid="<?php echo $procedurerow->ProcedureID ?>"
                                                                        data-procedurename="<?php echo $procedurerow->ProcedureName ?>"
                                                                        data-procedureprice="<?php echo $procedurerow->ProcedurePrice ?>">                                                                    
                                                                    Select
                                                                </button>
                                                            </td>
                                                            <td><?php echo $procedurerow->ProcedureName ?></td>
                                                            <td><?php echo $procedurerow->ProcedurePrice ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="IDCARD" value="<?php echo $patientid; ?>">
                                            <input type="hidden" name="ProcedureID" id="procedureid"/>
                                            <input type="hidden" name="ProcedureName" id="procedurename"/>
                                            <input type="hidden" name="ProcedurePrice" id="procedureprice"/>   
                                        </div>
                                </form>
                                </div>

                                <div id="Person-5" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Procedure Record</h5>
                                        <a class="btn btn-box-right" href="#ProcedureModal" role="button" class="btn" data-toggle="modal">
                                            <i class="icon-plus-sign"></i> Add
                                        </a>                                       
                                    </div>
                                    <div class="box-content box-table">
                                        <table border="1" class="table-bordered table-striped" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>วันที่</th>                                                    
                                                    <th>รายการหัตถการ</th>
                                                    <th>ราคา</th>
                                                    <th><i class="icon-cog"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $procedures = $this->db->get_where('tbpatient_procedure', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid, 'CREATE' => $day));
                                                foreach ($procedures->result() as $procedurerows) {
                                                    $hisid = $procedurerows->PROID;
                                                    ?>
                                                    <tr>
                                                        <td align="center"><?php echo date("d-m-Y", strtotime($procedurerows->CREATE)); ?></td>                                                        
                                                        <td><?php echo $procedurerows->PH2 ?></td>
                                                        <td><?php echo $procedurerows->PH3 ?></td>
                                                        <td class="td-actions">
                                                            <a href="<?php echo base_url('patient/patient_proceduredelete/' . $hisid) ?>" class="btn btn-mini btn-danger">
                                                                <i class="btn-icon-only icon-remove"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>

                            <h2>Confirmation</h2>
                            <section>
                                <div id="Person-5" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Confirmation</h5>                                            
                                        <a class="btn btn-box-right" href="">
                                            <i class="icon-plus-sign"></i> New
                                        </a>
                                        <a class="btn btn-box-right" href="">
                                            <i class="icon-user-md"></i> ใบรับรองแพทย์
                                        </a>
                                        <a class="btn btn-box-right" href="">
                                            <i class="icon-print"></i> ใบเสร็จรับเงิน
                                        </a>

                                    </div>
                                    <div class="box-content box-table">
                                        <table border="1" class="table-bordered table-striped" style="width: 100%">
                                            <thead>
                                                <tr>                                                        
                                                    <th align="center">วันที่</th>
                                                    <th>รายการ</th>
                                                    <th align="center">ราคา</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">History Record</td>
                                                </tr>
                                                <?php
                                                $historys = $this->db->get_where('tbpatient_history', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid, "CREATE" => $day));
                                                foreach ($historys->result() as $rowhiss) {
                                                    $date = $rowhiss->CREATE;
                                                    ?>
                                                    <tr>
                                                        <td align="center"><?php echo date("d-m-Y", strtotime($rowhiss->CREATE)); ?></td>
                                                        <td><?php echo $rowhiss->PH1; ?></td>                                                            
                                                        <td align="right"><?php echo $rowhiss->PH5; ?></td>                                                        
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                <tr>
                                                    <td colspan="3">Medical Record</td>
                                                </tr>
                                                <?php
                                                $historysx = $this->db->get_where('tbpatient_medical', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid, "CREATE" => $day));
                                                foreach ($historysx->result() as $rowhissx) {
                                                    ?>
                                                    <tr>
                                                        <td align="center"><?php echo date("d-m-Y", strtotime($rowhissx->CREATE)); ?></td>
                                                        <td><?php echo $rowhissx->PH1; ?></td>                                                            
                                                        <td align="right"><?php echo $rowhissx->PH8; ?></td>                                                        
                                                    </tr>
                                                    <?php
                                                }
                                                ?>  
                                                <tr>
                                                    <td colspan="3">Lab Record</td>
                                                </tr>
                                                <?php
                                                $historysxsa = $this->db->get_where('tbpatient_lab', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid, "CREATE" => $day));
                                                foreach ($historysxsa->result() as $rowhissxsa) {
                                                    ?>
                                                    <tr>
                                                        <td align="center"><?php echo date("d-m-Y", strtotime($rowhissxsa->CREATE)); ?></td>
                                                        <td><?php echo $rowhissxsa->PH2; ?></td>                                                            
                                                        <td align="right"><?php echo $rowhissxsa->PH3; ?></td>                                                        
                                                    </tr>
                                                    <?php
                                                }
                                                ?> 
                                                <tr>
                                                    <td colspan="3">Procedure Record</td>
                                                </tr>
                                                <?php
                                                $historysxsax = $this->db->get_where('tbpatient_procedure', array('IDCARD' => $patientid, 'BOOKINGID' => $bookingid, "CREATE" => $day));
                                                foreach ($historysxsax->result() as $rowhissxsax) {
                                                    ?>
                                                    <tr>
                                                        <td align="center"><?php echo date("d-m-Y", strtotime($rowhissxsax->CREATE)); ?></td>                                                        
                                                        <td><?php echo $rowhissxsax->PH2; ?></td>                                                            
                                                        <td align="right"><?php echo $rowhissxsax->PH3; ?></td>                                                        
                                                    </tr>
                                                    <?php
                                                }
                                                ?>   
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </section>

                        </div>

