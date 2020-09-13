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
                    <h3>LAB COMPANY</h3>
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
        <table id="example" class="table table-hover table-striped table-condensed border border-info">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อผู้รับตรวจ</th>
                    <th style="width: 150px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $row) { ?>
                    <tr>
                        <td><b><?php echo $row->LCID; ?></b></td>
                        <td><b><?php echo $row->LabCName; ?></b></td>
                        <td>
                            <a href="<?php echo base_url('labcompany/delete_labcompany/' . $row->LabCID) ?>" onclick="return confirm('ยืนยันการลบข้อมูล')" class="btn btn-danger btn-mini"><i class="icon-remove-circle"> REMOVE</i></a>
                            <button id="selectlacompany" class="btn btn-primary btn-mini" data-toggle="modal" data-target="#exampleModal" data-lcid="<?php echo $row->LCID; ?>" data-labcname="<?php echo $row->LabCName; ?>"><i class="icon-edit"> UPDATE</i></button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="span5">
        <form class="form-horizontal" action="<?php echo base_url('labcompany/insert_labcompany') ?>" method="POST">
            <table class="table-condensed table-hover table-striped">
                <br />
                <div class="alert alert-info">
                    <h2><b>ชื่อบริษัทที่รับตรวจแล็บ</b></h2>
                    ( โปรดตรวจสอบข้อมูลก่อนบันทึกรายการ )
                </div>
                <thead>
                    <tr>
                        <th><input type="text" class="span5" name="LabCName" placeholder="ชื่อผู้รับตรวจ" required="" style="font-size: 1em;font-weight: bold;"></th>
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
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลบริษัทรับตรวจ</h5>
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
                            <h2><b>แก้ไขข้อมูลบริษัทรับตรวจ</b></h2>
                            ( โปรดตรวจสอบข้อมูลก่อนบันทึกรายการ )
                        </div>
                        </th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <input type="hidden" class="span7" id="lcid" name="LCID" placeholder="รหัส" required="">
                                    <input type="text" class="span5" id="labcname" name="LabCName" placeholder="ชื่อผู้รับตรวจ" required="" style="font-size: 1em;font-weight: bold;">
                                    <button class="btn btn-success" type="submit"><i class="icon-save"></i> บันทึก</button>
                                </th>
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