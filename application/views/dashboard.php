<style>
    .frame {
        background-color: #ffffff;
        float: left;
        height: 110px;
    }

    .frame_left {
        float: left;width: 608px;margin-right: 30px;
    }

    .frame_right {
        float: left;width: 608px;
    }

    .icons {
        border-radius: 50%;
        color: #ffffff;
        float: left;
        /* padding: 13px 13px 13px 13px; */
        margin: 23px 20px 10px 20px;
        height: 70px;
        width: 70px;
    }
</style>
<?php

?>
<div class="row">
    <div class="frame" style="margin: 0px 10px 20px 0px; width: 22%;">
        <div class="icons" style="background: #03a9f4;">
            <i class="icon-user" style="font-size: 50px; line-height: 60px; margin-left: 16px;"></i>
        </div>
        <div style="margin-top: 30px;">
            <div style="font-size: 25px;">
                <b><?php
                    if ($queue_today != '') {
                        echo number_format($queue_today, 0, '.', ',');
                    } else {
                        echo '0';
                    } ?> คิว</b>
            </div>
            <div style="margin-top: 10px;">
                <font color="#c3c3c3">
                    คิวตรวจวันนี้
                </font>
            </div>
        </div>
    </div>
    <div class="frame" style="margin: 0px 10px 20px 10px; width: 24%;">
        <div class="icons" style="background: #92D050;">
            <i class="far fa-money-bill-alt" style="font-size: 40px; line-height: 66px; margin-left: 11px;"></i>
        </div>
        <div style="margin-top: 30px;">
            <div style="font-size: 25px;">
                <b><?php
                    if ($sales_today->sums != '') {
                        echo number_format($sales_today->sums, 0, '.', ',');
                    } else {
                        echo '0';
                    } ?> บาท</b>
            </div>
            <div style="margin-top: 10px;">
                <font color="#c3c3c3">
                    ยอดขายวันนี้
                </font>
            </div>
        </div>
    </div>
    <div class="frame" style="margin: 0px 10px 20px 10px; width: 23%;">
        <div class="icons" style="background: #FFC000;">
            <i class="fas fa-user-friends" style="font-size: 40px; line-height: 64px; margin-left: 11px;"></i>
        </div>
        <div style="margin-top: 30px;">
            <div style="font-size: 25px;">
                <b><?php
                    if ($queue_year != '') {
                        echo number_format($queue_year, 0, '.', ',');
                    } else {
                        echo '0';
                    } ?> คิว</b>
            </div>
            <div style="margin-top: 10px;">
                <font color="#c3c3c3">
                    คิวตรวจแล้วปีนี้
                </font>
            </div>
        </div>
    </div>
    <div class="frame" style="margin: 0px 0px 20px 10px; width: 26%;">
        <div class="icons" style="background: #FF99FF;">
            <i class="fas fa-wallet" style="font-size: 40px; line-height: 66px; margin-left: 14px;"></i>
        </div>
        <div style="margin-top: 30px;">
            <div style="font-size: 25px;">
                <b><?php
                    if ($sales_year->sums != '') {
                        echo number_format($sales_year->sums, 0, '.', ',');
                    } else {
                        echo '0';
                    } ?> บาท</b>
            </div>
            <div style="margin-top: 10px;">
                <font color="#c3c3c3">
                    ยอดขายปีนี้
                </font>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="frame_left">
        <div class="box">
            <div class="box-header">
                <i class="icon-bar-chart"></i>
                <h5>ยอดขายปีนี้ เปรียบเทียบ Last Year</h5>
            </div>
            <div class="box-content">
                <div class="content">
                    <div class="wrapper"><canvas id="canvas"></canvas></div>
                </div>
                <?php
                date_default_timezone_set('Asia/Bangkok');
                for ($i = 1; $i <= 12; $i++) {
                    $ly[$i] = "";
                }
                foreach ($sales_last_year as $last_year) {
                    $m =  (int) date("m", strtotime($last_year->ci_date));
                    $ly[$m] = $last_year->sums;
                }

                for ($ii = 1; $ii <= 12; $ii++) {
                    $ty[$ii] = "";
                }
                foreach ($sales_this_year as $this_year) {
                    $mm =  (int) date("m", strtotime($this_year->ci_date));
                    $ty[$mm] = $this_year->sums;
                }
                ?>
                <script>
                    var config = {
                        type: 'line',
                        data: {
                            labels: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
                            datasets: [{
                                label: 'Last Year',
                                backgroundColor: window.chartColors.yellow,
                                borderColor: window.chartColors.yellow,
                                data: [<?php echo $ly[1] ?>, <?php echo $ly[2] ?>, <?php echo $ly[3] ?>, <?php echo $ly[4] ?>, <?php echo $ly[5] ?>, <?php echo $ly[6] ?>, <?php echo $ly[7] ?>, <?php echo $ly[8] ?>, <?php echo $ly[9] ?>, <?php echo $ly[10] ?>, <?php echo $ly[11] ?>, <?php echo $ly[12] ?>],
                                fill: false,
                            }, {
                                label: 'This Year',
                                fill: false,
                                backgroundColor: window.chartColors.blue,
                                borderColor: window.chartColors.blue,
                                data: [<?php echo $ty[1] ?>, <?php echo $ty[2] ?>, <?php echo $ty[3] ?>, <?php echo $ty[4] ?>, <?php echo $ty[5] ?>, <?php echo $ty[6] ?>, <?php echo $ty[7] ?>, <?php echo $ty[8] ?>, <?php echo $ty[9] ?>, <?php echo $ty[10] ?>, <?php echo $ty[11] ?>, <?php echo $ty[12] ?>],
                            }]
                        },
                        options: {
                            legend: false,
                        }
                    };

                    window.onload = function() {
                        var ctx = document.getElementById('canvas').getContext('2d');
                        window.myLine = new Chart(ctx, config);
                    };
                </script>
            </div>
        </div>
    </div>
    <div class="frame_right">
        <?php
        foreach ($services as $sv) {
            $s1 = $sv->ci_check;
            $s2 = $sv->ci_drug;
            $s3 = $sv->ci_lab;
            $s4 = $sv->ci_procedure;
            $s5 = $sv->ci_certificate;
        }
        ?>
        <script type="text/javascript">
            google.load('visualization', '1', {
                'packages': ['corechart']
            });
            google.setOnLoadCallback(drawVisualization);

            function drawVisualization() {
                visualization_data = new google.visualization.DataTable();
                visualization_data.addColumn('string', 'Task');
                visualization_data.addColumn('number', 'Hours per Day');
                visualization_data.addRow(['ค่า DF', <?php echo $s1 ?>]);
                visualization_data.addRow(['ค่ายา', <?php echo $s2 ?>]);
                visualization_data.addRow(['ค่า Lab', <?php echo $s3 ?>]);
                visualization_data.addRow(['ค่าหัตถการ', <?php echo $s4 ?>]);
                visualization_data.addRow(['ค่าใบรับรอง', <?php echo $s5 ?>]);
                visualization = new google.visualization.PieChart(document.getElementById('piechart'));
                visualization.draw(visualization_data, {
                    title: 'คลินิกของฉัน',
                    height: 275
                });

            }
        </script>

        <div class="box">
            <div class="box-header">
                <i class="icon-bar-chart"></i>
                <h5>เปรียบเทียบยอดขายแต่ละ Services</h5>
            </div>
            <div class="box-content">
                <div id="piechart"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        setInterval(function() {
            $("#latestData").load("<?php echo base_url('dashboard/wait_accept') ?>");
        }, 1000);
    });
