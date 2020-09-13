<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบส่งตรวจ</title>
    <style>
        @page {
            margin: 35px;
        }

        body {
            font-size: 18px;
        }

        .m5 {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        #lab {
            border-collapse: collapse;
            width: 100%;
            font-size: 20px;
        }

        #lab td {
            border: 1px solid;
            padding: 8px;
        }

        #lab th {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <?php date_default_timezone_set('Asia/Bangkok'); ?>
    <?php if ($patients != "null") { ?>
        <div>
            <div style="float: left; width: 1px; font-size: 35px;">
                <label><b>ใบส่งตรวจทางห้องปฏิบัติการ</b></label><br>
                <label><b>Laboratory Request Form</b></label>
            </div>
            <div style="float: right; width: 1px; " align="right">
                <img src="<?php echo base_url('assets/images/profile/' . $userinfo->cif_image . '') ?>" width="120px" height="120px">
            </div>
        </div>
        <div>
            <div style="float: left; width: 50%;">
                <div class="m5">
                    <label>ชื่อ - นามสกุล / <b>Patient Name </b><?php echo $patients->PATIEN_NAMEPREFIX ?><?php echo $patients->PATIEN_NAME ?></label>
                </div>
                <div class="m5">
                    <label>เลขบัตรประชาชน / <b>Identification No. </b><?php echo $patients->IDCARD ?></label>
                </div>
                <div class="m5">
                    <label>เบอร์ติดต่อ / <b>Contact Number </b><?php echo $patients->PATIEN_PHONE ?></label>
                </div>
                <div class="m5">
                    <label>วันที่พบแพทย์ / <b>Visit Date </b><?php echo date('d/m/Y') ?></label>
                </div>
            </div>
            <div style=" width: 50%;">
                <div class="m5">
                    <label>เลขที่รับบริการ / <b>Visit Number </b><?php echo $BOOKINGID ?></label>
                </div>
                <div class="m5">
                    <label>วันที่ส่ง / <b>Date </b><?php echo date("d/m/Y", strtotime($lab[0]->CREATE)); ?></label>
                </div>
                <div class="m5">
                    <label>เวลา / <b>Time </b><?php echo date("H:i:s", strtotime($lab[0]->CREATE)); ?></label>
                </div>
            </div>
        </div>
        <hr>
        <div>
            <div style="float: left; width: 50%;">
                <div class="m5">
                    <label>ผู้ส่ง / <b>Clinic Name </b><?php echo $userinfo->cif_name ?></label>
                </div>
                <div class="m5">
                    <label>ที่อยู่ / <b>Address </b><?php echo "ที่อยู่ $userinfo->cif_address" ?>
                        <?php echo "ต. $userinfo->cif_subdistrict" ?>
                        <?php echo "อ. $userinfo->cif_district" ?>
                        <?php echo "จ. $userinfo->cif_province" ?>
                        <?php echo " $userinfo->cif_postal" ?></label>
                </div>
            </div>
            <div style=" width: 50%;">
                <div class="m5">
                    <label>เลขที่คลินิก / <b>Clinic No </b><?php echo $userinfo->cif_license ?></label>
                </div>
                <div class="m5">
                    <div style="float: left; width: 40%;">
                        <label><b>Tel </b><?php echo $userinfo->cif_phone ?></label>
                    </div>
                    <div style="width: 60%;">
                        <label><b>Mail </b><?php echo $userinfo->cif_email ?></label>
                    </div>
                </div>
                <div class="m5">
                    <label><b>Web </b><?php echo $userinfo->DOMAIN ?></label>
                </div>
            </div>
        </div>
        <br>
        <div>
            <table id="lab">
                <tr>
                    <th>เลขที่<br>No</th>
                    <th>รายการตรวจ<br>Test Name</th>
                    <th>แผนกส่งตรวจ<br>Department</th>
                    <th>ผู้รับตรวจ<br>Company</th>
                </tr>
                <?php
                $number = 0;
                foreach ($lab as $labs) {
                    ++$number ?>
                    <tr>
                        <td align="center"><?php echo $number ?></td>
                        <td><?php echo $labs->PH1 ?></td>
                        <td><?php echo $labs->PH2 ?></td>
                        <td><?php echo $labs->PH3 ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <br>
        <br>
        <div style=" margin-left: 400px;">
            <div align="center">
                <label>...................................................................................................</label><br>
                <label>ผู้ส่งตรวจ / <b>Request by</b></label>
            </div>
        </div>
    <?php } ?>
</body>

</html>