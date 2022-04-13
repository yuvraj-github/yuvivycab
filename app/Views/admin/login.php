<!doctype html>
<html lang="en">
<head>
    <title>VYCabs Login Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Validation -->
    <link rel="stylesheet" href="<?php echo base_url('assets/js/validation-engine/css/validationEngine.jquery.css'); ?>" type="text/css">
	<!-- <link rel="stylesheet" href="<?php echo base_url('assets/js/validation-engine/css/template.css'); ?>" type="text/css"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-4.min.css'); ?>">
    
    <script>var SITE_URL = '<?php echo site_url(); ?>'</script>
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/validation-engine/js/languages/jquery.validationEngine-en.js') ?>" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo base_url('assets/js/validation-engine/js/jquery.validationEngine.js'); ?>" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo base_url('assets/js/popper.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/app/login.js'); ?>"></script>
</head>
<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Login</h3>
                        <form action="" id="memberLogin" class="login-form">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control rounded-left validate[required,custom[email]]" placeholder="Enter Email" value="<?php echo set_value('email'); ?>">
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" name="password" class="form-control rounded-left validate[required]" placeholder="Enter Password" value="<?php echo set_value('password'); ?>">
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#">Forgot Password</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Login</button>
                            </div>
                            <?php 
                            if(isset($validation)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $validation->listErrors(); ?>
                                </div>
                                <?php
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>