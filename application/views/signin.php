<!doctype html>
<html lang="en">

<head>
<title>Nutmor EPR | Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Qubes Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
<meta name="author" content="GetBootstrap, design by: puffintheme.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/animate-css/vivify.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/site.min.css">

</head>

<body class="theme-blue">
   

    <div class="auth-main">
        <div class="auth_div">
            <div class="card">
                <div class="auth_brand">
                    <a class="navbar-brand" href="javascript:void(0);"> <h3><b><i class="fa fa-cube font-50"></i> Nutmor EPR | Login</b></h3></a>                     
                </div>
                <div class="body">                   
                    <form class="form-auth-small m-t-1" action="<?php echo base_url('manage/checklogin') ?>" method="post">
                        <div class="form-group">
                            <label for="signin-email" class="control-label sr-only">Username</label>
                            <input type="text" name="USERNAME" class="form-control round" id="signin-email" value="" placeholder="user@domain.com" required>
                        </div>
                        <div class="form-group">
                            <label for="signin-password" class="control-label sr-only">Password</label>
                            <input type="password" name="PASSWORD" class="form-control round" id="signin-password" value="" placeholder="Password" required>
                        </div>
                        <div class="form-group clearfix">
                            <label class="fancy-checkbox element-left">
                                <input type="checkbox">
                                <span>Remember me</span>
                            </label>								
                        </div>
                        <button type="submit" class="btn btn-primary btn-round btn-block">LOGIN</button>
                        <div class="bottom">                                                        
                            <img src="<?php echo base_url() ?>assets/images/logo-cloudflare-dark.svg" class="img-fluid" alt="login page" width="100px;"/> 
                            <span class="helper-text m-b-10">Don't have an account? <a href="">Register</a></span>                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="auth_right">
            <div id="slider2" class="carousel slide" data-ride="carousel" data-interval="3000">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    </ol>
                <div class="carousel-inner pb-5">
                    
                    <div class="carousel-item active">
                        <img src="<?php echo base_url() ?>assets/images/login-slide2.png" class="img-fluid" alt="login page" />
                        <div class="px-4">
                            <h2>100% Secure</h2>
                            <p>ข้อมูลในระบบมีความปลอดภัยสูง.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo base_url() ?>assets/images/login-slide2.png" class="img-fluid" alt="login page" />
                        <div class="px-4">
                            <h2>Saving Time</h2>
                            <p>ประหยัดเวลาบริหารงานคลินิกท่าน</p>
                        </div>
                    </div>
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
