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
                    <h3>Lab<br /><small> รายการแล็บ</small></h3>
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
                    <th>รหัสรายการแล็บ</th>
                    <th>ชื่อรายการแล็บ</th>
                    <th>ค่าใช้จ่าย</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($query as $row) {
                    $id = $row->LabID;
                ?>
                    <tr>
                        <td><b><?php echo $row->LID; ?></b></td>
                        <td><?php echo $row->LabName; ?></td>
                        <td><?php echo $row->LabPrice; ?></td>
                        <td>
                            <a href="<?php echo base_url('lab/deletelab/' . $id) ?>" class="btn btn-danger btn-mini"><i class="icon-remove-circle"></i></a>
                            <a href="#" class="btn btn-primary btn-mini"><i class="icon-edit"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="span5">
        <form class="form-horizontal" action="<?php echo base_url('lab/create') ?>" method="POST">
            <table class="table-bordered table-striped table-striped">
                <br />
                <div class="alert alert-info">
                    <h2><b>เพิ่มรายการแล็บใหม่</b></h2>
                </div>
                <thead>
                    <tr>
                        <?php
                        $clinicid = $this->session->userdata('CLINICID');
                        $lab = $this->db->query("SELECT LID from tblabs where CLINICID = '$clinicid' order by LID DESC limit 1");
                        $labrow = $lab->row();
                        $num = $lab->num_rows();
                        if ($num == '') {
                            $count = "L001";
                        } else {
                            $number = substr($labrow->LID, 1);
                            $count = "L" . sprintf("%03d", ++$number);
                        }
                        ?>
                        <input name="LID" class="span5" type="text" value="<?php echo $count; ?>" readonly="">
                    </tr>
                    <tr>
                        <th><input type="text" class="span5" name="LabName" placeholder="ชื่อรายการแล็บใหม่" required=""></th>
                    </tr>
                    <tr>
                        <th><input type="number" class="span5" name="LabPrice" maxlength="6" placeholder="ค่าใช้จ่าย" required=""></th>
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