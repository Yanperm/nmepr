<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบเสร็จรับเงิน</title>
    <style>
        @page {
            margin: 10px;
        }

        body {
            font-size: 18px;
        }

        .m5 {
            margin-top: 5px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php
function Convert($amount_number)
{
    $amount_number = number_format($amount_number, 2, ".", "");
    $pt = strpos($amount_number, ".");
    $number = $fraction = "";
    if ($pt === false) {
        $number = $amount_number;
    } else {
        $number = substr($amount_number, 0, $pt);
        $fraction = substr($amount_number, $pt + 1);
    }

    $ret = "";
    $baht = ReadNumber($number);
    if ($baht != "") {
        $ret .= $baht . "บาท";
    }

    $satang = ReadNumber($fraction);
    if ($satang != "") {
        $ret .= $satang . "สตางค์";
    } else {
        $ret .= "ถ้วน";
    }

    return $ret;
}

function ReadNumber($number)
{
    $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
    $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $number = $number + 0;
    $ret = "";
    if ($number == 0) {
        return $ret;
    }

    if ($number > 1000000) {
        $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
        $number = intval(fmod($number, 1000000));
    }

    $divider = 100000;
    $pos = 0;
    while ($number > 0) {
        $d = intval($number / $divider);
        $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" : ((($divider == 10) && ($d == 1)) ? "" : ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
        $ret .= ($d ? $position_call[$pos] : "");
        $number = $number % $divider;
        $divider = $divider / 10;
        $pos++;
    }
    return $ret;
}
## วิธีใช้งาน
// $num1 = '3500.01';
// $num2 = '120000.50';
// echo  $num1  . "&nbsp;=&nbsp;" . Convert($num1), "<br>";
// echo  $num2  . "&nbsp;=&nbsp;" . Convert($num2), "<br>";
?>
    <?php date_default_timezone_set('Asia/Bangkok');?>
    <?php if ($patients != "null") {?>
        <div>
            <div style="text-align: center;">
                <h2><b style="font-size: 40px;"><?php echo $userinfo->cif_name ?></b></h2>
                <label style="text-align: center"><?php echo "$userinfo->cif_address" ?>
                        <?php echo "ต. $userinfo->cif_subdistrict" ?>
                        <?php echo "อ. $userinfo->cif_district" ?>
                        <?php echo "จ. $userinfo->cif_province" ?>
                        <?php echo " $userinfo->cif_postal" ?></label>
            </div>           
        </div>
        <div>
            <div style="float: left; width: 100%;font-size: 35px;">
                <div class="m5">
                <label>เลขที่ <?php echo $BOOKINGID ?></label><br/>
                    <label>ชื่อ <?php echo $patients->PATIEN_NAMEPREFIX ?><?php echo $patients->PATIEN_NAME ?></label><br/>                    
                    <label>วันที่ <?php echo date("d/m/Y"); ?></label>
                    <label> <?php echo date("H:i:s"); ?></label>
                </div>
            </div>
        </div>
        <br>
            <style>
                #payment {
                   borderWidth:100%;                    
                }
                .bor {
                    border: 0px solid;
                }

                .lr {
                    padding-left: 1px;
                    padding-right: 1px;
                    border-left: 0px solid;
                    border-right: 0px solid;
                }
            </style>
            <b style="font-size: 30px; text-align: center">ใบเสร็จรับเงินอย่างย่อ</b>
            <table style="width:100%;font-size: 25px;">              
               
                <tr>
                    <?php
$sum = 0;
    $history = $this->db->query("SELECT SUM(PH5) AS sums FROM tbpatient_history WHERE BOOKINGID = '$BOOKINGID' ");
    $historyrow = $history->row();
    $sum = $sum + $historyrow->sums;
    $ci_check = $historyrow->sums;
    ?>
                    
                    <td class="lr">ค่าตรวจ</td>
                    <td class="lr"></td>
                    <td class="lr" align="right"><?php echo number_format($historyrow->sums, 2, '.', ','); ?></td>
                </tr>                              
                <?php
$ci_drug = 0;
    $medical = $this->db->get_where('tbpatient_medical', array('BOOKINGID' => $BOOKINGID));    
        $medicalrow =$medical->row();
        $summedical = $medicalrow->PH8 * $medicalrow->Number;
        $sum = $sum + $summedical;
        ?>
                    <tr>
                        <td class="lr">ค่ายา</td>
                        <td class="lr"></td>
                        <td class="lr" align="right"><?php echo number_format($summedical, 2, '.', ','); ?></td>
                    </tr>
              
               
                <tr>
                    <?php
$lab = $this->db->query("SELECT SUM(PH4) AS sums FROM tbpatient_lab WHERE BOOKINGID = '$BOOKINGID' ");
    $labrow = $lab->row();
    $sum = $sum + $labrow->sums;
    $ci_lab = $labrow->sums;
    ?>
                    
                    <td class="lr">ค่าแล็บ</td>
                    <td class="lr"></td>
                    <td class="lr" align="right"><?php echo number_format($labrow->sums, 2, '.', ','); ?></td>
                </tr>               
               
                <tr>
                    <?php
$procedure = $this->db->query("SELECT SUM(PH3) AS sums FROM tbpatient_procedure WHERE BOOKINGID = '$BOOKINGID' ");
    $procedurerow = $procedure->row();
    $sum = $sum + $procedurerow->sums;
    $ci_procedure = $procedurerow->sums;
    ?>
                <td class="lr">ค่าหัตถการ</td>
                    <td class="lr"></td>                    
                    <td class="lr" align="right"><?php echo number_format($procedurerow->sums, 2, '.', ','); ?></td>
                </tr>              
               
                <?php
$job = $this->db->query("SELECT SUM(Price) AS sums FROM tbpatient_job WHERE BOOKINGID = '$BOOKINGID' ");
    $jobrow = $job->row();
    $sum = $sum + $jobrow->sums;
    ?>
                <?php if ($jobrow->sums != '') {?>
                    <tr>
                    <td class="lr">ค่าใบรับรองแพทย์ เพื่อสมัครงาน</td>
                        <td class="lr"></td>                        
                        <td class="lr" align="right"><?php echo number_format($jobrow->sums, 2, '.', ','); ?></td>
                    </tr>
                <?php }?>
                <?php
$sick = $this->db->query("SELECT SUM(Price) AS sums FROM tbpatient_sick WHERE BOOKINGID = '$BOOKINGID' ");
    $sickrow = $sick->row();
    $sum = $sum + $sickrow->sums;
    ?>
                <?php if ($sickrow->sums != '') {?>
                    <tr>                        
                        <td class="lr">ค่าใบรับรองแพทย์ เพื่อลางาน</td>
                        <td class="lr"></td>
                        <td class="lr" align="right"><?php echo number_format($sickrow->sums, 2, '.', ','); ?></td>
                    </tr>
                <?php }?>
                
                <tr>                    
                    <td align="left" style="border-bottom: 0px solid;border-right: 0px solid;">รวม</b></td>
                    <td align="right" style="border-bottom: 0px solid;border-right: 0px solid;"><?php echo number_format($sum, 2, '.', ','); ?></td>
                    <td align="right">ส่วนลด 0.00</td>
                </tr>
                <tr>                    
                    <td align="left"><b>รวมทั้งสิ้น</b></td>
                    <td align="right"><b><?php echo number_format($sum, 2, '.', ','); ?></b></td>
                    <td align="right">บาท</td>
                </tr>
            </table>
            ..........................................................................................................................
        <br>        
    <?php }?>
</body>

</html>