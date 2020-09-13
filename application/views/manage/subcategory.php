<script type="text/javascript">
    function confirmalert() {
        swal("Are you sure you want to do this?", {
            buttons: ["Oh noez!", "Aww yiss!"],
        });
    }
</script>
<section class="nav-page" pageVTourUrl="guide/tour/form-tour.html" pageVGuideUrl="guide/form-guide.html">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Medical Subclass<br /><small> กลุ่มยารอง</small></h3>
                </header>
            </div>
        </div>
    </div>
</section>
<div class="row">
    <div class="span10">
        <br />
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
        <table id="example" class="table table-bordered table-striped table-condensed">
            <thead>
                <tr>
                    <th>รหัสกลุ่มยารอง</th>
                    <th>กลุ่มยารอง</th>
                    <th>กลุ่มยาหลัก</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $row) { ?>
                    <tr>
                        <td><b><?php echo $row->SubIDs; ?></b></td>
                        <td><?php echo $row->SubName; ?></td>
                        <td>
                            <?php
                            $CategoryName = $this->db->query("select CategoryName from tbproductcategory where CategoryID = '$row->CategoryID' limit 1");
                            foreach ($CategoryName->result() as $CategoryNamerow) { ?>
                                <?php echo $CategoryNamerow->CategoryName; ?>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url('subcategory/delete_subcategory/' . $row->SubID) ?>" onclick="return confirm('ยืนยันการลบข้อมูล')" class="btn btn-danger btn-mini"><i class="icon-remove-circle"></i></a>
                            <a href="#" class="btn btn-primary btn-mini"><i class="icon-edit"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="span5">
        <form class="form-horizontal" action="<?php echo base_url('subcategory/insert_subcategory') ?>" method="POST">
            <table class="table-bordered table-striped table-striped">
                <br />
                <div class="alert alert-info">
                    <h2><b>เพิ่มกลุ่มยารอง</b></h2>
                </div>
                <thead>
                    <tr>
                        <th>
                            <select name="CategoryID" class="span5" required="">
                                <option value="">เลือกกลุ่มยาหลัก</option>
                                <?php
                                $Category = $this->db->get_where('tbproductcategory', array('CLINICID' => $this->session->userdata('CLINICID')));
                                foreach ($Category->result() as $Categoryrow) { ?>
                                    <option value="<?php echo $Categoryrow->CategoryID; ?>"><?php echo $Categoryrow->CategoryName; ?></option>
                                <?php } ?>
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th><input type="text" class="span5" name="SubName" placeholder="ชื่อกลุ่มยารอง" required=""></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><button class="btn btn-success btn-block" type="submit"><i class="icon-save"></i> บันทึก</button></td>
                    </tr>
                </tbody>
            </table>
            <hr />
            <?php
            $message = $this->session->userdata('message');
            if ($message != '') { ?>
                <div class="alert alert-success">
                    <i class="icon-info-sign icon-large"></i> <?php echo $message; ?>
                </div>
            <?php
                $this->session->unset_userdata('message');
            } ?>
            <?php
            $messagedelete = $this->session->userdata('messagedelete');
            if ($messagedelete != '') { ?>
                <div class="alert alert-danger">
                    <i class="icon-info-sign icon-large"></i> <?php echo $messagedelete; ?>
                </div>
            <?php
                $this->session->unset_userdata('messagedelete');
            } ?>
        </form>
    </div>

</div>
<footer>

</footer>