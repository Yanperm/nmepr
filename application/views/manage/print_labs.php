<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ใบส่งตรวจห้องปฏิบัติการ</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">     
        <style>
            #invoice{
                padding: 30px;
            }

            .invoice {
                position: relative;
                background-color: #FFF;
                min-height: 680px;
                padding: 15px
            }

            .invoice header {
                padding: 10px 0;
                margin-bottom: 20px;
                border-bottom: 1px solid #3989c6
            }

            .invoice .company-details {
                text-align: right
            }

            .invoice .company-details .name {
                margin-top: 0;
                margin-bottom: 0
            }

            .invoice .contacts {
                margin-bottom: 20px
            }

            .invoice .invoice-to {
                text-align: left
            }

            .invoice .invoice-to .to {
                margin-top: 0;
                margin-bottom: 0
            }

            .invoice .invoice-details {
                text-align: right
            }

            .invoice .invoice-details .invoice-id {
                margin-top: 0;
                color: #3989c6
            }

            .invoice main {
                padding-bottom: 50px
            }

            .invoice main .thanks {
                margin-top: -100px;
                font-size: 2em;
                margin-bottom: 50px
            }

            .invoice main .notices {
                padding-left: 6px;
                border-left: 6px solid #3989c6
            }

            .invoice main .notices .notice {
                font-size: 1.2em
            }

            .invoice table {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                margin-bottom: 20px
            }

            .invoice table td,.invoice table th {
                padding: 15px;
                background: #eee;
                border-bottom: 1px solid #fff
            }

            .invoice table th {
                white-space: nowrap;
                font-weight: 400;
                font-size: 16px
            }

            .invoice table td h3 {
                margin: 0;
                font-weight: 400;
                color: #3989c6;
                font-size: 1.2em
            }

            .invoice table .qty,.invoice table .total,.invoice table .unit {
                text-align: right;
                font-size: 1.2em
            }

            .invoice table .no {
                color: #fff;
                font-size: 1.6em;
                background: #3989c6
            }

            .invoice table .unit {
                background: #ddd
            }

            .invoice table .total {
                background: #3989c6;
                color: #fff
            }

            .invoice table tbody tr:last-child td {
                border: none
            }

            .invoice table tfoot td {
                background: 0 0;
                border-bottom: none;
                white-space: nowrap;
                text-align: right;
                padding: 10px 20px;
                font-size: 1.2em;
                border-top: 1px solid #aaa
            }

            .invoice table tfoot tr:first-child td {
                border-top: none
            }

            .invoice table tfoot tr:last-child td {
                color: #3989c6;
                font-size: 1.4em;
                border-top: 1px solid #3989c6
            }

            .invoice table tfoot tr td:first-child {
                border: none
            }

            .invoice footer {
                width: 100%;
                text-align: center;
                color: #777;
                border-top: 1px solid #aaa;
                padding: 8px 0
            }

            @media print {
                .invoice {
                    font-size: 11px!important;
                    overflow: hidden!important
                }

                .invoice footer {
                    position: absolute;
                    bottom: 10px;
                    page-break-after: always
                }

                .invoice>div:last-child {
                    page-break-before: always
                }
            }
        </style>
    </head>
    <body style="font-family: 'Sarabun', sans-serif;">        
        <div class="container" style="border: 1px black">
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <!------ Include the above in your HEAD tag ---------->

            <!--Author      : @arboshiki-->
            <div id="invoice">

                <div class="toolbar hidden-print">
                    <div class="text-right">
                        <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> ใบส่งตรวจห้องปฏิบัติการ</button>
                        <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                    </div>
                    <hr>
                </div>
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">
                                <div class="col">
                                    <a target="_blank" href="https://nutmor.com">
                                        <img src="<?php echo base_url('assets/images/Nutmor.png'); ?>" width="120px" height="120px" data-holder-rendered="true" /> 
                                    </a>
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
                                        <a target="_blank" href="https://nutmor.com">
                                            คลินิกหมอรัฐวิชญ์
                                        </a>
                                    </h2>
                                    <div>455 Foggy Heights, AZ 85004, US</div>
                                    <div>(123) 456-789</div>
                                    <div>info@nutmor.com</div>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <div class="text-gray-light">คนไข้</div>
                                    <h2 class="to">นายปรัชญานันท์ ญาณเพิ่ม</h2>
                                    <div class="address">234/32 หมู่ 1 ต.ไร่น้อย อ.เมือง จ.อุบลราชธานี</div>
                                    <div class="email"><a href="mailto:john@example.com">Partchayanan.y@softbon.com</a></div>
                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">ใบส่งตรวจ</h1>
                                    <div class="date">วันที่ส่ง: 01/10/2018</div>
                                    <div class="date">วันส่งผลตรวจ: 30/10/2018</div>
                                </div>
                            </div>
                            <table border="0" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th class="no text-center">ลำดับ</th>
                                        <th class="no text-left">ชื่อการทดสอบ</th>
                                        <th class="no text-center">แผนกที่ส่งตรวจ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="no text-center">01</td>
                                        <td class="text-left"><h3>
                                                <a target="_blank" href="">
                                                    CBC
                                                </a>
                                            </h3>                                            
                                        </td>
                                        <td class="unit text-center">Hematology</td>                                        
                                    </tr>
                                    <tr>
                                        <td class="no text-center">02</td>
                                        <td class="text-left"><h3>
                                                <a target="_blank" href="">
                                                    BUN
                                                </a>
                                            </h3>                                            
                                        </td>
                                        <td class="unit text-center">Biochemistry</td>                                        
                                    </tr>
                                </tbody>                                
                            </table>
                            <br/><br/><br/><br/>
                            <div class="thanks">ขอบคุณ!</div>
                            <div class="notices">
                                <div>NOTICE:</div>
                                <div class="notice">ส่งผลตรวจภายใน 30 วัน.</div>
                            </div>
                        </main>
                        <footer>
                            Invoice was created on a computer and is valid without the signature and seal.
                        </footer>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>

        </div>
    </body>
</html>