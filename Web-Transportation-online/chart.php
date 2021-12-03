<?php
include 'includes/connect.php';
include 'includes/wallet.php';

	if($_SESSION['customer_sid']==session_id())
	{
		?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Fast Shiping</title>

  <!-- Favicons-->
  <link rel="icon" href="img/logo-head.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->    
  <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  
   <style type="text/css">
  .input-field div.error{
    position: relative;
    top: -1rem;
    left: 0rem;
    font-size: 0.8rem;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  .input-field label.active{
      width:100%;
  }
  .left-alert input[type=text] + label:after, 
  .left-alert input[type=password] + label:after, 
  .left-alert input[type=email] + label:after, 
  .left-alert input[type=url] + label:after, 
  .left-alert input[type=time] + label:after,
  .left-alert input[type=date] + label:after, 
  .left-alert input[type=datetime-local] + label:after, 
  .left-alert input[type=tel] + label:after, 
  .left-alert input[type=number] + label:after, 
  .left-alert input[type=search] + label:after, 
  .left-alert textarea.materialize-textarea + label:after{
      left:0px;
  }
  .right-alert input[type=text] + label:after, 
  .right-alert input[type=password] + label:after, 
  .right-alert input[type=email] + label:after, 
  .right-alert input[type=url] + label:after, 
  .right-alert input[type=time] + label:after,
  .right-alert input[type=date] + label:after, 
  .right-alert input[type=datetime-local] + label:after, 
  .right-alert input[type=tel] + label:after, 
  .right-alert input[type=number] + label:after, 
  .right-alert input[type=search] + label:after, 
  .right-alert textarea.materialize-textarea + label:after{
      right:70px;
  }
  </style> 
</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color white">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="index.php" class="brand-logo darken-1"><img src="img/logo-brand.png" alt="logo"></a> <span class="logo-text">Logo</span></h1></li>
                    </ul>
                    <ul class="right hide-on-med-and-down ">                        
                        <li><a href="#" class="dropdown-trigger waves-effect waves-block waves-light yellow circle" href="#!" data-target="dropdown1" ><i class="mdi-social-notifications "></i></a>
                        </li>
                    </ul>					
                    
                    
                </div>
            </nav>
<!-- ////////////////////////////////////////// -->
            <ul id="dropdown1" class="dropdown-content">
                      <li><a href="#!">one</a></li>
                      <li><a href="#!">two</a></li>
                      <li class="divider"></li>
                      <li><a href="#!">three</a></li>
            </ul>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
      <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="img/avatar.png" alt="" class="circle responsive-img valign profile-image">
                </div>
				 <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="routers/logout.php"><i class="mdi-hardware-keyboard-tab"></i> Log out</a>
                        </li>
                    </ul>
                </div>
                <div class="col col s8 m8 l8">
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $name;?> <i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal"><?php echo $role;?></p>
                </div>
            </div>
            </li>
            <li class="bold"><a href="index.php" class="waves-effect waves-cyan"><i class="mdi-content-add-circle"></i> Create orders</a>
            </li>
            
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-restore"></i> History</a>
                            <div class="collapsible-body">
                                <ul>
								<li><a href="orders.php">All Orders</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM orders WHERE customer_id = $user_id;");
									while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="orders.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
									?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="bold"><a href="voucher.php" class="waves-effect waves-cyan"><i class="mdi-maps-local-attraction"></i>Voucher</a>
            </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-communication-forum"></i> Contact</a>
                            <div class="collapsible-body">
                                <ul>
								<li><a href="tickets.php">All messages</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM tickets WHERE poster_id = $user_id AND not deleted;");
									while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="tickets.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
									?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>				
            <li class="bold active"><a href="chart.php" class="waves-effect waves-cyan"><i class="mdi-editor-insert-chart"></i>Statistical reports</a>
            </li>		
            <li class="bold"><a href="invite.php" class="waves-effect waves-cyan"><i class="mdi-social-group-add"></i> Invite your friend</a>
            </li>			
            <li class="bold"><a href="details.php" class="waves-effect waves-cyan"><i class="mdi-social-person"></i> Edit Details</a>
            </li>
            
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only amber"><i class="mdi-navigation-menu"></i></a>
        </aside>
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content ">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title"></h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->

        <!-- STATS CARDS -->

        <div class="container">
        <div id="card-stats" class="seaction">
              <h4 class="header">Stats Cards</h4>
              <p> Show your important stats with top stats in colorful cards.</p>
              <div class="row">
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content  teal lighten-2
 white-text">
                                        <p class="card-stats-title"><i class="mdi-action-assignment"></i> All orders</p>
                                        <h4 class="card-stats-number">566</h4>
                                        <p class="card-stats-compare"><i class="mdi-action-trending-up"></i> 15% <span class="green-text text-lighten-5">from yesterday</span>
                                        </p>
                                    </div>
                                    <!-- <div class="card-action  green darken-2">
                                        <div id="clients-bar"><canvas width="220" height="25" style="display: inline-block; width: 220px; height: 25px; vertical-align: top;"></canvas></div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content cyan lighten-2 white-text">
                                        <p class="card-stats-title"><i class="mdi-maps-local-shipping"></i> Delivering</p>
                                        <h4 class="card-stats-number">$8990.63</h4>
                                        <p class="card-stats-compare"><i class="mdi-action-trending-up"></i> 70% <span class="purple-text text-lighten-5">last month</span>
                                        </p>
                                    </div>
                                    <!-- <div class="card-action purple darken-2">
                                        <div id="sales-compositebar"><canvas width="214" height="25" style="display: inline-block; width: 214px; height: 25px; vertical-align: top;"></canvas></div>

                                    </div> -->
                                </div>
                            </div>                            
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content orange lighten-2 white-text">
                                        <p class="card-stats-title"><i class="mdi-action-assignment-turned-in"></i> Delivered</p>
                                        <h4 class="card-stats-number">$806.52</h4>
                                        <p class="card-stats-compare"><i class="mdi-action-trending-up"></i> 80% <span class="blue-grey-text text-lighten-5">from yesterday</span>
                                        </p>
                                    </div>
                                    <!-- <div class="card-action blue-grey darken-2">
                                        <div id="profit-tristate"><canvas width="220" height="25" style="display: inline-block; width: 220px; height: 25px; vertical-align: top;"></canvas></div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content red lighten-2 white-text">
                                        <p class="card-stats-title"><i class="mdi-action-assignment-late"></i> Cancelled</p>
                                        <h4 class="card-stats-number">1806</h4>
                                        <p class="card-stats-compare"><i class="mdi-action-trending-down"></i> 3% <span class="deep-purple-text text-lighten-5">from last month</span>
                                        </p>
                                    </div>
                                    <!-- <div class="card-action  deep-purple darken-2">
                                        <div id="invoice-line"><canvas width="265" height="25" style="display: inline-block; width: 265px; height: 25px; vertical-align: top;"></canvas></div>
                                    </div> -->
                                </div>
                            </div>                            
                        </div>
            </div>

            <div id="chart-dashboard" class="seaction">
              <h4 class="header">Customize Charts Widget</h4>
              <p>Show your business trending chart using this widgets.</p>
              <div class="row">
                <div class="col s12 m8 l8">
                    <div class="card">
                        <div class="card-move-up waves-effect waves-block waves-light">
                            <div class="move-up  yellow darken-2">
                                <div>
                                    <span class="chart-title white-text">Revenue</span>
                                    <div class="chart-revenue amber darken-3 white-text">
                                        <p class="chart-revenue-total">$4,500.85</p>
                                        <p class="chart-revenue-per"><i class="mdi-navigation-arrow-drop-up"></i> 21.80 %</p>
                                    </div>
                                    <div class="switch chart-revenue-switch  right">
                                        <label class="cyan-text text-lighten-5">
                                          Month
                                          <input type="checkbox">
                                          <span class="lever"></span> Year
                                        </label>
                                    </div>
                                </div>
                                <div class="trending-line-chart-wrapper">
                                    <canvas id="trending-line-chart" height="256" width="1102" style="width: 551px; height: 128px;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <a class="btn-floating btn-move-up waves-effect waves-light darken-2 right"><i class="mdi-content-add activator"></i></a>
                            <div class="col s12 m3 l3">
                                <div id="doughnut-chart-wrapper">
                                    <canvas id="doughnut-chart" height="156" width="236" style="width: 118px; height: 78px;"></canvas>
                                    <div class="doughnut-chart-status">4500
                                        <p class="ultra-small center-align">Sold</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m2 l2">
                                <ul class="doughnut-chart-legend">
                                    <li class="mobile ultra-small"><span class="legend-color"></span>Mobile</li>
                                    <li class="kitchen ultra-small"><span class="legend-color"></span> Kitchen</li>
                                    <li class="home ultra-small"><span class="legend-color"></span> Home</li>
                                </ul>
                            </div>
                            <div class="col s12 m5 l6">
                                <div class="trending-bar-chart-wrapper ">
                                    <canvas id="trending-bar-chart" height="154" width="518" style="width: 259px; height: 77px;"></canvas>                                                
                                </div>
                            </div>
                        </div>

                        <div class="card-reveal" style="display: none; transform: translateY(0px);">
                            <span class="card-title grey-text text-darken-4">Revenue by Month <i class="mdi-navigation-close right"></i></span>
                            <table class="responsive-table">
                                <thead>
                                    <tr>
                                        <th data-field="id">ID</th>
                                        <th data-field="month">Month</th>
                                        <th data-field="item-sold">Item Sold</th>
                                        <th data-field="item-price">Item Price</th>
                                        <th data-field="total-profit">Total Profit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>January</td>
                                        <td>122</td>
                                        <td>100</td>
                                        <td>$122,00.00</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>February</td>
                                        <td>122</td>
                                        <td>100</td>
                                        <td>$122,00.00</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>March</td>
                                        <td>122</td>
                                        <td>100</td>
                                        <td>$122,00.00</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>April</td>
                                        <td>122</td>
                                        <td>100</td>
                                        <td>$122,00.00</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>May</td>
                                        <td>122</td>
                                        <td>100</td>
                                        <td>$122,00.00</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>June</td>
                                        <td>122</td>
                                        <td>100</td>
                                        <td>$122,00.00</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>July</td>
                                        <td>122</td>
                                        <td>100</td>
                                        <td>$122,00.00</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>August</td>
                                        <td>122</td>
                                        <td>100</td>
                                        <td>$122,00.00</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Septmber</td>
                                        <td>122</td>
                                        <td>100</td>
                                        <td>$122,00.00</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Octomber</td>
                                        <td>122</td>
                                        <td>100</td>
                                        <td>$122,00.00</td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>November</td>
                                        <td>122</td>
                                        <td>100</td>
                                        <td>$122,00.00</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>December</td>
                                        <td>122</td>
                                        <td>100</td>
                                        <td>$122,00.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <!-- CUSTOMIZE CHARTS WIDGET -->
                <div class="col s12 m4 l4">
                                <div class="card">
                                    <div class="card-move-up teal waves-effect waves-block waves-light">
                                        <div class="move-up">
                                            <p class="margin white-text">Browser Stats</p>
                                            <canvas id="trending-radar-chart" height="216" width="570" style="width: 285px; height: 108px;"></canvas>
                                        </div>
                                    </div>
                                    <div class="card-content  teal darken-2">
                                        <a class="btn-floating btn-move-up waves-effect waves-light darken-2 right"><i class="mdi-content-add activator"></i></a>
                                        <div class="line-chart-wrapper">
                                            <p class="margin white-text">Revenue by country</p>
                                            <canvas id="line-chart" height="194" width="512" style="width: 256px; height: 97px;"></canvas>
                                        </div>
                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">Revenue by country <i class="mdi-navigation-close right"></i></span>
                                        <table class="responsive-table">
                                            <thead>
                                                <tr>
                                                    <th data-field="country-name">Country Name</th>
                                                    <th data-field="item-sold">Item Sold</th>
                                                    <th data-field="total-profit">Total Profit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Hanoi</td>
                                                    <td>65</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>
                                                    <td>Ho Chi Minh City</td>
                                                    <td>76</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>
                                                    <td>Da Nang</td>
                                                    <td>65</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>
                                                    <td>Hai Phong</td>
                                                    <td>76</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>

                                                    <td>Hue</td>
                                                    <td>65</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>
                                                    <td>Quang Ngai</td>
                                                    <td>76</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>
                                                    <td>Nha Trang</td>
                                                    <td>65</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>
                                                    <td>Ca Mau</td>
                                                    <td>76</td>
                                                    <td>$452.55</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
              </div>
            </div>


        </div>
  
        </div>
        <!--end container-->

      </section>
      <!-- END CONTENT -->


  <!-- </div> -->
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
  <footer class="page-footer amber lighten-3">
    <div class="footer-copyright">
      <div class="container">
        <span class="black-text">Copyright © 2017 <a class="grey-text " href="#" target="_blank">Students</a> All rights reserved.</span>
        <span class="black-text right"> Design and Developed by <a class="grey-text " href="#">Students</a></span>
        </div>
    </div>
  </footer>
    <!-- END FOOTER -->



    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <!--angularjs-->
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
	
    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>



     <!-- ================================================
    Scripts
    ================================================ -->


    <!--prism-->
    <script type="text/javascript" src="js/prism.js"></script>
    
    <!-- chartjs -->
    <script type="text/javascript" src="js/plugins/chartjs/chart.min.js"></script>
    <script type="text/javascript" src="js/plugins/chartjs/chart-script.js"></script>

    <!-- sparkline -->
    <script type="text/javascript" src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="js/plugins/sparkline/sparkline-script.js"></script>

    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist/chartist.min.js"></script>   
    

    

    


<!-- 
<div class="hiddendiv common"></div><div class="drag-target" style="left: 0px; touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); right: 0px;"></div><div class="drag-target" style="right: 0px; touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div><div id="jqstooltip" class="jqstooltip" style="width: 15px; height: 22px; visibility: visible; left: 571px; top: 1784.8px;"><div class="jqsfield"><span style="color: #F6CAFD">●</span> 3</div><div class="jqsfield"><span style="color: #fff3e0">●</span> 7</div></div> -->



    <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
			<?php
			$result = mysqli_query($con, "SELECT * FROM items where not deleted;");
			while($row = mysqli_fetch_array($result))
			{
				echo $row["id"].':{
				min: 0,
				max: 10
				},
				';
			}
		echo '},';
		?>
        messages: {
			<?php
			$result = mysqli_query($con, "SELECT * FROM items where not deleted;");
			while($row = mysqli_fetch_array($result))
			{  
				echo $row["id"].':{
				min: "Minimum 0",
				max: "Maximum 10"
				},
				';
			}
		echo '},';
		?>
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });
    </script>
    
</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['admin_sid']==session_id())
		{
			header("location:admin-page.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>