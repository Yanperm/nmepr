<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
    <title>Nutmor EPR</title>
    <link rel="icon" type="image/png" href="assets/images/Nutmor FINAL-S-02.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--Custom styles-->
    <script src="https://kit.fontawesome.com/0b2ff92664.js" crossorigin="anonymous"></script>
    
    
    <style type="text/css">
    
        /* Made with love by Mutiullah Samim*/
        @import url('https://fonts.googleapis.com/css?family=Numans');

        html,
        body {
            background-image: linear-gradient( 67.3deg,  rgba(36,82,121,1) 39.2%, rgba(59,133,197,1) 95.6% );
            height: 100%;
            font-family: 'Numans', sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .background {
            position: absolute ;
            display: block;
            top : 0;
            left: 0;
            z-index : 0;
        }

        .container {
            height: 100%;
            align-content: center;
        }

        .card {
            height: 300px;
            margin-top: 300px;
            margin-bottom: auto;
            width: 400px;
            background-color: rgba(0, 0, 0, 0.5) !important;
        }

        .social_icon span {
            font-size: 80px;
            margin-left: 10px;
            color: #D5DBDB;
        }

        .social_icon span:hover {
            color: white;
            cursor: pointer;
        }

        .card-header h3 {
            color: white;
        }

        .social_icon {
            position: absolute;
            right: 20px;
            top: -45px;
        }

        .input-group-prepend span {
            width: 50px;
            background-color: #D5DBDB;
            color: black;
            border: 0 !important;
        }

        input:focus {
            outline: 0 0 0 0 !important;
            box-shadow: 0 0 0 0 !important;
        }

        .remember {
            color: white;
        }

        .remember input {
            width: 15px;
            height: 15px;
            margin-left: 15px;
            margin-right: 5px;
        }

        .login_btn {
            color: white;
            background-color: #43AADC;
            width: 180px;
        }

        .login_btn2 {
            color: white;
            background-color: #6796de;
            width: 170px;
        }

        .login_btn:hover {
            color: white;
            background-color: #00ff00;
        }

        .login_btn2:hover {
            color: white;
            background-color: #00ff00;
        }

        .links {
            color: white;
        }

        .links a {
            margin-left: 4px;
        }
        
    </style>
</head>

<body>
    <div class="container">
    <div id="particles-js"></div>
        <div class="d-flex justify-content-center h-100">
            <div class="card" style="border:2px solid #ccc">
                <div class="card-header">
                    <span class="glyphicon glyphicon-lock"> </span>
                    <h3><b>Nutmor EPR</b></h3>
                    <div class="d-flex justify-content-end social_icon">
                        <a href="https://nutmor.com" target="_blank"><span><img src="<?php echo base_url('assets/images/Nutmor FINAL-S-02.png'); ?>" style="width:80px;" /></a>
                    </div>
                </div>
                <div class="card-body">

                    <form ame="formlogin" action="<?php echo base_url('manage/checklogin') ?>" method="POST" id="login" class="form-horizontal">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="USERNAME" class="form-control" autocomplete="off" placeholder="Your@mail.com">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="PASSWORD" class="form-control" autocomplete="off" placeholder="Password">
                        </div>                        
                        <div class="form-group">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="https://www.nutmor.com/service/app/register" target="_blank"><input type="button" value="สมัครสมาชิก" class="btn float-left login_btn2"></a>
                            <input type="submit" value="เข้าสู่ระบบ" class="btn float-Right login_btn">
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox"> ให้ฉันอยู่ในระบบ
                        </div>
                    </form>
                </div>
                <br />
                <p style="text-align:center;font-size:13px; color:#11F738">
                        <i class="fa fa-lock"></i><span> เว็บไซต์นี้เข้ารหัสแบบ SSL 256-bit ข้อมูลของคุณจะได้รับการป้องกัน</span>
                    </p>
                    <p class="text-light" style="text-align:center;font-size:14px;">
                        <i class="fa fa-copyright"></i><span> 2019 Powered by Nutmor.com
                    </p>
                <?php
$danger = $this->session->userdata('danger');
if ($danger != '') {?>
                    <div class="alert alert-danger">
                        <i class="icon-info-sign icon-large"></i> <?php echo $danger; ?>
                    </div>
                <?php
$this->session->unset_userdata('danger');
}?>
            </div>
        </div>
    </div>
</body>

</html>