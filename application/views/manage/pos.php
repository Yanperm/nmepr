<div class="container">
    <div class="row well well-shadow">       
        <div class="span12">
            <div class="row">
                <div class="span8">
                    <header class="page-header">
                        <h3 class="text-info">ระบบขายสินค้าภายในคลินิก</h3>
                    </header>
                    <?php echo form_open('dashboard/insertproduct'); ?>

                    <div class="input-append">
                        <span class="add-on"><i class="icon-barcode"></i></span>
                        <input class="span3" id="appendedInputButton" placeholder="Scan Barcode สินค้า" autofocus="" type="text">
                        <button class="btn btn-info" type="button">ขายสินค้า</button>
                    </div>
                    <table id="myTable" cellpadding="6" cellspacing="1" style="width:100%" border="1" class="table-condensed">
                        <tr>
                            <th>จำนวน</th>
                            <th>รายการสินค้าที่กำลังขาย</th>
                            <th style="text-align:right">ราคาสินค้า</th>
                            <th style="text-align:right">ราคารวม</th>
                        </tr>

                        <?php $i = 1; ?>

                        <?php foreach ($this->cart->contents() as $items): ?>

                            <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>

                            <tr>
                                <td><?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '1')); ?></td>
                                <td>
                                    <?php echo $items['name']; ?>

                                    <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                        <p>
                                            <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                            <?php endforeach; ?>
                                        </p>

                                    <?php endif; ?>

                                </td>
                                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                                <td style="text-align:right">฿<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                            </tr>

                            <?php $i++; ?>

                        <?php endforeach; ?>

                        <tr>
                            <td colspan="2"> </td>
                            <td class="right"><strong>ยอดรวมที่ต้องชำระ</strong></td>
                            <td class="right">฿<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                        </tr>

                    </table>
                    <p><?php echo form_submit('', 'จำลองการขายสินค้าจากบาร์โค๊ด'); ?></p>
                </div>
                <div class="span4">
                    <header class="page-header">
                        <h3 class="text-success">ยอดขาย ฿<?php echo $this->cart->format_number($this->cart->total()); ?></h3>
                    </header>
                    <table border="1" cellpadding="6" cellspacing="1" style="width: 500px;" class="table-condensed">
                        <thead>
                            <tr>
                                <th>รายการ</th>
                                <th>จำนวนเงิน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td align="right">ส่วนลด</td>
                                <td>0.00</td>
                            </tr>
                            <tr>
                                <td align="right">ภาษี</td>
                                <td>0.00</td>
                            </tr>
                            <tr>
                                <td align="right">ยอดชำระ</td>
                                <td><?php echo $this->cart->format_number($this->cart->total()); ?></td>
                            </tr>
                            <tr>
                                <td align="right">รับเงินมาจำนวน</td>
                                <td>3000.00</td>
                            </tr>
                            <tr>
                                <td align="right">เงินทอนจากขายการ</td>
                                <td>
                                    <?php
                                    $price = $this->cart->total();
                                   
                                    
                                    ?>
                                    {{ 3000 +- <?php echo $price; ?> }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <hr/>
                    <button class="btn btn-large btn-success"><i class="icon-credit-card"></i> ปิดการขาย</button>
                    <button class="btn btn-large btn-danger"><i class="icon-trash"></i> ยกเลิกการขาย</button>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>