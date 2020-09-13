<style>
    #showimage {
        height: 169px;
        width: 170px;
    }

    #showlogocif {
        height: 150px;
        width: 150px;
    }

    #editshowimage {
        height: 169px;
        width: 170px;
    }

    body .modal {
        width: 41%;
        left: 30%;
        margin-left: auto;
        margin-right: auto;
    }

    .required {
        color: red;
    }

    .frame {
        padding: 18px;
        background-color: white;
    }
</style>
<?php
$cinfo = $this->db->get_where('tbclinicinfo', array('CLINICID' => $this->session->userdata('CLINICID')))->row();
?>
<div class="tabbable">
    <ul class="nav nav-tabs" id="myTab">
        <li class="hidden"><a href="#tab1" data-toggle="tab"><i class="icon-cog"></i> ตั้งค่าเวลาทำการคลินิก</a></li>
        <li><a href="#tab2" data-toggle="tab"><i class="icon-time"></i> จอประกาศคิว</a></li>
        <li><a href="#tab3" data-toggle="tab"><i class="icon-user"></i> ผู้ใช้งานระบบ</a></li>
        <li><a href="#tab4" data-toggle="tab"><i class="icon-home"></i> ข้อมูลคลินิก</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active hidden" id="tab1">
            <div class="span8">
                <h3>เวลาเปิดทำการคลินิกสูงสุด 3 รอบต่อวัน</h3>
                <form action="" method="POST">
                    <?php
                    $x = ['วันอาทิตย์', 'วันจันทร์', 'วันอังคาร', 'วันพุธ', 'วันพฤหัสบดี', 'วันศุกร์', 'วันเสาร์'];
                    $i = 0;
                    $CID = $this->session->userdata('CLINICID');
                    $tbtimes = $this->db->query("SELECT * FROM tbtimes WHERE CLINICID = '$CID'");
                    foreach ($tbtimes->result() as $rows) {
                        ?>
                        <h3><?php echo $x[$i++]; ?></h3>
                        <div class="input-prepend">
                            <div class="btn-group">
                                <span class="add-on">เวลาเปิด</span>
                                <input class="span2" id="prependedInput" readonly type="time" value="<?php echo $rows->TIME_OPEN1; ?>" placeholder="Username">
                                <span class="add-on">เวลาปิด</span>
                                <input class="span2" id="appendedInput" readonly type="time" value="<?php echo $rows->TIME_CLOSE1; ?>">
                                <a class="btn btn-success"><i class="icon-circle-arrow-right icon-white"></i> รอบที่ 1</a>
                            </div>
                        </div>
                        <div class="input-prepend">
                            <div class="btn-group">
                                <span class="add-on">เวลาเปิด</span>
                                <input class="span2" id="prependedInput" readonly type="time" value="<?php echo $rows->TIME_OPEN2; ?>" placeholder="Username">
                                <span class="add-on">เวลาปิด</span>
                                <input class="span2" id="appendedInput" readonly type="time" value="<?php echo $rows->TIME_CLOSE2; ?>">
                                <a class="btn btn-success"><i class="icon-circle-arrow-right icon-white"></i> รอบที่ 2</a>
                            </div>
                        </div>
                        <div class="input-prepend">
                            <div class="btn-group">
                                <span class="add-on">เวลาเปิด</span>
                                <input class="span2" id="prependedInput" readonly type="time" value="<?php echo $rows->TIME_OPEN3; ?>" placeholder="Username">
                                <span class="add-on">เวลาปิด</span>
                                <input class="span2" id="appendedInput" readonly type="time" value="<?php echo $rows->TIME_CLOSE3; ?>">
                                <a class="btn btn-success"><i class="icon-circle-arrow-right icon-white"></i> รอบที่ 3</a>
                            </div>
                        </div>
                    <?php } ?>
                    <button class="btn btn-primary disabled" type="submit"><i class="icon-save"></i> เฉพาะผู้ดูแลระบบเท่านั้น</button>
                </form>
            </div>

            <div class="span6">
                <ul class="breadcrumb">
                    <li class="active"><i class="icon-user"></i></li>
                    <li><a href="#">อัปเดทโปรไฟล์</a> <span class="divider">/</span></li>
                    <li><a href="#">อัปเกรด Package</a></li>
                </ul>
                <h1>โปรไฟล์คลินิก</h1>
                <?php
                $CID = $this->session->userdata('CLINICID');
                $setting = $this->db->query("SELECT * FROM tbclinic WHERE CLINICID = '$CID'");
                foreach ($setting->result() as $row) {
                    ?>
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
                    <?php
                }
                ?>
            </div>


        </div>
        <div class="active tab-pane" id="tab2">
            <div class="row">
                <div class="span11">
                    <div style="margin-bottom: 60px;">
                        <h4 style="float: left;">https://nutmor.com/exampleclinic/ques</h4>
                        <button class="btn btn-primary" style="float: right;margin-top: 10px;">Copy Link</button>
                    </div>
                    <div style=" width: 64%; float: left;margin-right: 8px;">
                        <div style="padding: 8px 14px; margin-bottom: 10px; background-color: #E9EDF6;">
                            <h3>ตัวอย่างวิดีโอ</h3>
                            <iframe width="490" height="300" src="https://www.youtube.com/embed/GyxjSJqJguw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div style=" width: 35%;float: left;">
                        <div style="padding: 8px 14px; margin-bottom: 10px; background-color: #E9EDF6;">
                            <h3>คิวตรวจที่</h3>
                            <?php
                            $y = date("Y");
                            $day = date("$y-m-d");
                            $CLINIC = $this->session->userdata('CLINICID');
                            $Onboard = $this->db->query("SELECT QUES,BOOKTIME FROM tbbooking WHERE CLINICID = '$CLINIC' and BOOKDATE = '$day' and SHOWS = 2 and TYPE = 0 ORDER BY QBER asc LIMIT 1");
                            foreach ($Onboard->result() as $row) {
                                echo "<h1>" . $row->QUES . "</h1>";
                            }
                            ?>
                        </div>
                    </div>
                    <div>
                        <style>
                            #link {
                                border-collapse: collapse;
                                width: 100%;
                                background-color: #f2f2f2;
                                padding: 8px;
                            }

                            #link td,
                            #link th {
                                border: 1px solid #ddd;
                                padding: 8px;
                            }
                        </style>
                        <table id="link">
                            <tr>
                                <th>Link No</th>
                                <th>YouTube URL</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $num = 1;
                            $VDO = $this->db->get_where('tbvideolink', array('CLINICID' => $this->session->userdata('CLINICID')));
                            foreach ($VDO->result() as $VDOrow) {
                                ?>
                                <tr>
                                    <td align="center"><?php echo $num++ ?></td>
                                    <td><a href="<?php echo $VDOrow->LINK ?>" target="_blank"><?php echo $VDOrow->LINK ?></a></td>
                                    <td align="center">
                                        <button class="btn btn-mini btn-success" href="#"><i class="fas fa-edit"></i></button>
                                        <a class="btn btn-mini btn-danger" href="<?php echo base_url('clinic/delete_videolink/' . $VDOrow->VDOID . '') ?>"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
<?php } ?>
                        </table>
                    </div>
                </div>
                <div class="span5" align="center">
                    <div style="padding: 8px 14px; margin-bottom: 10px; background-color: #E9EDF6;">
                        <h3>เพิ่ม Link YouTube</h3>
                    </div>
                    <form action="<?php echo base_url('clinic/insert_videolink') ?>" method="post">
                        <input type="text" name="LINK" class="input-block-level">
                        <input type="submit" value="เพิ่มลิงค์" class="btn btn-large btn-block btn-success">
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab3">
            <div class="span15">
                <h4><i class="icon-user"></i> จัดการผู้ใช้งานระบบ</h4>
                <?php
                $error = $this->session->userdata('error');
                if ($error != '') {
                    ?>
                    <div class="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Warning!</strong> <?php echo $error ?>
                    </div>
                    <?php
                    $this->session->unset_userdata('error');
                }
                ?>
