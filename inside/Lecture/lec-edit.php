<?php
session_start();

if(isset($_SESSION['name'] )){

    include 'includes/sidbar_l.php';
    //include 'includes/nav.php';
    include 'connection.php';

if (isset($_POST['submit'])) {
    $nicpost = $_POST['search-box'];
    $nicpost_2 = $_POST['search-box_2'];
    $stime = $_POST['stime'];
    $etime = $_POST['etime'];
    $tlecture = $_POST['tlecture'];
    $coverage = $_POST['coverage'];
    $rdate = $_POST['rdate'];
    $id=$_GET['id'];
    $query = mysqli_query($con, "update t_time set co_name='$nicpost_2',s_time='$stime',e_time='$etime',to_time='$tlecture',coverage='$coverage',rdate='$rdate' where id='$id'");
    if ($query) {


        //echo "<script>alert popup()('Data Successfully Added.');</script>";
        //echo "<script>alert('Successfully updated!');</script>";
        echo "<script>window.location.href ='update_time.php'</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
}
}else{
    header ("Location: update_time.php");
    exit();
}

 $name = $_SESSION['name'];
?>


<script>
$(document).ready(function() {  
    $('#MyTable').DataTable( {  
        initComplete: function () {  
            this.api().columns().every( function () {  
                var column = this;  
                var select = $('<select><option value=""></option></select>')  
                    .appendTo( $(column.footer()).empty() )  
                    .on( 'change', function () {  
                        var val = $.fn.dataTable.util.escapeRegex(  
                            $(this).val()  
                        );  
                //to select and search from grid  
                        column  
                            .search( val ? '^'+val+'$' : '', true, false )  
                            .draw();  
                    } );  
   
                column.data().unique().sort().each( function ( d, j ) {  
                    select.append( '<option value="'+d+'">'+d+'</option>' )  
                } );  
            } );  
        }  
    } );  
} );  
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    .style1{
      
    }
        .frmSearch {
            border: 1px solid #eaedeb;
            background-color: #fdfefe;
            margin: 2px 0px;
            padding: 40px;
            border-radius: 12px;
            
        }

        #country-list {
            float: left;
            list-style: none;
            margin-top: 5px;
            margin-left: 0%;
            padding: 0;
            width: 250px;
            position: absolute;
            border-radius: 12px;
        }

        #country-list li {
            padding: 10px;
            background: #f0f0f0;
            border-bottom: #bbb9b9 1px solid;
        }

        #country-list li:hover {
            background: #ece3d2;
            cursor: pointer;
        }

        #search-box {
            padding: 10px;
            border: #eaedeb 1px solid;
            border-radius: 12px;
            width: 250px;
        }
        #field {
            padding: 10px;
            border: #eaedeb 1px solid;
            border-radius: 12px;
            width: 250px;
        }
        #field1 {
            padding: 10px;
            border: #eaedeb 1px solid;
            border-radius: 12px;
            width: 500px;
        }
        #tlecture {
            padding: 10px;
            border: #eaedeb 1px solid;
            border-radius: 12px;
        }


        #search-box_2 {
            padding: 10px;
            border: #eaedeb 1px solid;
            border-radius: 12px;
            width: 250px;
        }

        #status {
            padding: 10px;
            border: #eaedeb 1px solid;
            border-radius: 12px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CADD</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- <script src="../pay/js/jquery-2.1.4.js" type="text/javascript"></script> -->
    <!-- Page level plugin JavaScript-->
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $("#search-box_2").keyup(function() {
                $.ajax({
                    type: "POST",
                    url: "search/le_check.php",
                    data: 'keyword=' + $(this).val(),
                    beforeSend: function() {
                        $("#search-box_2").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
                    },
                    success: function(data) {
                        $("#suggesstion-box_2").show();
                        $("#suggesstion-box_2").html(data);
                        $("#search-box_2").css("background", "#FFF");
                    }
                });
            });
        });

        function selectCountry_2(val) {
            $("#search-box_2").val(val);
            $("#suggesstion-box_2").hide();
        }

    </script>

    <script>
   function date(){
            p = "1/1/1970 ";
            var starth = document.getElementById("stime").value;
            var endh= document.getElementById("etime").value;
           var difference = new Date(new Date(p+endh) - new Date(p+starth)).toUTCString().split(" ")[4];
            document.getElementById("tlecture").value =  difference;


        }
