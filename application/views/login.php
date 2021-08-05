<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/imsIcon.ico');?>"/>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
	<title>Login</title>
</head>
<body class="bg-light">

	<main class="py-5">
        <section class="pt-5">
            <div class="container-lg py-1">
                <div class="row  align-items-center align-content-center">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <div class="contact-form">
                            <form action="MainControllers" method="post">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-lg-10 mb-4 d-flex align-items-center">
                                        <img src="<?php echo base_url('assets/img/home.png');?>" class="img-fluid" width="100" height="100" alt="">
                                        <h1 class="text-danger text-center fw-bold">I M S</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <input type="text" placeholder="Your Name" value="<?php echo set_value('username'); ?>" name="username" autofocus="" class="form-control form-control-lg fs-6 border-0 shadow-lg">
                                        <?php echo form_error('username'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <input type="password" placeholder="Your Password" name="password" class="form-control form-control-lg fs-6 border-0 shadow-lg">
                                        <?php echo form_error('password'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <button type="submit" class="btn btn-danger px-3 shdaw-sm">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
            </div>
        </section>
	</main>

	<script src="<?php echo base_url("assets/js/bootstrap.bundle.min.js"); ?>"></script>
</body>
</html>