<!DOCTYPE html>
<html>
<head>
	<title>Document Sharing Portal</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <style type="text/css">
    .logo{
      height: 50px;
      width: 50px;
    }
    .nav-item a{
      text-decoration: none;
      background: green;
      color: #fff;
      padding: 10px 15px;
      font-weight: 900;
      font-size: 20px;
      margin-top: -15px;
    }
    .nav-item a:hover{
      background: red;
      color: #fff;
    }
    .user{
      color: #fff;
      font-size: 20px;
    }
    .table a{
      text-decoration: none;
      background: green;
      color: #fff;
      padding: 5px 10px;
      font-weight: 900;
      font-size: 20px;
      /*margin-top: -15px;*/
    }
    .table a:hover{
      background: orange;
      color: #333;
    }
    .table th,td{
      text-transform: uppercase;
    }
    .table{
      max-height: 500px;
    }
    hr{
      border: 2px solid orange;
    }
    h1{
      text-align: center;
      font-size: 35px;
      font-weight: 900;
      color: orange;
    }
    
    /*form*/
    form{
      background: orange;
      padding: 15px;
    }
    label{
      font-weight: 900;
      font-size: 20px;
      color: green;
      padding: 0 10px;
    }
    input[type="text"],[type="email"],[type="password"] {
      box-shadow: inset 0 0 6px 0px black;
      padding: 5px;
    }
    input[type="submit"]{
      padding: 5px 25px;
      margin-left: 15px;
    }
    select{
      box-shadow: 0 0 6px 1px black;
      text-shadow: 0 0 20px black;
      padding: 5px; 
    }

    /*pagination*/
    .pagination strong{
      background: orange;
      padding: 5px 15px;
      color: white;
      font-size: 18px;
      font-weight: 900;
      margin-left: 7px;
      margin-bottom: 10px;
      border: 3px solid white;
      box-shadow: 0 0 6px 0px black;
      text-shadow: 0 0 20px black;
    }
    .pagination a{
      background: orange;
      padding: 5px 15px;
      color: white;
      font-size: 18px;
      font-weight: 900;
      margin-left: 7px;
      margin-bottom: 10px;
      border: 3px solid white;
      box-shadow: 0 0 6px 0px black;
      text-shadow: 0 0 20px black;
    }
  </style>
</head>
<body>

 <nav class="navbar navbar-expand-sm bg-dark  navbar-fixed-top">
   <div class="container-fluid">
<div class="navbar-header">
  <a href="https://www.youtube.com/c/HeySushil/" target="_blank"><img src="<?php echo base_url();?>assets/images/heysushil.jpg" class="logo"></a>
</div>


  <ul class="navbar-nav">
    <li class="nav-item"></li>
    	<li class="nav-item"></li></ul>
    <li><b class="user"><?php echo 'Hi, ' . $this->session->userdata('name');?> ( <?php echo $this->session->userdata('course_type');?> )</b></li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>Login/userLogout">
        <span  class="fas fa-user"> Logout</span></a>
    </li>
      </nav>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/toastr.min.js"></script>
<link href="<?php echo base_url(); ?>assets/css/toastr.min.css" rel="stylesheet">

<script type="text/javascript">
  <?php if($this->session->flashdata('success')){ ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php }else if($this->session->flashdata('error')){  ?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");
<?php }else if($this->session->flashdata('warning')){  ?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php }else if($this->session->flashdata('info')){  ?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>
</script>