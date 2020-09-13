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
                    <h3>Laboratory Department</h3>
                </header>
            </div>

        </div>
    </div>
</section>
<div class="row">
    <div class="span10">
        <br />
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
        <table id="example" class="table table-bordered table-striped table-condensed">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อแผนกส่งตรวจ</th>
                    <th>ผู้รับตรวจ</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $row) { ?>
                    <tr>
                        <td><b><?php echo $row->DID; ?></b></td>
                        <td><?php echo $row->DepName; ?></td>
                        <td>
                            <?php
                            $LabCName = $this->db->query("select LabCName from tblabscompany where LabCID = '$row->LabCID' limit 1");
                            foreach ($LabCName->result() as $LabCNamerow) {
                                ?>
                                <?php echo $LabCNamerow->LabCName; ?>
    <?php } ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url('department/delete_department/' . $row->DepID) ?>" onclick="return confirm('ยืนยันการลบข้อมูล')" class="btn btn-danger btn-mini"><i class="icon-remove-circle"> REMOVE</i></a>
                            <button id="selectlacompany" class="btn btn-primary btn-mini" data-toggle="modal" data-target="#exampleModal" data-lcid="<?php echo isset($row->LCID); ?>" data-labcname="<?php echo isset($row->LabCName); ?>"><i class="icon-edit"> UPDATE</i></button>

                        </td>
                    </tr>
<?php } ?>
            </tbody>
        </table>
    </div>
    <div class="span5">
        <form class="form-horizontal" action="<?php echo base_url('department/insert_department') ?>" method="POST">
            <table class="table-condensed">
                <br />
                <div class="alert alert-info">
                    <h2><b>ข้อมูลแผนกส่งตรวจ</b></h2>
                    ( โปรดตรวจสอบข้อมูลก่อนบันทึกรายการ )
                </div>
                <thead>
                    <tr>
                        <th>
                            <select name="LabCID" class="span5" required="">
                                <option value="">เลือกผู้รับตรวจ</option>
                                <?php
                                $lab = $this->db->get_where('tblabscompany', array('CLINICID' => $this->session->userdata('CLINICID')));
                                foreach ($lab->result() as $labrow) {
                                    ?>
                                    <option value="<?php echo $labrow->LabCID; ?>"><?php echo $labrow->LabCName; ?></option>
<?php } ?>
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th><input type="text" class="span5" name="DepName" placeholder="ชื่อแผนกส่งตรวจ" required=""></th>
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
            if ($message != '') {
                ?>
                <div class="alert alert-success">
                    <i class="icon-info-sign icon-large"></i> <?php echo $message; ?>
                </div>
                <?php
                $this->session->unset_userdata('message');
            }
            ?>
<?php
$messagedelete = $this->session->userdata('messagedelete');
if ($messagedelete != '') {
    ?>
                <div class="alert alert-danger">
                    <i class="icon-info-sign icon-large"></i> <?php echo $messagedelete; ?>
                </div>
    <?php
    $this->session->unset_userdata('messagedelete');
}
?>
        </form>
    </div>

</div>
<footer>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลแผนกส่งตรวจ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal border border-primary" action="<?php echo base_url('labcompany/update_labcompany') ?>" method="POST">                   

                    <table class="table-condensed" style="width: 100%">                       
                        <thead>
                            <tr>
                                <th>
                        <div class="alert alert-info">
                            <h2><b>แก้ไขข้อมูลแผนกส่งตรวจ</b></h2>
                            ( โปรดตรวจสอบข้อมูลก่อนบันทึกรายการ )
                        </div>
                        </th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <select name="LabCID" class="span5" required="">
                                        <option value="">เลือกผู้รับตรวจ</option>
<?php
$lab = $this->db->get_where('tblabscompany', array('CLINICID' => $this->session->userdata('CLINICID')));
foreach ($lab->result() as $labrow) {
    ?>
                                            <option value="<?php echo $labrow->LabCID; ?>"><?php echo $labrow->LabCName; ?></option>
<?php } ?>
                                    </select>
                                </th>
                            </tr>
                            <tr>
                        <input type="hidden" class="span7" id="lcid" name="LCID" placeholder="รหัส" required="">
                        <th><input type="text" class="span5" name="DepName" placeholder="ชื่อแผนกส่งตรวจ" required=""></th>
                        </tr>                   
                        <tr>
                            <td>
                        <center><button class="btn btn-success" type="submit"><i class="icon-save"></i> บันทึก</button></center>
                            </td>
                        </tr> 

                        </tbody>
                    </table>            
                </form>
            </div>
        </div>
    </div>
</footer>
<script>
    $(document).ready(function () {
        $(document).on('click', '#selectlacompany', function () {
            var lcid = $(this).data('lcid');
            var labcname = $(this).data('labcname');
            $('#lcid').val(lcid);
            $('#labcname').val(labcname);
            $('#model-item').modal('hide');
            console.log(lcid);
            console.log(labcname);
        })
    })
</script>