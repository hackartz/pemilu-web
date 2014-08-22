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
            <a class="navbar-brand" href="<?php echo base_url(); ?>">MANAJEMEN KPU</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li><a href="<?php echo base_url(); ?>admin/list_pemilih">Pemilih</a></li>
                <li><a href="<?php echo base_url(); ?>admin/list_partai">Partai</a></li>
                <li><a href="<?php echo base_url(); ?>admin/list_anggota">Anggota</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li><a href="<?php echo base_url();?>admin/logout">Logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container" style="padding-top:90px; height: 650px; width: 450px;">


    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">Tambah Partai</h3></div>
        <div class="panel-body">
            <form role="form" method="post" action="<?php echo base_url();?>admin/save_partai" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="logo">logo partai </label>
                    <input type="file" id="logo" name="logo">
                </div>
                <div class="form-group">
                    <label for="username">nama partai </label>
                    <input type="text" class="form-control" style="border-radius:0px" id="nampar" name="nampar" placeholder="nama partai">
                </div>
                <input type="submit" class="btn btn-sm btn-primary pull-right" style="border-radius:0px" value="tambah">
            </form>
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

