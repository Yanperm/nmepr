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
                    <h3>มื้ออาหารที่รับประทานยา</h3>
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
                    <th>ลำดับ</th>
                    <th>มื้ออาหารที่รับประทานยา</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($query as $row) { ?>
                    <tr>
                        <td><b class="label label-success"><?php echo $i++; ?></b></td>
                        <td><?php echo $row->detail; ?></td>                        
                        <td>
                            <a href="<?php echo base_url('department/delete_department/' . $row->id) ?>" onclick="return confirm('ยืนยันการลบข้อมูล')" class="btn btn-danger btn-mini"><i class="icon-remove-circle"></i></a>
                            <a href="#" class="btn btn-primary btn-mini"><i class="icon-edit"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="span5">
        <form class="form-horizontal" action="<?php echo base_url('drugdetail/Suggestion') ?>" method="POST">
            <table class="table-bordered table-striped table-striped">
                <br />
                <div class="alert alert-info">
                    <h2><b>มื้ออาหารที่ทานยา</b></h2>
                </div>
                <thead>                   
                    <tr>
                        <th><input type="text" class="span5" name="detail" placeholder="มื้ออาหารที่รับประทานยา" required=""></th>
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