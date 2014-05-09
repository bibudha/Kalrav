<!DOCTYPE html>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>ADMIN PANEL </title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />

<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/demo_page.css" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/demo_table.css" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/demo_table_jui.css" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.dataTables_themeroller.css" />

<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui-1.8.4.custom.css" />-->











 <script src="//code.jquery.com/jquery-1.10.2.js"></script>

 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/clockp.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/clockh.js"></script> 

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ddaccordion.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.cookie.js"></script> 

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script> 

<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script> -->



<script type="text/javascript">

ddaccordion.init({

	headerclass: "submenuheader", //Shared CSS class name of headers group

	contentclass: "submenu", //Shared CSS class name of contents group

	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"

	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover

	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 

	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content

	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)

	animatedefault: false, //Should contents open by default be animated into view?

	persiststate: true, //persist state of opened contents within browser session?

	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]

	togglehtml: ["suffix", "<img src='<?php echo base_url(); ?>assets/images/plus.gif' class='statusicon' />", "<img src='<?php echo base_url(); ?>assets/images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)

	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"

	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized

		//do nothing

	},

	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed

		//do nothing

	}

})

</script>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jconfirmaction.jquery.js"></script>

<script type="text/javascript">

	

	$(document).ready(function() {

		$('.ask').jConfirmAction();

		

		/*$('#rounded-corner').dataTable( {

     "bJQueryUI": true,

     "sPaginationType": "full_numbers"

     });*/

	});

	

</script>



<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/niceforms.js"></script>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/css/niceforms-default.css" />



</head>

<body>

