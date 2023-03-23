<?php 
	include "../connection.php";

	
	 
?>

<!DOCTYPE html>
<html lang="en">
  <head>


    
    <style>
.frmSearch {
	border: 1px solid #a8d4b1;
	background-color: #233E85;
	margin: 2px 0px;
	padding: 40px;
	border-radius: 12px;
	color: #FFCC00;
}
#country-list{float: left;list-style:none;margin-top:5px; margin-left:0%;padding:0;width:190px;position: absolute; border-radius:12px;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:12px;}
    </style>
  </head>










<body class="nav-md">
<div class="container body"> <!-- top navigation --><!-- /top navigation -->

      <!-- page content -->
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3></h3>
          </div>
              

          <div class="title_right">
             <form class="form-inline" method="post" action="index.php?tab=updatestudent&&search=result" >
               <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                 <div class="input-group">
                   <input type="text" class="form-control" name="nic" placeholder="Search for student"  required >
					
                   <span class="input-group-btn">
                     <button class="btn btn-default" type="submit" name="submit">Go!</button>
                   </span>
                 </div>
               </div>
		    </form>
          </div>
        </div>

        <div class="clearfix"></div>
            
            

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
            
            
            <h3>Update student information</h3>
            
            <br>
              <div class="x_title">
                   
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link">|<i class="fa fa-chevron-up"></i>|</a>
                  </li>
                </ul>
					
                <div class="clearfix">
                  <div class="frmSearch" >
                    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="10%" align="left" valign="middle">Enter Student NIC :</td>
                        <td><form class="form-inline" method="post" action="index.php?tab=updatestd&&search=result" >
               <div class="col-md-5 col-sm-5 col-xs-12 form-group  top_search">
                 <div class="input-group" style="width:100%;">
                   <input type="text" class="form-control" name="nic" placeholder="NIC to search"  style="color:red; font-size:16px;" required >
					
                   <span class="input-group-btn">
                     <button class="btn btn-default" type="submit" name="submit">Search </button>
                   </span>
                 </div>
               </div>
		    </form></td>
                      </tr>
                    </table>

             
       
                  </div>
                </div>
              </div>
              <div class="x_content">
               <div class="row tile_count">

                  <?php


	if(($le==3)|| ($le==2))
	{
		$sql="SELECT s.fname, s.lname, s.email, s.nic, s.mobile FROM student s, student_branch sb where s.std_id=sb.std_id and sb.branch_id='$bid'";
	}
	else
	{
		$sql="SELECT fname, lname, email, nic, mobile FROM student";
	}
	
	
	
    $q=mysqli_query($con,$sql);


	echo"<center><h2> Update Student Details</h2></center>";
	echo"<br>";
	
echo "<table class='table table-striped table-bordered table table-hover' >";//start table

//creating our table heading

echo "<tr>";

echo "<th bgcolor='#FFFFCC'>First Name</th>";

echo "<th  bgcolor='#FFFFCC'>Last Name</th>";

echo "<th>Email</th>";

echo "<th bgcolor='#FFCC00'>NIC </th>";

echo "<th>Mobile</th>";



echo "</tr>";

while ($row=$q -> fetch_assoc())
	{
	extract($row);
	
	echo "<tr>";

	echo "<td bgcolor='#FFFFCC'>{$fname}</td>";
	echo "<td bgcolor='#FFFFCC'>{$lname}</td>";
	echo "<td >{$email}</td>";
	echo "<td bgcolor='#FFCC00' style='color:red'>{$nic}</td>";
	echo "<td>{$mobile}</td>";

	echo "<td>";

//just preparing the edit link to edit the record


	echo "<a href='index.php?tab=updatestd&&edit={$nic}'><i class='fa fa-edit'></i>  Edit Student<span></span> <br></a>";


	echo "</td>";
	

	echo "</tr>";

}
echo "</table>";

	


?>
    
                    
</div>
                           

              
            </div>
          </div>
        </div>
      </div>


</body>
</html>
