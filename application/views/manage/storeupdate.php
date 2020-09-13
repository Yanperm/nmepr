<section class="nav-page" pageVTourUrl="guide/tour/form-tour.html" pageVGuideUrl="guide/form-guide.html">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Product Store<br /><small> คลังยาคลินิก</small></h3>
                </header>
            </div>
            <div class="span9">
                <ul class="nav nav-pills">
                    <li>
                        <a href="<?php echo base_url('dashboard/productstore') ?>" id="vtour-button" rel="tooltip" title="Launch Virtual Tour" data-placement="bottom">
                            <i class="icon-hdd icon-large"></i> ดูข้อมูลยาทั้งหมด
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="my-account-security-form" class="page container">
    <form id="userSecurityForm" class="form-horizontal" action="<?php echo base_url('product/update_product'); ?>" method="post">
        <div class="container">
            <div class="row">
                <div id="acct-password-row" class="span7">
                    <fieldset>
                        <legend>แก้ไขยา</legend><br>
                        <div class="control-group ">
                            <label class="control-label">รหัสยา <span class="required">*</span></label>
                            <div class="controls">
                                <input name="" class="span4" type="text" value="<?php echo $query->ProID; ?>" readonly="">
                                <input name="ProductID" type="hidden" value="<?php echo $query->ProductID; ?>">
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">ชื่อสามัญ <span class="required">*</span></label>
                            <div class="controls">
                                <input name="CommonName" class="span4" type="text" value="<?php echo $query->CommonName; ?>" autocomplete="false" required="">

                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Barcode <span class="required">*</span></label>
                            <div class="controls">
                                <input name="Barcode" class="span4" type="text" maxlength="13" value="<?php echo $query->Barcode; ?>" autocomplete="false" required="">

                            </div>
                        </div>
                        <div class="control-group">
                            <label for="challengeQuestion" class="control-label">กลุ่มยาหลัก <span class="required">*</span></label>
                            <div class="controls">
                                <select name="CategoryID" id="CategoryID" class="span4" required="">
                                    <option value="">-- เลือกกลุ่มยาหลัก --</option>
                                    <?php
                                    $cat = $this->db->get_where('tbproductcategory', array('CLINICID' => $this->session->userdata('CLINICID')));
                                    foreach ($cat->result() as $row) {
                                    ?>
                                        <option value="<?php echo $row->CategoryID; ?>" <?php if ($row->CategoryID == $query->CategoryID) {
                                                                                            echo "selected";
                                                                                        } ?>>
                                            <?php echo $row->CategoryName; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="challengeQuestion" class="control-label">กลุ่มยารอง <span class="required">*</span></label>
                            <div class="controls">
                                <select name="SubID" id="SubID" class="span4" required="">
                                    <?php
                                    $sub = $this->db->get_where('tbsubcategory', array('SubID' => $query->SubID));
                                    $subrow = $sub->row();
                                    ?>
                                    <option value="<?php echo $subrow->SubID ?>"><?php echo $subrow->SubName ?></option>
                                </select>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('#CategoryID').change(function() {
                                    var CategoryID = $('#CategoryID').val();
                                    if (CategoryID != '') {
                                        $.ajax({
                                            url: "<?php echo base_url('product/fetch_subcategory'); ?>",
                                            type: "POST",
                                            data: {
                                                CategoryID: CategoryID
                                            },
                                            success: function(data) {
                                                $('#SubID').html(data);
                                            }
                                        });
                                    } else {
                                        $('#SubID').html('<option value="">-- เลือกกลุ่มยารอง --</option>');
                                    }
                                });
                            });
                        </script>
                        <div class="control-group">
                            <label class="control-label">Preg Cat <span class="required">*</span></label>
                            <div class="controls">
                                <select name="PregCat" id="PregCat" class="span4" required="">
                                    <option value="0"  <?php if ($query->PregCat == "0") {
                                                            echo "selected";
                                                        } ?>>ไม่ระบุ</option>
                                    <option value="A"  <?php if ($query->PregCat == "A") {
                                                            echo "selected";
                                                        } ?>>A</option>
                                    <option value="B"  <?php if ($query->PregCat == "B") {
                                                            echo "selected";
                                                        } ?>>B</option>
                                    <option value="C"  <?php if ($query->PregCat == "C") {
                                                            echo "selected";
                                                        } ?>>C</option>
                                    <option value="D"  <?php if ($query->PregCat == "D") {
                                                            echo "selected";
                                                        } ?>>D</option>
                                    <option value="X"  <?php if ($query->PregCat == "X") {
                                                            echo "selected";
                                                        } ?>>X</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">ราคาทุน <span class="required">*</span></label>
                            <div class="controls">
                                <input name="PriceBuy" class="span2" type="number" value="<?php echo $query->PriceBuy; ?>" autocomplete="false" required="">
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">ราคาขาย <span class="required">*</span></label>
                            <div class="controls">
                                <input name="PriceSale" class="span2" type="number" value="<?php echo $query->PriceSale; ?>" autocomplete="false" required="">
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">จำนวนหน่วย <span class="required">*</span></label>
                            <div class="controls">
                                <input name="Digit" class="span2" type="text" value="<?php echo $query->Digit; ?>" autocomplete="false" required="">
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">หน่วย <span class="required">*</span></label>
                            <div class="controls">
                                <input name="Unit" class="span2" type="text" value="<?php echo $query->Unit; ?>" autocomplete="false" required=>
                            </div>
                        </div>
                        <div class="control-group hidden">
                            <label class="control-label">ยอดยกมา <span class="required">*</span></label>
                            <div class="controls">
                                <input name="SamaryAmount" class="span2" type="number" value="<?php echo $query->SamaryAmount; ?>" autocomplete="false">
                                สินค้าเข้าที่ <span class="required">*</span>
                                <input name="StoreID" class="span2" type="number" value="<?php echo $query->StoreID; ?>" autocomplete="false">
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div id="acct-verify-row" class="span6">
                    <fieldset>
                        <legend>รายละเอียดยา</legend>
                        <div class="control-group ">
                            <label class="control-label">ชื่อการค้า <span class="required">*</span></label>
                            <div class="controls">
                                <input name="BrandName" class="span5" type="text" value="<?php echo $query->BrandName; ?>" autocomplete="false" required="">

                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">ข้อบ่งใช้ <span class="required">*</span></label>
                            <div class="controls">
                                <input name="Indication" class="span5" type="text" value="<?php echo $query->Indication; ?>" autocomplete="false" required="">

                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">ครั้งละ <span class="required">*</span></label>
                            <div class="controls">
                                <select name="CountUnit" class="span2" required="">
                                <?php
                                foreach ($queue_countUnit as $row_countUnit) { ?>
                                ?>
                                    <option value="<?php echo $row_countUnit->detail;  ?>"
                                    <?php if ($query->CountUnit == $row_countUnit->detail) {
                                                                        echo "selected";
                                                                    } ?>
                                                                    >
                                                                    <?php echo $row_countUnit->detail; ?>
                                                                    </option>
                                    <?php
                                }
                                ?>  
                                </select>
                                <select name="CallingUnit" class="span2" required="">
                                <?php
                                foreach ($queue_callingUnits as $row_callingUnits) { ?>
                                ?>
                                    <option value="<?php echo $row_callingUnits->detail;  ?>"
                                    <?php if ($query->CallingUnit == $row_callingUnits->detail) {
                                                                        echo "selected";
                                                                    } ?>
                                                                    >
                                                                    <?php echo $row_callingUnits->detail; ?>
                                                                    </option>
                                    <?php
                                }
                                ?>  
                                </select>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">ความถี่ <span class="required">*</span></label>
                            <div class="controls">
                                <select name="Frequency" class="span5" required="">
                                <?php
                                foreach ($queue_fregquency as $row_fregquency) { ?>
                                ?>
                                    <option value="<?php echo $row_fregquency->detail;  ?>"
                                    <?php if ($query->Frequency == $row_fregquency->detail) {
                                                                        echo "selected";
                                                                    } ?>
                                                                    >
                                                                    <?php echo $row_fregquency->detail; ?>
                                                                    </option>
                                    <?php
                                }
                                ?>                                  
                                </select>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">มื้ออาหาร <span class="required">*</span></label>
                            <div class="controls">
                                <select name="Meal" class="span5" required="">
                                <?php
                                foreach ($query_meal as $row_meal) { ?>
                                ?>
                                    <option value="<?php echo $row_meal->detail;  ?>"
                                    <?php if ($query->Meal == $row_meal->detail) {
                                                                        echo "selected";
                                                                    } ?>
                                                                    >
                                                                    <?php echo $row_meal->detail; ?>
                                                                    </option>
                                    <?php
                                }
                                ?>   
                                    
                                </select>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">ข้อแนะนำ <span class="required">*</span></label>
                            <div class="controls">
                                <select name="Suggestion" class="span5" required="">
                                <?php
                                foreach ($queue_suggestion as $row_suggestion) { ?>
                                ?>
                                    <option value="<?php echo $row_suggestion->detail;  ?>"
                                    <?php if ($query->Suggestion == $row_suggestion->detail) {
                                                                        echo "selected";
                                                                    } ?>
                                                                    >
                                                                    <?php echo $row_suggestion->detail; ?>
                                                                    </option>
                                    <?php
                                }
                                ?>   
                                   
                                </select>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label"></label>
                            <div class="controls">
                                <button id="submit-button" type="submit" class="btn btn-success" name="action" value="CONFIRM"><i class="icon-save"></i> บันทึก</button>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <footer class="form-actions">

            </footer>
        </div>
    </form>
</section>