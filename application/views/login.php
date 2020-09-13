<!doctype html>
<html lang="en">

    <head>
        <title>Electric Patient Record | Login</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Nutmor | Login นัดหมอ">
        <meta name="author" content="Pratchayanan Yanphoem, design by: softubon.com">

        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- VENDOR CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/animate-css/vivify.min.css">

        <!-- MAIN CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/site.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100&display=swap" rel="stylesheet">
    </head>

    <body class="theme-green" style="font-family: 'Sarabun', sans-serif;">   

        <div class="auth-main body" style="background-image: <?php echo base_url('assets/BGHeader.jpg') ?>">
            <div class="auth_div">
                <div class="card">

                    <div class="body"> 
                        <div class="auth_brand">   
                            <b class="text-success">Electric Patient Record</b>
                            <b class="text-success">ระบบบริหารงานคลินิก</b>
                            <hr/>
                        </div>
                        <form class="form-auth-small m-t-20" action="<?php echo base_url('app/checklogin') ?>" method="POST">
                            <div class="form-group">
                                <label for="signin-email" for="signin-email" class="control-label sr-only">Username</label>
                                <input type="text" name="USERNAME" class="form-control round is-valid " required id="signin-email" value="" placeholder="Your@mail.com" >
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="signin-password" class="control-label sr-only">Password</label>
                                <input type="password" name="PASSWORD"  class="form-control round is-valid " id="signin-password" value="" placeholder="Password" required>
                            </div>
                            <div class="form-group clearfix">
                                <label class="fancy-checkbox element-left">
                                    <input type="checkbox">
                                    <span>Remember me</span>
                                </label>								
                            </div>
                                <button type="submit" class="btn btn-success btn-round btn-block"><i class="fa fa-lock"></i> เข้าสู่ระบบ</button>
                            <div class="bottom">
                                <hr/>
                                <img src="<?php echo base_url('assets/PB_AWS_logo_RGB.61d334f1a1a427ea597afa54be359ca5a5aaad5f.png') ?>" width="50%"/><br/>
                                <img src="<?php echo base_url('assets/AmazonWebservices_Logo.svg.png') ?>" width="30%"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <!-- END WRAPPER -->

        <!-- Latest jQuery -->
        <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>

        <!-- Bootstrap 4x JS  -->
        <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="<?php echo base_url() ?>assets/bundles/vendorscripts.bundle.js"></script>
        <script src="<?php echo base_url() ?>assets/js/common.js"></script>
    </body>
</html>
