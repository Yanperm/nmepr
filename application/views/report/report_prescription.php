<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบสั่งยา</title>
    <style>
        @page {
            margin: 10px;
        }

        body {
            font-size: 19px;
        }
    </style>
</head>

<body>
    <?php
    date_default_timezone_set('Asia/Bangkok');
    $thai_month_arr = array(
        "00" => "",
        "01" => "มกราคม",
        "02" => "กุมภาพันธ์",
        "03" => "มีนาคม",
        "04" => "เมษายน",
        "05" => "พฤษภาคม",
        "06" => "มิถุนายน",
        "07" => "กรกฎาคม",
        "08" => "สิงหาคม",
        "09" => "กันยายน",
        "10" => "ตุลาคม",
        "11" => "พฤศจิกายน",
        "12" => "ธันวาคม"
    );
    $d = date("d");
    $m = $thai_month_arr[date("m")];
    $y = date("Y");
    ?>
    <?php if ($patients != "null") { ?>
        <div>
            <div style="float: left; width: 1px; padding-top: 23px;">
                <?php echo nbs(6); ?><label><b><?php echo $userinfo->Nameprefix ?><?php echo $userinfo->UserName ?></b></label>
            </div>
            <div style="float: left; width: 1px; padding-top: 54px;">
                <?php echo nbs(6); ?><label><?php echo "ที่อยู่ $userinfo->cif_address" ?>
                    <?php echo "ต. $userinfo->cif_subdistrict" ?>
                    <?php echo "อ. $userinfo->cif_district" ?>
                    <?php echo "จ. $userinfo->cif_province" ?>
                    <?php echo " $userinfo->cif_postal" ?></label>
            </div>
            <div style="float: left; width: 1px; padding-top: 85px;">
                <?php echo nbs(6); ?><label>ใบอนุญาตเลขที่ <b><?php echo $userinfo->License ?></b></label>
            </div>
            <div style="float: left; width: 1px; padding-top: 85px;">
                <?php echo nbs(66); ?><label>วันที่ <b><?php echo date("d/m/Y"); ?></b></label>
            </div>
            <div style="float: left; width: 1px;">
                <div align="right" style="padding-top: 17px; padding-right: 20px;">
                    <barcode code="<?php echo "$userinfo->DOMAIN" ?>" type="QR " disableborder="1" />
                </div>
            </div>
            <div style="float: left; width: 1px; padding-top: 127px;">
                <?php echo nbs(6); ?><label>ชื่อผู้ป่วย <b><?php echo $patients->PATIEN_NAMEPREFIX ?><?php echo $patients->PATIEN_NAME ?></b></label>
            </div>
            <div style="float: left; width: 1px; padding-top: 127px;">
                <?php
                $id = $patients->IDCARD;
                $one = substr($id, 0, 1);
                $two = substr($id, 1, 4);
                $three = substr($id, 5, 4);
                $four = substr($id, 9, 1);
                $five = substr($id, 10, 3);
                ?>
                <?php echo nbs(73); ?><label>เลขบัตรประชาชน <b><?php echo "$one-$two-$three-$four-$five" ?></b></label>
            </div>
            <div style="float: left; width: 1px; padding-top: 155px;">
                <?php echo nbs(6); ?><label>ที่อยู่ <?php echo "$patients->PATIEN_ADDRESS" ?></label>
            </div>
        </div>
        <div style="padding-left: 180px; padding-top: 5px; margin-right: 600px; height: 480px;">
            <?php foreach ($orders as $row) { ?>
                <div style="padding-top: 5px;">
                    <?php if ($row->PH3 == "1" || $row->PH3 == "2" || $row->PH3 == "1/2" || $row->PH3 == "1 1/2" || $row->PH3 == "2.5" || $row->PH3 == "5") { ?>
                        <label><?php echo "$row->PH1 $row->Number $row->Unit รับประทานครั้งละ $row->PH3 $row->PH4 $row->PH5 $row->PH6" ?></label>
                    <?php } else { ?>
                        <label><?php echo "$row->PH1 $row->Number $row->Unit $row->PH3 $row->PH4 $row->PH5 $row->PH6" ?></label>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <div style="padding-left: 130px; margin-right: 600px;">
            <barcode code="<?php echo $BOOKINGID ;?>" type="C128B " />
        </div>
    <?php } ?>
</body>

</html>