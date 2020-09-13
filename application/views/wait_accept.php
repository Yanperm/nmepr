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