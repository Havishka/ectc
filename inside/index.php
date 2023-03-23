<?php

include("../check.php");
include("connection.php");


if (isset($_SESSION['profileimg'])) {

	$profileimg = "<img src='Admin/M_ADMIN/users_profile_images/" . $_SESSION['profileimg'] . "' alt='profile pic'>";
} else {


	$profileimg = '<img src="img/adminn.png" alt="profile pic">';
}


if ($thisuserpass == md5("ectc")) {


	echo '<div class="alert alert-warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Hello ! Welcome to ECTC!</strong> First you must change your default password.. click <a href="index.php?tab=profile"> here</a>
	</div>
	</div>
	
	';
}


?>

	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
  	<strong>Reminder:</strong> We will have a system maintainance at 5.30 PM to 8.30 PM on 3/17/2023. Sorry fot the inconvenience!
	</div>


<?php

	if ($_GET['tab'] != '') {
		$t = $_GET['tab'];
	} else if ($_GET['tab'] = NULL) {
		$t = '';
	}


	$msg = "";

?>
<?php

if ($le == 1) {

	$tabs = '  
				 
				  
	<li><a href="index.php?tab=admin_approve_lec"><i class="fa fa-desktop" ></i>Approve Lecture Coverages<span class=""></span></a></li>		  
		
 <li><a><i class="fa fa-edit"></i>Configurations <span class="fa fa-chevron-down"></span></a>
	<ul class="nav child_menu">
	<li><a href="index.php?tab=all_course">Manage Courses</a></li>
	<li><a href="index.php?tab=manage_lec">Manage Lecturers</a></li>  
	  <li><a href="index.php?tab=batch_reg">Manage Batches</a></li>

	  <li><a href="index.php?tab=branch">Manage Branches</a></li>
	            
	  <li><a href="index.php?tab=manage_admin">Manage Users</a></li>
	</ul>
  </li> 
				 
				  
				  ';
} else if ($le == 2) {
	//$tabs ="";	
	$tabs = '	
				  
	<li><a><i class="fa fa-desktop"></i>Lecture Coverages <span class="fa fa-chevron-down"></span></a>
	<ul class="nav child_menu">
				  <li><a href="index.php?tab=assign_batch">Assign Batches<span class=""></span></a></li>
				  <li><a href="index.php?tab=approve_lecs">Approve Lectures<span class=""></span></a></li>
				  <li><a href="index.php?tab=approved_lecs">Approved Lectures<span class=""></span></a></li>
				  </ul>
				  </li> 	  
				  <li><a><i class="fa fa-edit"></i>Configurations <span class="fa fa-chevron-down"></span></a>
				  <ul class="nav child_menu">
				  
				  <li><a href="index.php?tab=all_course">Manage Courses</a></li>
				  <li><a href="index.php?tab=manage_lec">Manage Lecturers</a></li>   
					<li><a href="index.php?tab=batch_reg_manager">Manage Batches</a></li>
					
					<li><a href="index.php?tab=branch">Manage Branches</a></li>
					  		  
					
				  </ul>
				</li> 
				  ';
} else if ($le == 3) {
	//$tabs ="";	
	$tabs = '	 				  

			  
	<li><a><i class="fa fa-edit"></i>Payment Approval <span class="fa fa-chevron-down"></span></a>
	<ul class="nav child_menu">
	<li><a href="index.php?tab=finalize">Approve Payments<span class=""></span></a></li>
	<li><a href="index.php?tab=rollback_f"></i>Rollback Approved Payments<span class=""></span></a></li>
	
	</ul>
  </li> 
  <li><a><i class="fa fa-edit"></i>Payment Reports <span class="fa fa-chevron-down"></span></a>
  <ul class="nav child_menu">
  <li><a href="index.php?tab=f_payment"></i>Finalized Payments<span class=""></span></a></li>
  <li><a href="index.php?tab=f_report"></i>Generate Report<span class=""></span></a></li>
  
  </ul>
</li> 
				
				  			  
				  ';
} else if ($le == 4) {
	//$tabs ="";	
	$tabs = '	 				  

				  <li><a href="index.php?tab=f_approve"><i class="fa fa-edit"></i>Add Lecture Payments<span class=""></span></a></li>
				  <li><a href="index.php?tab=ac_decline"><i class="fa fa-edit"></i>Approved Lectures<span class=""></span></a></li>
				  <li><a href="index.php?tab=f_payment"><i class="fa fa-edit"></i>Finalized Payments<span class=""></span></a></li>
				  <li><a href="index.php?tab=f_report"><i class="fa fa-edit"></i>Payment Reports<span class=""></span></a></li>
					  
				  
				  ';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<link rel="icon" type="image/png" href="../images/logo.jpg">

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>ECTC | PDP</title>

	<!-- Bootstrap -->
	<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="vendors/nprogress/nprogress.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="build/css/custom.min.css" rel="stylesheet">
	<script src="report_gen/js/jquery-1.12.4.js"></script>


</head>

<body class="nav-md">
	<div class="container body">
		
		<div class="main_container">
			<div class="col-md-3 left_col">

				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="index.php?tab=home" class="site_title"></i> <span>
								<center><img src="../images/logo.jpg" width="138" height="75" class="md md-album" /> </center>
							</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->

					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">

							<ul class="nav side-menu">
								<li><a href="index.php?tab=home"><i class="fa fa-home"></i> Home <span class=""></span></a>

								</li>
								<!-- <li><a><i class="fa fa-edit"></i>Registration<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?tab=regsingle">Register Students</a></li>
                     
                       <li><a href="index.php?tab=all">View Students</a></li>
					     <li><a href="index.php?tab=updatestd">Update Students</a></li>
						
						 <li><a href="index.php?tab=regrp">Register Groups</a></li> -->
								<!-- <li><a href="index.php?tab=batch_reg">Manage Batches</a></li>
					  <li><a href="index.php?tab=all_course">Manage Courses</a></li> -->
								<!-- </ul>
                  </li> -->

								<!-- <li><a href="index.php?tab=payment_home"><i class="fa fa-table"></i> Payments <span class=""></span></a>
                   
                  </li> -->
								<!-- 
				      <li><a><i class="fa fa-desktop"></i>Courses & Discounts<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					<li><a href="index.php?tab=all_course">Add Courses</a></li>
                      <li><a href="index.php?tab=viewcourse">View Courses</a></li>
                      <li><a href="index.php?tab=viewdiscount">Course Discounts</a></li>
           
                    </ul>
                  </li> -->

								</li>

								<?php echo $tabs; ?>

							</ul>
						</div>
						<div class="menu_section">

							<ul class="nav side-menu">

							</ul>
						</div>

					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->

					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>

						<ul class="nav navbar-nav navbar-right">
							<li class="">
								<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<?php echo $profileimg; ?> <?php echo $login_name; ?> (<?php echo $login_user; ?>)
									<span class=" fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<li><a href="index.php?tab=profile"> Profile</a></li>
									<!-- <li><a href="index.php?tab=helpdesk"> Help</a></li> -->
									<li><a href="../logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
								</ul>
							</li>

						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->

			

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3></h3>
						</div>

					</div>

					<div class="clearfix"></div>

					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">

							<div class="clearfix">
								<?php
								if ($t == 'home') {
									//Home page
									include "Admin/HOME/homeMAIN.php";
								} else if (($t == 'branch')) {

									include "Admin/M_BRANCH/MANAGEBRANCHindex.php";
								} else if (($t == 'logh') && ($le == 1)) {

									include "Admin/USER_LOG/LogSindex.php";
								} else if (($t == 'manage_admin') && ($le == 1)) {

									include "Admin/M_ADMIN/ADMINMANAGEindex.php";
								} else if ($t == 'all_course') {

									include "Admin/M_COURSE/courseMANAGEindex.php";
								} else if ($t == 'home') {
									include "Admin/HOME/homeMAIN.php";
								}
								//new add to batch feature
								else if ($t == 'batch_reg') {
									if (isset($_GET['scb_aid'])) {
										include "reg/batch_reg_list.php";
									} else {
										include "reg/batch_reg.php";
									}
								} else if ($t == 'batch_reg_manager') {
									if (isset($_GET['scb_aid'])) {
										include "reg/batch_reg_list.php";
									} else {
										include "reg/batch_reg_manager.php";
									}
								} else if ($t == 'batch_edit') {
									if (isset($_GET['batch_idc'])) {
										include "reg/batch_edit_main.php";
									} else {
										include "reg/batch_reg.php";
									}
								} else if ($t == 'batch_report') {
									include "report_gen/report_gen_by_batch.php";
								} else if ($t == 'regsingle') {

									include "reg/single.php";
								} else if ($t == 'regrp') {


									if (isset($_GET['ref']) && ($_GET['grpid'])) {

										include "reg/grouplist.php";
									} else {

										include "reg/group.php";
									}
								} else if ($t == 'all') {

									if (isset($_GET['nic'])) {

										if ($_GET['nic'] != NULL) {

											if ($_GET['nic'] = "search") {

												include "reg/newReg.php";
											}
										} else {


											include "reg/all.php";
										}
									} else {

										include "reg/all.php";
									}
								} else if ($t == 'profile') {
									include "Admin/Profile.php";
								}
								if ($t == 'updatestd') {

									if (isset($_GET['search'])) {
										if ($_GET['search'] == 'result') {


											include "reg/update1.php";
										}
									} else if (isset($_GET['edit'])) {



										include "reg/edit.php";
									} else {

										include "reg/update.php";
									}
								}

								//report gen and payment part include by tab
								//href index.php?tab=report_gen_view_sel_time_period_bcbb_day
								else if ($t == 'report_gen_home') {
									include "report_gen/report_gen_home.php";
								} else if ($t == 'report_gen_monthly') {
									include "report_gen/report_gen_monthly_final.php";
								} else if ($t == 'report_gen_daily') {
									include "report_gen/report_gen_daily_final.php";
								} else if ($t == 'report_gen_search_std') {
									include "report_gen/report_gen_search_by_student.php";
								} else if ($t == 'admin_approve_lec') {
									include "Lecture/a_approve.php";
								} else if ($t == 'manage_lec') {
									include "Lecture/registration.php";
								} 
								else if ($t == 'ac_decline') {
									include "Lecture/ac_decline.php";
								} else if ($t == 'assign_batch') {
									include "Lecture/assign_batch.php";
								} else if ($t == 'approve_lecs') {
									include "Lecture/approve.php";
								}
								else if ($t == 'approved_lecs') {
									include "Lecture/approved.php";
								} 
								else if ($t == 'update_batch') {
									include "Lecture/update_batch.php";
								} else if ($t == 'f_approve') {
									include "Lecture/f_approve.php";
								} else if ($t == 'finalize') {
									include "Lecture/finalize.php";
								} else if ($t == 'rollback_f') {
									include "Lecture/rollback_f.php";
								} else if ($t == 'f_payment') {
									include "Lecture/f_payment.php";
								} else if ($t == 'f_report') {
									include "Lecture/f_conpay.php";
								} else if ($t == 'view_pay') {
									include "Lecture/view_approve_f.php";
								} else if ($t == 'report_gen_view_sel_time_period_bycourse_bybranch') {
									include "report_gen/report_gen_view_sel_time_period_bycourse_bybranch.php";
								} else if ($t == 'report_gen_view_selected_student') {
									include "report_gen/report_gen_view_selected_student.php";
								} else if ($t == 'report_gen_view_sel_month') {
									include "report_gen/report_gen_view_sel_month.php";
								} else if ($t == 'report_gen_view_sel_time_period_bcbb_day') {
									include "report_gen/report_gen_view_sel_time_period_bcbb_day.php";
								} else if ($t == 'report_gen_home_export') {
									include "report_gen/report_gen_home_export.php";
								} else if ($t == 'completesummary') {
									if (isset($_GET['selmonth'])) {
										include "report_gen/report_gen_complete_summary.php";
									} else {
										include "report_gen/report_gen_view_sel_month.php";
									}
								} else if ($t == 'helpdesk') {
									include "report_gen/help_desk.php";
								} else if ($t == 'report_gen_view_batch') {
									include "report_gen/report_gen_view_sel_time_period_batch.php";
								} else if ($t == 'report_gen_monthy_bm') {
									include "report_gen/report_gen_monthly_branch_mng.php";
								}
								//report_gen_home_export
								//payment part
								//href index.php?tab=installment_first

								else if ($t == 'payment_home') {
									include "pay/pay1.php";
								} else if ($t == 'searchStd') {
									include "pay/searchStd.php";
								}
								/*
					else if($t=='installment_first'){
						include "pay/Instpay.php";
					}*/ else if ($t == 'installment_first') {
									if (isset($_GET['nic']) && ($_GET['course_id'])) {

										include "pay/Instpay.php";
									} else {
										//include "pay/Instpay.php";
										include "pay/pay1.php";
									}
								} else if ($t == 'installment_payment') {
									if (isset($_GET['nic']) && ($_GET['course_id'])) {
										include "pay/installment_payment.php";
									} else {
										include "pay/pay1.php";
									}
								} else if ($t == 'fullpay') {
									if (isset($_GET['nic']) && ($_GET['course_id'])) {
										include "pay/fullpay1.php";
									} else {
										include "pay/pay1.php";
									}
								} else if ($t == 'specialpayment') {
									if (isset($_GET['nic']) && ($_GET['course_id'])) {
										include "pay/special.php";
									} else {
										include "pay/pay1.php";
									}
								} else if ($t == 'specialpayinstallment') {
									if (isset($_GET['nic']) && ($_GET['course_id'])) {
										include "pay/spc_installment_payment.php";
									} else {
										include "pay/pay1.php";
									}
								} else if ($t == 'fullpaychangeddisc') {
									if (isset($_GET['nic']) && ($_GET['course_id'])) {
										include "pay/full_payment_changed_dis.php";
									} else {
										include "pay/pay1.php";
									}
								} else if ($t == 'viewdiscount') {
									include "pay/view_discount.php";
								} else if ($t == 'viewcourse') {
									include "pay/view_course.php";
								} else if ($t == 'discountapr') {
									include "pay/set_approval_state.php";
								}
								//approval for discounts
								else if ($t == 'approvediscount') {
									if (isset($_GET['nic']) && ($_GET['course_id']) && ($_GET['std_id'])) {
										include "pay/set_approval_state_q.php";
									} else {
										include "pay/set_approval_state.php";
									}
								} else if ($t == 'rejecteddiscount') {
									if (isset($_GET['nic']) && ($_GET['course_id']) && ($_GET['std_id'])) {
										include "pay/set_approve_state_reject.php";
									} else {
										include "pay/set_approval_state.php";
									}
								} else if ($t == 'alterdiscount') {
									include "pay/alter_discount_later.php";
								} else if ($t == 'paymenterror') {
									include "pay/paymenterror.php";
								} else if ($t == 'paymenterrorfix') {
									if (isset($_GET['pr_id']) && ($_GET['pr_course_id']) && ($_GET['pr_std_id'])) {
										include "pay/paymenterrorfix.php";
									} else {
										include "pay/paymenterror.php";
									}
								} else if ($t == 'payment_refund') {
									include "pay/payment_refund_main.php";
								} else if ($t == 'payment_refund_in') {
									if (isset($_GET['course_id']) && ($_GET['std_id'])) {
										include "pay/payment_refund_in.php";
									} else {
										include "pay/payment_refund_main.php";
									}
								} else if ($t == 'changedisc') {
									if (isset($_GET['nic']) && ($_GET['course_id']) && ($_GET['std_id'])) {
										include "pay/alter_discount_selected.php";
									} else {
										include "pay/alter_discount_later.php";
									}
								}

								?>
							</div>


							<br>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /page content -->

		<!-- footer content -->
		<footer>
			<div class="pull-right">
				2021 | ECTC-Research & Development Unit.
			</div>
			<div class="clearfix"></div>
		</footer>
		<!-- /footer content -->
	</div>
	</div>

	<!-- jQuery 
    <script src="vendors/jquery/dist/jquery.min.js"></script>-->

	<!-- Bootstrap -->
	<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="vendors/nprogress/nprogress.js"></script>

	<!-- Custom Theme Scripts -->
	<script src="build/js/custom.min.js"></script>

	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
			var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
				s1.async=true;
				s1.src='https://embed.tawk.to/640dd93031ebfa0fe7f21847/1grb1gqa6';
				s1.charset='UTF-8';
				s1.setAttribute('crossorigin','*');
				s0.parentNode.insertBefore(s1,s0);
		})();
	</script>
	<!--End of Tawk.to Script-->

</body>

</html>