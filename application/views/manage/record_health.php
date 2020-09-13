<div class="container">
    <div class="row">
        <div class="span6">
            <a class="btn btn-large" href="<?php echo base_url('dashboard/record_information/') ?>"><b>ข้อมูลทั่วไป</b></a>
            <a class="btn btn-primary btn-large" href="<?php echo base_url('dashboard/record_health/') ?>"><b>ข้อมูลสุขภาพ</b></a>
        </div>
        <div class="span6 offset4">
            <ul class="nav nav-pills" id="myTab" style="margin-left: 160px; margin-top: 10px;">
                <li class="active"><a href="#tab1" data-toggle="tab"> สุขภาพปัจจุบัน</a></li>
                <li><a href="#tab2" data-toggle="tab"> ประวัติสุขภาพ</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="tab-content">
    <div class="tab-pane active" id="tab1">
        <section class="page container">
            <form class="form-horizontal" action="<?php echo base_url('patient/insert_health') ?>" method="post">
                <div class="container">
                    <?php
                    $success = $this->session->userdata('success');
                    if ($success != '') { ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>สำเร็จ</strong> <?php echo $success; ?>
                        </div>
                    <?php
                        $this->session->unset_userdata('success');
                    } ?>
                    <?php
                    $danger = $this->session->userdata('danger');
                    if ($danger != '') { ?>
                        <div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>คำเตือน</strong> <?php echo $danger; ?>
                        </div>
                    <?php
                        $this->session->unset_userdata('danger');
                    } ?>
                </div>
                <style>
                    .frame {
                        border-radius: 10px;
                        border: 1px solid #c5c5c5;
                        padding: 20px;
                        height: 260px;
                    }

                    .co1 {
                        width: 160px;
                        margin-top: 5px;
                        text-align: right;
                        margin-right: 10px;

                    }

                    .co3 {
                        margin-left: 10px;
                        margin-top: 5px;
                    }

                    .fl {
                        float: left;
                    }
                </style>
                <div class="row">
                    <div class="span7 frame">
                        <h4>Body Measurements</h4>
                        <br>
                        <div class="control-group">
                            <label class="fl co1">น้ำหนัก :</label>
                            <input type="text" name="Wieght" ng-model="weight" class="fl">
                            <label class="fl co3">กิโลกรัม</label>
                        </div>
                        <div class="control-group">
                            <label class="fl co1">ส่วนสูง :</label>
                            <input type="text" name="Height" ng-model="height" class="fl">
                            <label class="fl co3">เซนติเมตร</label>
                        </div>
                        <div class="control-group">
                            <label class="fl co1">ดัชนีมวลกาย :</label>
                            <input type="text" name="BMI" value="{{weight / (height / 100 * height / 100) | number : 2}}" class="fl" readonly>
                            <label class="fl co3">kg/m2 </label>
                        </div>
                        <div class="control-group">
                            <label class="fl co1">อุณหภูมิร่างกาย :</label>
                            <input type="text" name="BodyTemp" class="fl">
                            <label class="fl co3">องศาเซลเซียส </label>
                        </div>
                    </div>
                    <div class="span7 frame">
                        <h4>Vitals</h4>
                        <br>
                        <div class="control-group">
                            <label class="fl co1">ความดัน :</label>
                            <input type="text" name="BP" class="fl">
                            <label class="fl co3">mmHg</label>
                        </div>
                        <div class="control-group">
                            <label class="fl co1">อัตราการเต้นของหัวใจ :</label>
                            <input type="text" name="HR" class="fl">
                            <label class="fl co3">BPM</label>
                        </div>
                        <div class="control-group">
                            <label class="fl co1">ระดับน้ำตาลในเลือด :</label>
                            <input type="text" name="FBS" class="fl">
                            <label class="fl co3">mg/dL</label>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 20px;">
                    <input type="hidden" name="IDCARD" value="<?php echo $patientid ?>">
                    <input type="submit" value="บันทีก" class="btn btn-large btn-primary">
                </div>
            </form>
        </section>
    </div>
    <div class="tab-pane" id="tab2">
        <style>
            #health {
                border-collapse: collapse;
                width: 100%;
            }

            #health td,
            #health th {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: center;
            }

            #health tr:nth-child(odd) {
                background-color: #f2f2f2;
            }

            #health th {
                background-color: #9a9a9a;
                color: white;
            }
        </style>
        </style>
        <section class="page container">
            <div class="span15">
                <h4>Body Measurements</h4>
                <table id="health">
                    <tr>
                        <th>วันที่</th>
                        <th>Visit Number</th>
                        <th>น้ำหนัก</th>
                        <th>ส่วนสูง</th>
                        <th>BMI</th>
                        <th>Body Temp</th>
                        <th>BP</th>
                        <th>HR</th>
                        <th>FBS</th>
                    </tr>
                    <?php
                    $PH = $this->db->get_where('tbpatient_health', array('IDCARD' => $patientid));
                    foreach ($PH->result() as $PHrow) {
                    ?>
                        <tr>
                            <td><?php echo date("d/m/Y", strtotime($PHrow->DATE_CREATE)); ?></td>
                            <td><?php echo $PHrow->BOOKINGID ?></td>
                            <td><?php echo $PHrow->Wieght ?></td>
                            <td><?php echo $PHrow->Height ?></td>
                            <td><?php echo $PHrow->BMI ?></td>
                            <td><?php echo $PHrow->BodyTemp ?></td>
                            <td><?php echo $PHrow->BP ?></td>
                            <td><?php echo $PHrow->HR ?></td>
                            <td><?php echo $PHrow->FBS ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </section>
    </div>
</div>
<br>
<script>
    $(document).ready(function() {
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });
</script>

<!-- สำคัญปิดส่วนหัวไฟล์ patientprofilehead.php -->
</div> <!-- <div class="box" style="background-color: #F0F0F0"> -->
</div> <!-- <div class="box-content box-table"> -->