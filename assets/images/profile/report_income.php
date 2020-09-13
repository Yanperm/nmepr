<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานรายได้</title>
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
    </style>
</head>

<body>
    <div>
        <div style="float: left; width: 1px; font-size: 35px;">
            <label><b>รายงานสรุปยอดขาย</b></label><br>
            <label><b>Summary Sale Report</b></label>
        </div>
        <div style="float: right; width: 1px; " align="right">
            <img src="<?php echo site_url('/assets/images/profile/' . $userinfo->cif_image . '') ?>" width="120px" height="120px">
        </div>
    </div>
    <div>
        <div class="m5">
            <label>ชื่อคลินิก / <b>Clinic Name </b><?php echo $userinfo->cif_name ?></label>
        </div>
        <div class="m5">
            <label>ยอดขาย ระหว่างวันที่ <?php echo date("d/m/Y", strtotime($dayfrom)); ?></label> <?php echo nbs(47); ?><label>ถึง วันที่ <?php echo date("d/m/Y", strtotime($dayto)); ?></label>
        </div>
        <div class="m5">
            <label>คำค้น <?php if ($name != "noname") {
                                echo $name;
                            }  ?></label>
        </div>
    </div>
    <hr>
    <div>
        <style>
            #incomes {
                border-collapse: collapse;
                width: 100%;
                font-size: 20px;
            }

            .bor {
                border: 1px solid;
                padding-left: 5px;
                padding-right: 5px;
            }
        </style>
        <table id="incomes">
            <tr>
                <th class="bor">ลำดับคิว</th>
                <th class="bor">วันที่เข้ารักษา</th>
                <th class="bor">ชื่อ - สกุลคนไข้</th>
                <th class="bor">ค่า DF</th>
                <th class="bor">ค่ายา</th>
                <th class="bor">ค่าแล็บ</th>
                <th class="bor">ค่าหัตถการ</th>
                <th class="bor">ค่าใบรับรอง</th>
                <th class="bor">รวม</th>
            </tr>
            <?php
            $sumDF = 0;
            $sumdrug = 0;
            $sumlab = 0;
            $sumprocedure = 0;
            $sumDcertificate = 0;
            $sumfull = 0;
            ?>
            <?php foreach ($income as $incomes) { ?>
                <?php
                $DF = 0;
                $drug = 0;
                $lab = 0;
                $procedure = 0;
                $certificate = 0;
                ?>
                <tr>
                    <td class="bor" align="center"><?php echo $incomes->ci_queue ?></td>
                    <td class="bor" align="center"><?php echo date("d-m-Y", strtotime($incomes->ci_date)); ?></td>
                    <td class="bor"><?php echo $incomes->ci_nameprefix ?><?php echo $incomes->ci_name ?></td>
                    <td class="bor" align="right"><?php echo number_format($incomes->ci_check, 2, '.', ','); ?></td>
                    <td class="bor" align="right"><?php echo number_format($incomes->ci_drug, 2, '.', ','); ?></td>
                    <td class="bor" align="right"><?php echo number_format($incomes->ci_lab, 2, '.', ','); ?></td>
                    <td class="bor" align="right"><?php echo number_format($incomes->ci_procedure, 2, '.', ','); ?></td>
                    <td class="bor" align="right"><?php echo number_format($incomes->ci_certificate, 2, '.', ','); ?></td>
                    <?php
                    $DF =  $DF + $incomes->ci_check;
                    $drug =  $drug + $incomes->ci_drug;
                    $lab =  $lab + $incomes->ci_lab;
                    $procedure =  $procedure + $incomes->ci_procedure;
                    $certificate = $certificate + $incomes->ci_certificate;
                    $sum = $DF + $drug + $lab + $procedure + $certificate;

                    $sumDF = $sumDF + $DF;
                    $sumdrug = $sumdrug + $drug;
                    $sumlab = $sumlab + $lab;
                    $sumprocedure = $sumprocedure + $procedure;
                    $sumDcertificate = $sumDcertificate + $certificate;
                    $sumfull = $sumfull +  $sum;

                    ?>
                    <td class="bor" align="right"><?php echo number_format($sum, 2, '.', ','); ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td></td>
                <td></td>
                <td style="background-color: #d2d2d2;" class="bor" align="right">รวมทั้งสิ้น</td>
                <td style="background-color: #d2d2d2;" class="bor" align="right"><?php echo number_format($sumDF, 2, '.', ','); ?></td>
                <td style="background-color: #d2d2d2;" class="bor" align="right"><?php echo number_format($sumdrug, 2, '.', ','); ?></td>
                <td style="background-color: #d2d2d2;" class="bor" align="right"><?php echo number_format($sumlab, 2, '.', ','); ?></td>
                <td style="background-color: #d2d2d2;" class="bor" align="right"><?php echo number_format($sumprocedure, 2, '.', ','); ?></td>
                <td style="background-color: #d2d2d2;" class="bor" align="right"><?php echo number_format($sumDcertificate, 2, '.', ','); ?></td>
                <td style="background-color: #d2d2d2;" class="bor" align="right"><?php echo number_format($sumfull, 2, '.', ','); ?></td>
            </tr>
        </table>
    </div>
    <br>
    <br>
    <div style=" margin-left: 400px;">
        <div align="center">
            <label>...................................................................................................</label><br>
            <label>ผู้ตรวจสอบ / <b>Check by</b></label>
        </div>
    </div>
</body>

</html>