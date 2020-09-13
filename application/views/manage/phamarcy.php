<section class="nav-page" pageVTourUrl="guide/tour/form-tour.html" pageVGuideUrl="guide/form-guide.html">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>คลังยาในระบบ<br /><small> ฐานข้อมูลยาภายในคลินิก</small></h3>
                </header>
            </div>

        </div>
    </div>
</section>
<hr />
<div class="span8">
    <div class="box">
        <div class="box-header">
            <i class="icon-bar-chart"></i>
            <h5>สลากยาสำหรับสั่งจ่าย</h5>
        </div>
        <div class="box-content">
            <div class="content">

            </div>
        </div>
    </div>
</div>
<div class="span8">
    <div class="box">
        <div class="box-header">
            <i class="icon-folder-open"></i>
            <h5>รายการยาในระบบคลังยาของคลินิกท่าน</h5>
        </div>
        <div class="box-content">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อยาในคลังยาคลินิก</th>
                        <th>จำนวน</th>
                        <th>ราคา</th>
                        <th class="td-actions">ลบยาออกจากระบบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($query as $rows) {
                        $id = $rows->NCDID;
                    ?>
                        <tr>
                            <td><span class="badge"><?php echo $i++; ?></span></td>
                            <td><a href=""><?php echo $rows->NCDNAME; ?></a></td>
                            <td><?php echo $rows->NCDPRICE; ?></td>
                            <td><?php echo $rows->NCDAMOUNT; ?></td>
                            <td class="td-actions">
                                <a href="<?php echo base_url('clinic/deletephamacy/' . $id) ?>" class="btn btn-mini  btn-danger">
                                    <i class="icon-plus-sign"> ลบยาออกจากระบบ</i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>