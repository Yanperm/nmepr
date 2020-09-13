
<!doctype html>
<html>

    <head>
        <title>Combo Bar-Line Chart</title>
        <style>
            canvas {
                -moz-user-select: none;
                -webkit-user-select: none;
                -ms-user-select: none;
            }
        </style>
    </head>

    <body>
        <div style="width: 100%">
            <canvas id="canvas"></canvas>
        </div>
        <?php
        date_default_timezone_set('Asia/Bangkok');
        $clinicid = $this->session->userdata('CLINICID');
        $year = date("Y");
        $x1 = $this->db->query("SELECT count(DAY(CREATE_DATE)) As ListDay FROM tbbooking WHERE CLINICID = '$clinicid' AND MONTH(CREATE_DATE) = '1' AND YEAR(CREATE_DATE) = '$year'")->row()->ListDay;
        $x2 = $this->db->query("SELECT count(DAY(CREATE_DATE)) As ListDay FROM tbbooking WHERE CLINICID = '$clinicid' AND MONTH(CREATE_DATE) = '2' AND YEAR(CREATE_DATE) = '$year'")->row()->ListDay;
        $x3 = $this->db->query("SELECT count(DAY(CREATE_DATE)) As ListDay FROM tbbooking WHERE CLINICID = '$clinicid' AND MONTH(CREATE_DATE) = '3' AND YEAR(CREATE_DATE) = '$year'")->row()->ListDay;
        $x4 = $this->db->query("SELECT count(DAY(CREATE_DATE)) As ListDay FROM tbbooking WHERE CLINICID = '$clinicid' AND MONTH(CREATE_DATE) = '4' AND YEAR(CREATE_DATE) = '$year'")->row()->ListDay;
        $x5 = $this->db->query("SELECT count(DAY(CREATE_DATE)) As ListDay FROM tbbooking WHERE CLINICID = '$clinicid' AND MONTH(CREATE_DATE) = '5' AND YEAR(CREATE_DATE) = '$year'")->row()->ListDay;
        $x6 = $this->db->query("SELECT count(DAY(CREATE_DATE)) As ListDay FROM tbbooking WHERE CLINICID = '$clinicid' AND MONTH(CREATE_DATE) = '6' AND YEAR(CREATE_DATE) = '$year'")->row()->ListDay;
        $x7 = $this->db->query("SELECT count(DAY(CREATE_DATE)) As ListDay FROM tbbooking WHERE CLINICID = '$clinicid' AND MONTH(CREATE_DATE) = '7' AND YEAR(CREATE_DATE) = '$year'")->row()->ListDay;
        $x8 = $this->db->query("SELECT count(DAY(CREATE_DATE)) As ListDay FROM tbbooking WHERE CLINICID = '$clinicid' AND MONTH(CREATE_DATE) = '8' AND YEAR(CREATE_DATE) = '$year'")->row()->ListDay;
        $x9 = $this->db->query("SELECT count(DAY(CREATE_DATE)) As ListDay FROM tbbooking WHERE CLINICID = '$clinicid' AND MONTH(CREATE_DATE) = '9' AND YEAR(CREATE_DATE) = '$year'")->row()->ListDay;
        $x10 = $this->db->query("SELECT count(DAY(CREATE_DATE)) As ListDay FROM tbbooking WHERE CLINICID = '$clinicid' AND MONTH(CREATE_DATE) = '10' AND YEAR(CREATE_DATE) = '$year'")->row()->ListDay;
        $x11 = $this->db->query("SELECT count(DAY(CREATE_DATE)) As ListDay FROM tbbooking WHERE CLINICID = '$clinicid' AND MONTH(CREATE_DATE) = '11' AND YEAR(CREATE_DATE) = '$year'")->row()->ListDay;
        $x12 = $this->db->query("SELECT count(DAY(CREATE_DATE)) As ListDay FROM tbbooking WHERE CLINICID = '$clinicid' AND MONTH(CREATE_DATE) = '12' AND YEAR(CREATE_DATE) = '$year'")->row()->ListDay;
        ?>
        <script>
            var chartData = {
                labels: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฏาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
                datasets: [{
                        type: 'line',
                        label: 'ความเคลื่อนไหว',
                        borderColor: window.chartColors.red,
                        borderWidth: 2,
                        fill: true,
                        data: [
                            <?php echo $x1; ?>, <?php echo $x2; ?>, <?php echo $x3; ?>, <?php echo $x4; ?>, <?php echo $x5; ?>, <?php echo $x6; ?>, <?php echo $x7; ?>, <?php echo $x8; ?>, <?php echo $x9; ?>, <?php echo $x10; ?>, <?php echo $x11; ?>, <?php echo $x12; ?>

                        ]
                    },{
                        type: 'bar',
                        label: 'สมาชิกใช้บริการที่คลินิก',
                        backgroundColor: window.chartColors.green,
                        data: [
                            <?php echo $x1; ?>, <?php echo $x2; ?>, <?php echo $x3; ?>, <?php echo $x4; ?>, <?php echo $x5; ?>, <?php echo $x6; ?>, <?php echo $x7; ?>, <?php echo $x8; ?>, <?php echo $x9; ?>, <?php echo $x10; ?>, <?php echo $x11; ?>, <?php echo $x12; ?>
                        ]
                    }]

            };
            window.onload = function () {
                var ctx = document.getElementById('canvas').getContext('2d');
                window.myMixedChart = new Chart(ctx, {
                    type: 'bar',
                    data: chartData,
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'รายงานยอดคนไข้คลินิกรายเดือน'
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: true
                        }
                    }
                });
            };

        </script>
    </body>

</html>