<div id="main_container">



	<div class="header">

    <div class="logo" ><a href="#"><img src="<?php echo base_url(); ?>assets/images/kalrev_logo.jpg" height="100px" /></a></div>

  <?php

  $user_role =  $user_data['user_role'];

  $active =     $user_data['user_isactive'];

  ?>

    <div class="right_header">Welcome <?php echo $user_data['fname'] ; ?>,| <a href="#" class="messages">(3) Messages</a> | <a href="<?php echo base_url(); ?>admin/login/logout_process" class="logout">Logout</a></div>



    <div id="clock_a"></div>

    </div>

    

    <div class="main_content">

    

                    <div class="menu"><br>

                  

                    </div> 

            <div class="center_content">           

         <div class="left_content">

    

    		<div class="sidebar_search">

            <form>

            <input type="text" name="" class="search_input" value="search keyword" onClick="this.value=''" />

            <input type="image" class="search_submit" src="<?php echo base_url(); ?>assets/images/search.png" />

            </form>            

            </div>

    

            <div class="sidebarmenu">

     <?php if($user_role == 1 && $active == 1) {?>

                

                    <a class="menuitem submenuheader" href="">Products</a>

                    <div class="submenu">

                    <ul>

                    <li><a href="<?php echo base_url();?>admin/product/all_product">All Products</a></li>

                    <li><a href="<?php echo base_url();?>admin/product/add_product">Add Products</a></li>

                    </ul>

                    </div>

                

                    <a class="menuitem submenuheader" href="" >Employes</a>

                    <div class="submenu">

                    <ul>

                    <li><a href="<?php echo base_url();?>admin/employes/all_employes_view">All Employe</a></li>

                    <li><a href="<?php echo base_url();?>admin/employes/add_employes">Add New Employe</a></li>

                    </ul>

                    </div>

            

                    <a class="menuitem submenuheader" href="">Invoice</a>

                    <div class="submenu">

                    <ul>

                    <li><a href="#">All Invoice</a></li>

                    <li><a href="#">Add New Invoice</a></li>

		    		<li><a href="<?php echo base_url();?>admin/invoice">Bill</a></li>
					

                    

                    <li><a href="<?php echo base_url();?>admin/invoice/all_packing_slip">All Packing Slip</a></li>
					<li><a href="#">All Bill</a></li>

                    </ul>

                    </div>

                

		    <a class="menuitem submenuheader" href="">Orders</a>

		    <div class="submenu">

                    <ul>

                    <li><a href="<?php echo base_url();?>admin/orders/all_order">All Orders</a></li>

                    <li><a href="<?php echo base_url();?>admin/orders/add_order">Add New Orders</a></li>

                    </ul>

		    </div>

                                

		    <a class="menuitem submenuheader" href="">Group & Category</a>

		    <div class="submenu">

                    <ul>

                    <li><a href="<?php echo base_url();?>admin/group/all_group">All Group</a></li>

                    <li><a href="<?php echo base_url();?>admin/group/add_group">Add New Group</a></li>

		    <li><a href="<?php echo base_url();?>admin/Group/all_category">All Category</a></li>

                    <li><a href="<?php echo base_url();?>admin/group/add_category">Add New Category</a></li>

                    </ul>

		    </div>	

                                

		    <a class="menuitem submenuheader" href="">Units</a>

		    <div class="submenu">

                    <ul>

                    <li><a href="<?php echo base_url();?>admin/units/all_units">All Units</a></li>

                    <li><a href="<?php echo base_url();?>admin/units/add_units">Add New Units</a></li>

                    </ul>

		    </div>

                                

		    <a class="menuitem submenuheader" href="">Clients</a>

		    <div class="submenu">

                    <ul>

                    <li><a href="<?php echo base_url();?>admin/clients/all_clients">All Clients</a></li>

                    <li><a href="<?php echo base_url();?>admin/clients">Add New Clients</a></li>

                    </ul>

	            </div>		

                <a class="menuitem" href="">Billing</a>

      <?php } elseif($user_role == 2 && $active == 1) { ?> 

                

                    <a class="menuitem submenuheader" href="">Products</a>

                    <div class="submenu">

                    <ul>

                    <li><a href="<?php echo base_url();?>admin/product/all_product">All Products</a></li>

                    <li><a href="<?php echo base_url();?>admin/product/add_product">Add Products</a></li>

                    </ul>

                    </div>

                    

                    <a class="menuitem submenuheader" href="">Orders</a>

	            <div class="submenu">

                    <ul>

                    <li><a href="">All Orders</a></li>

                    <li><a href="<?php echo base_url();?>admin/orders/add_order">Add New Orders</a></li>

                    </ul>

		    </div>

                    

                    <a class="menuitem submenuheader" href="">Clients</a>

		    <div class="submenu">

                    <ul>

                    <li><a href="<?php echo base_url();?>admin/clients/all_clients">All Clients</a></li>

                    <li><a href="<?php echo base_url();?>admin/clients">Add New Clients</a></li>

                    </ul>

		    </div>

                    

      <?php  } elseif($user_role == 3 && $active == 1) {  ?>

                         

                 

                    <a class="menuitem submenuheader" href="">Products</a>

                    <div class="submenu">

                    <ul>

                    <li><a href="<?php echo base_url();?>admin/product/all_product">All Products</a></li>

                    <li><a href="<?php echo base_url();?>admin/product/add_product">Add Products</a></li>

                    </ul>

                    </div>

                    

                    <a class="menuitem submenuheader" href="" >Employes</a>

                    <div class="submenu">

                    <ul>

                    <li><a href="<?php echo base_url();?>admin/employes/all_employes_view">All Employe</a></li>

                    <li><a href="<?php echo base_url();?>admin/employes/add_employes">Add New Employe</a></li>

                    </ul>

                    </div>

            

                    <a class="menuitem submenuheader" href="">Invoice</a>

                    <div class="submenu">

                    <ul>

                    <li><a href="">All Invoice</a></li>

                    <li><a href="">Add New Invoice</a></li>

                    </ul>

                    </div>

                    

		    <a class="menuitem submenuheader" href="">Orders</a>

		    <div class="submenu">

                    <ul>

                    <li><a href="">All Orders</a></li>

                    <li><a href="<?php echo base_url();?>admin/orders/add_order">Add New Orders</a></li>

                    </ul>

		    </div>

                    

                    <a class="menuitem submenuheader" href="">Clients</a>

		    <div class="submenu">

                    <ul>

                    <li><a href="<?php echo base_url();?>admin/clients/all_clients">All Clients</a></li>

                    <li><a href="<?php echo base_url();?>admin/clients">Add New Clients</a></li>

                    </ul>

		    </div>

                   

       <?php  } ?>

				<!--<a class="menuitem" href=""></a>-->

                

                <!--<a class="menuitem_green" href="">Green button</a>-->

                

               <!-- <a class="menuitem_red" href="">Red button</a>-->

                    

            </div>

            

            

            <div class="sidebar_box">

                <div class="sidebar_box_top"></div>

                <div class="sidebar_box_content">

                <h3>User help desk</h3>

                <img src="<?php echo base_url(); ?>assets/images/info.png" alt="" title="" class="sidebar_icon_right" />

                <p>

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

                </p>                

                </div>

                <div class="sidebar_box_bottom"></div>

            </div>

            

            <div class="sidebar_box">

                <div class="sidebar_box_top"></div>

                <div class="sidebar_box_content">

                <h4>Important notice</h4>

                <img src="<?php echo base_url(); ?>assets/images/notice.png" alt="" title="" class="sidebar_icon_right" />

                <p>

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

                </p>                

                </div>

                <div class="sidebar_box_bottom"></div>

            </div>

            

            <div class="sidebar_box">

                <div class="sidebar_box_top"></div>

                <div class="sidebar_box_content">

                <h5>Download photos</h5>

                <img src="<?php echo base_url(); ?>assets/images/photo.png" alt="" title="" class="sidebar_icon_right" />

                <p>

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

                </p>                

                </div>

                <div class="sidebar_box_bottom"></div>

            </div>  

            

            <div class="sidebar_box">

                <div class="sidebar_box_top"></div>

                <div class="sidebar_box_content">

                <h3>To do List</h3>

                <img src="<?php echo base_url(); ?>assets/images/info.png" alt="" title="" class="sidebar_icon_right" />

                <ul>

                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>

                 <li>Lorem ipsum dolor sit ametconsectetur <strong>adipisicing</strong> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>

                  <li>Lorem ipsum dolor sit amet, consectetur <a href="#">adipisicing</a> elit.</li>

                   <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>

                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>

                     <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>

                </ul>                

                </div>

                <div class="sidebar_box_bottom"></div>

            </div>

              

    

    </div>              

                    

                    