</script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index_l.php">Home</a></li>
              <li class="breadcrumb-item active">Edit Lecture Coverage </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<h3 align="center" style="margin-top:25px;margin-bottom:25px;padding-left: 20%;">Edit Lecture Coverage</h3>
    <div class="wrapper" style="padding-left: 20%;">
        <!-- <div class="row" style="padding-left: 30%;"> -->


        <div>

            <form method="post">
            <?php
                                     $id=$_GET['id'];
                                    $ret=mysqli_query($con,"select * from t_time where le_name='$name' and id='$id'");
                                    $cnt=1;
                                    while ($row=mysqli_fetch_array($ret)) {

                                    ?>
            <table id="table1"; cellspacing="5px" cellpadding="5%"; align="center">    
       <tr>    
              <td  align="right" class="style1">Lecturer Name :</td>    
              <td class="style1">  <input type="text" id="search-box" name="search-box" value="<?php echo $name?>" readonly  />
                    <div id="suggesstion-box" align="center" ></div></td>    
                    <td  align="right" class="style1">Course Name :</td>    
              <td class="style1">  <input type="text" id="search-box_2"  name="search-box_2"  value="<?php  echo $row['co_name'];?>" required placeholder="Search By Name..." />
                    <div id="suggesstion-box_2" align="center"></div></td>    
       </tr>  
       <!-- <tr>    
              <td  align="right" class="style1">Course Name :</td>    
              <td class="style1">  <input type="text" id="search-box_2"  name="search-box_2" required placeholder="Search By Name..." />
                    <div id="suggesstion-box_2" align="center"></div></td>    
       </tr>   -->
        <tr>
        
        </tr>     
       <tr>    
              <td  align="right" class="style1">Start Time :</td>    
              <td class="style1">   <input type="time" id="field" name="stime"  required="true"  value="<?php  echo $row['s_time'];?>"/></div></td>  
              <td  align="right" class="style1">End Time :</td>    
              <td class="style1">   <input type="time" id="field" name="etime"  required="true" value="<?php  echo $row['e_time'];?>"/></div></td>     
       </tr>  
       <tr>    
             
       </tr>  
                
       <tr>    
              <td  align="right" class="style1">Lecture Duration :</td>    
              <td class="style1">     <input type="text" id="field"  name="tlecture"  onclick="date()" placeholder="00:00:00" value="<?php  echo $row['to_time'];?>"/></div></td>    
              <td  align="right" class="style1">Date :</td>    
        <td class="style1"><input type="date" id="field" name="rdate"  required="true" value="<?php  echo $row['rdate'];?>"> </td>   
       </tr>  
       <tr>    
              <td  align="right" class="style1">Lecture Coverage :</td>    
              <td class="style1">   <textarea name="coverage" id="field" required><?php  echo $row['coverage'];?></textarea></div></td>    
       </tr>        
       <tr>    
       <?php } ?>
       
       <td  align="right" class="field"></td>    
 <td>  <button type="submit" class="btn btn-primary" name="submit"   onClick="date()"> Update </button>   
  <button type="submit" class="btn btn-danger" name="submit" onclick="location.href = 'update_time.php';" > Cancel </button>   </td>
       </tr>        
            
                
</table>


<br><br>

            </form>
           
        </div>
        
  
      

       


                                    </div>
                                  

                                    </div>

            <?php include 'includes/footer.php'; ?>





    

    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>

    <script>
function goBack() {
  window.history.back();
}
</script>


  


</body>

</html>