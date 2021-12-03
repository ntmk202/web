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
                        <li><a href="#dropdown1" class="dropdown-trigger waves-effect waves-block waves-light yellow circle" href="#!" data-target="dropdown1" ><i class="mdi-social-notifications "></i></a>
                        </li>
                        <ul id="dropdown1" class="dropdown-content">
                      <li><a href="#!">one</a></li>
                      <li><a href="#!">two</a></li>
                      <li class="divider"></li>
                      <li><a href="#!">three</a></li>
            </ul>
                    </ul>					
                    
                    
                </div>
            </nav>
<!-- ////////////////////////////////////////// -->
            
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
            <li class="user-details amber lighten-1">
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
            <li class="bold active"><a href="index.php" class="waves-effect waves-cyan"><i class="mdi-content-add-circle"></i> Create orders</a>
            </li>
            
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-amber"><i class="mdi-action-restore"></i> History</a>
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
								<li><a href="tickets.php">All Messages</a>
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
            <li class="bold"><a href="chart.php" class="waves-effect waves-cyan"><i class="mdi-editor-insert-chart"></i>Statistical reports</a>
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
                <h5 class="breadcrumbs-title">ORDERS</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container card-panel">
          <p class="caption">Create new order here.</p>
          <div class="divider"></div>
		  <form class="formValidate" id="formValidate" method="post" action="place-order.php" novalidate="novalidate">
        <div class="container">
        <div class="sender">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Sender's address</h4>
              </div>
              <!-- <div>
                  <table id="data-table-customer" class="responsive-table display" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Item Price/Piece</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>

                    <tbody>
				<?php
				$result = mysqli_query($con, "SELECT * FROM items where not deleted;");
				while($row = mysqli_fetch_array($result))
				{
					echo '<tr><td>'.$row["name"].'</td><td>'.$row["price"].'</td>';                      
					echo '<td><div class="input-field col s12"><label for='.$row["id"].' class="">Quantity</label>';
					echo '<input id="'.$row["id"].'" name="'.$row['id'].'" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td></tr>';
				}
				?>
                    </tbody>
</table>
              </div>
			  <div class="input-field col s12">
              <i class="mdi-editor-mode-edit prefix"></i>
              <textarea id="description" name="description" class="materialize-textarea"></textarea>
              <label for="description" class="">Any note(optional)</label>
			  </div>
			  <div>
			  <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Order
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>
			</form>
            <div class="divider"></div>
            
          </div> -->
        </div>

        <div class="row">
    <form class="col s12"   novalidate="novalidate">

      <div class="row">
        <div class="input-field col s6">
          <input  id="your_name" type="text" class="validate" name="sender_name">
          <label for="your_name">  Sender's name</label>
        </div>
        <div class="input-field col s6">
          <input id="phone" type="text" class="validate" name="sender_phone">
          <label for="phone">Phone number</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input id="detailed-address" type="text" class="validate" name="sender_address">
          <label for="detailed-address">Detailed address</label>
        </div>
      </div>

    </form>
  </div>

  </div>

  <div class="recipper">
    
  <div class="row">
      <div class="col s12 m4 l3">
      <h4 class="header">Recipient's address</h4>
  </div>          
<!-- router/add-order -->
  <div class="row">
    <form class="col s12"  method="post" action="routers/add-order.php" novalidate="novalidate">
      <div class="row">
        <div class="input-field col s6">
          <input  id="your_name" type="text" class="validate" name="recipient_name">
          <label for="your_name">Recipient's name</label>
        </div>
        <div class="input-field col s6">
          <input id="phone" type="text" class="validate" name="recipient_phone">
          <label for="phone">Phone number</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input id="detailed-address" type="text" class="validate" name="recipient_address">
          <label for="detailed-address">Detailed address</label>
        </div>
      </div>

      <br> <br> <div class="divider"></div> <br> <br>
      <div class="row">
        <div class="input-field col s6">
          <input  id="fee" type="text" class="validate" name="fee">
          <label for="fee">Transport fee</label>
        </div>
        <div class="input-field col s6">
          <input id="goods" type="text" class="validate" name="goods">
          <label for="goods">Type of goods</label>
        </div>
      </div>

      <div class="row">
      <div class="input-field col s6">
          <select>
            <option value="" disabled selected>Quantity</option>
            <option value="1">< 5kg</option>
            <option value="2">5-20kg</option>
            <option value="3">20-50kg</option>
            <option value="3">50-70kg</option>
            <option value="3">70-100kg</option>
            <option value="3">> 100kg</option>
          </select>
          <label>Quantity Select</label>
        </div>
        <div class="input-field col s6">
          <select>
            <option value="" disabled selected>Choose service</option>
            <option value="1">Super Fast <small class="text-small">10mn/km</small></option>
            <option value="2">Super Fast - Food <small class="text-small">5mn/km</small></option>
            <option value="3">Super Cheap <small class="text-small">30mn/km</small></option>
          </select>
          <label>Service Select</label>
        </div>
      </div>

      <div class="row">
          <div class="input-field col s12">
              <textarea id="textarea1" class="materialize-textarea" length="120" name="message"></textarea>
              <label for="textarea1" class="">Messages</label>
              <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span>
          </div>
        </div>
    </form>
  </div>

  </div>
  
    
  </div>


  <div>
			  <div class="input-field col s12">
                              <button class="btn amber lighten-2 waves-effect waves-light right" type="submit" name="action">Order
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>

            </div>
			</form>
            <!-- <div class="divider"></div> -->
            
          </div>

          <div class="card-panel">

          <div class="row">
            <div class="input-field col s5 m3">
              <input id="voucher" type="text" class="validate" name="voucher">
              <label for="voucher">Your voucher</label>
          </div>
          </div>
          <p>
              <input name="shipper" type="checkbox" class="filled-in" id="filled-in-box1" >
              <label for="filled-in-box1"><span>Support for Shipper</span> <label>| $5</label></label>
          </p>
          <p>
              <input name="device" type="checkbox" class="filled-in" id="filled-in-box2" checked="checked">
              <label for="filled-in-box2"><span>Delivery to your hands</span> <label>| $10</label></label>
          </p>
          
          <div class="divider"></div>
            <div class="row">
              <div class="col s6">
                <h4>Total</h4>
              </div>
              <div class="col s6">
                <h4 class="right">$<?php echo $balance; ?></h4>
              </div>
            </div>
          </div>


  </div>
  
        <!--end container-->

        </div>
  </div>
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