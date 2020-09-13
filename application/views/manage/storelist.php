<section class="nav-page" pageVTourUrl="guide/tour/form-tour.html" pageVGuideUrl="guide/form-guide.html">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>คลังยา<br /><small> ฐานข้อมูลยาในคลินิก</small></h3>
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
                    <th>รหัสยา</th>
                    <th>ชื่อการค้า</th>
                    <th>ชื่อสามัญ</th>                                        
                    <th>Barcode</th>
                    <th>จำนวนในคลัง</th>
                    <th>หน่วย</th>
                    <th>ราคาขาย</th>
                    <th class="td-actions">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($query as $row) {
                    $product_id = $row->ProductID;
                ?>
                    <tr>
                        <td><span class="badge badge-success"><?php echo $i++; ?></span></td>
                        <td><b><?php echo $code = $row->ProID;?></b></td>
                        <td><a href="<?php echo base_url('product/storeupdate/' . $product_id) ?>"><?php echo $row->BrandName; ?></a></td>
                        <td><a href="<?php echo base_url('product/storeupdate/' . $product_id) ?>"><?php echo $row->CommonName; ?></a></td>                                                
                        <td><b><?php echo $row->Barcode; ?></b></td>
                        <td><?php echo $row->Digit; ?></td>
                        <td><?php echo $row->Unit; ?></td>
                        <td><?php echo $row->PriceSale; ?></td>
                        <td class="td-actions">
                            <a href="<?php echo base_url('product/drop_product/' . $product_id) ?>" class="btn btn-mini btn-danger" onclick="return confirm('ยืนยันการลบ')">
                                <i class="btn-icon-only icon-plus-sign"></i> Drop
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ลำดับ</th>
                    <th>รหัสยา</th>
                    <th>ชื่อการค้า</th>
                    <th>ชื่อสามัญ</th>
                    <th>Barcode</th>
                    <th>จำนวนในคลัง</th>
                    <th>หน่วย</th>
                    <th>ราคา</th>
                    <th class="td-actions">Drop</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <footer class="form-actions">
        <?php if (isset($messagedelete)) { ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Warning!</strong> <?php echo $messagedelete; ?>
            </div>
        <?php } ?>
    </footer>
</div>