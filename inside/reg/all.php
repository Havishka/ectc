<?php 
	include("../connection.php");

	
	if(isset($_POST['submits'])){
	
	
	
	$URL=$_POST['nic'];
	
	echo "<script>location.href='index.php?tab=all&&nic=$URL'</script>";
	
	//index.php?tab=all&&nic=941111111V
	
	}
	
	
	
?>
<?php 


$query3="select max(std_id)+1 as sys from student";

$result = mysqli_query($con, $query3);

while($rows=mysqli_fetch_array($result))
{
$systemID=$rows['sys'];
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>

    
   
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "reg/readCountry.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>



<style>

.frmSearch {border: 1px solid #a8d4b1;background-color: #1a2956;margin: 2px 0px;padding:40px;border-radius:12px;}
#country-list{float: left;list-style:none;margin-top:5px; margin-left:0%;padding:0;width:290px;position: absolute; border-radius:12px;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:12px;}
</style>

  </head>

 <div class="title_right">

 
 
                 <form class="form-inline" method="post" action="index.php?tab=all" >
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" name="nic"  id="nic" placeholder="Search for student"  required >
					
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit" name="submits" >Go!</button>
                    </span>
                  </div>
                </div>
				</form>
              </div>
            </div>

            <div class="clearfix"></div>
            
 

                     <div class="x_content">
                     
                  
                    <br />
                    <?php


	if(($le==2)||($le==3))
	{
		$sql="SELECT s.fname, s.lname, s.email, s.nic, s.mobile FROM student s,student_branch sb where s.std_id=sb.std_id and sb.branch_id='$bid'";
	}

	else
	{
	$sql="SELECT fname, lname, email, nic, mobile FROM student";
	}
    $q=mysqli_query($con,$sql);


	echo"<center><h2> Already Registered  Student Details</h2></center>";
	echo"<br>";
	
echo "<table class='table table-striped table-bordered' >";//start table

//creating our table heading

echo "<tr>";

echo "<th>First Name</th>";

echo "<th>Last Name</th>";

echo "<th>Email</th>";

echo "<th>NIC </th>";

echo "<th>Mobile</th>";



echo "</tr>";

while ($row=$q -> fetch_assoc())
	{
	extract($row);
	
	echo "<tr>";

	echo "<td>{$fname}</td>";
	echo "<td>{$lname}</td>";
	echo "<td>{$email}</td>";
	echo "<td>{$nic}</td>";
	echo "<td>{$mobile}</td>";

	echo "<td>";

//just preparing the edit link to edit the record


	echo "<a href='index.php?tab=all&&nic={$nic}'><i class='fa fa-archive'></i> New Course<span></span> <br></a>";


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
            </div>
          </div>
        </div>
        
        
        <!-- /page content -->

        <!-- footer content -->
     
  </body>
</html>