<?php ?>

            </div>
            <div class="offset6">
                <a href="#UserModal" class="btn btn-success" data-toggle="modal">
                    <b><i class="icon-plus"></i> Add</b></a>
            </div>
            <br>
            <table id="example" class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>โทร</th>
                        <th>เมลล์</th>
                        <th>เลขที่ใบอนุญาต</th>
                        <th>สิทธิ</th>
                        <th>สถานะ</th>
                        <th>ตัวเลือก</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 0;
                    $n = 1;
                    $user = $this->db->get_where('tbuser', array('CLINICID' => $CID, 'Category >=' => '1'));
                    foreach ($user->result() as $row) {
                        ?>
                        <tr>
                            <th class="sorting_1"><span class="badge badge-success"><?php echo ++$i; ?></span></th>
                            <td><?php echo $row->UserID; ?></td>
                            <td><?php echo $row->Nameprefix ?><?php echo $row->UserName ?></td>
                            <td><?php echo $row->Phone; ?></td>
                            <td><?php echo $row->Email; ?></td>
                            <td><?php echo $row->License; ?></td>
                            <td>
                                <?php
                                if ($row->Leval == 1) {
                                    echo 'Admin';
                                } elseif ($row->Leval == 2) {
                                    echo 'Doctor';
                                } else {
                                    echo 'Staff';
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($row->Status == 1) {
                                    echo '<span class="btn btn-mini btn-success"><i class="icon-ok-circle"></i> ปกติ</span>';
                                } else {
                                    echo '<span class="btn btn-mini btn-danger"><i class="btn-icon-only icon-remove"></i> ถูกระงับ</span>';
                                }
                                ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown">ตัวเลือก <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#EditUserModal" data-toggle="modal" id="selectuser" data-image="<?php echo $row->Image ?>" data-userid="<?php echo $row->UserID ?>" data-nameprefix="<?php echo $row->Nameprefix ?>" data-username="<?php echo $row->UserName ?>" data-email="<?php echo $row->Email ?>" data-address="<?php echo $row->Address ?>" data-leval="<?php echo $row->Leval ?>" data-clinicid="<?php echo $row->CLINICID ?>" data-category="<?php echo $row->Category ?>" data-prepassword="<?php echo $row->Prepassword ?>" data-phone="<?php echo $row->Phone ?>" data-license="<?php echo $row->License ?>" data-more="<?php echo $row->More ?>">แก้ไข</a></li>
                                        <form id="myForm<?php echo $n ?>" action="<?php echo base_url('clinic/open_close_user/') ?>" method="post">
    <?php if ($row->Status == 1) { ?>
                                                <li>
                                                    <input type="hidden" name="open_close" value="2">
                                                    <input type="hidden" name="UserID" value="<?php echo $row->UserID ?>">
                                                    <a onclick="testLink(<?php echo $n ?>)">ระงับการใช้งาน</a>
                                                </li>
    <?php } ?>
    <?php if ($row->Status == 2) { ?>
                                                <li>
                                                    <input type="hidden" name="open_close" value="1">
                                                    <input type="hidden" name="UserID" value="<?php echo $row->UserID ?>">
                                                    <a onclick="testLink(<?php echo $n ?>)">เปิดการใช้งาน</a>
                                                </li>
    <?php } ?>
                                        </form>
                                    </ul>
                                </div>
                            </td>
                        </tr>
    <?php ++$n;
}
?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="tab4">
<?php $cif = $this->db->get_where('tbclinicinfo', array('CLINICID' => $this->session->userdata('CLINICID')))->row(); ?>
            <form action="<?php echo base_url('clinic/update_clinicinfo') ?>" method="POST" enctype="multipart/form-data" class="bs-docs-example form-horizontal">
            <div class="row-fluid frame">
                
                    <div class="row-fluid span4">
                        <div class="control-group" align="center">
                            <img id="showlogocif" src="<?php echo base_url('assets/images/profile/' . $cif->cif_image . '') ?>" width="150px" height="150px">
                        </div>
                        <div class="control-group" align="center">
                            <label>แนะนำรูปขนาด 400x400 px</label>
                        </div>
                        <div class="control-group" align="center">
                            <label class="btn btn-primary"><i class="icon-picture"></i> อัพโหลดรูป
                                <input type="file" name="Image" id="logocif" accept="image/*" style="display:none">
                                <input type="hidden" name="OldImage" value="<?php echo $cif->cif_image ?>">
                            </label>
                        </div>
                    </div>
                    <div class="row-fluid span6">
                        <div class="control-group">
                            <label class="control-label">รหัสร้าน : </label>
                            <div class="controls">
                                <input type="text" name="CLINICID" value="<?php echo $cif->CLINICID ?>" readonly>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">ชื่อร้าน : </label>
                            <div class="controls">
                                <input type="text" name="cif_name" value="<?php echo $cif->cif_name ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">ลักษณะการให้บริการ : </label>
                            <div class="controls">
                                <input type="text" name="cif_service" value="<?php echo $cif->cif_service ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">เลขที่ใบอนุญาต : </label>
                            <div class="controls">
                                <input type="text" name="cif_license" value="<?php echo $cif->cif_license ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">เลขผู้เสียภาษาษี : </label>
                            <div class="controls">
                                <input type="text" name="cif_taxid" value="<?php echo $cif->cif_taxid ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">เบอร์โทร : </label>
                            <div class="controls">
                                <input type="text" name="cif_phone" value="<?php echo $cif->cif_phone ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">โทรสาร(Fax) : </label>
                            <div class="controls">
                                <input type="text" name="cif_fax" value="<?php echo $cif->cif_fax ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Email : </label>
                            <div class="controls">
                                <input type="email" name="cif_email" value="<?php echo $cif->cif_email ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid span6">
                        <div class="control-group">
                            <label class="control-label">ที่อยู่ : </label>
                            <div class="controls">
                                <input type="text" name="cif_address" value="<?php echo $cif->cif_address ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">ตำบล : </label>
                            <div class="controls">
                                <input type="text" name="cif_subdistrict" value="<?php echo $cif->cif_subdistrict ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">อำเภอ : </label>
                            <div class="controls">
                                <input type="text" name="cif_district" value="<?php echo $cif->cif_district ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">จังหวัด : </label>
                            <div class="controls">
                                <input type="text" name="cif_province" value="<?php echo $cif->cif_province ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">รหัสไปรษณีย์ : </label>
                            <div class="controls">
                                <input type="text" name="cif_postal" value="<?php echo $cif->cif_postal ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">เวลาทำการ : </label>
                            <div class="controls">
                                <input type="text" name="cif_timeopen" value="<?php echo $cif->cif_timeopen ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">คำค้นหา : </label>
                            <div class="controls">
                                <input type="text" name="cif_keyword" value="<?php echo $cif->cif_keyword ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">ประเภทร้านค้า : </label>
                            <div class="controls">
                                <label style="color: #fff; background-color: #725AFE; display: inline-block; padding: 5px 10px; border-radius: 7px;"><i class="fab fa-fort-awesome"></i> สำนักงานใหญ่</label>
                            </div>
                        </div>                       
                        <div class="control-group">
                            <label class="control-label">สถานะร้านค้า : </label>
                            <div class="controls">
                                <label style="color: #fff; background-color: #60d49c; display: inline-block; padding: 5px 10px; border-radius: 7px;"><i class="fas fa-check"></i> ปกติ</label>
                            </div>
                        </div>
                    </div>
            </div>
            <hr/>
            <div class="row-fluid frame">
                <div class="row-fluid span4">
                    <div class="control-group" align="center"></div>
                    
                    <div class="control-group" align="center">
                        <i class="flag-icon flag-icon-gb"></i>
                        <label>English</label>
                    </div>

                </div>
                <div class="row-fluid span6">
                    <div class="control-group">
                        <label class="control-label">Clinic Name : </label>
                        <div class="controls">
                            <input type="text" name="cif_name_en" value="<?php echo $cif->cif_name_en ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Clinic Type : </label>
                        <div class="controls">
                            <input type="text" name="cif_service_en" value="<?php echo $cif->cif_service_en ?>">
                        </div>
                    </div>
                </div>
                <div class="row-fluid span6">
                    <div class="control-group">
                        <label class="control-label">Address : </label>
                        <div class="controls">
                            <input type="text" name="cif_address_en" value="<?php echo $cif->cif_address_en ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Sub-District : </label>
                        <div class="controls">
                            <input type="text" name="cif_subdistrict_en" value="<?php echo $cif->cif_subdistrict_en ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">District : </label>
                        <div class="controls">
                            <input type="text" name="cif_district_en" value="<?php echo $cif->cif_district_en ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Province : </label>
                        <div class="controls">
                            <input type="text" name="cif_province_en" value="<?php echo $cif->cif_province_en ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Postcode : </label>
                        <div class="controls">
                            <input type="text" name="cif_postal_en" value="<?php echo $cif->cif_postal_en ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"></label>
                        <div class="controls">
                            <input type="submit" value="บันทึก" class="btn btn-large btn-success">
                        </div>
                    </div>
                </div>                
            </div>
            </form>
        </div>
    </div>
    <hr />
</div>
<div id="UserModal" class="modal modal-lg hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4><i class="icon-plus"></i> เพิ่มผู้ใช้ระบบ</h4>
    </div>
    <form action="<?php echo base_url('clinic/insert_user') ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="span5">
                <fieldset>
                    <div class="row">
                        <div class="control-group span5" align="center">
                            <img src="<?php echo base_url('assets/images/607414.svg') ?>" id="showimage">
                        </div>
                        <div class="control-group span5" align="center">
                            <label class="btn btn-primary"><i class="icon-picture"></i> อัพโหลดรูป
                                <input type="file" name="Image" id="filename" accept="image/*" hidden>
                            </label>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">Username <span class="required">*</span></label>
                        <div class="controls">
                            <input name="UserID" class="span5" type="text" required>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ชื่อผู้ใช้งาน <span class="required">*</span></label>
                        <div class="controls">
                            <select name="Nameprefix" style=" width: 132px; " required>
                                <option value="">คำนำหน้าชื่อ</option>
                                <option value="นายแพทย์">นายแพทย์</option>
                                <option value="แพทย์หญิง">แพทย์หญิง</option>
                                <option value="นาย">นาย</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="นาง">นาง</option>
                            </select>
                            <input name="UserName" type="text" style=" width: 200px; " required>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">English Name <span class="required">*</span></label>
                        <div class="controls">
                            <select name="NameprefixEN" style=" width: 132px; " required>
                                <option value="">Title</option>
                                <option value="Dr.">Dr.</option>
                                <option value="Ph.D.">Ph.D.</option>
                                <option value="Mr.">Mr.</option>
                                <option value="Ms.">Ms.</option>
                            </select>
                            <input name="UserNameEN" type="text" style=" width: 200px; " required>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">อีเมล <span class="required">*</span></label>
                        <div class="controls">
                            <input name="Email" class="span5" type="email" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">ที่อยู่</label>
                        <div class="controls">
                            <textarea name="Address" class="span5" rows="2"></textarea>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="span5">
                <fieldset>
                    <div class="control-group ">
                        <label class="control-label">สิทธิ์ผู้ใช้งานระบบ <span class="required">*</span></label>
                        <div class="controls">
                            <select name="Leval" class="span5" required>
                                <option value="">เลือกสิทธิ์ผู้ใช้</option>
                                <option value="1">Admin</option>
                                <option value="2">Doctor</option>
                                <option value="3">Staff</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ร้านค้า <span class="required">*</span></label>
                        <div class="controls">
                            <input name="CLINICID" class="span5" type="text" value="<?php echo $cinfo->cif_name; ?>" required readonly>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ประเภทผู้ใช้ระบบ <span class="required">*</span></label>
                        <div class="controls">
                            <input type="text" name="Category" value="ผู้ใช้ย่อย" class="span5" required readonly>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">Password <span class="required">*</span></label>
                        <div class="controls">
                            <input name="Password" class="span5" type="password" required>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">เบอร์โทร <span class="required">*</span></label>
                        <div class="controls">
                            <input name="Phone" class="span5" type="number" required>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ใบอนุญาตเลขที่ </label>
                        <div class="controls">
                            <input name="License" class="span5" type="number">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">เพิ่มเติม</label>
                        <div class="controls">
                            <textarea name="More" class="span5" rows="2"></textarea>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">ปิด</button>
            <button class="btn btn-primary" type="submit">บันทึก</button>
        </div>
    </form>
</div>
<div id="EditUserModal" class="modal modal-lg hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4><i class="icon-plus"></i> แก้ไขผู้ใช้ระบบ</h4>
    </div>
    <form action="<?php echo base_url('clinic/update_user') ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="span5">
                <fieldset>
                    <div class="row">
                        <div class="control-group span5" align="center">
                            <img id="editshowimage">
                        </div>
                        <div class="control-group span5" align="center">
                            <label class="btn btn-primary"><i class="icon-picture"></i> อัพโหลดรูป
                                <input type="file" name="Image" id="editfilename" accept="image/*" hidden>
                                <input type="hidden" name="OldImage" id="oldimage">
                            </label>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">Username <span class="required">*</span></label>
                        <div class="controls">
                            <input name="UserID" id="userid" class="span5" type="text" required readonly>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ชื่อผู้ใช้งาน <span class="required">*</span></label>
                        <div class="controls">
                            <select name="Nameprefix" id="nameprefix" style=" width: 132px; " required>
                                <option value="">คำนำหน้าชื่อ</option>
                                <option value="นายแพทย์">นายแพทย์</option>
                                <option value="แพทย์หญิง">แพทย์หญิง</option>
                                <option value="นาย">นาย</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="นาง">นาง</option>
                            </select>
                            <input name="UserName" id="username" style=" width: 200px; " type="text" required>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">อีเมล <span class="required">*</span></label>
                        <div class="controls">
                            <input name="Email" id="email" class="span5" type="email" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">ที่อยู่</label>
                        <div class="controls">
                            <textarea name="Address" id="address" class="span5" rows="2"></textarea>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="span5">
                <fieldset>
                    <div class="control-group ">
                        <label class="control-label">สิทธิ์ผู้ใช้งานระบบ <span class="required">*</span></label>
                        <div class="controls">
                            <select name="Leval" id="leval" class="span5" required>
                                <option value="">เลือกสิทธิ์ผู้ใช้</option>
                                <option value="1">Admin</option>
                                <option value="2">Doctor</option>
                                <option value="3">Staff</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ร้านค้า <span class="required">*</span></label>
                        <div class="controls">
                            <input name="CLINICID" class="span5" type="text" value="<?php echo $cinfo->cif_name; ?>" required readonly>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ประเภทผู้ใช้ระบบ <span class="required">*</span></label>
                        <div class="controls">
                            <input type="text" name="Category" value="ผู้ใช้ย่อย" class="span5" required readonly>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">Password </label>
                        <div class="controls">
                            <input name="Password" class="span5" type="password">
                            <input type="hidden" id="prepassword" name="Prepassword">
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">เบอร์โทร <span class="required">*</span></label>
                        <div class="controls">
                            <input name="Phone" id="phone" class="span5" type="number" required>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">ใบอนุญาตเลขที่ </label>
                        <div class="controls">
                            <input name="License" id="license" class="span5" type="number">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">เพิ่มเติม</label>
                        <div class="controls">
                            <textarea name="More" id="more" class="span5" rows="2"></textarea>
                        </div>
                    </div>
                </fieldset>
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
        $('#example').DataTable();
    });
    // แสดงภาพตัวอย่าง
    $('#filename').click(function () {
        var filename = document.getElementById('filename');
        filename.onchange = function () {
            var files = filename.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(files);
            reader.onload = function () {
                var result = reader.result;
                document.getElementById('showimage').src = result;
            };
        };
    });

    $('#logocif').click(function () {
        var logocif = document.getElementById('logocif');
        logocif.onchange = function () {
            var files = logocif.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(files);
            reader.onload = function () {
                var result = reader.result;
                document.getElementById('showlogocif').src = result;
            };
        };
    });

    // อัพเดทแสดงภาพตัวอย่าง
    $('#editfilename').click(function () {
        var editfilename = document.getElementById('editfilename');
        editfilename.onchange = function () {
            var files = editfilename.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(files);
            reader.onload = function () {
                var result = reader.result;
                document.getElementById('editshowimage').src = result;
            };
        };
    });

    $(document).ready(function () {
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });

    $(document).ready(function () {
        $(document).on('click', '#selectuser', function () {
            var image = $(this).data('image');
            var userid = $(this).data('userid');
            var nameprefix = $(this).data('nameprefix');
            var username = $(this).data('username');
            var email = $(this).data('email');
            var address = $(this).data('address');
            var leval = $(this).data('leval');
            var clinicid = $(this).data('clinicid');
            var category = $(this).data('category');
            var prepassword = $(this).data('prepassword');
            var phone = $(this).data('phone');
            var license = $(this).data('license');
            var more = $(this).data('more');
            document.getElementById("editshowimage").src = '<?php echo base_url('assets/images/profile') ?>/' + image;
            $('#oldimage').val(image);
            $('#nameprefix').val(nameprefix);
            $('#userid').val(userid);
            $('#username').val(username);
            $('#email').val(email);
            $('#address').val(address);
            $('#leval').val(leval);
            $('#clinicid').val(clinicid);
            $('#category').val(category);
            $('#prepassword').val(prepassword);
            $('#phone').val(phone);
            $('#license').val(license);
            $('#more').val(more);
            $('#model-item').modal('hide');
        })
    })

    function testLink(i) {
        document.getElementById("myForm" + i).submit();
    }
</script>