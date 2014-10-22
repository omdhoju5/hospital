<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BG Hospital</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('public/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/bootstrap.css');?>" rel="stylesheet">

    <script src="<?php echo base_url('public/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap.min.js');?>"></script>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('public/custom/css/offcanvas.css')?>" rel="stylesheet">
    </head>

    <body>

    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/hospital">BG Hospital</a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/hospital">Home</a></li>
                    <li><a href="#">Doctors</a></li>
                    <li><a href="#">Patients</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">New Patient <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('patient_Emergency/create');?>">Emergency</a></li>
                        <li><a href="<?php echo base_url('patient_Opd/create');?>">OPD</a></li>
                        <li><a href="<?php echo base_url('patient_Inpatient/create');?>">Inpatient</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Follow Up</a></li>
                    <li><a href="<?php echo base_url('auth/logout');?>">Sign Out</a></li>
                </ul>
            </div><!-- /.nav-collapse -->
        </div><!--/.container -->
    </div><!-- /.navbar -->
    
    <div class="container">
    
        <div class = "message">
            <?php if(isset($message)){ ?>
                <div class = "alert-error">
                    <?php echo $message;?>
                </div>
            <?php } ?>

            <?php if($this->session->flashdata('alert_success')){ ?>
                <div class = "alert-success">
                    <h3><?php echo $this->session->flashdata('alert_success');?></h3>
                </div>
            <?php } ?>

        </div>

    </div>

    <?php start_block_marker('content') ?>
    <?php end_block_marker() ?>

  </body>
</html>