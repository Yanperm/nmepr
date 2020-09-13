<style>
    #Search_Date td {
        padding-left: 7px;
        padding-right: 6px;
    }

    #lab {
        border-collapse: collapse;
        width: 100%;
    }

    #lab td,
    #lab th {
        border: 1px solid #ffffff;
        padding: 8px;
    }

    #lab tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    #lab th {
        background-color: #e0e0e0;

    }

    .frame-sum {
        border-width: 1px;
        padding: 18px;
        background-color: #E9EDF6;
        overflow: auto;
    }

    .frame-cost {
        border-width: 1px;
        padding: 18px;
        background-color: white;
        overflow: auto;
    }

    .frame-data {
        border-width: 1px;
        margin-right: 10px;
        padding: 18px;
        background-color: white;
        height: 388px;
        overflow: auto;
    }

    .toolbar_left {
        float: left;
    }

    .toolbar_right {
        float: right;
    }
</style>
<div class="tabbable">
    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#tab1" data-toggle="tab"><i class="icon-cog"></i> รายงานรายได้</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab1">
            <div class="row-fluid">
                <div class="span17">
                    <form action="<?php echo base_url('search/income_report/') ?>" method="get">
                        <table id="Search_Date">
                            <tr>
                                <td>
                                    <label>ช่วงวันที่ </label>
                                </td>
                                <td>
                                    <input type="date" name="dayfrom" value="<?php echo $dayfrom ?>">
                                </td>
                                <td>
                                    <label>ถึงวันที่ </label>
                                </td>
                                <td>
                                    <input type="date" name="dayto" value="<?php echo $dayto ?>">
                                </td>
                                <td>
                                    <input type="search" name="name" value="<?php echo $name ?>">
                                </td>
                                <td>
                                    <input type="submit" value="ค้นหา" class="btn btn-info" style="margin-bottom: 9px;">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="row-fluid" style=" margin-top: 20px; ">
                <div class="span12">
                    <div class="frame-data">
                        <table id="lab">
                            <tr>
                                <th>ลำดับคิว</th>
                                <th>วันที่เข้ารักษา</th>
                                <th>ชื่อ-สกุลคนไข้</th>
                                <th>ค่า DF</th>
                                <th>ค่ายา</th>
                                <th>ค่าแล็บ</th>
                                <th>ค่าหัตถการ</th>
                                <th>ค่าใบรับรอง</th>
                            </tr>
                            <?php
                            if($name == ''){
                                $name = 'noname';
                            }
                            $queue = 0;
                            $certificate = 0;
                            $DF = 0;
                            $drug = 0;
                            $lab = 0;
                            $procedure = 0;
                            ?>
                            <?php
                            if (isset($query)) {
                                foreach ($query as $row) { ?>
                                    <tr>
                                        <td align="center">
                                            <?php echo $row->ci_queue ?>
                                        </td>
                                        <td align="center">
                                            <?php echo date("d-m-Y", strtotime($row->ci_date)); ?>
                                        </td>
                                        <td>
                                            <?php echo $row->ci_nameprefix ?><?php echo $row->ci_name ?>
                                        </td>
                                        <td align="right">
                                            <?php echo number_format($row->ci_check, 2, '.', ','); ?>
                                        </td>
                                        <td align="right">
                                            <?php echo number_format($row->ci_drug, 2, '.', ','); ?>
                                        </td>
                                        <td align="right">
                                            <?php echo number_format($row->ci_lab, 2, '.', ','); ?>
                                        </td>
                                        <td align="right">
                                            <?php echo number_format($row->ci_procedure, 2, '.', ','); ?>
                                        </td>
                                        <td align="right">
                                            <?php echo number_format($row->ci_certificate, 2, '.', ','); ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $queue++;
                                    $DF =  $DF + $row->ci_check;
                                    $drug =  $drug + $row->ci_drug;
                                    $lab =  $lab + $row->ci_lab;
                                    $procedure =  $procedure + $row->ci_procedure;
                                    $certificate = $certificate + $row->ci_certificate;
                                    ?>
                            <?php }
                            } ?>
                            <?php $sum = $DF + $drug + $lab + $procedure + $certificate ?>
                        </table>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="frame-sum">
                        <div class="row-fluid">
                            <h3 class="toolbar_left">รวม</h3>
                            <h3 class="toolbar_right"><?php echo number_format($sum, 2, '.', ','); ?> THB</h3>
                        </div>
                    </div>
                    <div class="frame-cost">
                        <div class="row-fluid">
                            <label class="toolbar_left">ค่า DF</label>
                            <label class="toolbar_right"><?php echo number_format($DF, 2, '.', ','); ?> THB</label>
                        </div>
                        <div class="row-fluid">
                            <label class="toolbar_left">ค่ายา</label>
                            <label class="toolbar_right"><?php echo number_format($drug, 2, '.', ','); ?> THB</label>
                        </div>
                        <div class="row-fluid">
                            <label class="toolbar_left">ค่าแล็บ</label>
                            <label class="toolbar_right"><?php echo number_format($lab, 2, '.', ','); ?> THB</label>
                        </div>
                        <div class="row-fluid">
                            <label class="toolbar_left">ค่าหัตถการ</label>
                            <label class="toolbar_right"><?php echo number_format($procedure, 2, '.', ','); ?> THB</label>
                        </div>
                        <div class="row-fluid">
                            <label class="toolbar_left">ค่าใบรับรอง</label>
                            <label class="toolbar_right"><?php echo number_format($certificate, 2, '.', ','); ?> THB</label>
                        </div>
                        <hr style="border-top: 1px solid #bfbfbf;">
                        <div class="row-fluid">
                            <label class="toolbar_left">จำนวนคิว</label>
                            <label class="toolbar_right"><?php echo $queue ?> คิว</label>
                        </div>
                        <div class="toolbar_right" style="margin-top: 70px;">
                            <a href="<?php echo base_url('report/report_income/' . $dayfrom . '/' . $dayto . '/' . $name) ?>" target="_blank" class="btn btn-success">พิมพ์รายงาน</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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