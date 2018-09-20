<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
   
    <title>Hospital</title>
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="<?php echo base_url();?>/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- bootstrap -->
    <link href="<?php echo base_url();?>/assets/assets/tether/css/tether.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>/assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/login.css">
	<!-- favicon -->
    <style type="text/css">
        .error {
            color: red;
        }
        #errmsg
        {
        color: red;
        }
        #errmsgs
        {
        color: red;
        }
    </style>
</head>
<body class="backimg">
    <div class="form-title">
        <h1>Login Form</h1>
    </div>
    <!-- Login Form-->
    <div class="login-form text-center">
        <div class="">
        </div>
        <div class="form formLogin">
            <h2>Login to your account</h2>
            <form id="login" action="<?php echo base_url();?>admin/login" method="POST" name="login" enctype="multipart/form-data">
                <?php if($msg):?>
                    <div class="alert alert-danger"><?php echo $msg;?></div>
                <?php endif;?>
                <?php echo validation_errors(); ?>
                <?php echo $this->session->flashdata('success_msg');?>
                <input type="email" name="username" placeholder="Username" required/>
                <input type="password" name="password" placeholder="Password" required />
                <div class="remember text-left">
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox2" name="remember" type="checkbox" value="1">
                        <label for="checkbox2">
                            Remember me
                        </label>
                    </div>
                </div>
                <input type="submit" id="loginbutton" class="btn btn-primary btn-block text-white" name="submit" value="Login">
                <div class="forgetPassword"><a href="javascript:void(0)">Forgot your password?</a>
                </div>
            </form>
        </div>
    
        <div class="form formReset">
            <h2>Reset your password?</h2>
            <form>
                <input type="email" placeholder="Email Address" />
                <button>Send Verification Email</button>
            </form>
        </div>
    </div>
    <!-- start js include path -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>/assets/assets/login.js"></script>
    <script src="<?php echo base_url();?>/assets/assets/pages.js" ></script>
    <script>
        jQuery(document).ready(function($) {

            // Initialize form validation on the registration form.
            // It has the name attribute "registration"
            $("form[name='login']").validate({
                // Specify validation rules
                rules: {
                    // The key name on the left side is the name attribute
                    // of an input field. Validation rules are defined
                    // on the right side
                    //countrycode: "required",
                    //mobile: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                },
                // Specify validation error messages
                messages: {

                    email: "Please enter a valid email address",
                    password: {
                        required: "Please provide a Password",
                        minlength: "Your password must be at least 8 characters long"

                    },
                      
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                    //alert('ok');
                    form.submit();
                }
            });
        });
    </script>
    <!-- end js include path -->
</body>


</html>