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
                    <h3>Procedure<br /><small> รายการหัตถการ</small></h3>
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
        <table id="example" class="table table-condensed">
            <thead>
                <tr>
                    <th>รหัสรายการหัตถการ</th>
                    <th>ชื่อรายการหัตถการ</th>
                    <th>ค่าใช้จ่าย</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($query as $row) {
                    $id = $row->ProcedureID;
                    ?>
                    <tr>
                        <td><b><?php echo $row->ProcedureIDs; ?></b></td>
                        <td><b><?php echo $row->ProcedureName; ?></b></td>
                        <td><?php echo $row->ProcedurePrice; ?></td>
                        <td>
                            <a href="<?php echo base_url('procedure/deleteprocedure/' . $id) ?>" onclick="return confirm('ยืนยันการลบข้อมูล')" class="btn btn-danger btn-mini"><i class="icon-remove-circle"></i></a>
                            <button id="selectprocedures" class="btn btn-primary btn-mini" data-toggle="modal" data-target="#exampleModal" data-procedureid="<?php echo $row->ProcedureID ?>" data-procedurename="<?php echo $row->ProcedureName ?>" data-procedureprice="<?php echo $row->ProcedurePrice ?>"><i class="icon-edit"></i></button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="span5">
        <form class="form-horizontal" action="<?php echo base_url('procedure/create') ?>" method="POST">
            <table class="table-condensed" style="width: 100%">
                <br />
                <thead>
                            <tr>
                                <th>
                        <div class="alert alert-info">
                            <h2><b>ข้อมูลรายการหัตถการ</b></h2>
                            ( โปรดตรวจสอบข้อมูลก่อนบันทึกรายการ )
                        </div>
                        </th>
                        </tr>
                        </thead>
                <tbody>
                     <tr>
                        <th><input type="text" class="span5" name="ProcedureName" placeholder="ชื่อรายการหัตถการใหม่" required=""></th>
                    </tr>
                    <tr>
                        <th><input type="number" class="span5" name="ProcedurePrice" maxlength="6" placeholder="ค่าใช้จ่าย" required=""></th>
                    </tr>
                    <tr>
                        <td><button class="btn btn-success btn-block" type="submit"><i class="icon-save"></i> บันทึก</button></td>
                    </tr>
                </tbody>
            </table>
            <hr />
            <?php if (isset($message)) { ?>
                <div class="alert alert-success">
                    <i class="icon-info-sign icon-large"></i> <?php echo $message; ?>
                </div>

            <?php } ?>
            <?php if (isset($messagedelete)) { ?>
                <div class="alert alert-danger">
                    <i class="icon-info-sign icon-large"></i> <?php echo $messagedelete; ?>
                </div>
            <?php } ?>
        </form>
    </div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขรายการหัตถการ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('procedure/updateprocedure') ?>" method="POST">
                <div class="modal-body">
                    <table style="width: 100%">
                        <thead>
                            <tr>
                                <th>
                        <div class="alert alert-info">
                            <h2><b>ข้อมูลรายการหัตถการ</b></h2>
                            ( โปรดตรวจสอบข้อมูลก่อนบันทึกรายการ )
                        </div>
                        </th>
                        </tr>
                        </thead>
                        <tbody>
                             <input type="hidden" class="span5"  id="procedureid" name="ProdecureID" placeholder="" required="">
                        <th><input type="text" class="span5"  id="procedurename" name="ProcedureName" placeholder="" required=""></th>
                        </tr>
                        <tr>
                            <th><input type="number" class="span5" id="procedureprice" name="ProcedurePrice" maxlength="6" placeholder="ค่าใช้จ่าย" required=""></th>
                        </tr>
                        </tbody>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
