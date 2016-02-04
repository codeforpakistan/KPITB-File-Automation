<!DOCTYPE html>
<html>
<head>
<title>KPITB</title>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta charset="UTF-8">
<meta name="description" content="KPITB FILE SYSTEM" />
<meta name="keywords" content="KPITB,Pehsawar" />
<meta name="author" content="Alluddin" />
<!-- Styles -->
<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'> -->
<link href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
    <body class="login-bg">
        <!-- ENDS HERE -->
        <div class="col-md-3 login-cover">
            <h3 class="text-center"><b>KPITB LOGIN</b></h3>
            <?php echo form_open(base_url().'kpitb_login/UserLogin');?>
                <div class="form-group align">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="email" placeholder="username">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="submit" name="Login" class="btn col-md-12 btn-success" value="Login">
                </div>
            <?php echo form_close();?>
            <div class="clearfix"></div>
            <br>
                <a href="<?php echo base_url();?>kpitb_login/forgotpassword"><small class="small">Forgot Password?</small></a>
        </div>
    <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.1.3.min.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>