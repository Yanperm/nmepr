<table class="table table-condensed">
    <thead>
        <tr>
            <th>ลำดับ</th> 
            <th>ชื่อสามัญ</th>
            <th>จำนวนในคลัง</th>
            <th>ราคา</th>
            <th class="td-actions">เติมยาเข้าระบบ</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        $id = $this->session->userdata('CLINICID');
        $Dash = $this->db->get_where('tbproducts', array('CLINICID' => $id));
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