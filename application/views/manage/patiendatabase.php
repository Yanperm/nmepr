<section class="nav-page" pageVTourUrl="guide/tour/form-tour.html" pageVGuideUrl="guide/form-guide.html">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Patient's Database<br /><small> ฐานข้อมูลคนไข้</small></h3>
                </header>
            </div>

        </div>
    </div>
</section>
<div id="Person-5" class="box well well-shadow">
    <div class="box-header">
        <i class="icon-user icon-large"></i>
        <h5>รายการข้อมูล</h5>
    </div>
    <div class="box-content box-table">
        <table id="myTable" class="table table-condensed table-striped table-bordered">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>เลขบัตรประชาชน</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>วันเกิด</th>
                    <th>เบอร์โทรติดต่อ</th>
                    <th>Line ID</th>
                    <th>สถานะสมาชิก</th>
                    <th>Drop Member</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($query as $row) {
                    if ($row->PATIENT_ID != '') { ?>
                        <tr>
                            <td><span class="badge badge-success"><?php echo $i++; ?></span></td>
                            <td><?php echo $row->IDCARD; ?></td>
                            <td><a href="<?php echo base_url('dashboard/record_historys/' . $row->IDCARD.'/view') ?>"><?php echo $row->PATIEN_NAMEPREFIX; ?><?php echo $row->PATIEN_NAME; ?></td></a>
                            <td><?php echo $row->PATIEN_BDAY; ?></td>
                            <td><?php echo $row->PATIEN_PHONE; ?></td>
                            <td><?php echo $row->PATIEN_LINEID; ?></td>
                            <td><span class="btn btn-mini btn-success"><i class="icon-ok-circle"></i> Active</span></td>
                            <td class="td-actions">
                                <a href="<?php echo base_url('member/deletecustomers/' . $row->CMID) ?>" onclick="return confirm('ยืนยันการลบ')" class="btn btn-mini btn-danger">
                                    <i class="btn-icon-only icon-remove"></i> Drop Member
                                </a>
                            </td>
                        <?php } else { ?>
                        <tr>
                            <td><span class="badge badge-success"><?php echo $i++; ?></span></td>
                            <td><?php echo $row->IDCARD; ?></td>
                            <td><?php echo $row->CUSTOMERNAME; ?></td>
                            <td><?php echo $row->BIRTHDAY; ?></td>
                            <td><?php echo $row->PHONE; ?></td>
                            <td><?php echo $row->LINEID; ?></td>
                            <td><span class="btn btn-mini btn-success"><i class="icon-ok-circle"></i> Active</span></td>
                            <td class="td-actions">
                                <a href="<?php echo base_url('member/deletecustomers/' . $row->CMID) ?>" onclick="return confirm('ยืนยันการลบ')" class="btn btn-mini btn-danger">
                                    <i class="btn-icon-only icon-remove"></i> Drop Member
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ลำดับ</th>
                    <th>เลขบัตรประชาชน</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>วันเกิด</th>
                    <th>เบอร์โทรติดต่อ</th>
                    <th>Line ID</th>
                    <th>สถานะสมาชิก</th>
                    <th>Drop Member</th>
                </tr>
            </tfoot>

            </tbody>

        </table>
    </div>
</div>