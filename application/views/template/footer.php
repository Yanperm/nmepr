</div>
<div id="footer">
    <div class="container">
        <p class="muted credit"><i class="fa fa-copyright"></i><span> 2019 Powered by Nutmor.com <strong>{elapsed_time}</strong> seconds.</p>
       
    </div>
</div>

<script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap-transition.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap-alert.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap-modal.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap-dropdown.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap-scrollspy.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap-tab.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap-tooltip.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap-popover.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap-button.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap-collapse.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap-carousel.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap-typeahead.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap-affix.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/jquery/jquery-tablesorter.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/jquery/jquery-chosen.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/jquery/virtual-tour.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function () {
        $('#sample-table').tablesorter();
        $('#datepicker').datepicker();
        $(".chosen").chosen();
    });</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '#select', function () {
            var labid = $(this).data('labid');
            var labname = $(this).data('labname');
            var labprice = $(this).data('labprice');
            $('#labid').val(labid);
            $('#labname').val(labname);
            $('#labprice').val(labprice);
            $('#model-item').modal('hide');
        })
    })

</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '#selects', function () {
            var ProcedureID = $(this).data('procedureid');
            var ProcedureName = $(this).data('procedurename');
            var ProcedurePrice = $(this).data('procedureprice');
            $('#procedureid').val(ProcedureID);
            $('#procedurename').val(ProcedureName);
            $('#procedureprice').val(ProcedurePrice);
            $('#model-item').modal('hide');
        })
    })

</script>

<script>
    $(document).ready(function () {
        $(document).on('click', '#selectsmedicalsx', function () {
            var imedid = $(this).data('imedid');
            var imedicalname = $(this).data('imedicalname');
            var imedicalprice = $(this).data('imedicalprice');
            var imedicaldigit = $(this).data('imedicaldigit');
            var imedicalsamaryamount = $(this).data('imedicalsamaryamount');
            var imedicalbrandname = $(this).data('imedicalbrandname');
            var imedicalindication = $(this).data('imedicalindication');
            var imedicalcountunit = $(this).data('imedicalcountunit');
            var imedicalcallingunit = $(this).data('imedicalcallingunit');
            var imedicalfrequency = $(this).data('imedicalfrequency');
            var imedicalmeal = $(this).data('imedicalmeal');
            var imedicalsuggestion = $(this).data('imedicalsuggestion');
            $('#imedid').val(imedid);
            $('#imedicalname').val(imedicalname);
            $('#imedicalprice').val(imedicalprice);
            $('#imedicaldigit').val(imedicaldigit);
            $('#imedicalsamaryamount').val(imedicalsamaryamount);
            $('#imedicalbrandname').val(imedicalbrandname);
            $('#imedicalindication').val(imedicalindication);
            $('#imedicalcountunit').val(imedicalcountunit);
            $('#imedicalcallingunit').val(imedicalcallingunit);
            $('#imedicalfrequency').val(imedicalfrequency);
            $('#imedicalmeal').val(imedicalmeal);
            $('#imedicalsuggestion').val(imedicalsuggestion);
            $('#model-item').modal('hide');
        })
    })

</script>
<script>
    function myfunction() {
        var labids = document.getElementById("labid").value;
        var labnames = document.getElementById("labname").value;
        var labprices = document.getElementById("labprice").value;
        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'LabID=' + labids + '&LabName=' + labnames + '&LabPrice=' + labprices;
        if (labids == '' || labnames == '' || labprices == '') {
            alert("Please Fill All Fields");
        } else {
            // AJAX code to submit form.
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('patient/patient_lab') ?>",
                data: dataString,
                cache: false,
                success: function () {
                    alert(dataString);
                }
            });
        }
        return false;
    }
</script>
<script>
    function myfunctions() {
        var ProcedureIDs = document.getElementById("ProcedureID").value;
        var ProcedureNames = document.getElementById("ProcedureName").value;
        var ProcedurePrices = document.getElementById("ProcedurePrice").value;
        // Returns successful data submission message when the entered information is stored in database.
        var dataStrings = 'ProcedureID=' + ProcedureIDs + '&ProcedureName=' + ProcedureNames + '&ProcedurePrice=' + ProcedurePrices;
        if (ProcedureIDs == '' || ProcedureNames == '' || ProcedurePrices == '') {
            alert("Please Fill All Fields");
        } else {
            // AJAX code to submit form.
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('patient/patient_procedure') ?>",
                data: dataStrings,
                cache: false,
                success: function () {
                    alert(dataString);
                }
            });
        }
        return false;
    }
    
</script>
</body>

</html>