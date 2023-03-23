<?php
session_start();
$name = $_SESSION['name'];
include 'connection.php';
include 'includes/sidbar_l.php';
include 'includes/nav.php';

?>





<!DOCTYPE html>

<html lang="en">



<head>
    <script>
        jQuery(function() {
            jQuery('#btnSearch').click();
        });
    </script>
    <style>
        .message {
            color: #FF0000;
            /* text-align: center; */
            width: 100%;
        }

        .required {
            color: #FF0000;
            font-size: 11px;
            font-weight: italic;
            padding-left: 10px;
        }

        .txtField {
            padding: 5px;
            border: #000 1px solid;
            border-radius: 4px;
        }

        .tblSaveForm {
            border: 2px #999999 solid;
            background-color: #f8f8f8;
            padding: 10px;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <title>ECTC | PDP</title>

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







    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">



    <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>

    <!-- Script -->
    <script src='jquery-3.3.1.js' type='text/javascript'></script>
    <script src='jquery-ui.min.js' type='text/javascript'></script>
    <script type='text/javascript'>
        $(document).ready(function() {
            $('.dateFilter').datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>


</head>



<body class="hold-transition sidebar-mini layout-fixed">
<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
				</div>
				<!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item">
							<a href="index_l.php">Home</a>
						</li>
						<li class="breadcrumb-item active">Lecture Coverages History </li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
    <br>
    <!-- Search filter -->
    <form method='post' action='' style="padding-left: 20%;">
        <h3> Lecture Coverages History </h3>
        <table style="margin-top: 5%;">

            <tr>
                <td> <input type="month" class="form-control" name="mydate" id="mydate" style="width:350px" placeholder="Choose Month..." value="<?php echo date("Y-m"); ?>" required\></td>
                <?php $mydate = date("Y-m"); ?>

                <td> <input type='submit' name='but_search' value='View' id="btnSearch" class="btn btn-xs btn-primary"> </td>
            </tr>
        </table>
    </form>

    <!-- Employees List -->
    <div style='height: 80%; overflow: auto;padding-left: 20%;padding-right: 5%;'>

        <table border='1' width='100%' class="table table-striped table-bordered">

            <tr>

                <th>Course Name</th>
                <th>Batch Code</th>
                <th>Date</th>
                <th>Start Time</th>

                <th>End Time</th>
                <th>Duration</th>
                <th>Lecture Coverage</th>

            </tr>

            <?php
            if (isset($_POST['but_search'])) {
                $mydate = $_POST['mydate'];
            }
            $query = "select * from t_time where username='$name' and rdate like '$mydate%' and approval='Approved'";



            // Sort
            //   $emp_query .= " ORDER BY date_of_join DESC";
            $Records = mysqli_query($con, $query);

            // Check records found or not
            if (mysqli_num_rows($Records) > 0) {
     
                while ($row = mysqli_fetch_assoc($Records)) {

                    $hours = floor($row['to_time'] / 3600);
                    $minutes = floor(($row['to_time'] / 60) % 60);
                    echo "<tr>"; ?>

                    <td><?php echo $row['course']; ?></td>
                    <td><?php echo $row['co_name']; ?></td>
                    <td><?php echo $row['rdate']; ?></td>
                    <td><?php echo $row['s_time']; ?></td>
                    <td><?php echo $row['e_time']; ?></td>
                    <td><?php echo $hours; ?> h : <?php echo $minutes; ?> m</td>
                    <td><?php echo $row['coverage']; ?></td>

            <?php echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo "<td colspan='4'>No record found!</td>";
                echo "</tr>";
            }
            ?>
        </table>

    </div>

</body>



</html>