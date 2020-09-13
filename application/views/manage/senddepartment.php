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
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
        <table id="example" class="table table-bordered table-striped table-condensed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TEST NAME</th>
                    <th>Department</th>
                    <th>Company</th>
                    <th>Cost</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $row) { ?>
                    <tr>
                        <td><b><?php echo $row->SPID; ?></b></td>
                        <td><?php echo $row->STESTNAME; ?></td>
                        <td>
                            <?php
                            $DepName = $this->db->query("select DepName from tbdepartment where DepID = '$row->DepID' limit 1");
                            foreach ($DepName->result() as $LabCNamerow) { ?>
                                <?php echo $LabCNamerow->DepName; ?>
                            <?php } ?>
                        </td>
                        <td>
                            <?php
                            $LabCName = $this->db->query("select LabCName from tblabscompany where LabCID = '$row->LabCID' limit 1");
                            foreach ($LabCName->result() as $LabCNamerow) { ?>
                                <?php echo $LabCNamerow->LabCName; ?>
                            <?php } ?></td>
                        <td><?php echo $row->Price; ?></td>
                        <td><?php echo $row->PriceSale; ?></td>
                        <td>
                            <a href="<?php echo base_url('senddepartment/delete_senddepartment/' . $row->SID) ?>" onclick="return confirm('ยืนยันการลบข้อมูล')" class="btn btn-danger btn-mini"><i class="icon-remove-circle"></i></a>
                            <button id="selectprocedures" class="btn btn-warning btn-mini" data-toggle="modal" data-target="#exampleModal" data-procedureid="<?php echo isset($row->SID) ?>" data-procedurename="<?php echo isset($LabCNamerow->DepName) ?>" data-procedureprice="<?php echo $row->Price ?>"><i class="icon-edit"></i></button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="span5">
        <form class="form-horizontal" action="<?php echo base_url('senddepartment/insert_senddepartment') ?>" method="POST">
            <table class="table-bordered table-striped table-striped">
                <br />
                <div class="alert alert-info">
                    <h2><b>เพิ่มรายการส่งตรวจ</b></h2>
                </div>
                <thead>
                    <tr>
                        <th>
                            <select name="LabCID" id="LabCID" class="span5" required="">
                                <option value="">เลือกผู้รับตรวจ</option>
                                <?php
                                $lab = $this->db->get_where('tblabscompany', array('CLINICID' => $this->session->userdata('CLINICID')));
                                foreach ($lab->result() as $labrow) { ?>
                                    <option value="<?php echo $labrow->LabCID; ?>"><?php echo $labrow->LabCName; ?></option>
                                <?php } ?>
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <select name="DepID" id="DepID" class="span5" required="">
                                <option value="">เลือกแผนกส่งตรวจ</option>
                                
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th><input type="text" class="span5" name="STESTNAME" placeholder="ชื่อการทดสอบ" required=""></th>
                    </tr>
                    <tr>
                        <th><input type="number" class="span5" name="Price" placeholder="ต้นทุน" required=""></th>
                    </tr>
                    <tr>
                        <th><input type="number" class="span5" name="PriceSale" placeholder="ราคา" required=""></th>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขรายการแล็บ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() ?>" method="POST">
                <div class="modal-body">
                    <form class="form-horizontal" action="<?php echo base_url('senddepartment/insert_senddepartment') ?>" method="POST">
                        <table class="table-bordered table-striped table-striped" style="width: 100%">
                <br />
                <div class="alert alert-info">
                    <h2><b>ปรับปรุงรายการส่งตรวจ</b></h2>
                </div>
                <thead>
                    
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <select name="LabCID" id="LabCID" class="span5" required="">
                                <option value="">เลือกผู้รับตรวจ</option>
                                <?php
                                $lab = $this->db->get_where('tblabscompany', array('CLINICID' => $this->session->userdata('CLINICID')));
                                foreach ($lab->result() as $labrow) { ?>
                                    <option value="<?php echo $labrow->LabCID; ?>"><?php echo $labrow->LabCName; ?></option>
                                <?php } ?>
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <select name="DepID" id="DepID" class="span5" required="">
                                <option value="">เลือกแผนกส่งตรวจ</option>
                                
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th><input type="text" class="span5" name="STESTNAME" placeholder="ชื่อการทดสอบ" required=""></th>
                    </tr>
                    <tr>
                        <th><input type="number" class="span5" name="Price" placeholder="ต้นทุน" required=""></th>
                    </tr>
                    <tr>
                        <th><input type="number" class="span5" name="PriceSale" placeholder="ราคา" required=""></th>
                    </tr>
                    <tr>
                        <td>
                <center><button class="btn btn-success" type="submit"><i class="icon-save"></i> บันทึก</button></center>
                        </td>
                    </tr>
                </tbody>
            </table>
                </div>
               
            </form>
        </div>
    </div>
</div>
</footer>
<script>
    $(document).ready(function () {
        $(document).on('click', '#selectprocedures', function () {
            var procedureid = $(this).data('procedureid');
            var procedurename = $(this).data('procedurename');
            var procedureprice = $(this).data('procedureprice');
            $('#procedureid').val(procedureid);
            $('#procedurename').val(procedurename);
            $('#procedureprice').val(procedureprice);
            $('#model-item').modal('hide');
            console.log(procedureid);
            console.log(procedurename);
            console.log(procedureprice);
        })
    })
</script>
<script>
    $(document).ready(function() {
        $('#LabCID').change(function() {
            var LabCID = $('#LabCID').val();
            if (LabCID != '') {
                $.ajax({
                    url: "<?php echo base_url('senddepartment/fetch_department'); ?>",
                    type: "POST",
                    data: {
                        LabCID: LabCID
                    },
                    success: function(data) {
                        $('#DepID').html(data);
                    }
                });
            } else {
                $('#DepID').html('<option value="">เลือกแผนกส่งตรวจ</option>');
            }
        });
    });
</script>