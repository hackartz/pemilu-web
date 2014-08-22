<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">

</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img style="margin-top: 10px;margin-right: 8px;margin-left: 8px;" width="32px" height="32px" src="<?php echo base_url(); ?>img/logo_kpu.png" alt="" class="pull-left"/>
            <a class="navbar-brand" href="#">MANAJEMEN KPU</a>
        </div>

    </div>
</div>

<div class="container" style="margin-top:220px">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><strong>Sign in </strong></h3></div>
            <div class="panel-body">
                <form role="form" method="post" action="<?php echo base_url();?>login/act_login">
                    <div class="form-group">
                        <label for="username">Username </label>
                        <input type="text" class="form-control" style="border-radius:0px" id="username" name="username" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password </label>
                        <input type="password" class="form-control" style="border-radius:0px" id="pass" name="pass" placeholder="Password">
                    </div>
                    <input type="submit" class="btn btn-lg btn-primary btn-block" style="border-radius:0px" value="Login">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Javascripts -->
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js/backstretch.min.js"></script>
<script>
    $(function(){
        // backstrecth plugin init
        $.backstretch("<?php echo base_url(); ?>img/bg2.png");

    });
</script>
</body>
</html>

