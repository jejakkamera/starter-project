<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
   
    <title>UKT UBP Karawang</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/themplate/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo  base_url(); ?>assets/themplate/main/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url(); ?>assets/themplate/main/css/colors/red.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

  <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/jquery/jquery.min.js"></script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar"  style="background-image:url(<?php echo base_url(); ?>assets/login3.jpg);background-size: cover;">
    
    <div class="login-box card">
    <div class="card-block">
      
        <a href="javascript:void(0)" width="300px" style="margin-top:100px" class="text-center db"><img src="<?php echo base_url(); ?>assets/themplate/assets/images/logo-official.png" alt="" /></a>
   
        <div class="form-group m-t-30">
          <div class="col-xs-5">
            <input class="form-control" type="text" required="" placeholder="Username" name="uname_id" id="username">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-5">
            <input class="form-control" type="password" required="" placeholder="Password" name="pass" id="password">
          </div>
        </div>
        <div class="form-group">
         
        </div>
        <div id="pesan">
			  
        </div>
        <div class="form-group">
          <div class="col-md-12">
           
            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-info m-r-5"></i> APP Info?</a> </div>
        </div>                         
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" id="cek" name='cek'>Log In</button>
          </div>
          <form class="form-horizontal" id="recoverform" action="index.html">
        
      </form>
        </div>
    </div>
    
  </div>
  
</section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
  
    <script>
    $(document).ready(function(){
        $("#cek").click(function(){
        var user =  document.getElementById("username").value ;
        var passw =  document.getElementById("password").value ;

          $.post("<?php echo base_url(); ?>welcome/login_proses",{uname_id: user, pass: passw}, function(data,status){
              var obj = JSON.parse(data);
              document.getElementById("pesan").innerHTML = obj.text;
          
              window.setTimeout(function () {
                
                  document.getElementById("pesan").innerHTML = '';

              }, 2000);

              if(obj.kode==1){
                window.location.assign('<?php echo base_url('welcome'); ?>');
              }
            
          });

        });

       
    });

</script>