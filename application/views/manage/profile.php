<div class="tabbable">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab"><i class="icon-cog"></i> ตั้งค่าเวลาทำการคลินิก</a></li>
        <li><a href="#tab2" data-toggle="tab"><i class="icon-time"></i> ตั้งค่าวันหยุดคลินิก</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab1">
            <?php foreach ($query as $row) { ?>
                <div class="span8">
                    <h1>เวลาเปิดทำการคลินิก</h1>
                    <div class="input-prepend">
                        <div class="btn-group">
                            <span class="add-on">เวลาเปิด</span>
                            <input class="span2" id="prependedInput" type="time" value="<?php echo $row->TIME_OPEN; ?>" placeholder="Username">
                            <span class="add-on">เวลาปิด</span>
                            <input class="span2" id="appendedInput" type="time" value="<?php echo $row->TIME_CLOSE; ?>">
                            <a class="btn btn-success" href="#"><i class="icon-user icon-white"></i> เพิ่มช่วงเวลาตรวจ</a>
                            <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
                                <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="i"></i> เพิ่มช่วงเวลาใหม่</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="input-prepend">
                        <div class="btn-group">
                            <span class="add-on">เวลาเปิด</span>
                            <input class="span2" id="prependedInput" type="time" value="<?php echo $row->TIME1; ?>" placeholder="Username">
                            <span class="add-on">เวลาปิด</span>
                            <input class="span2" id="appendedInput" type="time" value="<?php echo $row->CLOSE1; ?>">
                            <a class="btn btn-success" href="#"><i class="icon-user icon-white"></i> เพิ่มช่วงเวลาตรวจ</a>
                            <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
                                <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="i"></i> เพิ่มช่วงเวลาใหม่</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="input-prepend">
                        <div class="btn-group">
                            <span class="add-on">เวลาเปิด</span>
                            <input class="span2" id="prependedInput" type="time" value="<?php echo $row->TIME2; ?>" placeholder="Username">
                            <span class="add-on">เวลาปิด</span>
                            <input class="span2" id="appendedInput" type="time" value="<?php echo $row->CLOSE2; ?>">
                            <a class="btn btn-success" href="#"><i class="icon-user icon-white"></i> เพิ่มช่วงเวลาตรวจ</a>
                            <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
                                <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="i"></i> เพิ่มช่วงเวลาใหม่</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="input-prepend">
                        <div class="btn-group">
                            <span class="add-on">เวลาเปิด</span>
                            <input class="span2" id="prependedInput" type="time" value="<?php echo $row->TIME3; ?>" placeholder="Username">
                            <span class="add-on">เวลาปิด</span>
                            <input class="span2" id="appendedInput" type="time" value="<?php echo $row->CLOSE3; ?>">
                            <a class="btn btn-success" href="#"><i class="icon-user icon-white"></i> เพิ่มช่วงเวลาตรวจ</a>
                            <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
                                <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="i"></i> เพิ่มช่วงเวลาใหม่</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="input-prepend">
                        <div class="btn-group">
                            <span class="add-on">เวลาเปิด</span>
                            <input class="span2" id="prependedInput" type="time" value="<?php echo $row->TIME4; ?>" placeholder="Username">
                            <span class="add-on">เวลาปิด</span>
                            <input class="span2" id="appendedInput" type="time" value="<?php echo $row->CLOSE4; ?>">
                            <a class="btn btn-success" href="#"><i class="icon-user icon-white"></i> เพิ่มช่วงเวลาตรวจ</a>
                            <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
                                <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="i"></i> เพิ่มช่วงเวลาใหม่</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="input-prepend">
                        <div class="btn-group">
                            <span class="add-on">เวลาเปิด</span>
                            <input class="span2" id="prependedInput" type="time" value="<?php echo $row->TIME5; ?>" placeholder="Username">
                            <span class="add-on">เวลาปิด</span>
                            <input class="span2" id="appendedInput" type="time" value="<?php echo $row->CLOSE5; ?>">
                            <a class="btn btn-success" href="#"><i class="icon-user icon-white"></i> เพิ่มช่วงเวลาตรวจ</a>
                            <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
                                <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="i"></i> เพิ่มช่วงเวลาใหม่</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="input-prepend">
                        <div class="btn-group">
                            <span class="add-on">เวลาเปิด</span>
                            <input class="span2" id="prependedInput" type="time" value="<?php echo $row->TIME6; ?>" placeholder="Username">
                            <span class="add-on">เวลาปิด</span>
                            <input class="span2" id="appendedInput" type="time" value="<?php echo $row->CLOSE6; ?>">
                            <a class="btn btn-success" href="#"><i class="icon-user icon-white"></i> เพิ่มช่วงเวลาตรวจ</a>
                            <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
                                <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="i"></i> เพิ่มช่วงเวลาใหม่</a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="span6">
                    <h1>โปรไฟล์คลินิก</h1>
                    <table class="table-bordered table-striped table-condensed">
                        <tbody>
                            <tr>
                                <td align="right"><b>คลินิก</b></td>
                                <td><?php echo $row->CLINICNAME; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>ใบอนุญาต</b></td>
                                <td><?php echo $row->MORID; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>เวลาตรวจ / คิว</b></td>
                                <td><?php echo $row->QUETIME; ?> นาที</td>
                            </tr>
                            <tr>
                                <td align="right"><b>ประเภทบัญชีท่าน</b></td>
                                <td><span class="label label-info"><?php echo $row->TYPE; ?></span></td>
                            </tr>
                            <tr>
                                <td align="right"><b>สถานะบัญชีสมาชิก</b></td>
                                <td>
                                    <?php
                                    if ($row->ACTIVATE == 1) {
                                        echo '<span class="label label-success">Active User</span>';
                                    }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
        <div class="tab-pane" id="tab2">
            <div class="row">
                <div class="span9">
                    <div class="row">
                        <div class="span5">
                            <table class="table table-striped table-condensed table-bordered">
                                <thead>
                                    <tr class="text-center bg-success text-white">
                                        <td>#ลำดับ</td>
                                        <td>หยุดตรงกับวัน</td>
                                        <td>วันหยุดคลินิก</td>
                                        <td>ลบวันหยุด</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    date_default_timezone_set('Asia/Bangkok');
                                    $i = 1;
                                    $CLID = $this->session->userdata('CLINICID');
                                    $closeclinic = $this->db->query("select * from tbclose WHERE CLINICID = '$CLID' ORDER BY CLOSEDATE DESC");
                                    foreach ($closeclinic->result() as $clinicclose) {
                                        $id = $clinicclose->closeid;
                                    ?>
                                        <tr class="text-center">
                                            <td class="text-center"><span class="badge badge-info"><?php echo $i++; ?></span></td>
                                            <td>
                                                <?php
                                                if (date('w', strtotime($clinicclose->CLOSEDATE)) == 0) {
                                                    echo 'วันอาทิตย์';
                                                } else if (date('w', strtotime($clinicclose->CLOSEDATE)) == 1) {
                                                    echo 'วันจันทร์';
                                                } else if (date('w', strtotime($clinicclose->CLOSEDATE)) == 2) {
                                                    echo 'วันอังคาร';
                                                } else if (date('w', strtotime($clinicclose->CLOSEDATE)) == 3) {
                                                    echo 'วันพุธ';
                                                } else if (date('w', strtotime($clinicclose->CLOSEDATE)) == 4) {
                                                    echo 'วันพฤหัสบดี';
                                                } else if (date('w', strtotime($clinicclose->CLOSEDATE)) == 5) {
                                                    echo 'วันศุกร์';
                                                } else if (date('w', strtotime($clinicclose->CLOSEDATE)) == 6) {
                                                    echo 'วันเสาร์';
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $clinicclose->CLOSEDATE; ?> </td>
                                            <td><a href="<?php echo base_url('clinic/deleteclosedate/' . $id) ?>" class="btn btn-danger btn-block btn-mini" onclick="return confirm('ยืนยันการลบวันหยุดนี้')"><i class="icon-remove"></i> ลบวันหยุด</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="span5">
                            <table class="table table-light table-condensed">
                                <tbody>
                                    <form action="<?php echo base_url('clinic/insertclosedate') ?>" method="POST">
                                        <fieldset>
                                            <legend>กรอกวันหยุดทำการคลินิก</legend>
                                            <input type="text" name="CLOSEDATE" required="" />
                                            <span class="help-block">ห้ามเว้นว่าง.</span>
                                            <button type="submit" class="btn btn-success"><i class="icon-save"></i> บันทึกวันหยุด</button>
                                        </fieldset>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr />
</div>