</script>
<script>
    $(document).ready(function() {
        setInterval(function() {
            $("#latestDatas").load("<?php echo base_url('dashboard/wait_phamacy') ?>");
        }, 30000);
    });
</script>
<div class="row">
    <div class="frame_left">
        <div class="box pattern pattern-white-grid">
            <div class="box-header">
                <i class="icon-user icon-large"></i>
                <h5>คิวรอนุมัติการจอง 5 รายการล่าสุด</h5>
            </div>
            <div class="box-content" id="latestData">
                <table class="table table-condensed">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th class="text-center">บัตรคิว</th>
                            <th class="text-center">วันที่ต้องการตรวจ</th>
                            <th class="text-center">เวลาตรวจที่เลือก</th>
                            <th class="text-center">สถานะคิว</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $CLINIC = $this->session->userdata("CLINICID");
                        $Dash = $this->db->query("SELECT tbbooking.QUES,tbbooking.CHECKIN,tbmembers.BIRTHDAY,tbmembers.IDCARD,tbmembers.LINEID,tbbooking.BOOKINGID,tbbooking.BOOKDATE,tbbooking.ACCEPT,tbbooking.BOOKTIME,tbmembers.PHONE,tbmembers.CUSTOMERNAME FROM tbbooking INNER JOIN tbmembers ON tbmembers.IDCARD = tbbooking.IDCARD OR tbmembers.MEMBERIDCARD = tbbooking.MEMBERIDCARD WHERE tbbooking.CLINICID = '$CLINIC' and tbbooking.ACCEPT = 0 ORDER BY tbbooking.BOOKDATE DESC LIMIT 4");
                        $num = $Dash->num_rows();
                        if ($num > 0) {
                            foreach ($Dash->result() as $row) {
                                $id = $row->BOOKINGID;
                        ?>
                                <tr>
                                    <td class="bg-dark text-white text-center">
                                        <span class="badge badge-success"><b><?php echo $row->QUES; ?></b></span>

                                    </td>
                                    <td class="bg-dark text-white text-center"><?php echo $row->BOOKDATE; ?></td>
                                    <td class="bg-dark text-white text-center"><?php echo $row->BOOKTIME; ?></td>
                                    <td class="bg-dark text-white text-center">
                                        <?php if ($row->ACCEPT != 1) { ?>
                                            <button class="acceptBooking btn btn-warning btn-mini" data-id="<?php echo $id; ?>"><i class="icon-exclamation-sign"></i> รอยืนยันการจอง</button>
                                            <button class="deletebooking btn btn-danger btn-mini" data-id="<?php echo $id; ?>"><i class="icon-trash"></i> Drop</button>
                                        <?php } else { ?>
                                            <?php if ($row->CHECKIN == 0) { ?>
                                                <a href="<?php echo base_url('manage/adminCheckin/' . $id) ?>" class="btn btn-primary btn-mini"><i class="fa fa-check-circle"></i> เช็คอินให้</a>
                                            <?php } else {
                                                echo '<button class="btn btn-success btn-mini"><i class="icon-ok"></i> เช็คอินแล้ว</button>';
                                            } ?>
                                        <?php } ?>
                                        <script>
                                            $(document).ready(function() {
                                                $(document).on('click', '.acceptBooking', function() {
                                                    var id = $(this).data('id');
                                                    $.ajax({
                                                        url: "<?php echo base_url('manage/acceptBookings'); ?>",
                                                        type: "POST",
                                                        data: {
                                                            id: id
                                                        },
                                                    });
                                                })
                                            })

                                            $(document).ready(function() {
                                                $(document).on('click', '.deletebooking', function() {
                                                    var id = $(this).data('id');
                                                    $.ajax({
                                                        url: "<?php echo base_url('manage/deletebookings'); ?>",
                                                        type: "POST",
                                                        data: {
                                                            id: id
                                                        },
                                                    });
                                                })
                                            })
                                        </script>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4">
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>ไม่พบคิวตรวจที่จองเข้าระบบค่ะ!</strong>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
    <div class="frame_right">
        <div class="box">
            <div class="box-header">
                <i class="icon-folder-open"></i>
                <h5>รายการยาในระบบคลังยาของคลินิกท่าน</h5>
                <a class="btn btn-box-right" href="<?php echo base_url('dashboard/store') ?>" role="button" data-toggle="modal">
                    <i class="icon-plus-sign"></i> เพิ่มข้อมูลยาคลินิก
                </a>
            </div>
            <div class="box-content pattern pattern-white-grid" id="latestDatas">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อการค้า</th>
                            <th>จำนวนในคลัง</th>
                            <th>ราคา</th>
                            <th class="td-actions">เติมยาเข้าระบบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $id = $this->session->userdata('CLINICID');
                        $Dash = $this->db->query("select * from tbproducts where CLINICID = '$id' LIMIT 5");
                        $num = $Dash->num_rows();
                        if ($num > 0) {
                            foreach ($Dash->result() as $row) {
                        ?>
                                <tr>
                                    <td><span class="badge badge-success"><?php echo $i++; ?></span></td>
                                    <td><a href=""><?php echo $row->BrandName; ?></a></td>
                                    <td><?php echo $row->Digit; ?> <?php echo $row->CallingUnit; ?></td>
                                    <td><?php echo $row->PriceBuy; ?></td>
                                    <td class="td-actions">
                                        <a href="<?php echo base_url('dashboard/store') ?>" class="btn btn-mini btn-info">
                                            <i class="btn-icon-only icon-plus-sign"></i> เติมยาเข้าระบบ
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>ไม่มีรายการยาในระบบค่ะ!</strong>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>